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
                        <ContentHeader message="Page des Roles  !!!"/>
                        
                        <div v-if="!roles.length || !$can('role-list')" class="data_box">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                                    Chargement des roles en cours...
                                                    <loader></loader>
                                </p>
                        </div>
                        <div v-else class="data_box">
                            <!-- Create Role Btn begin-->
                            <!--<button v-if="$can('role-create')" style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Nouveau Role</button>-->
                            <!-- <button v-if="$can('role-create')" style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Nouveau Role</button> --> 
                            <div style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer;width:15%">
                                <router-link v-if="$can('role-create')" :to="{name:'AddRoles'}" >Ajouter Role</router-link>    
                            </div>
                            
                            <!-- Create Role Btn end-->
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
                                        <tr v-for="(role,key) in roles" :key="key">
                                            <td>{{role.id}}</td>
                                            <td>{{role.name}}</td>
                                            <td>{{role.guard_name}}</td>
                                            <td>{{convert(role.created_at)}}</td>
                                            <td>
                                                <button class="view_btn" v-if="$can('role-view')" @click="viewRole(role.id)"><i class="fas fa-eye"></i></button>
                                                <!-- <button class="edit_btn" v-if="$can('role-edit')" @click="editRole(role.id)"><i class="fas fa-edit"></i></button> -->
                                                <router-link class="edit_btn" :to="'roles/'+role.id+'/edit'"><i class="fas fa-edit"></i></router-link>
                                                <button class="delete_btn" v-if="$can('role-delete')" @click="deleteRole(role.id)"><i class="fas fa-trash"></i></button>
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
                        <proper-modal v-show="isModalVisible" modalName="create_role">
                            <template v-slot:header>
                                <h4>Ajouter un role</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!-- role_name -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="role.name" placeholder="Role name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <!-- role_name -->
                                <!-- guard_name -->
                                <div class="input_form mb_3">
                                    <!-- <input type="text" class="input_form_item" v-model="role.guard_name" placeholder="guard Ex:web/staffs"> -->
                                    <select  v-model="role.guard_name" id="" class="input_form_item">
                                        <option value="">Selectionner un garde</option>
                                        <option value="web">web</option>
                                        <option value="staffs">staffs</option>
                                        <!-- <option v-for="role in roles" :key="role.id" :value="role.id">{{role.name}}</option> -->
                                    </select>
                                </div>
                                <span v-if="errors.guard_name" class="error_txt">{{errors.guard_name[0]}}</span>
                                <!-- guard_name -->
                                <!-- permissions -->
                                <div class="col-md-12">
                                    <label for=""><strong>Choisir une permission :</strong></label>
                                    <div class="row col-md-6" style="columns: 4 auto;overflow:scroll; height:400px;">
                                        <div class="" style="" v-for="permi in permissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                </div>
                                <span v-if="errors.permission" class="error_txt">{{errors.permission[0]}}</span>
                                <!-- permissions -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="send_role" :class="loading ? 'disabled' :''" @click="saveRole">Sauvegarder</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_role">
                            <template v-slot:header>
                                <h4>Editer un role:</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="role.name" placeholder="Role name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <!-- guard_name -->
                                <div class="input_form mb_3">
                                    <select  v-model="role.guard_name" id="" class="input_form_item">
                                        <option value="">Selectionner un garde</option>
                                        <option value="web">web</option>
                                        <option value="staffs">staffs</option>
                                    </select>
                                </div>
                                <span v-if="errors.guard_name" class="error_txt">{{errors.guard_name[0]}}</span>
                                <!-- guard_name -->
                                <!-- update part begin-->
                                <div class="col-md-12">
                                    <label for=""><strong>Choisir une permission :</strong></label>
                                    <div class="row col-md-6" style="columns: 3 auto;overflow-y:hidden; overflow-x:scroll; height:400px;">
                                        <div class="form-group col-md-6" v-for="permi in permissions" :key="permi.id" style="">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                </div>
                                <span v-if="errors.permission" class="error_txt">{{errors.permission[0]}}</span>
                                <!-- update part end -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="update_role" :class="loading ? 'disabled' :''" @click="updateRole">Mettre à jour</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
                        <!-- view Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="view_role">
                            <template v-slot:header>
                                <h4>Les details du role: {{role.name}}</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <label for="">Nom du role : <strong>{{role.name}}</strong></label>
                                <p>Liste des permissions du role : </p>
                                <ul style="list-style-type:none;columns: 3 auto;">
                                    <li style="color:#dd3333" v-if="!rolePermissions.length">Pas de permission disponible...</li>
                                    <li v-for="(item,key) in rolePermissions" :key="key"><strong>{{item.slug}}</strong></li>
                                </ul>
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
    import Navbar from "../components/Navbar.vue";
    import Sidebar from "../components/Sidebar.vue";
    import ContentHeader from "../components/ContentHeader.vue";
    import vTable from "../components/vTable/vTable.vue";
    import ProperModal from "../components/ProperModal.vue";
    import loader from "../components/loader3.vue"
    import axiosClient from "../axios/index"
    export default {
        name:'roles',
        components:{
            Navbar,Sidebar,ContentHeader,vTable,ProperModal,loader
        },
        props: ['self'],
        data(){
            let columns =[
                    {label:'~#',        name:'id'},
                    {label:'Roles',     name:'role'},
                    {label:'type de garde',     name:'role_guard'},
                    {label:'Ajouté Le', name:'created_at'},
                    {label:'Actions',   name:'action'},
            ];
            return{
                perPage : ['5','10','20','30'],
                columns: columns,
                roles:[],
                rolePermissions:[],
                permissions:[],
                errors:[],
                links:[],
                role:{
                    name:'',
                    guard_name:'',
                    permission:[],
                 
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
        created(){
            this.getRoles()
            this.getPermissions()
            
        },
        methods:{
            
            showModal(){
                this.errors = []
                this.role.name = ""
                this.role.guard_name='',
                this.role.permission = []
                $("#create_role").modal("show")
            },
            getRoles(pageGet){
                
                this.tData.page = pageGet
                axiosClient.get("api/roles",{params:this.tData}).then((res)=>{
                    let content = res.data.roles
                    //console.log("Valeur de res dans getRoles:",res)
                    this.roles = content.data
                    this.configPagination(content)
                    //console.log("Valeur de res.data dans getRoles:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getRoles:",err.response)
                })
            },
            getPermissions(){
                axiosClient.get("api/getAllPermissions").then((res)=>{
                    let content = res.data.permissions
                    //console.log("Valeur de res dans getPermissions dans role:",res)
                    this.permissions = content
                    //console.log("Valeur de res.data dans getPermissions:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getPermissions dans Role:",err.response)
                })
            },
            getPerPage(){
                this.getRoles()
            },
            getSearch(){
                this.getRoles()
            },
            saveRole(){
                this.errors = []
                let send_role = document.querySelector("#send_role")
                send_role.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                axiosClient.post("api/roles",this.role).then((res)=>{
                    send_role.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de res dans saveRole:",res)
                    if(res.data.status){
                        $('#create_role').modal('hide'); 
                        this.getRoles()
                        Swal.fire('Créer!','Nouveau Role Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    send_role.innerHTML = "Sauvegarder"
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
            viewRole(id){
                axiosClient.get(`api/roles/${id}`).then((res)=>{
                    $("#view_role").modal("show")
                    console.log('valeur de res dans view role:',res)
                    //this.edit_id    = res.data.id;
                    this.role.name  = res.data.role.name;
                    this.rolePermissions = res.data.rolePermissions
                    //this.is_Editing = true;
                })
            },
            editRole(id){
                this.errors = [];
                axiosClient.get(`api/getRoleAndPermission/${id}`).then((res)=>{
                    //$('#create_role').modal('show');
                    $("#edit_role").modal("show")
                    console.log('valeur de res dans edit role:',res)
                    this.edit_id            = res.data.role.id;
                    this.role.name          = res.data.role.name;
                    this.role.guard_name    = res.data.role.guard_name;
                    this.role.permission    = res.data.rolePermissions
                    this.is_Editing         = true;

                    console.log("Valeur de this.role.permission:",this.role.permission)
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
                                axiosClient.delete(`api/roles/${id}`).then((res)=>{
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
                    
                    axiosClient.put(`api/roles/${this.edit_id}`,{role:this.role,role2:this.hasCar}).then((res)=>{
                        update_role.innerHTML = "Mettre à jour"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_role').modal('hide');
                            Swal.fire('Mise à jour!','Role mise à jour avec success.','success')    
                            this.getRoles();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_role.innerHTML = "Mettre à jour"
                        this.loading = false;
                        //console.log("Valeur de err dans updateRole:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            
        },
        computed: {
                hasCar(){
                    let userCars = this.role.permission
                    let cars = this.permissions
                    let ret = []
                    for(let i = 0; i < userCars.length; i++){
                        for(let j = 0; j < cars.length; j++){
                            if(cars[j].id == userCars[i].permission_id){
                                ret[cars[j].id] = true
                            }
                        }
                    }
                    return ret
                }
        },
    }
</script>

<style scoped>
    
</style>
