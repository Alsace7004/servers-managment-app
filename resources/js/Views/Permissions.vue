<template>
    
        <ContentHeader message="Permissions Page !!!"/>
        <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Add New Permission</button>
                        <div class="data_box">
                            <!-- header -->
                            <div class="data_box_header">
                                <div class="per_page">
                                    <select name="" id="" class="select_option_form">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                                <div class="search_bar">
                                    <input type="text" class="search_bar_form" name="" id="" placeholder="Rechercher...">
                                </div>
                            </div>
                            <!-- content -->
                            <div class="data_box_content">
                                <v-table :columns="columns">
                                    <tbody>
                                        <tr v-if="!permissions.length">
                                            <p style="display:flex;justify-content:center;align-items:center;margin-left:20rem">
                                                Chargement des Permissions en cours...
                                                <loader></loader>
                                            </p>
                                        </tr>
                                        <tr v-for="(item,key) in permissions" :key="key">
                                            <td>{{item.id}}</td>
                                            <td>{{item.name}}</td>
                                            <td>{{convert(item.created_at)}}</td>
                                            <td>
                                                <!-- <button class="view_btn"><i class="fas fa-eye"></i></button> -->
                                                <button class="edit_btn" @click="editPermission(item.id)"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn" @click="deletePermission(item.id)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </v-table>
                            </div>
                            <!-- footer -->
                            <div class="data_box_footer">
                                <div>
                                    ({{pagination.from}}-{{pagination.to}} sur {{pagination.total}})
                                </div>
                                <div>
                                    <button class="pagination_btn" style="margin-right:0.5rem;cursor:pointer" v-for="(link,key) in links" :key="key" :class="getClass(link)">
                                        <a @click.prevent="navigation(link)">
                                            {{link.label}}
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Adding Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="create_permission">
                            <template v-slot:header>
                                <h4>Create Permission</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="permission.name" placeholder="Permission name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="mdl-btn-primary" id="send_permission" :class="loading ? 'disabled' :''" @click="savePermission">Save</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_permission">
                            <template v-slot:header>
                                <h4>Edit Permission:</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="permission.name" placeholder="Permission name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="mdl-btn-primary" id="update_permission" :class="loading ? 'disabled' :''" @click="updatePermission">Update</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
    
</template>

<script>
    import ContentHeader from "../components/ContentHeader.vue"
    import vTable from "../components/vTable/vTable.vue"
    import ProperModal from "../components/ProperModal.vue";
    import loader from "../components/loader2.vue"
    import axiosClient from "../axios/index"
    export default {
        name:'permissions',
        components:{
            ContentHeader,vTable,ProperModal,loader
        },
        data(){
            let columns = [
                {label:'~#',name:''},
                {label:'Permissions',name:''},
                {label:'Ajouté Le',name:''},
                {label:'Actions',name:''}, 
            ];
            return{
                columns: columns,
                permissions:[],
                errors:[],
                links:[],
                permission:{
                    name:''
                },
                isModalVisible:false,
                tData:{
                    page:0
                },
                pagination:{
                    from:'',
                    to :'',
                    total:'',
                },
                edit_id:'',
                is_Editing:false,
                loading:false,
            }
        },
        methods:{
            convert(jour){
                let  date =  new Date(jour);
                return  date.toLocaleDateString('en-GB') // "day-month-year"
            },
            showModal(){
                this.errors = []
                this.permission.name = ""
                $("#create_permission").modal("show")
            },
            getPermissions(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/permissions",{params:this.tData}).then((res)=>{
                    let content = res.data.permissions
                    //console.log("Valeur de res dans getPermissions:",res)
                    this.permissions = content.data
                    this.configPagination(content)
                    //console.log("Valeur de res.data dans getPermissions:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getPermissions:",err.response)
                })
            },
            savePermission(){
                this.errors = []
                let send_permission = document.querySelector("#send_permission")
                send_permission.innerHTML = "Envoie en cours..."
                this.loading = true;
                axiosClient.post("api/permissions",this.permission).then((res)=>{
                    send_permission.innerHTML = "Save"
                    this.loading = false;
                    //console.log("Valeur de res dans savePermission:",res)
                    if(res.data.status){
                        $('#create_permission').modal('hide'); 
                        this.getPermissions()
                        Swal.fire('Créer!','Nouvelle Permission Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    send_permission.innerHTML = "Save"
                    this.loading = false;
                    console.log("Valeur de err dans savePermission:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            configPagination(data){
                this.pagination.from    =data.from,
                this.pagination.to      =data.to,
                this.pagination.total   =data.total
                this.links              =data.links
            },
            navigation(nav){
                const url = nav.url.split("=");
                const page = url[1];
                this.getPermissions(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editPermission(id){
                this.errors = [];
                axiosClient.get(`api/permissions/${id}`).then((res)=>{
                    $("#edit_permission").modal("show")
                    //console.log('valeur de res dans edit permission:',res)
                    this.edit_id    = res.data.id;
                    this.permission.name  = res.data.name;
                    this.is_Editing = true;
                })
            },
            updatePermission(){
                    let update_permission = document.querySelector("#update_permission")
                    update_permission.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    axiosClient.put(`api/permissions/${this.edit_id}`,this.permission).then((res)=>{
                        update_permission.innerHTML = "Update"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_permission').modal('hide');
                            Swal.fire('Mise à jour!','Permission mise à jour avec success.','success')    
                            this.getPermissions();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_permission.innerHTML = "Update"
                        this.loading = false;
                        console.log("Valeur de err dans updatePermission:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deletePermission(id){
                    Swal.fire({
                    title: 'Etes-vous sûr?',
                    text: "Vous ne pourrez pas annuler cette action !!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Annuler!',
                    confirmButtonText: 'Oui, supprimez-le!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                                axiosClient.delete(`api/permissions/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','La Permission a été supprimé.','success') 
                                        this.getPermissions()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"La Permission est toujours disponible !!!",'success')
                        }
                    })
            },
        },
        created(){
            this.getPermissions()
        },
    }
</script>

<style scoped>

</style>
