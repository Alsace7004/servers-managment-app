<template>
    
                  
                        <router-view/>
               
              
</template>

<script setup>
    import Sidebar from "./components/Sidebar.vue"
    import Navbar from "./components/Navbar.vue"
    import {useAuthStore} from "./store/index"
    const authStore = useAuthStore();
    import axiosClient from "./axios/index"

    import { onMounted,ref } from "vue"
  
    onMounted(async()=>{
        //await authStore.getUser();
                
                

    })
   
</script>
