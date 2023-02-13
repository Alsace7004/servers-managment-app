<template>
            <ContentHeader message="Users Page !!!"/>
                        <button @click="toggleModal">Open Modal</button>
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
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
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
                        <proper-modal v-show="isModalVisible">
                            <template v-slot:header>
                                <h4>The Modal title</h4>
                                <button type="button" @click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                                <p>Arcu cursus vitae congue mauris rhoncus aenean. Tempor id eu nisl nunc mi. Pharetra diam sit amet nisl suscipit adipiscing bibendum. 
                                    Ut faucibus pulvinar elementum integer enim. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. 
                                    Eu non diam phasellus vestibulum lorem sed risus. Porttitor rhoncus dolor purus non enim praesent. 
                                    Sit amet mauris commodo quis imperdiet. Lobortis feugiat vivamus at augue eget. Nibh tellus molestie nunc non blandit. 
                                    Tellus mauris a diam maecenas sed enim ut. Tortor aliquam nulla facilisi cras fermentum odio eu feugiat pretium. 
                                    Mattis aliquam faucibus purus in massa.</p>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" @click="closeModal()">Cancel</button>
                                    <button class="mdl-btn-primary" @click="closeModal()">Save</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Proper Modal End -->
                        <Modal @close="toggleModal" :modalActive="modalActive">
                            <div class="modal-content">
                                <h1>Here is the modal Header</h1>
                                <p>Here is the modal content</p>
                            </div>
                        </Modal>
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

        /* let current_page = ref()
        let last_page = ref()
        let first_page_url = ref()
        let last_page_url = ref() */

        
    /*************************************************/
    let modalActive = ref(true)
    const toggleModal = ()=>{
        modalActive.value = !modalActive.value
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
    .modal-content{
        display: flex;
        flex-direction: column;
    }
    h1,p{
        margin-bottom: 16px;
    }
    h1{
        font-size: 32px;
    }
    p{
        font-size: 18px;
    }
    .disabled{
        background: red;
    }
    .no-cursor {
        cursor: default !important;
        pointer-events: none;
    }
    .pagination_btn{
        background-color: rgb(81, 79, 79);
        padding: 2px 10px;
        border-radius: 5px;
        color: #fff;
        font-weight: 600;
    }
</style>
