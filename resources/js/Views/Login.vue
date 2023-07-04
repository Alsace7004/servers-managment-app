<template>
    <div class="login_container">
        <div class="login_text">Se connecter</div>
        <div class="login_form_input_control">
            <input type="text" class="login_form_input" v-model="user.email" placeholder="Email">
        </div>
        <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
        <div class="login_form_input_control">
            <input type="password" class="login_form_input" v-model="user.password" name="" id="" placeholder="Password">
        </div>
        <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
        <div class="login_form_input_control">
            <button class="login_btn" :class="loading ? 'disabled':''" @click="loginUser">Se connecter</button>
        </div>
    </div>
</template>

<script>
    import {useAuthStore} from "../store/index"
    const userStore = useAuthStore();
export default {
   
    components:{

    },
    data(){
        return{
            errors:[],
            user:{
                email:'',
                password:''
            },
            loading:false,
        }
    },
    methods:{
        async getToken(){
            await axios.get('/sanctum/csrf-cookie');
        },
        loginUser(){
            this.getToken();
            this.errors = []
            /*************************************************/
            const login_btn = document.querySelector('.login_btn')
            login_btn.classList.add("loading");
            login_btn.innerHTML = "Connexion en cours..."
            this.loading =  true
            /*************************************************/
            axios.get('/sanctum/csrf-cookie').then(response => {
                
                //console.log("Valeur de response dans sanctum/csrf-cookie:",response)
                // Login...
                    axios.post('api/login',this.user).then((res)=>{
                        localStorage.clear(); 
                        /*************************************************/
                        login_btn.classList.remove("loading");
                        login_btn.innerHTML ="Se connecter"
                        this.loading =  false
                        /*************************************************/
                        //console.log("Valeur de res dans loginUser:",res)
                        //console.log("Valeur du checked du user connecté:",res.data.user.checked)
                        //verifier l'attribut checked
                        
                        if(res.data.status){
                            if(res.data.user.checked === 1){
                            //si checked === 1, il devra modifier son mot de passe ensuite return direct sur /
                            localStorage.setItem("user_id",res.data.user.id)
                                userStore.setUserDetails(res)
                                this.$router.replace("/modify-staff-password");
                            }else if(res.data.user.checked === 0){
                                //si checked === 0, return direct sur /
                                //Swal.fire('Success!','Connexion reussie !!!.','success');
                                userStore.setUserDetails(res)
                                this.$router.replace("/");
                            }else{
                                //Swal.fire('Success!','Connexion reussie !!!.','success');
                                userStore.setUserDetails(res)
                                this.$router.replace("/");
                            }
                        }
                    }).catch((err)=>{
                        /*************************************************/
                        login_btn.classList.remove("loading");
                        login_btn.innerHTML ="Se connecter"
                        this.loading =  false
                        /*************************************************/
                        //console.log("Valeur de err dans loginUser:",err.response)
                        
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else if(err.response.status === 401){
                            Swal.fire('Erreur!',`${err.response.data.message}`,'error') ;
                            this.user.password =''
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            });
            
        },
    },
}
</script>

<style scoped>

</style>