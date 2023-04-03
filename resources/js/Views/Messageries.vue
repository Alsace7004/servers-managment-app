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
                <div class=" content2">
                    <!-- content2-left-side -->
                    <div class="content2__left">
                        <!-- header -->
                        <div class="content2__left_header">
                            Utilisateurs
                        </div>
                        <!-- body -->
                        <div class="content2__left_body"> 
                            <div class="content2__left_body_inner">
                                <!-- The beginning -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-13.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ADJAO Laleye</p>
                                        <p class="user_box__info_department">Finance</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-2.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">FATOUNDJI Laleye</p>
                                        <p class="user_box__info_department">Commercial</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-3.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">AGBEKE Laleye</p>
                                        <p class="user_box__info_department">Resource Humaines</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-4.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TITLAYO Laleye</p>
                                        <p class="user_box__info_department">Service Achat</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-5.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">OGUN Laleye</p>
                                        <p class="user_box__info_department">Banque & Finance</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-6.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <span class="user_box__info_name">ABIKE Laleye</span>
                                        <span class="user_box__info_department">Logistique Operation</span>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-7.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ANJOLA Laleye</p>
                                        <p class="user_box__info_department">Control de Gestion</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-8.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">MODUKPE Laleye</p>
                                        <p class="user_box__info_department">Achat et ventes</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-9.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">KEGNIDE Laleye</p>
                                        <p class="user_box__info_department">Sciences Culturelles</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-10.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TOUNDE Laleye</p>
                                        <p class="user_box__info_department">Science</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-11.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">DAMILOLA Laleye</p>
                                        <p class="user_box__info_department">Droit Juridique</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-12.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">OLUWASEUN Laleye</p>
                                        <p class="user_box__info_department">Droit commercial</p>
                                    </div>
                                </div>
                                <!-- Another (Duplicate Entry) -->
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-1.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ISHEGOU Laleye</p>
                                        <p class="user_box__info_department">Finance</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-14.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">BALOGUN Laleye</p>
                                        <p class="user_box__info_department">Commercial</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-15.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <span class="user_box__info_name">ADEDAYO Laleye</span>
                                        <span class="user_box__info_department">Resource Humaines</span>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-16.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ADEBOLA Laleye</p>
                                        <p class="user_box__info_department">Service Achat</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-17.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ADEBISSI Laleye</p>
                                        <p class="user_box__info_department">Banque & Finance</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-18.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">FELA Laleye</p>
                                        <p class="user_box__info_department">Logistique Operation</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-19.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TEMITOKPE Laleye</p>
                                        <p class="user_box__info_department">Control de Gestion</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-20.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TIWATOKPE Laleye</p>
                                        <p class="user_box__info_department">Achat et ventes</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-21.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ORI Laleye</p>
                                        <p class="user_box__info_department">Sciences Culturelles</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-22.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ODJO Laleye</p>
                                        <p class="user_box__info_department">Science</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-23.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">FOLASHADE Laleye</p>
                                        <p class="user_box__info_department">Droit Juridique</p>
                                    </div>
                                </div>
                                <!--  -->
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-24.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ASAKE Laleye</p>
                                        <p class="user_box__info_department">Droit commercial</p>
                                    </div>
                                </div>
                                <!-- The end -->
                            </div>
                        </div>
                    </div>
                    <!-- content2-right-side -->
                    <div class="content2__right" >
                        
                        <!-- header -->
                        <div class="content2__right_header"> 
                            <div class="content2__right_user_box">
                                    <div class="">
                                        <img class="content2__right_user_box__avatar" :src="'../profile/chats_img/avatar-13.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p>ADJAO Laleye</p>
                                        <p>Finance</p>
                                    </div>
                            </div>
                            <div class="content2__right_icon_box">
                                <i class="fas fa-phone" @click="makeCall"></i>
                            </div>
                        </div>
                        <!-- body -->
                        <div class="content2__right_body" style="position:relative"> 
                            <div class="image_preview_box" style="">
                                <div style="display:flex;flex-direction:column;gap:10rem">
                                    <!-- border:1px solid red; -->
                                    <div style="display:flex;justify-content:end;padding-right:0.5rem;padding-left:0.5rem;font-size:2rem;cursor:pointer">
                                        <i class="fas fa-times" @click="closeImagePreview"></i>
                                    </div>
                                    <div style="display:flex;justify-content:center;align-items:center;">
                                        <!-- border:1px solid green; -->
                                        <img style="height:100px;width:100px;" v-if="staffImg.img" :src="staffImg.img" />
                                    </div>
                                </div>
                            </div>
                            <!-- begin -->
                            <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Hello
                                </p>
                            </div>
                            <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    bonjour,j'espere que vous aller bien,                                    
                                </p>
                            </div>
                            <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Il vis à jamais
                                </p>
                            </div>
                            <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    non, plutot à djamé                                    
                                </p>
                            </div>
                            <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Les leviatans viennent tous des levitiques,
                                    sa a été ecrit dans le livre des damnés
                                </p>
                            </div>
                            <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    Ce livre a longtemps appartenu aux franck enstein                                   
                                </p>
                            </div>
                            <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    c'est exact, mais depuis un bon bout de temps,
                                    elle a été derobé de leur main et est protégé
                                    actuellement par un sort si puissant qu'on ne 
                                    la detecte plus
                                </p>
                            </div>
                            <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    mais, il y a toujours une solution à tout problème                                   
                                </p>
                            </div>
                            <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Oui, en effet, Mme rowina a prévu nous trouvé 
                                    la solution grace au livre des damnés et de l'aide
                                    de ses semblables.
                                </p>
                            </div>
                            <!-- end -->
                        </div>
                        <!-- footer -->
                        <div class="content2__right_footer" style="position:relative"> 
                                <div class="attach_btn">
                                    <!--  -->
                                    <label class="attach_btn__item two">
                                        <input type="file" @change="selectImage" id="two" required/>
                                        <i class="fas fa-file"></i>
                                        <div class="attach_btn__item_msg" style="">Fichiers</div>
                                    </label>
                                    <!--  -->
                                    <label class="attach_btn__item one">
                                        <input type="file" id="three" required/>
                                        <i class="fas fa-image"></i>
                                        <div class="attach_btn__item_msg" style="">Images</div>
                                    </label>
                                    <!--  -->
                                </div>
                            <div class="content2__right_footer_left" style="border:1px solid orange">
                                <!--  <i class="far fa-grin-alt bt_icon"></i> -->
                                <i class="fas fa-paperclip bt_icon" @click="attach_btn"></i>
                            </div>
                            <div class="content2__right_footer_middle">
                                
                                <EmojiPicker :native="true" theme='dark' pickerType='input'  :static-texts="{ placeholder: 'Search emoji'}" @select="onSelectEmoji" />
                                <!--<input type="text" class="content2__right_footer_middle_input" placeholder="type a message">-->  
                            </div>
                            <div class="content2__right_footer_right">
                                <i class="fas fa-microphone bt_icon"></i>
                            </div>
                        </div>
                        <!-- footer end -->
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    <!-- End -->
                        <!-- Adding Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="create_domaine">
                            <template v-slot:header>
                                <h4>Ajouter un outil</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!-- name -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.name" placeholder="Nom de l'outil...">
                                </div>
                                <span v-if="errors.name" class="error_txt">{{errors.name[0]}}</span>
                                <!-- username -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.username" placeholder="username de l'outil...">
                                </div>
                                <span v-if="errors.username" class="error_txt">{{errors.username[0]}}</span>
                                <!-- password -->
                                <div class="input_form mb_3">
                                    <input type="password" class="input_form_item" v-model="outil.password" placeholder="password de l'outil...">
                                </div>
                                <span v-if="errors.password" class="error_txt">{{errors.password[0]}}</span>
                                <!-- url -->
                                <div class="input_form mb_3">
                                    <input type="text" class="input_form_item" v-model="outil.url" placeholder="url de l'outil...">
                                </div>
                                <span v-if="errors.url" class="error_txt">{{errors.url[0]}}</span>
                                <!-- type outil -->
                                <div class="input_form mb_3">
                                    <select name="" id="" v-model="outil.type_outil_id" class="input_form_item">
                                        <option value="">Choisir le type d'outil</option>
                                        <option v-for="server in typeOutils" :key="server.id" :value="server.id">{{server.name}}</option>
                                    </select>
                                </div>
                                <span v-if="errors.type_outil_id" class="error_txt">{{errors.type_outil_id[0]}}</span>
                                <!-- end -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger"  data-dismiss="modal" aria-label="Close">Fermer</button>
                                    <button class="mdl-btn-primary" id="send_server" :class="loading ? 'disabled' :''" @click="saveOutil">Sauvegarder</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Adding Modal End -->
                        <!-- view Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="view_server">
                            <template v-slot:header>
                                <h4>Les details de l'outil :</h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!-- nom -->
                                <label for=""><strong>Nom de l'outil :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.name}}</p>
                                </div>
                                <!-- username -->
                                <label for=""><strong>Username du Serveur :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.username}}</p>
                                </div>
                                <!-- password  -->
                                <label for=""><strong>Mot de passe du Serveur :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.password}}</p>
                                </div>
                                <!-- url -->
                                <label for=""><strong>URL du Serveur :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.url}}</p>
                                </div>
                                <!-- type outil -->
                                <label for=""><strong>Type de l'outil :</strong></label>
                                <div class="mb_3">
                                    <p>{{outil.type_outil_id}}</p>
                                </div>
                                <!-- ajouté le -->
                                <label for=""><strong>Ajouté le :</strong></label>
                                <div class="mb_3">
                                    <p>{{convert(outil.created_at)}}</p>
                                </div>
                                <!--  -->
                                
                                <!--  -->
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- view Modal End -->
                        <!----------------------------------------------------------------------------------------->
                        <!-- Editing Modal Begin -->
                        <proper-modal v-show="isModalVisible" modalName="edit_domaine">
                            <template v-slot:header>
                                <h4>Faire un appel </h4>
                                <i class="far fa-times-circle md_icon" data-dismiss="modal" aria-label="Close"></i>
                            </template>
                            <template v-slot:body>
                                <!----- call box here : begin ------------------------------->
                                <div class="call__box">
                                    <div class="" style="">
                                        <img class="call__box_img" style="" :src="'../profile/chats_img/avatar-24.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="call__box_btn">
                                        <button class="mdl-btn-danger"><i class="fas fa-phone-slash"></i> Raccrocher</button>
                                        <button  class="mdl-btn-primary"><i class="fas fa-volume-up"></i> Haut parleur</button>
                                    </div>
                                </div>
                                <!----- call box here : end ------------------------------->
                                
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" data-dismiss="modal" aria-label="Close">Fermer</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Editing Modal End -->
    
