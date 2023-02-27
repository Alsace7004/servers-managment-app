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
                            <ContentHeader message="Page des Staff !!!"/>
                            
                            <div v-if="!staffs.length || !$can('domaine-list')" class="data_box">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                        Chargement des staff en cours...
                                        <loader></loader>
                                </p>
                            </div>
                            
                            <div v-else class="data_box">
                                <!-- Create Domaine Btn Begin-->
                                <div v-if="$is('Admin') || $can('domaine-create')">
                                    <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Nouveau Staff</button>
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
                                            <tr v-for="(item,key) in staffs" :key="key">
                                                <td>{{item.id}}</td>
                                                <td>{{item.nom}}</td>
                                                <td>{{item.prenom}}</td>
                                                <td>{{item.adresse}}</td>
                                                <td>{{item.email}}</td>
                                                <td>{{item.nom_departement}}</td>
                                                <td>{{item.type_staff}}</td>
                                                <td>{{convert(item.created_at)}}</td>
                                                <td>
                                                    <button class="edit_btn" v-if="$can('domaine-edit')"  @click="editStaff(item.id)"><i class="fas fa-edit"></i></button>
                                                    <button class="delete_btn" v-if="$can('domaine-delete')" @click="deleteStaff(item.id)"><i class="fas fa-trash"></i></button>
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
                                <h4>Ajouter un staff</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="staff.nom" placeholder="Nom...">
                                </div>
                                <span v-if="errors.nom" class="error_txt">{{errors.nom[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="staff.prenom" placeholder="Prenom...">
                                </div>
                                <span v-if="errors.prenom" class="error_txt">{{errors.prenom[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="email" class="input_form_item" v-model="staff.email" placeholder="Email...">
                                </div>
                                <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="staff.adresse" placeholder="Adresse...">
                                </div>
                                <span v-if="errors.adresse" class="error_txt">{{errors.adresse[0]}}</span>
                                <!--  -->
                                <!--  -->
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="staff.departement_id" class="input_form_item">
                                        <option value="">Choisir le Departement</option>
                                        <option v-for="item in departements" :key="item.id" :value="item.id">{{item.nom_departement}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.departement_id" class="error_txt">{{errors.departement_id[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="staff.type_staff_id" class="input_form_item">
                                        <option value="">Choisir le Type de staff</option>
                                        <option v-for="item in typeStaffs" :key="item.id" :value="item.id">{{item.type_staff}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.type_staff_id" class="error_txt">{{errors.type_staff_id[0]}}</span>
                                <!--  -->
                                
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="send_server" :class="loading ? 'disabled' :''" @click="saveStaff">Sauvegarder</button>
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
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="staff.nom" placeholder="Nom...">
                                </div>
                                <span v-if="errors.nom" class="error_txt">{{errors.nom[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="staff.prenom" placeholder="Prenom...">
                                </div>
                                <span v-if="errors.prenom" class="error_txt">{{errors.prenom[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="email" class="input_form_item" v-model="staff.email" placeholder="Email...">
                                </div>
                                <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="staff.adresse" placeholder="Adresse...">
                                </div>
                                <span v-if="errors.adresse" class="error_txt">{{errors.adresse[0]}}</span>
                                <!--  -->
                                <!--  -->
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="staff.departement_id" class="input_form_item">
                                        <option value="">Choisir le Departement</option>
                                        <option v-for="item in departements" :key="item.id" :value="item.id">{{item.nom_departement}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.departement_id" class="error_txt">{{errors.departement_id[0]}}</span>
                                <!--  -->
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="staff.type_staff_id" class="input_form_item">
                                        <option value="">Choisir le Type de staff</option>
                                        <option v-for="item in typeStaffs" :key="item.id" :value="item.id">{{item.type_staff}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.type_staff_id" class="error_txt">{{errors.type_staff_id[0]}}</span>
                                <!--  -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="update_server" :class="loading ? 'disabled' :''" @click="updateStaff">Mettre à jour</button>
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
    export default {
        name:'staff',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,
        },
        data(){
            let columns =[
                {label:'~#',            name:''},
                {label:'Nom',           name:''},
                {label:'Prenom',        name:''},
                {label:'Adresse',       name:''},
                {label:'Email',         name:''},
                {label:'Departement',   name:''},
                {label:'Type Staff',    name:''},
                {label:'Ajouté Le',     name:''},
                {label:'Actions',       name:''},
            ];
            return{
                
                perPage : ['5','10','20','30'],
                columns: columns,
                staffs:[],
                departements:[],
                typeStaffs:[],
                errors:[],
                links:[],
                staff:{
                    nom:'',
                    email:'',
                    prenom:'',
                    adresse:'',
                    type_staff_id:'',
                    departement_id:'',
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
                this.staff={
                    nom:'',
                    email:'',
                    prenom:'',
                    adresse:'',
                    type_staff_id:'',
                    departement_id:'',
                }
                $("#create_domaine").modal("show")
            },
            getStaffs(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/staff",{params:this.tData}).then((res)=>{
                    let content = res.data.staff
                    //console.log("Valeur de content dans getStaffs:",content)
                    this.staffs = content.data
                    this.configPagination(content)
                    //console.log("Valeur de res.data dans getStaffs:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getStaffs:",err.response)
                })
            },
            //getDepartements
            getDepartements (){
                    axiosClient.get("api/getAllDepartements").then((res)=>{
                        let content = res.data.departements;
                        //console.log("Valeur de content dans getDepartements dans Staff:",content)
                        this.departements = content;
                    }).catch((err)=>{
                        console.log("Valeur de err dans getDepartements dans Staff:",err.response)
                    })
            },
            //getTypeStaffs
            getTypeStaffs(){
                    axiosClient.get("api/getAllTypeStaff").then((res)=>{
                        let content = res.data.typeStaff;
                        //console.log("Valeur de content dans getTypeStaffs dans Staff:",content)
                        this.typeStaffs = content;
                    }).catch((err)=>{
                        console.log("Valeur de err dans getTypeStaffs dans Staff:",err.response)
                    })
            },
            saveStaff(){
                this.errors = []
                let send_server = document.querySelector("#send_server")
                send_server.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                axiosClient.post("api/staff",this.staff).then((res)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de res dans saveStaff:",res)
                    if(res.data.status){
                        $('#create_domaine').modal('hide'); 
                        this.getStaffs()
                        Swal.fire('Créer!','Nouveau Domaine Ajouter avec success.','success') ;
                    }
                }).catch((err)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de err dans saveStaff:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            getPerPage(){
                this.getStaffs()
            },
            getSearch(){
                this.getStaffs()
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
                this.getStaffs(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editStaff(id){
                this.errors = [];
                axiosClient.get(`api/staff/${id}`).then((res)=>{
                    $("#edit_domaine").modal("show")
                    //console.log('valeur de res dans edit staff:',res)
                    this.edit_id                  = res.data.id;
                    this.staff.nom                = res.data.nom;
                    this.staff.prenom             = res.data.prenom;
                    this.staff.adresse            = res.data.adresse;
                    this.staff.email              = res.data.email;
                    this.staff.departement_id     = res.data.departement_id;
                    this.staff.type_staff_id      = res.data.type_staff_id;
                    this.is_Editing               = true;
                })
            }, 
            updateStaff(){
                    let update_server = document.querySelector("#update_server")
                    update_server.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    axiosClient.put(`api/staff/${this.edit_id}`,this.staff).then((res)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_domaine').modal('hide');
                            Swal.fire('Mise à jour!','Staff mise à jour avec success.','success')    
                            this.getStaffs();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        console.log("Valeur de err dans updateStaff:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deleteStaff(id){
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
                                axiosClient.delete(`api/staff/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','Le Staff a été supprimé.','success') 
                                        this.getStaffs()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"Le Staff est toujours disponible !!!",'success')
                        }
                    })
            },
        },


        created(){
            this.getStaffs()
            this.getTypeStaffs()
            this.getDepartements()
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
