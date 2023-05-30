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
                    <div class="content_body" style="background-color:#fff;border-radius:5px">
                        
                        <!-- router-view-begin -->
                        <ContentHeader message="Page de modification de Roles  !!!"/>
                        <p>Modifier</p>
                        <!-- router-view-end -->
                        <!-- content begin -->
                                <div class="input_form mb_3" style="width:25%">
                                    <input type="text" class="input_form_item" v-model="role.name" placeholder="Role name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <!-- guard_name -->
                                <div class="input_form mb_3" style="width:25%">
                                    <select v-model="role.guard_name" id="the_guard" @change="getTheGuard" class="input_form_item">
                                        <option value="">Selectionner un garde</option>
                                        <option value="web">web</option>
                                        <option value="staffs">staffs</option>
                                    </select>
                                </div>
                                <span v-if="errors.guard_name" class="error_txt">{{errors.guard_name[0]}}</span><br>
                                <!-- guard_name -->
                                <label for=""><strong>Choisir une permission :</strong></label>
                                <!-- first part of permissions -->
                                <div class="checkbox_container">
                                    <!-- utilisateurs -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Utilisateurs :</strong></label>
                                        <div v-if="!userPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div v-else class="" style="" v-for="permi in userPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                    <!-- roles -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Roles :</strong></label>
                                        <div v-if="!rolesPermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in rolesPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                    <!-- staff -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Staff :</strong></label>
                                        <div v-if="!staffPermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in staffPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                    <!-- type de staff -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Type de staff :</strong></label>
                                        <div v-if="!typeStaffPermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in typeStaffPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                </div>
                                <!-- second part of permissions -->
                                <div class="checkbox_container">
                                    <!-- departement -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Departements :</strong></label>
                                        <div v-if="!departementPermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in departementPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                    <!-- roles -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Domaines :</strong></label>
                                        <div v-if="!domainePermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in domainePermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                    <!-- staff -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Serveurs :</strong></label>
                                        <div v-if="!serveurPermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in serveurPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                    <!-- Outils -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Outils :</strong></label>
                                        <div v-if="!outilPermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in outilPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                    <!-- Type d'outils -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Type d'Outils :</strong></label>
                                        <div v-if="!typeOutilPermissions.length" class="my_color">Pas de permisions disponible</div>
                                        <div v-else class="" style="" v-for="permi in typeOutilPermissions" :key="permi.id">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                </div>
                                <!-- update part begin-->
                                <!-- <div class="col-md-12">
                                    <label for=""><strong>Choisir une permission :</strong></label>
                                    <div class="row col-md-6" style="columns: 4 auto;">
                                        <div class="form-group col-md-6" v-for="permi in permissions" :key="permi.id" style="">
                                            <input class="uk-checkbox" type="checkbox" :value="permi.id" v-model="hasCar[permi.id]"> {{ permi.slug }} ({{permi.guard_name}})
                                        </div>
                                    </div>
                                </div> -->
                                <!-- update part end-->
                                <span v-if="errors.permission" class="error_txt">{{errors.permission[0]}}</span>

                                <div style="margin-top:2rem">
                                    <!-- <button class="mdl-btn-primary" id="update_role" :class="loading ? 'disabled' :''" @click="updateRole">Mettre à jour</button> -->
                                    <v-button :onClick="updateRole" id="update_role" class="button"  :class="loading ? 'disabled loading' :''">Mettre à jour</v-button>
                                </div>
                        <!-- content end -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    <!-- End -->
                        
    
</template>

