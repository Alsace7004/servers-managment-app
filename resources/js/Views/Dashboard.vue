<template>
    <!-- Begin -->
        <div class="wrapper">
            <!-- The Sidebar -->
                <Sidebar/>
            <!-- The Section -->
            <div class="section">
                <!-- The navbar -->
                    <Navbar />
                <!-- The Content -->
                <div class="content">
                    <div class="content_body">
                        <!-- router-view-begin -->
                            <ContentHeader message="Tableau de bord !!!"/>
                            <!--Am The Dashboard Components !!!-->
                            <div class="card" style="">
                                <!--The First part-->
                                <div class="card_box" style="">
                                    <div v-if="$can('server-list')" class="single_card" style="">
                                        <span class="icon"><i class="fas fa-server ico_size"></i></span>
                                        <p>Total Serveur: <span style="font-weight:bold">{{servers}}</span> </p>
                                        
                                    </div>

                                    <div v-if="$can('server-list')" class="single_card" style="">
                                        <span class="icon"><i class="fas fa-server ico_size"></i></span>
                                        <p>Total serveur qui s'expirent dans 1 semaine: <span style="font-weight:bold">{{expire_servers}}</span></p>
                                    </div>
                                    
                                    <div v-if="$can('domaine-list')" class="single_card" style="">
                                        <span class="icon"><i class="fas fa-globe ico_size"></i></span>
                                        <p>Total domaine: <span style="font-weight:bold">{{domaines}}</span></p>
                                    </div>
                                </div>
                                <!--The second part-->
                                <div class="card_box" style="">
                                    <div v-if="$can('domaine-list')" class="single_card" style="">
                                        <span class="icon"><i class="fas fa-globe ico_size"></i></span>
                                        <p>Total domaine qui s'expirent dans 1 semaine: <span style="font-weight:bold">{{expire_domaines}}</span></p>
                                    </div>

                                    <div v-if="$can('departement-list')" class="single_card" style="">
                                        <span class="icon"><i class="fas fa-building ico_size"></i></span>
                                        <p>Total departement actif: <span style="font-weight:bold">{{departement_actif}}</span></p>
                                    </div>
                                    
                                    <div v-if="$can('staff-list')" class="single_card" style="">
                                        <span class="icon"><i class="fas fa-user-alt ico_size"></i></span>
                                        <p>Total staff actif: <span style="font-weight:bold">{{staff_actif}}</span></p>
                                    </div>
                                </div>
                                <!---->
                            </div>
                        <!-- router-view-end -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    <!-- End -->
</template>

<script>
    import Sidebar from "../components/Sidebar.vue"
    import Navbar from "../components/Navbar.vue"
    import ContentHeader from "../components/ContentHeader.vue"
    import { onMounted } from "vue"
    import axiosClient from "../axios/index"
    /* import {useAuthStore} from "../store/index"
    const userStore  = useAuthStore();
    console.log("From dashboard:",userStore.getUserRoleAndPermission()) */
    export default {
        name:"",
        components:{
            Sidebar,Navbar,ContentHeader
        },
        data(){
            return{
                servers:'0',
                    expire_servers:'0',
                domaines:'0',
                    expire_domaines:'0',
                departement_actif:'0',
                staff_actif:'0',
            }
        },
        methods:{
            getCountServers(){
                axios.get("api/getCountServers").then((res)=>{
                    let content = res.data;
                    this.servers = content.servers
                    //console.log("Valeur de res dans getCountServers:",content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getCountServers:",err)
                })
            },
            getCountDomaines(){
                axios.get("api/getCountDomaines").then((res)=>{
                    let content = res.data;
                    this.domaines = content.domaines
                    //console.log("Valeur de res dans getCountDomaines:",content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getCountDomaines:",err)
                })
            },
            getCountDepartements(){
                axios.get("api/getCountDepartements").then((res)=>{
                    let content = res.data;
                    this.departement_actif = content.departements
                    //console.log("Valeur de res dans getCountDepartements:",content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getCountDepartements:",err)
                })
            },
            getCountStaffs(){
                axios.get("api/getCountStaffs").then((res)=>{
                    let content = res.data;
                    this.staff_actif = content.staffs
                    //console.log("Valeur de res dans getCountStaffs:",content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getCountStaffs:",err)
                })
            },
            getExpireServer(){
                axios.get("api/getExpireServer").then((res)=>{
                    let content = res.data;
                    this.expire_servers = content.servers
                    //console.log("Valeur de res dans getExpireServer:",content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getExpireServer:",err)
                })
            },
            getExpireDomaines(){
                axios.get("api/getExpireDomaines").then((res)=>{
                    let content = res.data;
                    this.expire_domaines = content.domaines
                    //console.log("Valeur de res dans getExpireDomaines:",content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getExpireDomaines:",err)
                })
            },
        },
        created(){
            this.getCountStaffs()
            this.getCountServers()
            this.getCountDomaines()
            this.getCountDepartements()
            this.getExpireServer()
            this.getExpireDomaines()
        }
    }
        
</script>

<style scoped>
    .card_box{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin:30px 0px 10px 0px;/*TRBL*/
        
    }
    .single_card{
        width:390px;
        height:100px;
        border-radius:5px;
        padding:10px;
        background-color:#fff;
        box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.20);
        border:	1px solid rgba(0, 0, 0,  0.1);
        border-radius:	6px;
    }
    .ico_size{
        font-size: 40px;
    }
    /*Responsive design*/
    @media only screen and (max-width: 680px) {
        .card_box{
            /* border: 1px solid red; */
            display: flex;
            flex-direction: column;
        }
        .single_card{
            /* border: 1px solid green; */
            margin:10px 0px 10px 0px ;/*TRBL*/
        }
    }
</style>
