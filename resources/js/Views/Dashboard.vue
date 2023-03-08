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
                            <ContentHeader message="Dashboard Page !!!"/>
                            <!--Am The Dashboard Components !!!-->
                            <div class="card" style="">
                                <!--The First part-->
                                <div class="card_box" style="">
                                    <div class="single_card" style="">
                                        <p>Total Serveur: <span style="font-weight:bold">{{servers}}</span> </p>
                                    </div>

                                    <div class="single_card" style="">
                                        <p>Total serveur qui s'expirent dans 1 semaine: <span style="font-weight:bold">{{expire_servers}}</span></p>
                                    </div>
                                    
                                    <div class="single_card" style="">
                                        <p>Total domaine: <span style="font-weight:bold">{{domaines}}</span></p>
                                    </div>
                                </div>
                                <!--The second part-->
                                <div class="card_box" style="">
                                    <div class="single_card" style="">
                                        <p>Total domaine qui s'expirent dans 1 semaine: <span style="font-weight:bold">{{expire_domaines}}</span></p>
                                    </div>

                                    <div class="single_card" style="">
                                        <p>Total departement actif: <span style="font-weight:bold">{{departement_actif}}</span></p>
                                    </div>
                                    
                                    <div class="single_card" style="">
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
        display:flex;justify-content:space-between;align-items:center;margin:10px 0px 10px 0px
    }
    .single_card{
        border:1px solid gray;width:300px;height:100px;border-radius:5px;padding:10px;background-color:#fff
    }
</style>
