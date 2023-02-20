<template>
                <div class="navbar">
                    <div class="hambuger">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="user_profile" style="display:flex;">
                        <div style="margin-right:1rem">
                            <p><strong>{{email}}</strong></p>
                            <p><strong>{{name}}</strong></p>
                        </div>
                        <div class="profile_img">
                            <img src="" alt="" srcset="">
                        </div>
                    </div>
                </div>
</template>

<script setup>
    import { onMounted } from "@vue/runtime-core"
    import {useAuthStore} from "../store/index"
    const {name,email}=useAuthStore()
    onMounted(()=>{
        //console.log("Valeur de name:",email)
        let hambuger = document.querySelector(".hambuger")
        hambuger.addEventListener('click',()=>{
            document.querySelector("body").classList.toggle('actives')
        })
    })


</script>

<style scoped>

</style>
