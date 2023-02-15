<template>
    <div class="login_container">
        <div class="login_text">Se connecter</div>
        <div class="input_form_control">
            <input type="text" class="input_form" v-model="user.email" placeholder="Email">
        </div>
        <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
        <div class="input_form_control">
            <input type="password" class="input_form" v-model="user.password" name="" id="" placeholder="Password">
        </div>
        <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
        <div class="input_form_control">
            <button class="login_btn" :class="loading ? 'disabled':''" @click="loginUser">Se connecter</button>
        </div>
    </div>
</template>

<script>
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
        loginUser(){
            this.errors = []
            let login_btn = document.querySelector('.login_btn')
            login_btn.innerHTML = "Connexion en cours..."
            this.loading =  true
            axios.post('api/login',this.user).then((res)=>{
                login_btn.innerHTML ="Se connecter"
                this.loading =  false
                console.log("Valeur de res dans loginUser:",res)

                if(res.data.status){
                    Swal.fire('Success!','Connexion reussie !!!.','success') ;
                }
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
        },
    },
}
</script>

<style scoped>

</style>