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
                        <ContentHeader message="Page des utilisateurs !!!"/>
                        <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Ajouter Utilisateur</button>
                        <!-- <button @click="toggleModal2">Edit Modal</button> -->
                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create_user">Open Modal</button> -->
                        <div class="data_box">
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
                            <div class="data_box_content">
                                <v-table :columns="columns">
                                    <tbody>
                                        <tr v-if="!users.length">
                                            <p style="display:flex;justify-content:center;align-items:center;margin-left:20rem">
                                                Chargement des utilisateurs en cours...
                                                <loader></loader>
                                            </p>
                                            
                                        </tr>
                                        <tr v-for="(user,key) in users" :key="key">
                                            <td>{{user.id}}</td>
                                            <td>{{user.name}}</td>
                                            <td>{{user.email}}</td>
                                            <td>
                                                <!-- <button class="view_btn"><i class="fas fa-eye"></i></button> -->
                                                <button class="edit_btn" @click="editUser(user.id)"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn" @click="deleteUser(user.id)"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!---->
                                    </tbody>
                                </v-table>
                            </div>
                            <div class="data_box_footer">
                                <div>
                                    ({{from}}-{{to}} sur {{total}})
                                </div>
                                <div>
                                    <button class="pagination_btn" style="margin-right:0.5rem;cursor:pointer" v-for="(link,key) in links" :key="key" :class="getClass(link)">
                                        <a @click.prevent="navigation(link)">
                                            {{link.label}}
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- router-view-end -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
        <!--  -->
                        
                        <!-- Proper Create Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="create_user">
                            <template v-slot:header>
                                <h4>Ajouter Un Utilisateur</h4>
                                <i @click="closeModal()" class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="user.name" placeholder="Nom...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="email" class="input_form_item" v-model="user.email" placeholder="Email...">
                                </div>
                                <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="password" class="input_form_item" v-model="user.password" placeholder="Password...">
                                </div>
                                <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
                                <div class="input_form">
                                    <select  v-model="user.roles" id="" class="input_form_item">
                                        <option value="Selectionner un Role">Selectionner un Role</option>
                                        <option v-for="role in roles" :key="role.id" :value="role.id">{{role.name}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.roles" class="error_txt">{{errors.roles[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="send_user" :class="loading ? 'disabled' :''" @click="saveUser">Sauvegarder</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Proper Create Modal End -->
                        <!-- Proper Edit Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_user">
                            <template v-slot:header>
                                <h4>Editer un utilisateur</h4>
                                <i @click="closeModal()" class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                 <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="user.name" placeholder="Nom...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <div class="input_form mb_3">
                                    <input type="email" class="input_form_item" v-model="user.email" placeholder="Email...">
                                </div>
                                <span v-if="errors.email" class="error_txt">{{errors.email[0]}}</span>
                                <div class="input_form">
                                    <select  v-model="user.roles" id="" class="input_form_item">
                                        <option value="Selectionner un Role">Selectionner un Role</option>
                                        <option v-for="role in roles" :key="role.id" :value="role.id">{{role.name}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.roles" class="error_txt">{{errors.roles[0]}}</span>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="update_user" :class="loading ? 'disabled' :''" @click="updateUser">Mettre à jour</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Proper Edit Modal End -->
</template>

<script setup>
    import Sidebar from "../components/Sidebar.vue"
    import Navbar from "../components/Navbar.vue"

    import ContentHeader from "../components/ContentHeader.vue"
    import ProperModal from "../components/ProperModal.vue"
    import Modal from "../components/Modal.vue"
    import vTable from "../components/vTable/vTable.vue";
    import loader from "../components/loader2.vue"
    import axiosClient from "../axios"
    import {onMounted, ref,reactive} from "vue";
    /****************GDialog*****Begin*****************/
    let isModalVisible = ref(false)
    /****************GDialog*****End*******************/
    let perPage = ref(['5','10','20','30'])
    let columns =[
        {label:'~#',name:''},
        {label:'Nom',name:''},
        {label:'Email',name:''},
        {label:'Actions',name:''},
    ]

        let from = ref()
        let to = ref()
        let total = ref()
        let next_page_url = ref()
        let prev_page_url = ref()
    /*************************************************/
    let user = reactive({
        name:'',
        email:'',
        password:'',
        roles:''
    })
    let errors = ref([])
    let edit_id = ref()
    let is_Editing= ref(false)
    let loading= ref(false)
    /*************************************************/
    let modalActive = ref(false)
    //modalActive.value = !modalActive.value
    const showModal = ()=>{
        errors.value = []
        user.name = ""
        user.email = ""
        user.password =""
        $("#create_user").modal("show")
    }
    const toggleModal = ()=>{
        $("#create_user").modal("show")
    }
    const toggleModal2 = ()=>{
        $("#edit_user").modal("show")
    }
    const closeModal = ()=>{
        $("#create_user").modal("hide")
    }
    /********************WORKING-ON-TABLE-REFS********************/
    let users = ref([])
    let roles = ref([])
    let links = ref([])
    const tData = reactive({
        page:0,
        search :'',
        length :'5',
    })
    /*************************************************/
    onMounted(()=>{
        getUsers()
        getRoles()
    })
    /*************************************************/
    const getUsers = (pageGet)=>{
        tData.page = pageGet
        axiosClient.get("api/users",{params:tData}).then((res)=>{
            let content = res.data.users;
            users.value = content.data;
            //console.log("Valeur de res dans getUsers:",res)
            configPagination(content)
        }).catch((err)=>{
            console.log("Valeur de err dans getUsers:",err.response)
        })
    }
    const getPerPage = ()=>{
        getUsers()
    }
    const getSearch = ()=>{
        getUsers()
    }
    //getAllRoles
    const getRoles = ()=>{
        axiosClient.get("api/getAllRoles").then((res)=>{
            let content = res.data.roles;
            roles.value = content;
            //console.log("Valeur de res dans getUsers:",res)
        }).catch((err)=>{
            console.log("Valeur de err dans getRoles dans Users:",err.response)
        })
    }
    const saveUser = ()=>{
        errors.value = []
        let send_user = document.querySelector("#send_user")
        send_user.innerHTML = "Sauvegarde en cours..."
        loading.value = true;
        axiosClient.post("api/users",user).then((res)=>{
            send_user.innerHTML = "Sauvegarder"
            loading.value = false;
            //console.log("valeur de res:",res)
            if(res.data.status){
                $('#create_user').modal('hide'); 
                getUsers()
                Swal.fire('Créer!','Nouvelle Utilisateur Ajouter avec success.','success') ;
            }
        }).catch((err)=>{
            send_user.innerHTML = "Sauvegarder"
            loading.value = false;
            //console.log("Valeur de err dans saveUser:",err.response.data.errors)
            if(err.response.status === 422){
                errors.value = err.response.data.errors
            }else{
                //console.log("erreur: probleme de connexion")
                Swal.fire('Erreur!','Probleme de connexion.','error') ;
            }
        })
    }
    const configPagination = (data)=>{
        from.value          = data.from
        to.value            = data.to
        total.value         = data.total
        next_page_url.value = data.next_page_url
        prev_page_url.value = data.prev_page_url
        links.value         = data.links        
    }
    const navigation = (nav)=>{
        const url = nav.url.split("=");
        const page = url[1];
        getUsers(page)
    }
    const getClass = (item)=>{
        if(item.url === null) return "page-item disabled no-cursor"
        if(item.url != null){
            if(item.active === true){
                return "page-item active no-cursor";
            }else return "page-item";
        }
        //console.log("valeur de item dans getClass:",item)
    }
    const editUser = (id)=>{
                errors.value = [];
                axiosClient.get(`api/users/${id}`).then((res)=>{
                    $("#edit_user").modal("show")
                    console.log('valeur de res dans edit user:',res)
                    edit_id.value = res.data.id;
                        user.name  = res.data.name;
                        user.email  = res.data.email;
                        user.roles  = res.data.role_id;
                    is_Editing.value = true;
                })
    }
    const updateUser = ()=>{
                    let update_user = document.querySelector("#update_user")
                    update_user.innerHTML = "Mise à jour en cours..."
                    loading.value = true;
                    axiosClient.put(`api/users/${edit_id.value}`,user).then((res)=>{
                        update_user.innerHTML = "Mettre à jour"
                        loading.value = false;
                        $('#edit_user').modal('hide');
                        if(res.data.status){
                            Swal.fire('Mise à jour!','Utilisateur mise à jour avec success.','success')    
                            getUsers();
                            edit_id.value = "";
                            is_Editing.value = false;
                        }
                    }).catch((err)=>{
                        update_user.innerHTML = "Mettre à jour"
                        loading.value = false;
                        //console.log("Valeur de err dans updateUser:",err.response)
                        if(err.response.status === 422){
                            errors.value = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
    }
    const deleteUser = (id)=>{
                    Swal.fire({
                    title: 'Etes-vous sûr?',
                    text: "Vous ne pourrez pas annuler cette action !!!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Annuler!',
                    confirmButtonText: 'Oui, supprimez-le!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                                axiosClient.delete(`api/users/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!','L\'utilisateur a été supprimé.','success') 
                                        getUsers()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"L\'utilisateur est toujours disponible !!!",'success')
                        }
                    })
    }
</script>

<style scoped>
    /***************************************************/
    
    
</style>
