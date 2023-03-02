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
                            <ContentHeader message="Page des Domaines !!!"/>
                            
                            <div v-if="!domaines.length || !$can('domaine-list')" class="data_box">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                        Chargement des domaines en cours...
                                        <loader></loader>
                                </p>
                            </div>
                            
                            <div v-else class="data_box">
                                <!-- Create Domaine Btn Begin-->
                                <div v-if="$is('Admin') || $can('domaine-create')">
                                    <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Nouveau Domaine</button>
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
                                            <tr v-if="!domaines.length">
                                                <p style="display:flex;justify-content:center;align-items:center;margin-left:20rem">
                                                    Chargement des domaines en cours...
                                                    <loader></loader>
                                                </p>
                                            </tr>
                                            <tr v-for="(item,key) in domaines" :key="key">
                                                <td>{{item.id}}</td>
                                                <td>{{item.nom_domaine}}</td>
                                                <td>{{item.name}}</td>
                                                <td>{{item.registre}}</td>
                                                <td>{{convert(item.created_at)}}</td>
                                                <td>{{convert(item.date_expiration)}}</td>
                                                <td>
                                                    <p v-if="item.status === 0" class="badge_white">En cours</p>
                                                    <p v-if="item.status === 1" class="badge_red">Expiré(e)</p>
                                                </td>
                                                <td>
                                                    <button class="view_btn" v-if="$can('domaine-view')" @click="viewDomaine(item.id)"><i class="fas fa-eye"></i></button>
                                                    <button class="edit_btn" v-if="$can('domaine-edit')"  @click="editDomaine(item.id)"><i class="fas fa-edit"></i></button>
                                                    <button class="delete_btn" v-if="$can('domaine-delete')" @click="deleteDomaine(item.id)"><i class="fas fa-trash"></i></button>
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
                                <h4>Ajouter un domaine</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="domaine.nom_domaine" placeholder="Nom de domaine...">
                                </div>
                                <span v-if="errors.nom_domaine" class="error_txt">{{errors.nom_domaine[0]}}</span>
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="domaine.server_id" class="input_form_item">
                                        <option value="">Choisir le serveur</option>
                                        <option v-for="server in servers" :key="server.id" :value="server.id">{{server.name}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.server_id" class="error_txt">{{errors.server_id[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="domaine.registre" placeholder="Registre...">
                                </div>
                                <span v-if="errors.registre" class="error_txt">{{errors.registre[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="date" class="input_form_item" v-model="domaine.date_expiration" placeholder="Date Expiration...">
                                </div>
                                <span v-if="errors.date_expiration" class="error_txt">{{errors.date_expiration[0]}}</span>
                                
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="send_server" :class="loading ? 'disabled' :''" @click="saveDomaine">Sauvegarder</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_domaine">
                            <template v-slot:header>
                                <h4>Editer un domaine :</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="domaine.nom_domaine" placeholder="Nom de domaine...">
                                </div>
                                <span v-if="errors.nom_domaine" class="error_txt">{{errors.nom_domaine[0]}}</span>
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="domaine.server_id" class="input_form_item">
                                        <option value="">Choisir le serveur</option>
                                        <option v-for="server in servers" :key="server.id" :value="server.id">{{server.name}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.server_id" class="error_txt">{{errors.server_id[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="domaine.registre" placeholder="Registre...">
                                </div>
                                <span v-if="errors.registre" class="error_txt">{{errors.registre[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="date" class="input_form_item" v-model="domaine.date_expiration" placeholder="Date Expiration...">
                                </div>
                                <span v-if="errors.date_expiration" class="error_txt">{{errors.date_expiration[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="update_server" :class="loading ? 'disabled' :''" @click="updateDomaine">Mettre à jour</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
                        <!-- View Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="view_domaine">
                            <template v-slot:header>
                                <h4>Les details du domaine:</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <label for=""><strong>Description du Serveur :</strong></label>
                                <div class="mb_3">
                                    <p>{{domaine.nom_domaine}}</p>
                                </div>
                                <label for=""><strong>Hebergeur :</strong></label>
                                <div class="mb_3">
                                    <p>{{domaine.server_id}}</p>
                                </div>
                                <label for=""><strong>Registre :</strong></label>
                                <div class="mb_3">
                                    <p>{{domaine.registre}}</p>
                                </div>
                                <label for=""><strong>Date Expiration :</strong></label>
                                <div class="mb_3">
                                    <p>{{convert(domaine.date_expiration)}}</p>
                                </div>
                                <label for=""><strong>Status :</strong></label>
                                <div class="mb_3">
                                    <tr>
                                        <p v-if="domaine.status === 0" class="badge_white_view">En cours</p>
                                        <p v-if="domaine.status === 1" class="badge_red_view">Expiré(e)</p>
                                    </tr>
                                    
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
        name:'domaines',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,
        },
        data(){
            let columns =[
                {label:'~#',            name:''},
                {label:'Nom de domaine',name:''},
                {label:'Hebergeur',     name:''},
                {label:'Registre',      name:''},
                {label:'Ajouté Le',     name:''},
                {label:'Date Expiration',name:''},
                {label:'Status',       name:''},
                {label:'Actions',       name:''},
            ];
            return{
                
                perPage : ['5','10','20','30'],
                columns: columns,
                domaines:[],
                servers:[],
                errors:[],
                links:[],
                domaine:{
                    nom_domaine:'',
                    server_id:'',
                    registre:'',
                    date_expiration:'',
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
                this.domaine={
                    nom_domaine:'',
                    server_id:'',
                    registre:'',
                    date_expiration:'',
                    status:'',
                }
                $("#create_domaine").modal("show")
            },
            getDomaines(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/domaines",{params:this.tData}).then((res)=>{
                    let content = res.data.domaines
                    //console.log("Valeur de res dans getDomaines:",res)
                    this.domaines = content.data
                    this.configPagination(content)
                    //console.log("Valeur de res.data dans getDomaines:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getDomaines:",err.response)
                })
            },
            //getAllRoles
            getServers (){
                    axiosClient.get("api/getAllServers").then((res)=>{
                        let content = res.data.servers;
                        this.servers = content;
                    }).catch((err)=>{
                        console.log("Valeur de err dans getservers dans Domaine:",err.response)
                    })
            },
            saveDomaine(){
                this.errors = []
                let send_server = document.querySelector("#send_server")
                send_server.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                axiosClient.post("api/domaines",this.domaine).then((res)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de res dans saveDomaine:",res)
                    if(res.data.status){
                        $('#create_domaine').modal('hide'); 
                        this.getDomaines()
                        Swal.fire('Créer!','Nouveau Domaine Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de err dans saveDomaine:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            getPerPage(){
                this.getDomaines()
            },
            getSearch(){
                this.getDomaines()
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
                this.getDomaines(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editDomaine(id){
                this.errors = [];
                axiosClient.get(`api/domaines/${id}`).then((res)=>{
                    $("#edit_domaine").modal("show")
                    //console.log('valeur de res dans edit server:',res)
                    this.edit_id                  = res.data[0].id;
                    this.domaine.nom_domaine      = res.data[0].nom_domaine;
                    this.domaine.server_id        = res.data[0].server_id;
                    this.domaine.registre         = res.data[0].registre;
                    this.domaine.date_expiration  = res.data[0].date_expiration;
                    this.is_Editing               = true;
                })
            },
            viewDomaine(id){
                this.errors = [];
                axiosClient.get(`api/domaines/${id}`).then((res)=>{
                    $("#view_domaine").modal("show")
                    //console.log('valeur de res dans view server:',res)
                    this.domaine.nom_domaine      = res.data[0].nom_domaine;
                    this.domaine.server_id        = res.data[0].name;
                    this.domaine.registre         = res.data[0].registre;
                    this.domaine.date_expiration  = res.data[0].date_expiration;
                    this.domaine.status           = res.data[0].status;
                })
            },  
            updateDomaine(){
                    let update_server = document.querySelector("#update_server")
                    update_server.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    axiosClient.put(`api/domaines/${this.edit_id}`,this.domaine).then((res)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_domaine').modal('hide');
                            Swal.fire('Mise à jour!','Domaine mise à jour avec success.','success')    
                            this.getDomaines();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        console.log("Valeur de err dans updateDomaine:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deleteDomaine(id){
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
                                axiosClient.delete(`api/domaines/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','Le Domaine a été supprimé.','success') 
                                        this.getDomaines()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"Le Domaine est toujours disponible !!!",'success')
                        }
                    })
            },
        },


        created(){
            this.getDomaines()
            this.getServers()
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
