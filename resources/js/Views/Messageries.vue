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
                                <div class="user_box" v-for="item in departementFriends" :key="item.id" @click="messageToUser(item.id,item.nom,item.prenom,item.nom_departement,item.photo)">
                                    <div class="user_box_img">
                                        <!-- <img class="user_box__avatar" :src="'../profile/chats_img/avatar-13.png'" alt="" srcset=""> -->
                                        <img v-if="item.photo === null || item.photo === undefined" class="user_box__avatar" :src="'../profile/img/user.png'" alt="" srcset="">
                                        <img v-else class="user_box__avatar" :src="'../img_path/Staff/'+item.photo" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">{{item.nom}} {{item.prenom}}</p>
                                        <p class="user_box__info_department">{{item.nom_departement}}</p>
                                    </div>
                                </div>
                                
                                <!-- <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-2.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">FATOUNDJI Laleye</p>
                                        <p class="user_box__info_department">Commercial</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-3.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">AGBEKE Laleye</p>
                                        <p class="user_box__info_department">Resource Humaines</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-4.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TITLAYO Laleye</p>
                                        <p class="user_box__info_department">Service Achat</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-5.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">OGUN Laleye</p>
                                        <p class="user_box__info_department">Banque & Finance</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-6.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <span class="user_box__info_name">ABIKE Laleye</span>
                                        <span class="user_box__info_department">Logistique Operation</span>
                                    </div>
                                </div>
                               
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-7.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ANJOLA Laleye</p>
                                        <p class="user_box__info_department">Control de Gestion</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-8.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">MODUKPE Laleye</p>
                                        <p class="user_box__info_department">Achat et ventes</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-9.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">KEGNIDE Laleye</p>
                                        <p class="user_box__info_department">Sciences Culturelles</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-10.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TOUNDE Laleye</p>
                                        <p class="user_box__info_department">Science</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-11.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">DAMILOLA Laleye</p>
                                        <p class="user_box__info_department">Droit Juridique</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-12.png'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">OLUWASEUN Laleye</p>
                                        <p class="user_box__info_department">Droit commercial</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-1.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ISHEGOU Laleye</p>
                                        <p class="user_box__info_department">Finance</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-14.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">BALOGUN Laleye</p>
                                        <p class="user_box__info_department">Commercial</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-15.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <span class="user_box__info_name">ADEDAYO Laleye</span>
                                        <span class="user_box__info_department">Resource Humaines</span>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-16.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ADEBOLA Laleye</p>
                                        <p class="user_box__info_department">Service Achat</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-17.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ADEBISSI Laleye</p>
                                        <p class="user_box__info_department">Banque & Finance</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-18.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">FELA Laleye</p>
                                        <p class="user_box__info_department">Logistique Operation</p>
                                    </div>
                                </div>
                               
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-19.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TEMITOKPE Laleye</p>
                                        <p class="user_box__info_department">Control de Gestion</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-20.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">TIWATOKPE Laleye</p>
                                        <p class="user_box__info_department">Achat et ventes</p>
                                    </div>
                                </div>
                              
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-21.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ORI Laleye</p>
                                        <p class="user_box__info_department">Sciences Culturelles</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-22.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ODJO Laleye</p>
                                        <p class="user_box__info_department">Science</p>
                                    </div>
                                </div>
                               
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-23.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">FOLASHADE Laleye</p>
                                        <p class="user_box__info_department">Droit Juridique</p>
                                    </div>
                                </div>
                                
                                <div class="user_box">
                                    <div class="user_box_img">
                                        <img class="user_box__avatar" :src="'../profile/chats_img/avatar-24.jpg'" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p class="user_box__info_name">ASAKE Laleye</p>
                                        <p class="user_box__info_department">Droit commercial</p>
                                    </div>
                                </div> -->
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
                                        <!--<img class="content2__right_user_box__avatar" :src="'../profile/chats_img/avatar-13.png'" alt="" srcset="">-->
                                        <img v-if="selectedUser.photo === null || selectedUser.photo === undefined" class="content2__right_user_box__avatar" :src="'../profile/img/user.png'" alt="" srcset="">
                                        <img v-else class="content2__right_user_box__avatar" :src="'../img_path/Staff/'+selectedUser.photo" alt="" srcset="">
                                    </div>
                                    <div class="user_box__info">
                                        <p>{{selectedUser.nom}} {{selectedUser.prenom}}</p>
                                        <p>{{selectedUser.departement}}</p>
                                    </div>
                            </div>
                            <div class="content2__right_icon_box">
                                <i class="fas fa-phone" @click="makeCall"></i>
                            </div>
                        </div>
                        <!-- body -->
                        <div class="content2__right_body" style="position:relative;left:0" v-chat-scroll> 
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
                            
                                <div class="container" v-for="item in conversationMessages" :key="item.id" :class="{'darker':item.sender_id == authUserId}" >
                                    <img src="/w3images/bandmember.jpg" alt="Avatar" :class="{'right':item.sender_id == authUserId}">
                                    <p>{{item.message}}</p>
                                    <span class="time-right" :class="{'time-left':item.sender_id == authUserId}">{{item.created_at}}</span>
                                </div>

                                <!-- <div class="container darker">
                                    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right">
                                    <p>Hey! I'm fine. Thanks for asking!</p>
                                    <span class="time-left">11:01</span>
                                </div> -->

                                <!-- <div class="container">
                                    <img src="/w3images/bandmember.jpg" alt="Avatar">
                                    <p>Sweet! So, what do you wanna do today?</p>
                                    <span class="time-right">11:02</span>
                                </div>

                                <div class="container darker">
                                    <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right">
                                    <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                                    <span class="time-left">11:05</span>
                                </div> --> 
                                
                            <!-- <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Hello
                                </p>
                            </div>
                            <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    bonjour,j'espere que vous aller bien,                                    
                                </p>
                            </div> -->
                            <!-- <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Il vis à jamais
                                </p>
                            </div> -->
                            <!-- <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    non, plutot à djamé                                    
                                </p>
                            </div> -->
                            <!-- <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Les leviatans viennent tous des levitiques,
                                    sa a été ecrit dans le livre des damnés
                                </p>
                            </div> -->
                            <!-- <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    Ce livre a longtemps appartenu aux franck enstein                                   
                                </p>
                            </div> -->
                            <!-- <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    c'est exact, mais depuis un bon bout de temps,
                                    elle a été derobé de leur main et est protégé
                                    actuellement par un sort si puissant qu'on ne 
                                    la detecte plus
                                </p>
                            </div> -->
                            <!-- <div class="content2__right_body_owner">
                                <p class="content2__right_body_msg_left">
                                    mais, il y a toujours une solution à tout problème                                   
                                </p>
                            </div> -->
                            <!-- <div class="content2__right_body_correspondant">
                                <p class="content2__right_body_msg_right">
                                    Oui, en effet, Mme rowina a prévu nous trouvé 
                                    la solution grace au livre des damnés et de l'aide
                                    de ses semblables.
                                </p>
                            </div> -->
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
                            
                                <EmojiPicker :native="true" theme='dark' pickerType='input' @update:text="onChangeText"  :static-texts="{ placeholder: 'Search emoji'}" @select="onSelectEmoji" />
                                <!--<input type="text" class="content2__right_footer_middle_input" v-model="chat.message" placeholder="type a message">-->
                            </div>
                            <div class="content2__right_footer_right">
                                <i class="fas fa-paper-plane bt_icon" @click="sendMessage"></i>
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
    import {useAuthStore} from "../store/index"
    const {id} = useAuthStore();
    /**********************************************************************/
    // import picker compopnent
    import EmojiPicker from 'vue3-emoji-picker'
    // import css
    import 'vue3-emoji-picker/css';

    export default {
        name:'Messageries',
        components:{
            ContentHeader,vTable,ProperModal,
            loader,Sidebar,Navbar,TextareaEmojiPicker,EmojiPicker
        },
        data(){
            
            return{
                
                authUserId:id,
                departementFriends:[],
                conversationMessages:[],
                
                errors:[],
 
                chat:{
                    sender_id:'',
                    sent_to_id:'',
                    name:'',
                    message:'',
                },
                selectedUser:{
                    nom:'',
                    prenom:'',
                    departement:'',
                    photo:'',
                },

                isModalVisible:false,
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
            onChangeText(text) { 
                /* do something */ 
                console.log("Valeur du text saisi :",text)
                this.chat.message = text;
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
            },
            //
            getDepartementUsers(){
                axiosClient.get("api/getDepartementFriends").then((res)=>{
                    let content = res.data.departementFriends;
                    this.departementFriends = content
                    //console.log("valeur de res dans departementFriends:",content)
                })
            },
            sendMessage(){
                /* alert("going to send the message : "+this.chat.message);
                console.log("Valeur de message:",this.chat.message) */
                axiosClient.post(`api/sendMessage`,this.chat).then((res)=>{
                    console.log("Valeur de res dans sendMessage : ",res)
                    if(res.data.status){
                        //alert("message envoyé avec succes !!!")
                        this.getConversationMessage();
                        this.chat.message="";
                    }
                }).catch((err)=>{
                    console.log("Erreur de l'envoi du message !!!")
                })
            },
            messageToUser(s_id,s_nom,s_prenom,s_departement,s_photo){
                //alert("s_id : "+s_id+"\n s_nom : "+s_nom+"\n s_prenom : "+s_prenom+"\n s_departement : "+s_departement+"\n s_photo : "+s_photo);
                this.selectedUser.nom           = s_nom;
                this.selectedUser.prenom        = s_prenom;
                this.selectedUser.photo         = s_photo;
                this.selectedUser.departement   = s_departement;
                this.chat.sent_to_id            = s_id;
                this.getConversationMessage();
            },
            getConversationMessage(){
                axiosClient.get("api/fetchConversationMessages",{params:this.chat}).then((res)=>{
                    let content = res.data.messages;
                    this.conversationMessages = content;
                    console.log("Valeur de res dans getConversationMessage:",content)
                    //console.log("Valeur de res.data dans getDomaines:",res.data)
                }).catch((err)=>{
                    console.log("Valeur de err dans getConversationMessage:",err)
                })
            },
        },


        created(){
            /*****************************/
            this.getDepartementUsers();
            //this.getConversationMessage();
            /*****************************/
            window.Echo.channel('chat').
                    listen('MessageSent',(event)=>{
                        this.conversationMessages.push(event.message)
                    console.log("Valeur de event Echo.join : ",event)
            })
        },
        onMounted(){
            //this.getDepartementUsers();
            //this.getConversationMessage();
        }
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
        /* border: 1px solid red; */
    }
    .user_box__info_name{
        /* border:1px solid orange; */
        font-weight:bold
    }
    .user_box__info_department{
        /* border:1px solid green; */
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
        /* border:1px solid crimson; */
        flex-grow: 1;
        position: fixed;
        width:83.6% ;
      /*   width: 83.7%; */
        height: 92.5%;
        /* border-bottom: 2px dotted rebeccapurple; */
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
        /* border: 1px solid red; */
        border-bottom: 2px solid #2f3640;
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
        display: flex;
        justify-content: center;
    }
    .content2__right_user_box__avatar{
        /* border: 1px solid #000; */
        height: 45px;
        width: 45px;
        border-radius: 50%;
        object-fit: cover;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .content2__right_body{
        /* border: 1px solid rebeccapurple; */
        height: 85.5%;
        width: 100%;
        padding-top: 2rem;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-bottom: 2rem;
        overflow: auto;
       
    }
    .content2__right_body_msg_right{
        width:50%;
        /* border:1px dashed dodgerblue; */
        flex-wrap: wrap;
        border-radius: 5px;
        background: gainsboro;
        padding:1rem 1rem 1rem 1rem ;/*TRBL*/
    }
    .content2__right_body_msg_left{
        width:50%;
        /* border:1px dashed dodgerblue; */
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
        width: 100%;
    }
    .content2__right_body_owner{
        /* border: 1px solid yellowgreen; */
        display: flex;
        justify-content: flex-end;
        padding: 1rem 1rem;
        width: 100%;
    }
    .content2__right_footer{
        /* border: 1px solid dodgerblue; */
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
        display: flex;
        flex-direction: row;
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
        /* border:1px solid red; */
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
    /***********************************************************/
     /* Chat containers */
            .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            }

            /* Darker chat container */
            .darker {
            border-color: #ccc;
            background-color: rgb(255, 255, 201);
            }

            /* Clear floats */
            .container::after {
            content: "";
            clear: both;
            display: table;
            }

            /* Style images */
            .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
            }

            /* Style the right image */
            .container img.right {
            float: right;
            margin-left: 20px;
            margin-right:0;
            }

            /* Style time text */
            .time-right {
            float: right;
            color: #aaa;
            }

            /* Style time text */
            .time-left {
            float: left;
            color: #999;
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
        /* .navbar{
            color: #fff;
            background:linear-gradient(orangered,gray,firebrick);
        } */
        body.actives .wrapper .sidebar{
            margin-left: 0px;
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
        /* .navbar{
            color: #fff;
            background:linear-gradient(#192a56,tomato,#3333dd);
        } */
        body.actives .wrapper .sidebar{
            margin-left: 0px;
            z-index: 10;
        }
        body.actives .wrapper .section{
            margin-left: 0px;
            width: 100%;
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
        /* .navbar{
            color: #fff;
            background:linear-gradient(dodgerblue,turquoise,#3333dd);
        } */
        body.actives .wrapper .sidebar{
            margin-left: 0px;
            z-index: 10;
        }
        body.actives .wrapper .section{
            margin-left: 0px;
            width: 100%;
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
        /* .navbar{
            color: #fff;
            background:linear-gradient(rebeccapurple,gold,#3333dd);
        } */
         body.actives .wrapper .sidebar{
            margin-left: 0px;
            z-index: 10;
        }
        body.actives .wrapper .section{
            margin-left: 0px;
            width: 100%;
        }
        
    }
    /* Extra large devices (large desktops, 1200px and up)*/
    @media (min-width: 1200px) { 
        
        /* .navbar{
            color: #fff;
            background:linear-gradient(rebeccapurple,springgreen,#3333dd);
        } */
    }
</style>
