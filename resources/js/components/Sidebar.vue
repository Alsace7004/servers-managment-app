<template>
            <div class="sidebar">
                <div class="sidebar_header">
                    SERVERS
                </div>
                <ul>
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
                        <router-link v-if="$can('domaine-list')" :to="{name:'departements'}" class="item">
                            <span class="icon"><i class="fas fa-building"></i></span>
                            <span>Departements</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link v-if="$can('domaine-list')" :to="{name:'type_de_staff'}" class="item">
                            <span class="icon"><i class="fas fa-user-alt"></i></span>
                            <span>Type de Staff</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link v-if="$can('domaine-list')" :to="{name:'staff'}" class="item">
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
                </ul>
            </div>
</template>

<script setup>
    import axiosClient from "../axios/index"
    import { useRouter} from 'vue-router'
            const router = useRouter();
    import {useAuthStore} from "../store/index"
    const userStore = useAuthStore();

    const logout =() =>{
        //alert("hited !!!")
        axiosClient.post("api/logout").then((res)=>{
            console.log("Valeur de res dans logout:",res)
            if(res.data.status){
                Swal.fire('Deconnexion!','Deconnexion reussi !!!.','success');
                    userStore.clearUser();
                    localStorage.removeItem('auth')
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
/* 
Module domaine

-nom de domaine
-hebergeur
-registre personne chez qui on prend le domaine
-date expirartion

    arrive dans une semaine on envoi notification mail pour informer que la date arrive a expirartion 
    et on donne la date d'expirartion
*/
</style>