<script>
    import Navbar from "../components/Navbar.vue";
    import Sidebar from "../components/Sidebar.vue";
    import ContentHeader from "../components/ContentHeader.vue";
    import axiosClient from "../axios/index"
    import Button from "../components/Button.vue"

    export default {
        name:'roles',
        components:{
            Navbar,Sidebar,ContentHeader,
            'v-button':Button
        },
        props: ['self','roleId'],
        data(){
            return{
                userPermissions:[],
                rolesPermissions:[],
                staffPermissions:[],
                typeStaffPermissions:[],
                departementPermissions:[],
                domainePermissions:[],
                serveurPermissions:[],
                outilPermissions:[],
                typeOutilPermissions:[],

                permissions:[],
                errors:[],
                role:{
                    name:'',
                    guard_name:'',
                    permission:[],
                },
                loading:false,
            }
        },
        created(){
            this.getPermissions()
            this.fetchRole()
            this.getUtlisateursPermission()
        },
        methods:{
            //
            getPermissions(){
                axiosClient.get("api/getAllPermissions").then((res)=>{
                    let content = res.data.permissions
                    //console.log("Valeur de res dans getPermissions dans UpdateRole:",res)
                    this.permissions = content
                    //console.log("Valeur de res.data dans getPermissions:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getPermissions dans Role:",err.response)
                })
            },
            //
            updateRole(){
                    /*************************************************/
                    let update_role = document.querySelector("#update_role")
                    update_role.classList.add("loading");
                    update_role.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    /*************************************************/
                    axiosClient.put(`api/roles/${this.edit_id}`,{role:this.role,role2:this.hasCar}).then((res)=>{
                        /*************************************************/
                        update_role.classList.remove("loading");
                        update_role.innerHTML = "Mettre à jour"
                        this.loading = false;
                        /*************************************************/
                        if(res.data.status){
                            $('#edit_role').modal('hide');
                            Swal.fire('Mise à jour!','Role mise à jour avec success.','success')    
                            
                            this.edit_id = "";
                            this.is_Editing = false;
                            this.$router.push("/roles"); 
                        }
                    }).catch((err)=>{
                        /*************************************************/
                        update_role.classList.remove("loading");
                        update_role.innerHTML = "Mettre à jour"
                        this.loading = false;
                        /*************************************************/
                        //console.log("Valeur de err dans updateRole:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            //
            fetchRole(){
                this.errors = [];
               
                axios.get(`api/getRoleAndPermission/${this.roleId}`).then((res)=>{
                    console.log("Valeur de res dans fetchRole dans (UpdateRoles):",res)
                    localStorage.setItem("get_guard",res.data.role.guard_name)
                    this.edit_id            = res.data.role.id;
                    this.role.name          = res.data.role.name;
                    this.role.guard_name    = res.data.role.guard_name;
                    this.role.permission    = res.data.rolePermissions
                    this.is_Editing         = true;
                    //console.log("Valeur de this.role.permission:",this.role.permission)
                })
            },
            //
            getUtlisateursPermission(){
                /* 
                iflicfy
                */
                axios.get(`api/getGuardName/${this.roleId}`).then((res)=>{
                    //console.log("1-valeur du guardName (getGuardName) : ",res.data.role.guard_name)
                    //bb = res.data.role.guard_name
                    axios.get(`api/elements/${res.data.role.guard_name}`).then((res)=>{
                        //console.log("2-valeur de res dans getUtlisateursPermission (UpdatesRoles):",res)
                        //let content = res.data.utilisateurs
                        this.userPermissions        = res.data.utilisateurs
                        this.rolesPermissions       = res.data.roles
                        this.staffPermissions       = res.data.staff
                        this.typeStaffPermissions   = res.data.type_de_staff
                        this.departementPermissions = res.data.departements
                        this.domainePermissions     = res.data.domaines
                        this.serveurPermissions     = res.data.serveurs
                        this.outilPermissions       = res.data.outils
                        this.typeOutilPermissions   = res.data.typeOutils
                    })
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
/**************************************************************/
    .checkbox_container{
        display:flex;flex-wrap:wrap;
    }
    .single_checkbox{
        /* border:1px solid #2f3640; */
        width:25%
    }
    .my_color{
        color: #dd3333;
    }
    /**************************************************************/

</style>
