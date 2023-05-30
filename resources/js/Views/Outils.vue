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
                            <ContentHeader message="Page des Outils !!!"/>
                            
                            <div v-if="!outils.length || !$can('outil-list')" class="data_box">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                        Chargement des outils en cours...
                                        <loader></loader>
                                </p>
                            </div>
                            
                            <div v-else class="data_box">
                                <!-- Create Domaine Btn Begin-->
                                <div v-if="$is('Admin') || $can('outil-create')">
                                    <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter outil</button>
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
                                            <tr v-for="(item,key) in outils" :key="key">
                                                <td>{{item.id}}</td>
                                                <td>{{item.nom_outil}}</td>
                                                <td>{{item.username}}</td>
                                                <td>{{item.url}}</td>
                                                <td>{{item.nom_type_outil}}</td>
                                                <td>{{convert(item.created_at)}}</td>
                                                <td>
                                                    <button class="view_btn" v-if="$can('outil-view')" @click="viewOutil(item.id)"><i class="fas fa-eye"></i></button>
                                                    <button class="edit_btn" v-if="$can('outil-edit')"  @click="editOutil(item.id)"><i class="fas fa-edit"></i></button>
                                                    <button class="delete_btn" v-if="$can('outil-delete')" @click="deleteOutil(item.id)"><i class="fas fa-trash"></i></button>
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
                                <h4>Ajouter un outil</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!-- name -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.name" placeholder="Nom de l'outil...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <!-- username -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.username" placeholder="username de l'outil...">
                                </div>
                                <span v-if="errors.username" class="error_txt">{{errors.username[0]}}</span>
                                <!-- password -->
                                <div class="input_form mb_3">
                                    <input type="password" class="input_form_item" v-model="outil.password" placeholder="password de l'outil...">
                                </div>
                                <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
                                <!-- url -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.url" placeholder="url de l'outil...">
                                </div>
                                <span v-if="errors.url" class="error_txt">{{errors.url[0]}}</span>
                                <!-- type outil -->
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="outil.type_outil_id" class="input_form_item">
                                        <option value="">Choisir le type d'outil</option>
                                        <option v-for="server in typeOutils" :key="server.id" :value="server.id">{{server.name}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.type_outil_id" class="error_txt">{{errors.type_outil_id[0]}}</span>
                                <!-- end -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <!-- <button class="mdl-btn-primary" id="send_server" :class="loading ? 'disabled' :''" @click="saveOutil">Sauvegarder</button> -->
                                    <v-button :onClick="saveOutil" id="send_server" class="button"  :class="loading ? 'disabled loading' :''">Sauvegarder</v-button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_domaine">
                            <template v-slot:header>
                                <h4>Editer l' outil :</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!-- name -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.name" placeholder="Nom de l'outil...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <!-- username -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.username" placeholder="username de l'outil...">
                                </div>
                                <span v-if="errors.username" class="error_txt">{{errors.username[0]}}</span>
                                <!-- password -->
                                <div class="input_form mb_3">
                                    <input type="password" class="input_form_item" v-model="outil.password" placeholder="password de l'outil...">
                                </div>
                                <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
                                <!-- url -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.url" placeholder="url de l'outil...">
                                </div>
                                <span v-if="errors.url" class="error_txt">{{errors.url[0]}}</span>
                                <!-- type outil -->
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="outil.type_outil_id" class="input_form_item">
                                        <option value="">Choisir le type d'outil</option>
                                        <option v-for="server in typeOutils" :key="server.id" :value="server.id">{{server.name}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.type_outil_id" class="error_txt">{{errors.type_outil_id[0]}}</span>
                                <!-- end -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <!-- <button class="mdl-btn-primary" id="update_server" :class="loading ? 'disabled' :''" @click="updateOutil">Mettre à jour</button> -->
                                    <v-button :onClick="updateOutil" id="update_server" class="button"  :class="loading ? 'disabled loading' :''">Mettre à jour</v-button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
                        <!-- view Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="view_server">
                            <template v-slot:header>
                                <h4>Les details de l'outil :</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!-- nom -->
                                <label for=""><strong>Nom de l'outil :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.name}}</p>
                                </div>
                                <!-- username -->
                                <label for=""><strong>Username du Serveur :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.username}}</p>
                                </div>
                                <!-- password  -->
                                <label for=""><strong>Mot de passe du Serveur :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.password}}</p>
                                </div>
                                <!-- url -->
                                <label for=""><strong>URL du Serveur :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.url}}</p>
                                </div>
                                <!-- type outil -->
                                <label for=""><strong>Type de l'outil :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.type_outil_id}}</p>
                                </div>
                                <!-- ajouté le -->
                                <label for=""><strong>Ajouté le :</strong></label>
                                <div class="mb_3">
                                    <p>{{convert(outil.created_at)}}</p>
                                </div>
                                <!--  -->
                                
                                <!--  -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- view Modal End -->
    
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
        name:'outils',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,
            'v-button':Button
        },
        data(){
            let columns =[
                {label:'~#',            name:''},
                {label:'Nom',           name:''},
                {label:'Username',      name:''},
                {label:'Url',           name:''},
                {label:'Type outil',    name:''},
                {label:'Ajouté Le',     name:''},
                {label:'Actions',       name:''},
            ];
            return{
                
                perPage : ['5','10','20','30'],
                columns: columns,
                outils:[],
                typeOutils:[],
                errors:[],
                links:[],
                outil:{
                    name:'',
                    username:'',
                    password:'',
                    url:'',
                    type_outil_id:'',
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
                this.outil={
                    name:'',
                    username:'',
                    password:'',
                    url:'',
                    type_outil_id:'',
                }
                $("#create_domaine").modal("show")
            },
            getOutil(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/outils",{params:this.tData}).then((res)=>{
                    let content = res.data.outils
                    //console.log("Valeur de content dans getOutil:",content)
                    this.outils = content.data
                    this.configPagination(content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getOutil:",err.response)
                })
            },
            getTypeOutil(){
                axiosClient.get("api/getTypeOutils").then((res)=>{
                    let content = res.data.type_outils;
                    this.typeOutils = content
                    //console.log("valeur de res dans getTypeOutil:",content)
                })
            },
            saveOutil(){
                this.errors = []
                /*************************************************/
                let send_server = document.querySelector("#send_server")
                send_server.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                /*************************************************/
                axiosClient.post("api/outils",this.outil).then((res)=>{
                    /*************************************************/
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    /*************************************************/
                    //console.log("Valeur de res dans saveOutil:",res)
                    if(res.data.status){
                        $('#create_domaine').modal('hide'); 
                        this.getOutil()
                        Swal.fire('Créer!',"Nouveau outil Ajouter avec success.",'success') ;
                    }
                }).catch((err)=>{
                    /*************************************************/
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    /*************************************************/
                    //console.log("Valeur de err dans saveOutil:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            getPerPage(){
                this.getOutil()
            },
            getSearch(){
                this.getOutil()
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
                this.getOutil(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editOutil(id){
                this.errors = [];
                axiosClient.get(`api/outils/${id}`).then((res)=>{
                    $("#edit_domaine").modal("show")
                    console.log('valeur de res dans edit outil:',res)
                    this.edit_id                  = res.data[0].id;
                    this.outil.name               = res.data[0].outils_name;
                    this.outil.username           = res.data[0].username;
                    this.outil.password           = res.data[0].password;
                    this.outil.url                = res.data[0].url;
                    this.outil.type_outil_id      = res.data[0].type_outil_id;
                    this.is_Editing               = true;
                })
            },
            viewOutil(id){
                this.errors = [];
                axiosClient.get(`api/outils/${id}`).then((res)=>{
                    $("#view_server").modal("show")
                    console.log('valeur de res dans view outil:',res)
                    //this.edit_id    = res.data.id;
                    this.outil.name             = res.data[0].outils_name;
                    this.outil.username         = res.data[0].username;
                    this.outil.password         = res.data[0].password;
                    this.outil.url              = res.data[0].url;
                    this.outil.type_outil_id    = res.data[0].type_outils_name;
                    this.outil.created_at       = res.data[0].created_at;
                    //this.is_Editing = true;
                })
            }, 
            updateOutil(){
                    /*************************************************/
                    let update_server = document.querySelector("#update_server")
                    update_server.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    /*************************************************/
                    axiosClient.put(`api/outils/${this.edit_id}`,this.outil).then((res)=>{
                        /*************************************************/
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        /*************************************************/
                        if(res.data.status){
                            $('#edit_domaine').modal('hide');
                            Swal.fire('Mise à jour!',"Outil mise à jour avec success.",'success')    
                            this.getOutil();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        /*************************************************/
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        /*************************************************/
                        //console.log("Valeur de err dans updateOutil:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deleteOutil(id){
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
                                axiosClient.delete(`api/outils/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!',"L'outil a été supprimé.",'success') 
                                        this.getOutil()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"L'outil est toujours disponible !!!",'success')
                        }
                    })
            },
        },


        created(){
            this.getOutil()
            this.getTypeOutil()
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
