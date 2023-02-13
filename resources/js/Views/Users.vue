<template>
            <ContentHeader message="Users Page !!!"/>
                        <button style="margin-right:1rem;margin-bottom:1rem;padding:5px 10px;border-radius:5px;background-color: #2f3640;color:#fff;cursor:pointer" @click="showModal">Add User</button>
                        <button @click="toggleModal2">Edit Modal</button>
                        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#create_user">Open Modal</button> -->
                        <div class="data_box">
                            <div class="data_box_header">
                                <div class="per_page">
                                    <select name="" id="" class="select_option_form">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                                <div class="search_bar">
                                    <input type="text" class="search_bar_form" name="" id="" placeholder="Rechercher...">
                                </div>
                            </div>
                            <div class="data_box_content">
                                <v-table :columns="columns">
                                    <tbody>
                                        <tr v-for="(user,key) in users" :key="key">
                                            <td>{{user.id}}</td>
                                            <td>{{user.name}}</td>
                                            <td>{{user.email}}</td>
                                            <td>kodjo@eyram.com</td>
                                            <td>
                                                <!-- <button class="view_btn"><i class="fas fa-eye"></i></button> -->
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <!--<tr>
                                            <td>02</td>
                                            <td>Komlan</td>
                                            <td>ETONAM</td>
                                            <td>Komlan@ETONAM.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>Kokou</td>
                                            <td>ESSENAM</td>
                                            <td>Kokou@ESSENAM.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>Yao</td>
                                            <td>ELOLO</td>
                                            <td>Yao@ELOLO.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td>Koffi</td>
                                            <td>VIGNON</td>
                                            <td>Koffi@VIGNON.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>06</td>
                                            <td>Komi</td>
                                            <td>GAGNON</td>
                                            <td>Komi@GAGNON.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>07</td>
                                            <td>Kossi</td>
                                            <td>EDJODJINAM</td>
                                            <td>Kossi@EDJODJINAM.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>-->
                                    </tbody>
                                </v-table>
                            </div>
                            <div class="data_box_footer">
                                <div>
                                    ({{from}}-{{to}} sur {{total}})
                                </div>
                                <div>
                                    <!-- <button class="previous_btn">Previous</button>
                                    1 2 3 ... 59
                                    <button class="next_btn">Next</button> -->
                                    <button class="pagination_btn" style="margin-right:0.5rem;cursor:pointer" v-for="(link,key) in links" :key="key" :class="getClass(link)">
                                        <a @click.prevent="navigation(link)">
                                            {{link.label}}
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Proper Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="create_user">
                            <template v-slot:header>
                                <h4>Create Users</h4>
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
                                    <select name="" id="" class="input_form_item">
                                        <option value="">Choisir un role</option>
                                        <option value="">role1</option>
                                        <option value="">role2</option>
                                        <option value="">role3</option>
                                    </select>
                                </div>
                                
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="mdl-btn-primary" @click="saveUser">Save</button>
                                </div>
                            </template>
                        </proper-modal>
                        <proper-modal v-show="isModalVisible" modalName="edit_user">
                            <template v-slot:header>
                                <h4>Edit Users</h4>
                                <i @click="closeModal()" class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Nunc sed velit dignissim sodales ut eu sem integer vitae. Id aliquet lectus proin nibh nisl condimentum. 
                                    Fringilla urna porttitor rhoncus dolor purus. Nam aliquam sem et tortor. Nisl vel pretium lectus quam id. 
                                    Cras pulvinar mattis nunc sed. Quis ipsum suspendisse ultrices gravida dictum fusce ut placerat orci. 
                                    Tristique magna sit amet purus. Fermentum et sollicitudin ac orci phasellus egestas tellus. 
                                    Erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. Felis eget nunc lobortis mattis aliquam faucibus. 
                                    Tincidunt eget nullam non nisi est sit amet facilisis. Mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. 
                                    Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque. Eget nunc scelerisque viverra mauris in aliquam sem fringilla ut. 
                                    Nec nam aliquam sem et tortor consequat id. Commodo nulla facilisi nullam vehicula ipsum a. Elementum tempus egestas sed sed. 
                                    Faucibus purus in massa tempor nec feugiat nisl pretium fusce.</p>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Cancel</button>
                                    <button class="mdl-btn-primary" @click="closeModal()">Update</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Proper Modal End -->
</template>

<script setup>
    import ContentHeader from "../components/ContentHeader.vue"
    import ProperModal from "../components/ProperModal.vue"
    import Modal from "../components/Modal.vue"
    import vTable from "../components/vTable/vTable.vue";
    import {onMounted, ref,reactive} from "vue";
    /****************GDialog*****Begin*****************/
    let isModalVisible = ref(false)
    /****************GDialog*****End*******************/
    let columns =[
        {label:'~#',name:''},
        {label:'Nom',name:''},
        {label:'Prenom',name:''},
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
        password:''
    })
    let errors = ref([])
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
    let links = ref([])
    const tData = reactive({
        page:0,
        search :'',
        length :'5',
    })
    /*************************************************/
    onMounted(()=>{
        getUsers()
    })
    /*************************************************/
    const getUsers = (pageGet)=>{
        tData.page = pageGet
        axios.get("api/users",{params:tData}).then((res)=>{
            let content = res.data.users;
            users.value = content.data;
            //console.log("Valeur de res dans getUsers:",res)
            configPagination(content)
        }).catch((err)=>{
            console.log("Valeur de err dans getUsers:",err)
        })
    }
    const saveUser = ()=>{
        errors.value = []
        axios.post("api/users",user).then((res)=>{
            //console.log("valeur de res:",res)
            if(res.data.status){
                $('#create_user').modal('hide'); 
                getUsers()
                Swal.fire('Créer!','Nouvelle Utilisateur Ajouter avec success.','success') ;
            }
        }).catch((err)=>{
            console.log("Valeur de err dans saveUser:",err.response.data.errors)
            errors.value = err.response.data.errors
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
</script>

<style scoped>
    /***************************************************/
    
    
</style>
