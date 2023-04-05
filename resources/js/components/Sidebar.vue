<template>
            <div class="sidebar">
                <div class="close_btn_box">
                        <i class="fas fa-times close_btn"></i>
                </div>
                <div class="sidebar_header">
                    <img :src="'../admin/img/eba.png'" alt="SERVERS" srcset="">
                </div>
                
                    
                        <ul>
                            <div class="conteneur_inner">
                                <li>
                                    <router-link :to="{name:'dashboard'}" class="item">
                                        <span class="icon"><i class="fas fa-home"></i></span>
                                        <span>Tableau de bord</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="$can('server-list')" :to="{name:'serveurs'}" class="item">
                                        <span class="icon"><i class="fas fa-server"></i></span>
                                        <span>Serveurs</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="$can('domaine-list')" :to="{name:'domaines'}" class="item">
                                        <span class="icon"><i class="fas fa-globe"></i></span>
                                        <span>Domaines</span>
                                    </router-link>
                                </li>
                                <!--  -->
                                <li>
                                    <router-link v-if="$can('departement-list')" :to="{name:'departements'}" class="item">
                                        <span class="icon"><i class="fas fa-building"></i></span>
                                        <span>Departements</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="$can('typeStaff-list')" :to="{name:'type_de_staff'}" class="item">
                                        <span class="icon"><i class="fas fa-user-alt"></i></span>
                                        <span>Type de Staff</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="$can('staff-list')" :to="{name:'staff'}" class="item">
                                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                                        <span>Staff</span>
                                    </router-link>
                                </li>
                                <!--  -->
                                <li>
                                    <router-link v-if="$is('Admin') || $can('role-list')" :to="{name:'roles'}" class="item">
                                        <span class="icon"><i class="fas fa-lock"></i></span>
                                        <span>Roles</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="$can('user-list')" :to="{name:'users'}" class="item">
                                        <span class="icon"><i class="fas fa-users"></i></span>
                                        <span>Utilisateurs</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="$can('typeOutil-list')" :to="{name:'typeOutils'}" class="item">
                                        <span class="icon"><i class="fas fa-tools"></i></span>
                                        <span>Type Outils</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link v-if="$can('outil-list')" :to="{name:'outils'}" class="item">
                                        <span class="icon"><i class="fas fa-fire"></i></span>
                                        <span>Outils</span>
                                    </router-link>
                                </li>
                                <li>
                                    <router-link  :to="{name:'messageries'}" class="item">
                                        <span class="icon"><i class="far fa-comments"></i></span>
                                        <span>Messagerie</span>
                                    </router-link>
                                </li>
                            
                                <!-- <li>
                                    <router-link v-if="$is('Admin')" :to="{name:'permissions'}" class="item">
                                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                                        <span>Permissions</span>
                                    </router-link>
                                </li> -->
                                <li>
                                    <a  @click="logout" class="item deconnexion_btn">
                                        <span class="icon"><i class="fas fa-power-off"></i></span>
                                        <span>Deconnexion</span>
                                    </a>
                                </li>
                                <!--  -->
                            </div>
                        </ul>
                    
                
                
            </div>
</template>

<script setup>
   import { onMounted } from "@vue/runtime-core"
    import axiosClient from "../axios/index"
    import { useRouter} from 'vue-router'
            const router = useRouter();
    import {useAuthStore} from "../store/index"
    const userStore = useAuthStore();
    /*******************************************************************/
    onMounted(()=>{
        let close_btn = document.querySelector(".close_btn")
        close_btn.addEventListener('click',()=>{
            //document.querySelector("body").classList.toggle('actives')
            document.querySelector("body").classList.remove("actives");
            document.querySelector("body").classList.toggle("activi");
        })
    })
    /*******************************************************************/

    const logout =() =>{
        //alert("hited !!!")
        axiosClient.post("api/logout").then((res)=>{
            console.log("Valeur de res dans logout:",res)
            if(res.data.status){
                //Swal.fire('Deconnexion!','Deconnexion reussi !!!.','success');
                    userStore.clearUser();
                    localStorage.removeItem('auth')
                    localStorage.removeItem('user_id')
                    localStorage.clear(); 
                    //this.$router.push("/login");   
                router.push({ path: '/login' }) 
            }
        }).catch((err)=>{
            console.log("Valeur de error dans logout:",err)
        })
    }

    
</script>

<style scoped>
    /* .close_hambuger{
        display:flex;
        justify-content:end;
        align-items: center;
        cursor:pointer;
        margin-right:0.5rem;
    } */


.sidebar ul li a.router-link-exact-active,
.sidebar ul li a.router-link-exact-active .icon {
    background: #dd3333;
    color: #fff;
}
/* .sidebar ul li a.router-link-exact-active:hover {
  
} */
.deconnexion_btn{
    cursor: pointer;
}
/* .sidebar > ul:hover{
    scrollbar-width: thin;
    overflow-y : scroll;
    scrollbar-color: gray;
} */

/* .sidebar:hover{
                overflow-y : scroll;
} */
/* .sidebar::-webkit-scrollbar-thumb {
  background-color: #d6dee1;
}
.sidebar::-webkit-scrollbar-thumb {
  background-color: #d6dee1;
  border-radius: 20px;
  border: 6px solid transparent;
  background-clip: content-box;
}
.sidebar::-webkit-scrollbar-thumb:hover {
  background-color: #a8bbbf;
} */
/***************************************************************/



</style>
