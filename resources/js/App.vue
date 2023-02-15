<template>
    <div>
        <!-- Begin -->
        <div class="wrapper">
            <!-- The Sidebar -->
                <Sidebar v-if="authenticated"/>
            <!-- The Section -->
            <div class="section">
                <!-- The navbar -->
                <Navbar v-if="authenticated"/>
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
    import { onMounted,ref } from "vue"

    let authenticated = ref(false)

    onMounted(()=>{
        let token = localStorage.getItem("jwt");
        if(token != null){
            authenticated.value = true
        }else{
            authenticated.value = false
        }
        
    })
</script>
