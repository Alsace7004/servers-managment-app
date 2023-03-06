<template>
    <div class="login_container">
        <div class="login_text">Modification du mot de passe</div>
        <div class="login_form_input_control">
            <input type="password" class="login_form_input" v-model="user.email" placeholder="Mot de passe actuelle">
        </div>
        <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
        <div class="login_form_input_control">
            <input type="password" class="login_form_input" v-model="user.password" name="" id="" placeholder="Nouveau mot de passe">
        </div>
        <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
        <div class="login_form_input_control">
            <button class="login_btn" :class="loading ? 'disabled':''" @click="updatePassword">Mettre à jour</button>
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
        updatePassword(){
            alert("mise à jour du mot de passe en cours...")
        },
        loginUser(){
            this.getToken();
            this.errors = []
            let login_btn = document.querySelector('.login_btn')
            login_btn.innerHTML = "Connexion en cours..."
            this.loading =  true
            //axios.get('/sanctum/csrf-cookie').then(response => {
                //console.log("Valeur de response dans sanctum/csrf-cookie:",response)
                // Login...
                    axios.post('api/login',this.user).then((res)=>{
                        localStorage.clear(); 
                        login_btn.innerHTML ="Se connecter"
                        this.loading =  false
                        console.log("Valeur de res dans loginUser:",res)

                        if(res.data.status){
                            Swal.fire('Success!','Connexion reussie !!!.','success');
                            //this.$router.push("/users");
                            userStore.setUserDetails(res)
                            //verifier l'attribut checked
                            //si checked === 1, il devra modifier son mot de passe ensuite return direct sur /
                            //si checked === 0, return direct sur /
                            this.$router.replace("/");
                            //window.location.href("/users");
                        }
                        //17|Qq5qDR6r3GgVF0iSgLhVpOV4C7rgYe37qTbI1PVS
                    }).catch((err)=>{
                        login_btn.innerHTML ="Se connecter"
                        this.loading =  false
                        console.log("Valeur de err dans loginUser:",err.response)
                        
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else if(err.response.status === 401){
                            Swal.fire('Erreur!',`${err.response.data.message}`,'error') ;
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            //});
            
        },
    },
}
</script>

<style scoped>

</style>