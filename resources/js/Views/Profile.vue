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
                            <ContentHeader message="Page du profile !!!"/>
                            
                            
                            <div class="form_container">
                                    <div class="mb_1">
                                        <div class="input_form mb_1">
                                            <input type="text" class="input_form_item" v-model="user.name" placeholder="nom...">
                                        </div>
                                        <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                    </div>

                                    <div class="mb_1">
                                        <div class="input_form">
                                            <input type="text" class="input_form_item" v-model="user.email" placeholder="email...">
                                        </div>
                                        <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
                                    </div>

                                    <div class="mb_1">
                                        <div class="input_form">
                                            <input type="password" class="input_form_item" v-model="user.last_password" placeholder="ancien mot de passe...">
                                        </div>
                                        <span v-if="errors.last_password" class="error_txt">{{errors.last_password[0]}}</span>
                                    </div>
                                    
                                    <div class="mb_1">
                                        <div class="input_form">
                                            <input type="password" class="input_form_item" v-model="user.new_password" placeholder="nouveau mot de passe...">
                                        </div>
                                        <span v-if="errors.new_password" class="error_txt">{{errors.new_password[0]}}</span>
                                    </div>
                                    
                                    <div>
                                        <button class="mdl-btn-primary" style="margin-left:0" id="send_role" :class="loading ? 'disabled' :''" @click="updateProfileInfo">mettre à jour</button>
                                    </div>
                            </div>
                            

                            

                            

                            
                            
                        <!-- router-view-end -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    <!-- End -->
                        
                        
    
</template>

<script>
    import Sidebar from "../components/Sidebar.vue";
    import Navbar from "../components/Navbar.vue";
    import ContentHeader from "../components/ContentHeader.vue"
 
    import axiosClient from "../axios/index"
    import Button from "../components/Button.vue"

    import {useAuthStore} from "../store/index"
    

    export default {
        name:'profile',
        components:{
            ContentHeader,
            Sidebar,Navbar,
            'v-button':Button
        },
        setup() {
            const {id,name,email}=useAuthStore()
            return { id,name,email };
         },
        data(){
            
            return{
                errors:[],

                user:{
                    id:this.id,
                    name:this.name,
                    email:this.email,
                    last_password:'',
                    new_password:'',
                },
                loading:false,
            }
        },
        methods:{
            //           axiosClient.put("api/profiles/"+this.user.id,this.user).then((res)=>{
            //           axiosClient.put("api/profile/userProfile/"+this.user.id,this.user).then((res)=>{
            updateProfileInfo(){
                this.errors = []
                let send_role = document.querySelector("#send_role")
                send_role.innerHTML = "Mise à jour en cours..."
                this.loading = true;
                
                axiosClient.put("api/profiles/userProfile/"+this.user.id,this.user).then((res)=>{
                    send_role.innerHTML = "mettre à jour"
                    this.loading = false;
                    //console.log("Valeur de res dans updateProfileInfo:",res)
                    if(res.data.status){
                        Swal.fire('Créer!','Information mise à jour avec success.','success') ;
                        this.user.last_password=''
                        this.user.new_password=''
                    } 
                    if(!res.data.status){
                        Swal.fire('Erreur!','Mot de passe incorrete.','error') ;
                        this.user.last_password=''
                        this.user.new_password=''
                    }
                }).catch((err)=>{
                    send_role.innerHTML = "mettre à jour"
                    this.loading = false;
                    //console.log("Valeur de err dans updateProfileInfo:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            
        },

        created(){
        
        },
    }
</script>

<style scoped>
    /**********************************************************/
    /**********************************************************/
    /* all styles */
</style>