</template>

<script>
    import Sidebar from "../components/Sidebar.vue";
    import Navbar from "../components/Navbar.vue";
    import ContentHeader from "../components/ContentHeader.vue"
    import vTable from "../components/vTable/vTable.vue"
    import ProperModal from "../components/ProperModal.vue";
    import loader from "../components/loader3.vue"
    import axiosClient from "../axios/index"

    import TextareaEmojiPicker from "../components/TextareaEmojiPicker.vue"; 
    /**********************************************************************/
    // import picker compopnent
    import EmojiPicker from 'vue3-emoji-picker'
    // import css
    import 'vue3-emoji-picker/css';

    export default {
        name:'outils',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,TextareaEmojiPicker,EmojiPicker
        },
        data(){
            let columns =[
                {label:'~#',            name:''},
                {label:'Nom',           name:''},
                {label:'Username',      name:''},
                {label:'Url',           name:''},
                {label:'Type outil',    name:''},
                {label:'Ajouté Le',     name:''},
                {label:'Actions',       name:''},
            ];
            return{
                
                perPage : ['5','10','20','30'],
                columns: columns,
                outils:[],
                typeOutils:[],
                errors:[],
                links:[],
                outil:{
                    name:'',
                    username:'',
                    password:'',
                    url:'',
                    type_outil_id:'',
                },
                isModalVisible:false,
                tData:{
                    page:0,
                    length:'5',
                    search:'',
                },
                pagination:{
                    from:'',
                    to :'',
                    total:'',
                },
                edit_id:'',
                is_Editing:false,
                loading:false,
                /*---------------------------*/
                staff:{
                    photo:'',
                },
                staffImg:{
                    img:'',
                },
                /*---------------------------*/
            }
        },
        methods:{
            showModal(){
                this.errors = []
                this.outil={
                    name:'',
                    username:'',
                    password:'',
                    url:'',
                    type_outil_id:'',
                }
                $("#create_domaine").modal("show")
            },
            getOutil(pageGet){
                this.tData.page = pageGet
                axiosClient.get("api/outils",{params:this.tData}).then((res)=>{
                    let content = res.data.outils
                    //console.log("Valeur de content dans getOutil:",content)
                    this.outils = content.data
                    this.configPagination(content)
                }).catch((err)=>{
                    console.log("Valeur de err dans getOutil:",err.response)
                })
            },
            getTypeOutil(){
                axios.get("api/getTypeOutils").then((res)=>{
                    let content = res.data.type_outils;
                    this.typeOutils = content
                    //console.log("valeur de res dans getTypeOutil:",content)
                })
            },
            saveOutil(){
                this.errors = []
                let send_server = document.querySelector("#send_server")
                send_server.innerHTML = "Sauvegarde en cours..."
                this.loading = true;
                axiosClient.post("api/outils",this.outil).then((res)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de res dans saveOutil:",res)
                    if(res.data.status){
                        $('#create_domaine').modal('hide'); 
                        this.getOutil()
                        Swal.fire('Créer!',"Nouveau outil Ajouter avec success.",'success') ;
                    }
                }).catch((err)=>{
                    send_server.innerHTML = "Sauvegarder"
                    this.loading = false;
                    //console.log("Valeur de err dans saveOutil:",err.response)
                    if(err.response.status === 422){
                        this.errors = err.response.data.errors
                    }else{
                        //console.log("erreur: probleme de connexion")
                        Swal.fire('Erreur!','Probleme de connexion.','error') ;
                    }
                })
            },
            getPerPage(){
                this.getOutil()
            },
            getSearch(){
                this.getOutil()
            },
            configPagination(data){
                this.pagination.from    =data.from,
                this.pagination.to      =data.to,
                this.pagination.total   =data.total
                this.links              =data.links
            },
            navigation(nav){
                const url = nav.url.split("=");
                const page = url[1];
                this.getOutil(page)
            },
            getClass(item){
                if(item.url === null) return "page-item disabled no-cursor"
                if(item.url != null){
                    if(item.active === true){
                        return "page-item active no-cursor";
                    }else return "page-item";
                }
            },
            editOutil(id){
                this.errors = [];
                axiosClient.get(`api/outils/${id}`).then((res)=>{
                    $("#edit_domaine").modal("show")
                    console.log('valeur de res dans edit outil:',res)
                    this.edit_id                  = res.data[0].id;
                    this.outil.name               = res.data[0].outils_name;
                    this.outil.username           = res.data[0].username;
                    this.outil.password           = res.data[0].password;
                    this.outil.url                = res.data[0].url;
                    this.outil.type_outil_id      = res.data[0].type_outil_id;
                    this.is_Editing               = true;
                })
            },
            viewOutil(id){
                this.errors = [];
                axiosClient.get(`api/outils/${id}`).then((res)=>{
                    $("#view_server").modal("show")
                    console.log('valeur de res dans view outil:',res)
                    //this.edit_id    = res.data.id;
                    this.outil.name             = res.data[0].outils_name;
                    this.outil.username         = res.data[0].username;
                    this.outil.password         = res.data[0].password;
                    this.outil.url              = res.data[0].url;
                    this.outil.type_outil_id    = res.data[0].type_outils_name;
                    this.outil.created_at       = res.data[0].created_at;
                    //this.is_Editing = true;
                })
            }, 
            updateOutil(){
                    let update_server = document.querySelector("#update_server")
                    update_server.innerHTML = "Mise à jour en cours..."
                    this.loading = true;
                    axiosClient.put(`api/outils/${this.edit_id}`,this.outil).then((res)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        if(res.data.status){
                            $('#edit_domaine').modal('hide');
                            Swal.fire('Mise à jour!',"Outil mise à jour avec success.",'success')    
                            this.getOutil();
                            this.edit_id = "";
                            this.is_Editing = false;
                        }
                    }).catch((err)=>{
                        update_server.innerHTML = "Mettre à jour"
                        this.loading = false;
                        //console.log("Valeur de err dans updateOutil:",err.response)
                        if(err.response.status === 422){
                            this.errors = err.response.data.errors
                        }else{
                            //console.log("erreur: probleme de connexion")
                            Swal.fire('Erreur!','Probleme de connexion.','error') ;
                        }
                    })
            },
            deleteOutil(id){
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
                                axiosClient.delete(`api/outils/${id}`).then((res)=>{
                                    if(res.data.status){
                                        Swal.fire('Supprimé!',"L'outil a été supprimé.",'success') 
                                        this.getOutil()
                                    }
                                }).catch((err)=>{
                                    Swal.fire('Erreur !!!',"Une erreur s'est produite !!!",'error')
                                })
                        }else{
                            Swal.fire('Conserver !!!',"L'outil est toujours disponible !!!",'success')
                        }
                    })
            },
            /**********************Make-a-call-begin***************************/
            makeCall(){
                $("#edit_domaine").modal("show")
                /* alert("going to make a call"); */
            },
            /**********************Make-a-call-end***************************/
            attach_btn(){
                console.log("Hello")
                document.querySelector('.attach_btn').classList.toggle("show_attach_btn");
            },
            // event callback
            onSelectEmoji(emoji) {
                console.log(emoji)
                /*
                    // result
                    { 
                        i: "😚", 
                        n: ["kissing face"], 
                        r: "1f61a", // with skin tone
                        t: "neutral", // skin tone
                        u: "1f61a" // without tone
                    }
                    */
            },
            //
            selectImage(e){
                //console.log("uploading begin")
                let file = e.target.files[0];
                console.log("Valeur de file dans le chat:",file)
                document.querySelector('.image_preview_box').classList.toggle('image_preview_box__see_image')
                this.staff.photo = file;
                this.staffImg.img = URL.createObjectURL(file);
            },
            //
            closeImagePreview(){
                document.querySelector('.image_preview_box').classList.toggle('image_preview_box__see_image')
            }
            //
            
        },


        created(){
            this.getOutil()
            this.getTypeOutil()
        },
    }
