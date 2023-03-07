<template>
    <div class="login_container">
        <div class="login_text">Modification du mot de passe</div>
        <!-- Old Password -->
        <div class="login_form_input_control">
            <input type="password" class="login_form_input" v-model="user.old_password" placeholder="Mot de passe actuelle">
        </div>
        <span v-if="errors.old_password" class="error_txt">{{errors.old_password[0]}}</span>
        <!-- Old Password -->

        <!-- New Password -->
        <div class="login_form_input_control">
            <input type="password" class="login_form_input" v-model="user.new_password" name="" id="" placeholder="Nouveau mot de passe">
        </div>
        <span v-if="errors.new_password" class="error_txt">{{errors.new_password[0]}}</span>
        <!-- New Password -->
        <div class="login_form_input_control">
            <button class="login_btn" :class="loading ? 'disabled':''" @click="updatePassword">Mettre à jour</button>
        </div>
    </div>
</template>

<script>
    import {useAuthStore} from "../store/index"
    //const {id}=useAuthStore()
export default {
   
    components:{

    },
    data(){
        return{
            errors:[],
            user:{
                old_password:'',
                new_password:'',
            },
            loading:false,
        }
    },
    methods:{
        async getToken(){
            await axios.get('/sanctum/csrf-cookie');
        },
        updatePassword(){
            //let id = 25;
            let id =  localStorage.getItem("user_id")
            axios.put(`api/updateStaffPassword/${id}`,this.user).then((res)=>{
                console.log("Valeur de res dans updateStaffPassword:",res)
                if(res.data.status === false){
                    Swal.fire('Erreur!',`${res.data.message }`,'error') ;
                }else if(res.data.status === true){
                    Swal.fire('Success!',`${res.data.message }`,'success') ;
                    this.$router.replace("/");
                }
            }).catch((err)=>{
                console.log("Valeur de err dans updateStaffPassword:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
            });
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