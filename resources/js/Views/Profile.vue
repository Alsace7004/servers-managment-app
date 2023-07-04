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
                            <ContentHeader message="Page du profile !!!"/>
                            
                            <!-- <div v-if="!servers.length || !$can('server-list')" class="data_box">
                                <p style="display:flex;justify-content:center;align-items:center;">
                                                    Chargement des serveurs en cours...
                                                    <loader></loader>
                                </p>
                            </div> -->
                            
                            <!-- <div class="data_box">
                               
                                <div v-if="$is('Admin') || $can('server-create')">
                                    <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Nouveau Serveur</button>
                                </div>
                               
                                <div class="data_box_header">
                                    <div class="per_page">
                                        <select name="" class="select_option_form" id="" v-model="tData.length" @change="getPerPage">
                                            <option v-for="(pp,key) in perPage" :key="key" :value="pp">{{pp}}</option>
                                        </select>
                                    </div>
                                    <div class="search_bar">
                                        <input type="text" class="search_bar_form" name="" id="" v-model="tData.search" @input="getSearch" placeholder="Rechercher...">
                                    </div>
                                </div>
                                <div class="data_box_content" >
                                    <v-table :columns="columns">
                                        <tbody>
                                            <tr v-for="(item,key) in servers" :key="key">
                                                <td>{{item.id}}</td>
                                                <td>{{item.name}}</td>
                                                <td>{{item.url_connexion}}</td>
                                                <td>{{item.proprietaire_serveur}}</td>
                                                <td>{{item.categorie_serveur_name}}</td>
                                                <td>{{convert(item.created_at)}}</td>
                                                <td>{{convert(item.date_expiration)}}</td>
                                                <td>
                                                    <p v-if="item.status === 0" class="badge_white">En cours</p>
                                                    <p v-if="item.status === 1" class="badge_red">Expiré(e)</p>
                                                </td>
                                                <td>
                                                    <button class="view_btn" v-if="$can('server-view')" @click="viewServer(item.id)"><i class="fas fa-eye"></i></button>
                                                    <button class="edit_btn" v-if="$can('server-edit')"  @click="editServer(item.id)"><i class="fas fa-edit"></i></button>
                                                    <button class="delete_btn" v-if="$can('server-delete')" @click="deleteServer(item.id)"><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </v-table>
                                </div>
                                <div class="data_box_footer">
                                    <div>
                                        ({{pagination.from}}-{{pagination.to}} sur {{pagination.total}})
                                    </div>
                                    <div>
                                        <button class="pagination_btn" style="margin-right:0.5rem;cursor:pointer" v-for="(link,key) in links" :key="key" :class="getClass(link)">
                                            <a @click.prevent="navigation(link)">
                                                {{link.label}}
                                            </a>
                                        </button>
                                    </div>
                                </div>
                            </div> -->
                            <div class="input_form mb_3">
                                <input type="text" class="input_form_item" v-model="user.name" placeholder="nom...">
                            </div>
                            <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>

                            <div class="input_form mb_3">
                                <input type="text" class="input_form_item" v-model="user.email" placeholder="email...">
                            </div>
                            <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>

                            <div class="input_form mb_3">
                                <input type="password" class="input_form_item" v-model="user.last_password" placeholder="ancien mot de passe...">
                            </div>
                            <span v-if="errors.last_password" class="error_txt">{{errors.last_password[0]}}</span>

                            <div class="input_form mb_3">
                                <input type="password" class="input_form_item" v-model="user.new_password" placeholder="nouveau mot de passe...">
                            </div>
                            <span v-if="errors.new_password" class="error_txt">{{errors.new_password[0]}}</span>

                            <div>
                                 <!-- <v-button :onClick="saveServer" id="amapiano" class="button"  :class="loading ? 'disabled loading' :''">mettre à jour</v-button> -->
                                <button class="mdl-btn-primary" style="margin-left:0" id="send_role" :class="loading ? 'disabled' :''" @click="updateProfileInfo">mettre à jour</button>
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
    import Sidebar from "../components/Sidebar.vue";
    import Navbar from "../components/Navbar.vue";
    import ContentHeader from "../components/ContentHeader.vue"
 
    import axiosClient from "../axios/index"
    import Button from "../components/Button.vue"

    import {useAuthStore} from "../store/index"
    

    export default {
        name:'profile',
        components:{
            ContentHeader,
            Sidebar,Navbar,
            'v-button':Button
        },
        setup() {
            const {id,name,email}=useAuthStore()
            return { id,name,email };
         },
        data(){
            
            return{
                errors:[],

                user:{
                    id:this.id,
                    name:this.name,
                    email:this.email,
                    last_password:'',
                    new_password:'',
                },
                loading:false,
            }
        },
        methods:{
            //           axiosClient.put("api/profiles/"+this.user.id,this.user).then((res)=>{
            //           axiosClient.put("api/profile/userProfile/"+this.user.id,this.user).then((res)=>{
            updateProfileInfo(){
                this.errors = []
                let send_role = document.querySelector("#send_role")
                send_role.innerHTML = "Mise à jour en cours..."
                this.loading = true;
                
                axiosClient.put("api/profiles/userProfile/"+this.user.id,this.user).then((res)=>{
                    send_role.innerHTML = "mettre à jour"
                    this.loading = false;
                    console.log("Valeur de res dans updateProfileInfo:",res)
                    if(res.data.status){
                        Swal.fire('Créer!','Information mise à jour avec success.','success') ;
                        this.name.last_password=''
                        this.name.new_password=''
                    } 
                    if(!res.data.status){
                        Swal.fire('Erreur!','Mot de passe incorrete.','error') ;
                        this.name.last_password=''
                        this.name.new_password=''
                    }
                }).catch((err)=>{
                    send_role.innerHTML = "mettre à jour"
                    this.loading = false;
                    //console.log("Valeur de err dans updateProfileInfo:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            
        },

        created(){
        
        },
    }
</script>

<style scoped>
    /**********************************************************/
    /**********************************************************/
    /* all styles */
</style>