</script>

<style scoped>

    /**************************************************************/
    .user_box__avatar{
        border: 1px solid #000;
        height: 50px;
        width: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    .user_box_img{
        display:flex;
        justify-content:center;
        align-items:center
    }
    .user_box__info{
        margin-left: 1rem;
        display: flex;
        flex-direction: column;
        border: 1px solid red;
    }
    .user_box__info_name{
        border:1px solid orange;
        font-weight:bold
    }
    .user_box__info_department{
        border:1px solid green;
        font-style:italic;
    }
    .user_box{
        /* border: 1px solid red; */
        height: 100%;
        display: flex;
        border-bottom: 1px dashed #000;
        margin: 0rem 0.5rem 0.5rem 0.5rem;/*T:0 R:0.5 B:0 L:0.5*/
        border: 1px solid #000;
        border-radius: 0.5rem;
        cursor: pointer;
        width: 95%;
    }
    .content2__left_header{
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-bottom: 2px solid #2f3640;
        margin-bottom: 1rem;
    }
    /*---------------------------------------------------------------------------*/
    .content2__left_body{
        /* border: 1px solid red; */
        height: 100%;
        overflow: auto;
        visibility:hidden;
        width: 100%;
        margin-bottom: 2rem;
    }
    .content2__left_body_inner,.content2__left_body:hover{
        scrollbar-width: 1px;
        /* scrollbar-width: thin; */
        visibility: visible;
        
    }
    /*---------------------------------------------------------------------------*/
    ::-webkit-scrollbar{
        width: 0.25rem;
    }
    ::-webkit-scrollbar-thumb{
        background-color: transparent;
        border-radius: 10px;
    }
    /**************************************************************/
    .content2{
        border:1px solid crimson;
        flex-grow: 1;
        position: fixed;
        width: calc(100% -250px);
      /*   width: 83.7%; */
        height: 92.5%;
        border-bottom: 2px dotted rebeccapurple;
        display: flex;
        margin-right: 0px;
        transition: all 0.5s ease;
    }
    /**************************************************************/
    .content2__left{
        flex: 1;
        background-color: gainsboro;
    }
    .content2__right{
        flex: 3;
        background-color: gray;
    }
    .content2__right_header{
        border: 1px solid red;
        height: 50px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: gainsboro;
    }
    .content2__right_user_box{
        display: flex;
        cursor: pointer;
        /*  */
    }
    .content2__right_icon_box{
        margin-right: 1.5rem;
        cursor: pointer;
    }
    .content2__right_user_box__avatar{
        border: 1px solid #000;
        height: 45px;
        width: 45px;
        border-radius: 50%;
        object-fit: cover;
    }
    .content2__right_body{
        border: 1px solid rebeccapurple;
        height: 85.5%;
        padding-top: 2rem;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-bottom: 2rem;
        overflow: auto;
    }
    .content2__right_body_msg_right{
        width:50%;
        border:1px dashed dodgerblue;
        flex-wrap: wrap;
        border-radius: 5px;
        background: gainsboro;
        padding:1rem 1rem 1rem 1rem ;/*TRBL*/
    }
    .content2__right_body_msg_left{
        width:50%;
        border:1px dashed dodgerblue;
        flex-wrap: wrap;
        border-radius: 5px;
        padding:1rem 1rem 1rem 1rem ;/*TRBL*/
        background-color: rgb(255, 255, 201);
        /* background-color: rgb(238, 238, 201); */
    }
    .content2__right_body_correspondant{
        border: 1px solid red;
        display: flex;
        justify-content: start;
        padding: 1rem 1rem;
    }
    .content2__right_body_owner{
        border: 1px solid yellowgreen;
        display: flex;
        justify-content: flex-end;
        padding: 1rem 1rem;
    }
    .content2__right_footer{
        border: 1px solid dodgerblue;
        height: 50px;
        background-color: gainsboro;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .content2__right_footer_left{
        /* border: 1px solid red;  */
        display: flex;
    }
    .bt_icon{
        margin: 1rem 1rem;
        cursor: pointer;
    }
    .content2__right_footer_middle{
        /* border: 1px solid rebeccapurple; */
        width: 100%;
    }
    .content2__right_footer_middle_input{
        width: 100%;
        padding: 0.5rem;
        border-radius: 5px;
    }
    .content2__right_footer_right{
        /* border: 1px solid green; */
    }
    /************************STYLES-IN-MODAL************************/
    .call__box{
        display:flex;
        flex-direction:column;
        align-items:center;
        gap:3rem;
    }
    .call__box_img{
        border:1px solid #2f3640;
        height:100px;
        width:100px;
        border-radius:50%;
    }
    .call__box_btn{
        /* border:1px solid red; */
    }
    /************************STYLES-IN-MODAL************************/
    /*-----------------------ATTACH-BTN-BEGIN-----------------------*/
    .attach_btn{
        border:1px solid red;
        display:flex;
        flex-direction:column;
        gap:1rem;
        position:absolute;
        bottom:6rem;
        left:0rem;
        visibility:hidden;
    }
    .show_attach_btn{
        visibility: visible;
    }
    .attach_btn__item{
        border:1px solid red;
        height:50px;
        width:50px;
        border-radius:50%;
        display:flex;
        justify-content:center;
        align-items:center;
        background-color:#fff;
        cursor:pointer;
        background-color: #dddddd;
        overflow: hidden;

        
    }
    .attach_btn__item_msg{
        border:1px solid #dd3333;
        height:1.5rem;
        width:5rem;
        position:absolute;
        left:4rem;
        border-radius:10rem;
        text-align:center;
        background-color:#fff;
        /* display: none; */
        visibility:hidden;
    }
    .attach_btn__item:hover .attach_btn__item_msg {
            visibility: visible;
            /* background-color: green; */
    }
    @keyframes load {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
    .one{
        
         /*
         background: red;
        -webkit-animation: load 5s infinite;
        animation: load 5s infinite; */

        animation:load;
        animation-duration: 3s;
        animation-iteration-count: 1;
    }
    .two{
       
        /* 
        background: green;
        -webkit-animation: load 5s infinite 1s;
        animation: load 5s infinite 1s; */

        animation:load;
        animation-duration: 6s;
        animation-iteration-count: 1;
    }
    .three{
        /* 
        background: yellow;
        -webkit-animation: load 5s infinite 2s;
        animation: load 5s infinite 2s; */
        animation:load;
        animation-duration: 9s;
        animation-iteration-count: 1;
    }
    /************************************************************************/
    input[type="file"],#one {
        display: none;
    }
    input[type="file"],#two {
        display: none;
    }
    /************************************************************************/

    /*-----------------------ATTACH-BTN-END---------------------------------*/
    /************************************************************************/
    .image_preview_box{
        z-index:2;
        border:1px solid red;
        height: 70%;
        width:50%;
        position:fixed;
        top:50%;
        left:50%;
        bottom:0;
        right:0;
        transform:translate(-15%,-50%);
        background-color:#dedede;
        border-radius:5px;
        display:flex;
        justify-content:center;
        align-items:center;
        display:none;
    }
    .image_preview_box__see_image{
        display: block;
    }
    /************************************************************************/
    .badge_red{
        border-radius: 5px;
        background-color: #dd3333;
        color: white;
    }
    .badge_white{
        border-radius: 5px;
        background-color: #2f3640;
        color: #fff;
    }
    .badge_red_view{
        border:1px solid #dd3333;
        background-color: #dd3333;
        color: white;
        padding:1px 15px;
        border-radius:5px
    }
    .badge_white_view{
        border:1px solid #2f3640;
        background-color: #2f3640;
        color: #fff;
        padding:1px 15px;
        border-radius:5px
    }
    /***********************Media Queries***********************/
    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) { 
        .sidebar{
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: var(--secondary-color);
            transition: all 0.5s ease;
        } 
        .navbar{
            color: #fff;
            background:linear-gradient(orangered,gray,firebrick);
        }
        body.actives .wrapper .sidebar{
            margin-left: 250px;
            z-index: 10;
        }
        body.actives .wrapper .section{
            margin-left: 0px;
            width: 100%;
        }
        .content2__left_body_inner{
            margin-bottom: 5rem;
        }
    }
    /* Small devices (landscape phones, 576px and up)*/
    @media (min-width: 576px) and (max-width: 767.98px) { 
        /**Faire disparaitre la sidebar ici**/
        /* .sidebar{
            display: none;
        } */
        .section{
            width: calc(100% -250px);
            margin-left: 0px;
            transition: all 0.5s ease;
        }
        .navbar{
            color: #fff;
            background:linear-gradient(#192a56,tomato,#3333dd);
        }
    }
    /* Medium devices (tablets, 768px and up)*/
    @media (min-width: 768px) and (max-width: 991.98px) { 
        /**Faire disparaitre la sidebar ici**/
        /* .sidebar{
            display: none;
        } */
        .section{
            width: calc(100% -250px);
            margin-left: 0px;
            transition: all 0.5s ease;
        }
        .navbar{
            color: #fff;
            background:linear-gradient(dodgerblue,turquoise,#3333dd);
        }
    }
    /* Large devices (desktops, 992px and up)*/
    @media (min-width: 992px) and (max-width: 1199.98px) {  
        /**Faire disparaitre la sidebar ici**/
        /* .sidebar{
            display: none;
        } */
        
        .section{
            width: calc(100% -250px);
            margin-left: 0px;
            transition: all 0.5s ease;
        }
        .navbar{
            color: #fff;
            background:linear-gradient(rebeccapurple,gold,#3333dd);
        }
        
    }
    /* Extra large devices (large desktops, 1200px and up)*/
    @media (min-width: 1200px) { 
        
        .navbar{
            color: #fff;
            background:linear-gradient(rebeccapurple,springgreen,#3333dd);
        }
    }
</style>
