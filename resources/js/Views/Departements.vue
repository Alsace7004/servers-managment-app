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
                            <ContentHeader message="Page des Departements !!!"/>
                            
                            <div v-if="!departements.length || !$can('departement-list')" class="data_box">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                        Chargement des departements en cours...
                                        <loader></loader>
                                </p>
                            </div>
                            
                            <div v-else class="data_box">
                                <!-- Create departement Btn Begin-->
                                <div v-if="$is('Admin') || $can('departement-create')">
                                    <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Nouveau Departement</button>
                                </div>
                                <!-- Create departement Btn end-->
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
                                            <tr v-for="(item,key) in departements" :key="key">
                                                <td>{{item.id}}</td>
                                                <td>{{item.nom_departement}}</td>
                                                <td>{{item.email}}</td>
                                                <td>{{convert(item.created_at)}}</td>
                                                <td>
                                                    <button class="edit_btn" v-if="$can('departement-edit')"  @click="editDepartement(item.id)"><i class="fas fa-edit"></i></button>
                                                    <button class="delete_btn" v-if="$can('departement-delete')" @click="deleteDepartement(item.id)"><i class="fas fa-trash"></i></button>
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
                        <proper-modal v-show="isModalVisible" modalName="create_departement">
                            <template v-slot:header>
                                <h4>Ajouter un departement</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="departement.nom_departement" placeholder="Nom du departement...">
                                </div>
                                <span v-if="errors.nom_departement" class="error_txt">{{errors.nom_departement[0]}}</span>
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="departement.user_id" class="input_form_item">
                                        <option value="">Choisir le superviseur</option>
                                        <option v-for="item in users" :key="item.id" :value="item.id">{{item.email}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.user_id" class="error_txt">{{errors.user_id[0]}}</span>
                                
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="send_server" :class="loading ? 'disabled' :''" @click="saveDepartement">Sauvegarder</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_departement">
                            <template v-slot:header>
                                <h4>Editer un departement :</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="departement.nom_departement" placeholder="Nom de departement...">
                                </div>
                                <span v-if="errors.nom_departement" class="error_txt">{{errors.nom_departement[0]}}</span>
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="departement.user_id" class="input_form_item">
                                        <option value="">Choisir le superviseur</option>
                                        <option v-for="item in users" :key="item.id" :value="item.id">{{item.email}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.user_id" class="error_txt">{{errors.user_id[0]}}</span>
                                
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="update_server" :class="loading ? 'disabled' :''" @click="updateDepartement">Mettre à jour</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
                        <!-- View Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="view_departement">
                            <template v-slot:header>
                                <h4>Les details du departement:</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <label for=""><strong>Nom du departement :</strong></label>
                                <div class="mb_3">
                                    <p>{{departement.nom_departement}}</p>
                                </div>
                                <label for=""><strong>Superviseur :</strong></label>
                                <div class="mb_3">
                                    <p>{{departement.user_id}}</p>
                                </div>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- View Modal End -->
    
</template>

<script>
    import Sidebar from "../components/Sidebar.vue";
    import Navbar from "../components/Navbar.vue";
    import ContentHeader from "../components/ContentHeader.vue"
    import vTable from "../components/vTable/vTable.vue"
    import ProperModal from "../components/ProperModal.vue";
    import loader from "../components/loader3.vue"
    import axiosClient from "../axios/index"
    export default {
        name:'departements',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,
        },
        data(){
            let columns =[
                {label:'~#',            name:''},
                {label:'Nom Departement',name:''},
                {label:'Superviseur',     name:''},
                {label:'Ajouté Le',     name:''},
                {label:'Actions',       name:''},
            ];
            return{
                
                perPage : ['5','10','20','30'],
                columns: columns,
                departements:[],
                users:[],
                errors:[],
                links:[],
                departement:{
                    nom_departement:'',
                    user_id:'',
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
                this.departement={
                    nom_departement:'',
                    user_id:'',
                }
                $("#create_departement").modal("show")
            },
            getDepartements(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/departements",{params:this.tData}).then((res)=>{
                    let content = res.data.departements
                    //console.log("Valeur de res dans getDepartements:",res)
                    //console.log("Valeur de res dans content.data:",content.data)
                    this.departements = content.data
                    this.configPagination(content)
                    //console.log("Valeur de res.data dans getDepartements:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getDepartements:",err.response)
                })
            },
            //getAllRoles
            getUsers (){
                    axiosClient.get("api/getAllUsers").then((res)=>{
                        let content = res.data.users;
                        this.users = content;
                    }).catch((err)=>{
                        console.log("Valeur de err dans getUsers dans departement:",err.response)
                    })
            },
            saveDepartement(){
                this.errors = []
                let send_server = document.querySelector("#send_server")
                send_server.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                axiosClient.post("api/departements",this.departement).then((res)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de res dans saveDepartement:",res)
                    if(res.data.status){
                        $('#create_departement').modal('hide'); 
                        this.getDepartements()
                        Swal.fire('Créer!','Nouveau departement Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de err dans saveDepartement:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            getPerPage(){
                this.getDepartements()
            },
            getSearch(){
                this.getDepartements()
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
                this.getDepartements(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editDepartement(id){
                this.errors = [];
                axiosClient.get(`api/departements/${id}`).then((res)=>{
                    $("#edit_departement").modal("show")
                    //console.log('valeur de res dans edit server:',res)
                    this.edit_id                    = res.data.id;
                    this.departement.nom_departement= res.data.nom_departement;
                    this.departement.user_id        = res.data.user_id;
                    this.is_Editing                 = true;
                })
            },
            //remove
            viewDepartement(id){
                this.errors = [];
                axiosClient.get(`api/departements/${id}`).then((res)=>{
                    $("#view_departement").modal("show")
                    //console.log('valeur de res dans view server:',res)
                    this.departement.nom_departement= res.data[0].nom_departement;
                    this.departement.user_id        = res.data[0].name;
                })
            },  
            updateDepartement(){
                    let update_server = document.querySelector("#update_server")
                    update_server.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    axiosClient.put(`api/departements/${this.edit_id}`,this.departement).then((res)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_departement').modal('hide');
                            Swal.fire('Mise à jour!','departement mise à jour avec success.','success')    
                            this.getDepartements();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        console.log("Valeur de err dans updatedepartement:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deleteDepartement(id){
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
                                axiosClient.delete(`api/departements/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','Le departement a été supprimé.','success') 
                                        this.getDepartements()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"Le departement est toujours disponible !!!",'success')
                        }
                    })
            },
        },


        created(){
            this.getDepartements()
            this.getUsers()
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
