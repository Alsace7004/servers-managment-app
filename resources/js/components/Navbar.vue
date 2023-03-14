<template>
                <div class="navbar" style="box-shadow: 0 2px 0px 0 rgba(0,0,0,0.16);">
                    <div class="hambuger">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="user_profile" style="display:flex;">
                        <div style="margin-right:1rem">
                            <p><strong>{{email}}</strong></p>
                            <p><strong>{{name}}</strong></p>
                        </div>
                        <div class="profile_img">
                            <img v-if="photo === null || photo === undefined" class="profile_img" :src="'../profile/img/user.png'" alt="" srcset="">
                            <img v-else class="profile_img" :src="'../img_path/Staff/'+photo" alt="" srcset="">
                        </div>
                    </div>
                </div>
</template>

<script setup>
    import { onMounted } from "@vue/runtime-core"
    import {useAuthStore} from "../store/index"
    const {name,email,photo}=useAuthStore()
    onMounted(()=>{
        //console.log("Valeur de name:",email)
        let hambuger = document.querySelector(".hambuger")
        hambuger.addEventListener('click',()=>{
            document.querySelector("body").classList.toggle('actives')
        })
    })


</script>

<style scoped>
    /*  */
</style>
