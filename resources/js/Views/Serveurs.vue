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
                            <ContentHeader message="Page des Serveurs !!!"/>
                            <div v-if="$is('Admin') || $can('server-create')">
                                <!-- Edit post form -->
                                <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Nouveau Serveur</button>
                            </div>
                            <div class="data_box" v-if="!$can('server-list')">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                                    Chargement des serveurs en cours...
                                                    <loader></loader>
                                </p>
                            </div>
                            <div class="data_box" v-if="$can('server-list')">
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
                                <div class="data_box_content" >
                                    <v-table :columns="columns">
                                        <tbody>
                                            <tr v-if="!servers.length">
                                                <p style="display:flex;justify-content:center;align-items:center;margin-left:20rem">
                                                    Chargement des serveurs en cours...
                                                    <loader></loader>
                                                </p>
                                            </tr>
                                            <tr v-for="(item,key) in servers" :key="key">
                                                <td>{{item.id}}</td>
                                                <td>{{item.name}}</td>
                                                <td>{{item.username}}</td>
                                                <td>{{item.url_connexion}}</td>
                                                <td>{{convert(item.created_at)}}</td>
                                                <td>
                                                    <button class="view_btn" @click="viewServer(item.id)"><i class="fas fa-eye"></i></button>
                                                    <button class="edit_btn" v-if="$can('server-edit')"  @click="editServer(item.id)"><i class="fas fa-edit"></i></button>
                                                    <button class="delete_btn" v-if="$can('server-delete')" @click="deleteServer(item.id)"><i class="fas fa-trash"></i></button>
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
                        <proper-modal v-show="isModalVisible" modalName="create_server">
                            <template v-slot:header>
                                <h4>Ajouter un serveur</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="server.name" placeholder="Server name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="server.username" placeholder="Server username...">
                                </div>
                                <span v-if="errors.username" class="error_txt">{{errors.username[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="password" class="input_form_item" v-model="server.password" placeholder="Server password...">
                                </div>
                                <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="url" class="input_form_item" v-model="server.url_connexion" placeholder="Server url...">
                                </div>
                                <span v-if="errors.url_connexion" class="error_txt">{{errors.url_connexion[0]}}</span>
                                <!-- <div class="input_form mb_3">
                                    <textarea name="" id="" cols="30" rows="3" class="input_form_item" v-model="server.description" placeholder="Server description..."></textarea>
                                </div> -->
                                <ckeditor :editor="editor" v-model="server.description" :config="editorConfig"></ckeditor>
                                <span v-if="errors.description" class="error_txt">{{errors.description[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="send_server" :class="loading ? 'disabled' :''" @click="saveServer">Sauvegarder</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_server">
                            <template v-slot:header>
                                <h4>Editer un serveur :</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="server.name" placeholder="Server name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="server.username" placeholder="Server username...">
                                </div>
                                <span v-if="errors.username" class="error_txt">{{errors.username[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="password" class="input_form_item" v-model="server.password" placeholder="Server password...">
                                </div>
                                <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="url" class="input_form_item" v-model="server.url_connexion" placeholder="Server url...">
                                </div>
                                <span v-if="errors.url_connexion" class="error_txt">{{errors.url_connexion[0]}}</span>
                                <!-- editor -->
                                <ckeditor :editor="editor" v-model="server.description" :config="editorConfig"></ckeditor>
                                <span v-if="errors.description" class="error_txt">{{errors.description[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="update_server" :class="loading ? 'disabled' :''" @click="updateServer">Mettre à jour</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="view_server">
                            <template v-slot:header>
                                <h4>Les details d'un serveur:</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <label for=""><strong>Nom du Serveur :</strong></label>
                                <div class="input_form mb_3">
                                    <input type="text" readonly class="input_form_item" v-model="server.name" placeholder="Server name...">
                                </div>
                                <label for=""><strong>Username du Serveur :</strong></label>
                                <div class="input_form mb_3">
                                    <input type="text" readonly class="input_form_item" v-model="server.username" placeholder="Server username...">
                                </div>
                                <label for=""><strong>URL du Serveur :</strong></label>
                                <div class="input_form mb_3">
                                    <input type="url" readonly class="input_form_item" v-model="server.url_connexion" placeholder="Server url...">
                                </div>
                                <label for=""><strong>Description du Serveur :</strong></label>
                                <div class="input_form mb_3">
                                    <textarea name="" readonly id="" cols="30" rows="3" class="input_form_item" v-model="server.description" placeholder="Server description..."></textarea>
                                </div>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
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
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        name:'servers',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,
            ClassicEditor
        },
        data(){
            let columns =[
                {label:'~#',name:''},
                {label:'Nom',name:''},
                {label:'Username',name:''},
                {label:'Url_Connexion',name:''},
                {label:'Ajouté Le',name:''},
                {label:'Actions',name:''},
            ];
            return{
                
                perPage : ['5','10','20','30'],
                columns: columns,
                servers:[],
                errors:[],
                links:[],
                server:{
                    name:'',
                    username:'',
                    password:'',
                    url_connexion:'',
                    description:'<p>Content of the editor.</p>',
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

                editor: ClassicEditor,
                editorData: '<p>Content of the editor.</p>',
                editorConfig: {
                    // The configuration of the editor.
                },
            }
        },
        methods:{
            showModal(){
                this.errors = []
                this.server={
                    name :"",
                    username:'',
                    password:'',
                    url_connexion:'',
                    description:''
                }
                $("#create_server").modal("show")
            },
            getServers(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/servers",{params:this.tData}).then((res)=>{
                    let content = res.data.servers
                    //console.log("Valeur de res dans getServers:",res)
                    this.servers = content.data
                    this.configPagination(content)
                    //console.log("Valeur de res.data dans getServers:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getServers:",err.response)
                })
            },
            saveServer(){
                this.errors = []
                let send_server = document.querySelector("#send_server")
                send_server.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                axiosClient.post("api/servers",this.server).then((res)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de res dans saveServer:",res)
                    if(res.data.status){
                        $('#create_server').modal('hide'); 
                        this.getServers()
                        Swal.fire('Créer!','Nouveau Serveur Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de err dans saveServer:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            getPerPage(){
                this.getServers()
            },
            getSearch(){
                this.getServers()
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
                this.getServers(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editServer(id){
                this.errors = [];
                axiosClient.get(`api/servers/${id}`).then((res)=>{
                    $("#edit_server").modal("show")
                    //console.log('valeur de res dans edit server:',res)
                    this.edit_id    = res.data.id;
                    this.server.name  = res.data.name;
                    this.server.username  = res.data.username;
                    this.server.url_connexion  = res.data.url_connexion;
                    this.server.description  = res.data.description;
                    this.is_Editing = true;
                })
            },
            viewServer(id){
                this.errors = [];
                axiosClient.get(`api/servers/${id}`).then((res)=>{
                    $("#view_server").modal("show")
                    //console.log('valeur de res dans edit server:',res)
                    //this.edit_id    = res.data.id;
                    this.server.name  = res.data.name;
                    this.server.username  = res.data.username;
                    this.server.url_connexion  = res.data.url_connexion;
                    this.server.description  = res.data.description;
                    //this.is_Editing = true;
                })
            },  
            updateServer(){
                    let update_server = document.querySelector("#update_server")
                    update_server.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    axiosClient.put(`api/servers/${this.edit_id}`,this.server).then((res)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_server').modal('hide');
                            Swal.fire('Mise à jour!','Serveur mise à jour avec success.','success')    
                            this.getServers();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        console.log("Valeur de err dans updateServer:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deleteServer(id){
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
                                axiosClient.delete(`api/servers/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','Le Serveur a été supprimé.','success') 
                                        this.getServers()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"Le Serveur est toujours disponible !!!",'success')
                        }
                    })
            },
        },

        created(){
            this.getServers()
        },
    }
</script>

<style scoped>

</style>
