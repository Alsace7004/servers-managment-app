<template>
    <!-- Begin -->
        <div class="wrapper">
            <!-- The Sidebar -->
                <Sidebar/>
            <!-- The Section -->
            <div class="section">
                <!-- The navbar -->
                    <Navbar />
                <!-- The Content -->
                <div class="content">
                    <div class="content_body">
                        
                        <!-- router-view-begin -->
                            <ContentHeader message="Page des Type de Staff !!!"/>
                            
                            <div v-if="!TypeStaffs.length || !$can('typeStaff-list')" class="data_box">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                        Chargement des type de staff en cours...
                                        <loader></loader>
                                </p>
                            </div>
                            
                            <div v-else class="data_box">
                                <!-- Create Domaine Btn Begin-->
                                <div v-if="$is('Admin') || $can('typeStaff-create')">
                                    <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter type de staff</button>
                                </div>
                                <!-- Create Domaine Btn end-->
                                <div class="data_box_header">
                                    <div class="per_page">
                                        <select name="" class="select_option_form" id="" v-model="tData.length" @change="getPerPage">
                                            <option v-for="(pp,key) in perPage" :key="key" :value="pp">{{pp}}</option>
                                        </select>
                                    </div>
                                    <div class="search_bar">
                                        <input type="text" class="search_bar_form" name="" id="" v-model="tData.search" @input="getSearch" placeholder="Rechercher...">
                                    </div>
                                </div>
                                <div class="data_box_content">
                                    <v-table :columns="columns">
                                        <tbody>
                                            <tr v-for="(item,key) in TypeStaffs" :key="key">
                                                <td>{{item.id}}</td>
                                                <td>{{item.type_staff}}</td>
                                                <td>{{convert(item.created_at)}}</td>
                                                <td>
                                                    <button class="edit_btn" v-if="$can('typeStaff-edit')"  @click="editTypeStaff(item.id)"><i class="fas fa-edit"></i></button>
                                                    <button class="delete_btn" v-if="$can('typeStaff-delete')" @click="deleteTypeStaff(item.id)"><i class="fas fa-trash"></i></button>
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
                        <!-- router-view-end -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    <!-- End -->
                        <!-- Adding Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="create_domaine">
                            <template v-slot:header>
                                <h4>Ajouter un type de staff</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="typestaff.type_staff" placeholder="Nom du type de staff...">
                                </div>
                                <span v-if="errors.type_staff" class="error_txt">{{errors.type_staff[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <!-- <button class="mdl-btn-primary" id="send_server" :class="loading ? 'disabled' :''" @click="saveTypeStaff">Sauvegarder</button> -->
                                    <v-button :onClick="saveTypeStaff" id="send_server" class="button"  :class="loading ? 'disabled loading' :''">Sauvegarder</v-button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_domaine">
                            <template v-slot:header>
                                <h4>Editer le type de staff :</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="typestaff.type_staff" placeholder="Nom de domaine...">
                                </div>
                                <span v-if="errors.type_staff" class="error_txt">{{errors.type_staff[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <!-- <button class="mdl-btn-primary" id="update_server" :class="loading ? 'disabled' :''" @click="updateDomaine">Mettre à jour</button> -->
                                    <v-button :onClick="updateDomaine" id="update_server" class="button"  :class="loading ? 'disabled loading' :''">Mettre à jour</v-button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
    
</template>

<script>
    import Sidebar from "../components/Sidebar.vue";
    import Navbar from "../components/Navbar.vue";
    import ContentHeader from "../components/ContentHeader.vue"
    import vTable from "../components/vTable/vTable.vue"
    import ProperModal from "../components/ProperModal.vue";
    import loader from "../components/loader3.vue"
    import axiosClient from "../axios/index"
    import Button from "../components/Button.vue"
    export default {
        name:'TypeStaffs',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,
            'v-button':Button
        },
        data(){
            let columns =[
                {label:'~#',            name:''},
                {label:'Type Staff',    name:''},
                {label:'Ajouté Le',     name:''},
                {label:'Actions',       name:''},
            ];
            return{
                
                perPage : ['5','10','20','30'],
                columns: columns,
                TypeStaffs:[],
                servers:[],
                errors:[],
                links:[],
                typestaff:{
                    type_staff:'',
                },
                isModalVisible:false,
                tData:{
                    page:0,
                    length:'5',
                    search:'',
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
            showModal(){
                this.errors = []
                this.typestaff={
                    type_staff:'',
                }
                $("#create_domaine").modal("show")
            },
            getTypeStaff(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/typeStaff",{params:this.tData}).then((res)=>{
                    let content = res.data.typeStaff
                    //console.log("Valeur de content dans getTypeStaff:",content)
                    this.TypeStaffs = content.data
                    this.configPagination(content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getTypeStaff:",err.response)
                })
            },
            saveTypeStaff(){
                this.errors = []
                /*************************************************/
                let send_server = document.querySelector("#send_server")
                send_server.classList.add("loading");
                send_server.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                /*************************************************/
                axiosClient.post("api/typeStaff",this.typestaff).then((res)=>{
                    /*************************************************/
                    send_server.classList.remove("loading");
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    /*************************************************/
                    //console.log("Valeur de res dans saveTypeStaff:",res)
                    if(res.data.status){
                        $('#create_domaine').modal('hide'); 
                        this.getTypeStaff()
                        Swal.fire('Créer!','Nouveau Type de Staff Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    /*************************************************/
                    send_server.classList.remove("loading");
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    /*************************************************/
                    //console.log("Valeur de err dans saveTypeStaff:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            getPerPage(){
                this.getTypeStaff()
            },
            getSearch(){
                this.getTypeStaff()
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
                this.getTypeStaff(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editTypeStaff(id){
                this.errors = [];
                axiosClient.get(`api/typeStaff/${id}`).then((res)=>{
                    $("#edit_domaine").modal("show")
                    //console.log('valeur de res dans edit server:',res)
                    this.edit_id                  = res.data.id;
                    this.typestaff.type_staff     = res.data.type_staff;
                    this.is_Editing               = true;
                })
            },
            updateDomaine(){
                    /*************************************************/
                    let update_server = document.querySelector("#update_server")
                    update_server.classList.add("loading");
                    update_server.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    /*************************************************/
                    axiosClient.put(`api/typeStaff/${this.edit_id}`,this.typestaff).then((res)=>{
                        /*************************************************/
                        update_server.classList.remove("loading");
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        /*************************************************/
                        if(res.data.status){
                            $('#edit_domaine').modal('hide');
                            Swal.fire('Mise à jour!','Type de Staff mise à jour avec success.','success')    
                            this.getTypeStaff();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        /*************************************************/
                        update_server.classList.remove("loading");
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        /*************************************************/
                        //console.log("Valeur de err dans updateDomaine:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deleteTypeStaff(id){
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
                                axiosClient.delete(`api/typeStaff/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','Le Type de Staff a été supprimé.','success') 
                                        this.getTypeStaff()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"Le Type de Staff est toujours disponible !!!",'success')
                        }
                    })
            },
        },


        created(){
            this.getTypeStaff()
        },
    }
</script>

<style scoped>
    .badge_red{
        border-radius: 5px;
        background-color: #dd3333;
        color: white;
    }
    .badge_white{
        border-radius: 5px;
        background-color: #2f3640;
        color: #fff;
    }
    .badge_red_view{
        border:1px solid #dd3333;background-color: #dd3333;color: white;padding:1px 15px;border-radius:5px
    }
    .badge_white_view{
        border:1px solid #2f3640;background-color: #2f3640;color: #fff;padding:1px 15px;border-radius:5px
    }
</style>
