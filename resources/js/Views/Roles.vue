<template>
    
        <ContentHeader message="Roles Page !!!"/>
                        <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Add New Role</button>
                        <div class="data_box">
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
                            <div class="data_box_content">
                                <v-table :columns="columns">
                                    <tbody>
                                        <tr v-if="!roles.length">
                                            <p style="display:flex;justify-content:center;align-items:center;margin-left:20rem">
                                                Chargement des roles en cours...
                                                <loader></loader>
                                            </p>
                                        </tr>
                                        <tr v-for="(role,key) in roles" :key="key">
                                            <td>{{role.id}}</td>
                                            <td>{{role.name}}</td>
                                            <td>{{convert(role.created_at)}}</td>
                                            <td>
                                                <!-- <button class="view_btn"><i class="fas fa-eye"></i></button> -->
                                                <button class="edit_btn"><i class="fas fa-edit" @click="editRole(role.id)"></i></button>
                                                <button class="delete_btn" @click="deleteRole(role.id)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </v-table>
                            </div>
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
                        <proper-modal v-show="isModalVisible" modalName="create_role">
                            <template v-slot:header>
                                <h4>Create Users</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="role.name" placeholder="Role name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="mdl-btn-primary" id="send_role" :class="loading ? 'disabled' :''" @click="saveRole">Save</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_role">
                            <template v-slot:header>
                                <h4>Edit Role:</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="role.name" placeholder="Role name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="mdl-btn-primary" id="update_role" :class="loading ? 'disabled' :''" @click="updateRole">Update</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
    
</template>

<script>
    import ContentHeader from "../components/ContentHeader.vue";
    import vTable from "../components/vTable/vTable.vue";
    import ProperModal from "../components/ProperModal.vue";
    import loader from "../components/loader2.vue"
    export default {
        name:'roles',
        components:{
            ContentHeader,vTable,ProperModal,loader
        },
        props: ['self'],
        data(){
            let columns =[
                    {label:'~#',        name:'id'},
                    {label:'Roles',     name:'role'},
                    {label:'Ajouté Le', name:'created_at'},
                    {label:'Actions',   name:'action'},
            ];
            return{
                columns: columns,
                roles:[],
                errors:[],
                links:[],
                role:{
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
        created(){
            this.getRoles()
        },
        methods:{
            
            convert(jour){
                let  date =  new Date(jour);
                return  date.toLocaleDateString('en-GB') // "day-month-year"
            },
            showModal(){
                this.errors = []
                this.role.name = ""
                $("#create_role").modal("show")
            },
            getRoles(pageGet){
                
                this.tData.page = pageGet
                axios.get("api/roles",{params:this.tData}).then((res)=>{
                    let content = res.data.roles
                    //console.log("Valeur de res dans getRoles:",res)
                    this.roles = content.data
                    this.configPagination(content)
                    //console.log("Valeur de res.data dans getRoles:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getRoles:",err.response)
                })
            },
            saveRole(){
                this.errors = []
                let send_role = document.querySelector("#send_role")
                send_role.innerHTML = "Envoie en cours..."
                this.loading = true;
                axios.post("api/roles",this.role).then((res)=>{
                    send_role.innerHTML = "Save"
                    this.loading = false;
                    //console.log("Valeur de res dans saveRole:",res)
                    if(res.data.status){
                        $('#create_role').modal('hide'); 
                        this.getRoles()
                        Swal.fire('Créer!','Nouveau Role Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    send_role.innerHTML = "Save"
                    this.loading = false;
                    //console.log("Valeur de err dans saveRole:",err.response)
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
                this.getRoles(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editRole(id){
                this.errors = [];
                axios.get(`api/roles/${id}`).then((res)=>{
                    //$('#create_role').modal('show');
                    $("#edit_role").modal("show")
                    //console.log('valeur de res dans edit role:',res)
                    this.edit_id    = res.data.id;
                    this.role.name  = res.data.name;
                    this.is_Editing = true;
                })
            },
            deleteRole(id){
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
                                axios.delete(`api/roles/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','Le Role a été supprimé.','success') 
                                        this.getRoles()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"Le role est toujours disponible !!!",'success')
                        }
                    })
            },
            updateRole(){
                    let update_role = document.querySelector("#update_role")
                    update_role.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    axios.put(`api/roles/${this.edit_id}`,this.role).then((res)=>{
                        update_role.innerHTML = "Update"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_role').modal('hide');
                            Swal.fire('Mise à jour!','Role mise à jour avec success.','success')    
                            this.getRoles();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_role.innerHTML = "Update"
                        this.loading = false;
                        //console.log("Valeur de err dans updateRole:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            }
        }
    }
</script>

<style scoped>
    
</style>
