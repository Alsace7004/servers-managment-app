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
                <div v-if="authenticated" >
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

<script setup>
    import Sidebar from "./components/Sidebar.vue"
    import Navbar from "./components/Navbar.vue"
    import {useAuthStore} from "./store/index"
    const authStore = useAuthStore();
    import axiosClient from "./axios/index"

    import { onMounted,ref } from "vue"
    let authenticated = ref(false)
    onMounted(async()=>{
        //await authStore.getUser();
                const data = await axiosClient.get("api/user").then((res)=>{
                    //console.log("Valeur de data dans App:",res.data)
                    let name = res.data.name 
                    let email = res.data.email
                    //console.log("Valeur de name dans App:",name)
                    //console.log("Valeur de email dans App:",email)
                    if(name !=null && email != null){
                        authenticated.value = true
                    }else{
                        authenticated.value = false
                    }
                }).catch((err)=>{
                    console.log("Valeur de err:",err.response)
                });
                

    })
   
</script>
