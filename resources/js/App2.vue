<template>
    <div>
        <!-- Begin -->
        <div class="wrapper">
            <!-- The Sidebar -->
            <div v-if="authenticated">
                <Sidebar/>
            </div>
                
            <!-- The Section -->
            <div class="section">
                <!-- The navbar -->
                <div v-if="authenticated">
                    <Navbar />
                </div>
                <!-- The Content -->
                <div class="content">
                    <div class="content_body">
                        <router-view/>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
        <!-- End -->
    </div>
</template>

<script>
    import Sidebar from "./components/Sidebar.vue"
    import Navbar from "./components/Navbar.vue"
    
    //import { onMounted,ref } from "vue"
    //let authenticated = ref(false)
    /* onMounted(()=>{
        let token = localStorage.getItem("jwt");
        if(token != null){
            authenticated.value = true
            console.log("Valeur de authenticated.value if :",authenticated.value)
        }else{
            authenticated.value = false
            console.log("Valeur de authenticated.value else:",authenticated.value)
        }
    }) */
    export default{
        components:{
            Navbar,Sidebar
        },
        data(){
            return{
                authenticated:false,
                authUser: window.authUser
            }
        },
        methods:{

        },
        created(){
            console.log("valeur de this.authUser:",this.authUser);

            let token = localStorage.getItem("jwt");
            console.log("valeur de token:",token)
            if(token != null){
                this.authenticated = true
                console.log("Valeur de authenticated.value if :",this.authenticated)
            }else{
                this.authenticated = false
                console.log("Valeur de authenticated.value else:",this.authenticated)
            }
        },
        mounted(){

        },
        
    }
</script>
