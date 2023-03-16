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
                        <ContentHeader message="Page d'ajout de Roles  !!!"/>
                        <p>Ajouter</p>
                        <!-- router-view-end -->
                        <div>
                                <!-- role_name -->
                                <div class="input_form mb_3" style="width:25%">
                                    <input type="text" class="input_form_item" v-model="role.name" placeholder="Role name...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <!-- role_name -->
                                <!-- guard_name -->
                                <div class="input_form mb_3" style="width:25%">
                                    <!-- <input type="text" class="input_form_item" v-model="role.guard_name" placeholder="guard Ex:web/staffs"> -->
                                    <select  v-model="role.guard_name" id="the_guard" @change="getTheGuard" class="input_form_item">
                                        <option value="">Selectionner un garde</option>
                                        <option value="web">web</option>
                                        <option value="staffs">staffs</option>
                                        <!-- <option v-for="role in roles" :key="role.id" :value="role.id">{{role.name}}</option> -->
                                    </select>
                                </div>
                                <span v-if="errors.guard_name" class="error_txt">{{errors.guard_name[0]}}</span><br>
                                <!-- guard_name -->
                                <label for=""><strong>Choisir une permission :</strong></label>
                                <div class="checkbox_container">
                                    <!-- utilisateurs -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Utilisateurs :</strong></label>
                                        <div v-if="!userPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div v-else class="" style="" v-for="permi in userPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                    <!-- roles -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Roles :</strong></label>
                                        <div v-if="!rolesPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div v-else class="" style="" v-for="permi in rolesPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                    <!-- staff -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Staff :</strong></label>
                                        <div v-if="!staffPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div v-else class="" style="" v-for="permi in staffPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                    <!-- type de staff -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Type de staff :</strong></label>
                                        <div v-if="!typeStaffPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div v-else class="" style="" v-for="permi in typeStaffPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- second -->
                                <div class="checkbox_container" style="margin-top:1rem;">
                                    <!-- departement -->
                                    <div class="single_checkbox" style="">
                                        <label for=""><strong>Departements :</strong></label>
                                        <div v-if="!departementPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div v-else v-for="permi in departementPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                    <!-- roles -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Domaines :</strong></label>
                                        <div v-if="!domainePermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div v-else class="" style="" v-for="permi in domainePermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                    <!-- staff -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Serveurs :</strong></label>
                                        <div v-if="!serveurPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div class="" style="" v-for="permi in serveurPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                    <!-- outils -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Outils :</strong></label>
                                        <div v-if="!outilPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div class="" style="" v-for="permi in outilPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                    <!--type outils -->
                                    <div class="single_checkbox">
                                        <label for=""><strong>Type d'Outils :</strong></label>
                                        <div v-if="!typeOutilPermissions.length" class="my_color">Pas de permissions disponible</div>
                                        <div class="" style="" v-for="permi in typeOutilPermissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div style="display:flex;justify-content:space-between">
                                    <label for=""><strong>Departements :</strong></label>
                                    <label for=""><strong>Domaines :</strong></label>
                                    <label for=""><strong>Serveurs :</strong></label>
                                </div> -->

                                <!-- permissions -->
                                <!-- <div class="col-md-12" style="margin-top:2rem">
                                    <label for=""><strong>Choisir une permission :</strong></label>
                                    <div class="row col-md-6" style="columns: 4 auto;">
                                        <div class="" style="" v-for="permi in permissions" :key="permi.id">
                                            <input type="checkbox" v-model="role.permission" id="permis" :key="permi.id" :value="permi.id" name=""  class="form-control">
                                            <label style="margin-left:0.5rem" >{{ permi.slug }} ({{permi.guard_name}})</label>
                                        </div>
                                    </div>
                                </div> -->
                                <span v-if="errors.permission" class="error_txt">{{errors.permission[0]}}</span>
                                <!-- permissions -->
                                <div style="margin-top:2rem">
                                    <button class="mdl-btn-primary" id="send_role" :class="loading ? 'disabled' :''" @click="saveRole">Sauvegarder</button>
                                </div>
                        </div>
                        <!-- end -->
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

    export default {
        name:'roles',
        components:{
            Navbar,Sidebar,ContentHeader,
        },
        props: ['self'],
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
            this.getUtlisateursPermission()
        },
        methods:{
            //
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
                        //this.getRoles()
                        Swal.fire('Créer!','Nouveau Role Ajouter avec success.','success') ;
                        this.$router.push("/roles"); 
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
            //
            getUtlisateursPermission(){
                axios.get("api/elements/web").then((res)=>{
                    console.log("valeur de res dans getUtlisateursPermission (AddRoles):",res)
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
            },
            //The selected Guard
            getTheGuard(){
                let tg = document.querySelector("#the_guard").value;
                console.log("valeur de tg:",tg)
                //alert("i clicked on : "+tg);
                axios.get("api/elements/"+tg).then((res)=>{
                    console.log("Valeur de res dans getTheGuard : ",res)
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
