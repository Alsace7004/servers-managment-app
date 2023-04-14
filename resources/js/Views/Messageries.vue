<template>
  <!-- Begin -->
  <div class="wrapper">
    <!-- The Sidebar -->
    <Sidebar />
    <!-- The Section -->
    <div class="section">
      <!-- The navbar -->
      <Navbar />
      <!-- The Content -->
      <div class="content2">
        <div class="chat_box">
          <div class="chat_container">
            <!-- content2-left-side -->
            <div class="content2__left">
              <!-- header -->
              <div class="content2__left_header">Utilisateurs</div>
              <!-- body -->
              <div class="content2__left_body">
                <div class="content2__left_body_inner">
                  <!-- The beginning -->
                  <div
                    class="user_box"
                    v-for="item in departementFriends"
                    :key="item.id"
                    :data-id="item.id"
                    @click="
                      messageToUser(
                        item.id,
                        item.nom,
                        item.prenom,
                        item.nom_departement,
                        item.photo
                      );
                      activeMe(item.id);
                    "
                  >
                    <div class="user_box_img">
                      <!-- <img class="user_box__avatar" :src="'../profile/chats_img/avatar-13.png'" alt="" srcset=""> -->
                      <img
                        v-if="item.photo === null || item.photo === undefined"
                        class="user_box__avatar"
                        :src="'../profile/img/user.png'"
                        alt=""
                        srcset=""
                      />
                      <img
                        v-else
                        class="user_box__avatar"
                        :src="'../img_path/Staff/' + item.photo"
                        alt=""
                        srcset=""
                      />
                    </div>

                    <div class="user_box__info">
                      <p class="user_box__info_name">
                        {{ item.nom }} {{ item.prenom }}
                      </p>

                      <p class="user_box__info_department">
                        {{ item.nom_departement }}
                      </p>
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
            <!-- /content2-left-side -->

            <!-- content2-right-side -->
            <div class="content2__right">
              <!-- header -->
              <div class="content2__right_header chat_mod dnone">
                <div class="content2__right_user_box">
                  <div class="info_user_header">
                    <!--<img class="content2__right_user_box__avatar" :src="'../profile/chats_img/avatar-13.png'" alt="" srcset="">-->
                    <img
                      v-if="
                        selectedUser.photo === null ||
                        selectedUser.photo === undefined
                      "
                      class="content2__right_user_box__avatar"
                      :src="'../profile/img/user.png'"
                      alt=""
                      srcset=""
                    />
                    <img
                      v-else
                      class="content2__right_user_box__avatar"
                      :src="'../img_path/Staff/' + selectedUser.photo"
                      alt=""
                      srcset=""
                    />
                  </div>
                  <div class="user_box__info">
                    <p>{{ selectedUser.nom }} {{ selectedUser.prenom }}</p>
                    <p>{{ selectedUser.departement }}</p>
                  </div>
                </div>
                <div class="content2__right_icon_box">
                  <div>
                    <i class="icofont-phone" @click="makeCall"></i>
                  </div>

                  <!-- <div @click="makeCall">
                    <i class="icofont-ui-video-chat"></i>
                  </div> -->
                </div>
              </div>

              <!-- body -->
              <div class="content2__right_body chat_mod dnone" v-chat-scroll>
                <div class="loadMessage" id="loadTheMessage">
                  <loader />
                </div>
                <!-- audio file record begin -->
                <div class="audio_preview_box dnone">
                  <!-- header -->
                  <div class="audio_preview_box_header">
                    <div @click="closeAudioPreview">
                      <i class="fas fa-times image_preview_close_btn"></i>
                    </div>
                  </div>
                  <!-- body -->
                  <div class="audio_preview_box_body">
                    <div class="record_control_btn">
                        <div class="record_play_btn" @click="startRecordingAudio">
                          <i class="icofont-ui-play"></i>
                        </div>
                        <div class="record_stop_btn" @click="stopRecordingAudio">
                          <i class="icofont-ui-play-stop"></i>
                        </div>
                    </div>
                    <div class="recorded_data dnone">
                      <audio id="audio" controls src="" style="border-radius:5px"></audio>
                      <div class="record_stop_btn">
                          <i class="icofont-trash"></i>
                      </div>
                      <div class="record_stop_btn">
                          <i class="icofont-paper-plane"></i>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- audio file record end -->
                <!-- file upload modal begin-->
                <div class="image_preview_box modal-preview-image dnone">
                  <!-- header -->
                  <div class="image_preview_box_header">
                    <div @click="closeImagePreview">
                      <i class="fas fa-times image_preview_close_btn"></i>
                    </div>
                  </div>
                  <!-- body -->
                  <div class="modal-body-box zoom-modal">
                    <div class="image_preview_box_body">
                      <img
                        class="image_preview_box_body_img"
                        v-if="staffImg.img"
                        :src="staffImg.img"
                      />
                    </div>
                  </div>
                  <!-- end -->
                </div>
                <!-- file upload modal end -->
                <!-- begin -->
                <div class="all_message_box">
                  <div class="container dnone">
                    <div>Accun message</div>
                  </div>
                  <div
                    class="container animate-left"
                    v-for="(item, i) in conversationMessages"
                    :key="item.id"
                    :class="{
                      'darker animate-right': item.sender_id == authUserId,
                    }"
                  >
                    <div
                      v-if="
                        i === conversationMessages.length - 1 ||
                        conversationMessages.length === 0
                          ? loadOff()
                          : null
                      "
                    ></div>
                    <div class="text_message">
                      <div>
                        <p>{{ item.message }}</p>
                      </div>
                      <div class="time-right-container">
                        <span
                          class="time-right"
                          :class="{ 'time-left': item.sender_id == authUserId }"
                          >{{ item.created_at }}</span
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- footer -->
              <div class="content2__right_footer chat_mod dnone">
                <div class="attach_btn mode-file dnone animate-bottom">
                  <!--  -->
                  <div class="opt">
                    <input
                      class="dnone"
                      type="file"
                      accept="image/*"
                      @change="selectImage"
                      id="two"
                      required
                    />
                    <label class="attach_btn__item two" for="two">
                      <i class="icofont-image"></i>
                    </label>
                    <div class="attach_btn__item_msg" style="">Fichiers</div>
                    <!--  -->
                  </div>

                  <div class="opt">
                    <input
                      class="dnone"
                      type="file"
                      accept="application/pdf"
                      id="three"
                      required
                    />
                    <label class="attach_btn__item one" for="three">
                      <i class="icofont-clip"></i>
                    </label>
                    <div class="attach_btn__item_msg" style="">Images</div>
                    <!--  -->
                  </div>
                </div>

                <div class="content2__right_footer_left">
                  <div @click="hiddenThefilesOption()">
                    <i class="icofont-clip bt_icon" @click="attach_btn"></i>
                  </div>
                </div>

                <div class="content2__right_footer_middle">
                  <EmojiPicker
                    id="kpe"
                    class="message_content"
                    :native="true"
                    theme="dark"
                    pickerType="textarea"
                    v-model="chat.message"
                    @update:text="onChangeText"
                    :static-texts="{ placeholder: 'Search emoji' }"
                    @select="onSelectEmoji"
                  />
                  <!--<input type="text" class="content2__right_footer_middle_input" v-model="chat.message" placeholder="type a message">-->
                </div>

                <div class="content2__right_footer_right">
                  <div>
                    <i
                      class="icofont-paper-plane bt_icon"
                      @click="sendMessage"
                    ></i>
                  </div>
                  <div @click="startRecording">
                    <i class="icofont-mic bt_icon" id="microPhone"></i>
                  </div>
                </div>
              </div>
              <!-- footer end -->
            </div>
            <!-- /content2-right-side -->
          </div>
        </div>
      </div>
      <!-- End -->
    </div>
  </div>
  <!-- End -->

  <!----------------------------------------MAKE-CALL-WITH-AGORA-MODAL-BEGIN------------------------------------------------->
  <div class="call__box dnone modebox animate-top" id="call_box_agora">
    <div class="close_call_close">
      <button class="btn-close">
        <i class="icofont-close" data-modal="app" @click="closeAllModal"></i>
      </button>
    </div>
    <div class="call_box_container zoom">
      <div id="me"></div>
      <div class="avatar_call_box">
        <img
          class="call__box_img"
          style=""
          :src="'../profile/chats_img/avatar-24.jpg'"
          alt=""
          srcset=""
        />
      </div>

      <div class="call__box_btn">
        <div>
          <button @click="leave()" class="btn-call-danger">
            <i class="fas fa-phone-slash"></i>
          </button>
          <button class="btn-call-secondary" id="ss" @click="ToggleMicrophone">
           
            <i :class="[collapsed ? 'fa-microphone-alt' : 'fa-microphone-slash', 'fa']"></i>
          </button>
        </div>
      </div>

    </div>
  </div>
  <!----------------------------------------MAKE-CALL-WITH-AGORA-MODAL-END------------------------------------------------->
</template>

<script>
import Sidebar from "../components/Sidebar.vue";
import Navbar from "../components/Navbar.vue";
import ContentHeader from "../components/ContentHeader.vue";
import vTable from "../components/vTable/vTable.vue";
import ProperModal from "../components/ProperModal.vue";
import loader from "../components/loader3.vue";
import axiosClient from "../axios/index";

import TextareaEmojiPicker from "../components/TextareaEmojiPicker.vue";
import { useAuthStore } from "../store/index";
const { id } = useAuthStore();
/**********************************************************************/
// import picker compopnent
import EmojiPicker from "vue3-emoji-picker";
// import css
import "vue3-emoji-picker/css";
/**********************************************************************/
 import AgoraRTC from "agora-rtc-sdk-ng";
/**********************************************************************/
export default {
  name: "Messageries",
  components: {
    ContentHeader,
    vTable,
    ProperModal,
    loader,
    Sidebar,
    Navbar,
    TextareaEmojiPicker,
    EmojiPicker,
  },
  props: {
    //text:''
  },
  data() {
    return {
      authUserId: id,
      departementFriends: [],
      conversationMessages: [],

      errors: [],
      calls:[],
      chat: {
        sender_id: "",
        sent_to_id: "",
        name: "",
        message: "",
      },
      selectedUser: {
        nom: "",
        prenom: "",
        departement: "",
        photo: "",
      },

      isModalVisible: false,
      edit_id: "",
      is_Editing: false,
      loading: false,
      /*---------------------------*/
      staff: {
        photo: "",
      },
      staffImg: {
        img: "",
      },
      /*---------------------------*/
      text: "",
      collapsed: true,
      kpe:33,
      /***************AGORA-BEGIN*******************/
      options: {
        // Pass your App ID here.
        appId: "69678cdcbda5431e9c38fdd0a6086ec9",
        // Set the channel name.
        channel: "chat",
        // Pass your temp token here.
        token: null,
        // Set the user ID.
        uid: Math.floor(Math.random() * 2032),
      },
      channelParameters: {
        localVideoTrack: null,
        // A variable to hold a local audio track.
        localAudioTrack: null,
        // A variable to hold a remote audio track.
        remoteAudioTrack: null,
        // A variable to hold the remote user id.
        remoteUid: "",
      },
      rtc: {
        client: null,
        localAudioTrack: null,
        localVideoTrack: null,
      },
      /***************AGORA-END*********************/
    };
  },
  methods: {
    showModal() {
      this.errors = [];
      this.outil = {
        name: "",
        username: "",
        password: "",
        url: "",
        type_outil_id: "",
      };
      $("#create_domaine").modal("show");
    },
    editOutil(id) {
      this.errors = [];
      axiosClient.get(`api/outils/${id}`).then((res) => {
        $("#edit_domaine").modal("show");
        console.log("valeur de res dans edit outil:", res);
        this.edit_id = res.data[0].id;
        this.outil.name = res.data[0].outils_name;
        this.outil.username = res.data[0].username;
        this.outil.password = res.data[0].password;
        this.outil.url = res.data[0].url;
        this.outil.type_outil_id = res.data[0].type_outil_id;
        this.is_Editing = true;
      });
    },
    viewOutil(id) {
      this.errors = [];
      axiosClient.get(`api/outils/${id}`).then((res) => {
        $("#view_server").modal("show");
        console.log("valeur de res dans view outil:", res);
        //this.edit_id    = res.data.id;
        this.outil.name = res.data[0].outils_name;
        this.outil.username = res.data[0].username;
        this.outil.password = res.data[0].password;
        this.outil.url = res.data[0].url;
        this.outil.type_outil_id = res.data[0].type_outils_name;
        this.outil.created_at = res.data[0].created_at;
        //this.is_Editing = true;
      });
    },
    /**********************Make-a-call-begin***************************/
    makeCall() {
      document.getElementById("call_box_agora").classList.remove("dnone");
      /* alert("going to make a call"); */
      console.log("Nous allons commencé l'appel par ici pour voir :");
      alert(`Moi : ${this.authUserId} je veux appeler : ${this.chat.sent_to_id}`)
      axiosClient.post(`api/callThisUser/${this.chat.sent_to_id}`).then((res)=>{
        console.log("Valeur de res from callThisUser : ",res)
        //this.toggleCallEvent();
         window.Echo.channel(`callingStaff.${this.chat.sent_to_id}`).listen('CallingUserEvent', (e) => {
                alert("Je suis sensé prevenir le correspondant de l'appel en cours")
                console.log("valeur de e from CallingUserEvent broadcast: ",e)
        });
      }).catch((err)=>{
        console.log("Valeur de err dans makeCall : ",err)
      })
      // Create an instance of the Agora Engine
      //const agoraEngine = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
      console.log("Begin joinning here...");
      /* this.join().then(() => {
        this.startVideo();
        this.startAudio();
        this.rtc.client.on("user-published", async (user, mediaType) => {
          // Subscribe to the remote user when the SDK triggers the "user-published" event.
          await this.rtc.client.subscribe(user, mediaType);
          console.log("subscribe success");
          // Subscribe and play the remote audio track.
          if (mediaType == "audio") {
            const remoteAudioTrack = user.audioTrack;
            remoteAudioTrack.play();
          }
        });
      }); */
      console.log("Here is the end of Agora calling");
    },
    async join() {
      this.rtc.client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });
      await this.rtc.client.join(
        this.options.appId,
        this.options.channel,
        this.options.token,
        this.options.uid
      );
    },
    async startVideo() {
      this.rtc.localVideoTrack = await AgoraRTC.createCameraVideoTrack();
      this.rtc.client.publish(this.rtc.localVideoTrack);
      console.log("Video Publish success!");
      this.rtc.localVideoTrack.play("me");
    },
    async startAudio() {
      this.rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
      this.rtc.client.publish(this.rtc.localAudioTrack);
      console.log("Audio Publish success!");
      alert("Audio ouvert")
    },
    stopAudio() {
      this.rtc.localAudioTrack.close();
      this.rtc.client.unpublish(this.rtc.localAudioTrack);
      alert("Audio fermer")
    },
    stopVideo() {
      this.rtc.localVideoTrack.close();
      this.rtc.client.unpublish(this.rtc.localVideoTrack);
    },
    async leave() {
      alert("am going to leave this audio trak");
      this.stopAudio();
      this.stopVideo();
      this.rtc.client.leave();
      //$("#edit_domaine").modal("hide");
      document.getElementById('call_box_agora').classList.add("dnone");
      alert("i left the channel")
      console.log("You left the channel");
      
    },
    //Toggle The Micro Phone
    ToggleMicrophone() {
      //this.collapsed =! this.collapsed
      if(!this.collapsed){
        //alert("ouvrir audio")
        this.collapsed = true
        this.startAudio()
      }else{
        //alert("fermer audio")
        this.collapsed = false
        this.stopAudio()
      }
    },

    /**********************Make-a-call-end***************************/
    attach_btn() {
      console.log("Hello");
      document.querySelector(".attach_btn").classList.toggle("show_attach_btn");
    },
    // event callback
    onSelectEmoji(emoji) {
      console.log(emoji);
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
      console.log("Valeur du text saisi :", text);
      this.chat.message = text;
    },
    //
    selectImage(e) {
      let file = e.target.files[0];
      // console.log("Valeur de file dans le chat:", file);
      document.querySelector(".modal-preview-image").classList.remove("dnone");
      document.querySelector(".mode-file").classList.toggle("dnone");
      this.staff.photo = file;
      this.staffImg.img = URL.createObjectURL(file);
    },
    //
    closeImagePreview() {
      document.querySelector(".modal-preview-image").classList.add("dnone");
    },
    //startRecording
    startRecording(){
      document.querySelector(".audio_preview_box").classList.remove("dnone");
    },
    //closeAudioBox
    closeAudioPreview() {
      document.querySelector(".audio_preview_box").classList.add("dnone");
      document.querySelector('#audio').src = "";
      document.querySelector(".recorded_data").classList.add("dnone")
      document.querySelector('.record_play_btn').classList.remove("disabled")
    },
    //startRecordingAudio
    async startRecordingAudio(){
      //alert("Begin recording audio")
      document.querySelector('.record_play_btn').classList.add("glowing-circle-1")
      document.querySelector('.record_play_btn').classList.add("disabled")
      
      let btnStop = document.querySelector('.record_stop_btn');
      let audio = document.querySelector('#audio');
      let stream = await navigator.mediaDevices.getUserMedia({audio: true, video: false});
      let mediaRecorder = new MediaRecorder(stream);
        mediaRecorder.start();
        let chunks = [];
        mediaRecorder.ondataavailable = (e)=>{
             chunks.push(e.data);
        }
        //function to catch error
        mediaRecorder.onerror = (e)=>{
             alert(e.error);
        }

        mediaRecorder.onstop = (e)=>{
            let blod = new Blob(chunks);
            //create url for audio
            let url = URL.createObjectURL(blod,{type:'audio/mpeg-3'});
            console.log("valeur de url:",url)
            //pass url into audio tag
            audio.src = url;
        }
        btnStop.addEventListener('click',()=>{
            mediaRecorder.stop();
            document.querySelector('.record_play_btn').classList.remove("glowing-circle-1")
            document.querySelector(".recorded_data").classList.remove("dnone")
            
        })
        
    },
    //stopRecordingAudio
    /* stopRecordingAudio(){
      alert("stop recording audio")
    }, */
    //
    getDepartementUsers() {
      axiosClient.get("api/getDepartementFriends").then((res) => {
        let content = res.data.departementFriends;
        this.departementFriends = content;
        //console.log("valeur de res dans departementFriends:",content)
      });
    },
    sendMessage() {
      /* alert("going to send the message : "+this.chat.message);
                console.log("Valeur de message:",this.chat.message) */
      axiosClient
        .post(`api/sendMessage`, this.chat)
        .then((res) => {
          console.log("Valeur de res dans sendMessage : ", res);
          if (res.data.status) {
            //alert("message envoyé avec succes !!!")
            this.getConversationMessage();
            this.chat.message = "";
            //this.text  = "";
            //this.$refs.text = null;
            //this.$refs.text.reset();
            //this.chat.message.target = "";
            this.onChangeText(this.chat.message);
          }
        })
        .catch((err) => {
          console.log("Erreur de l'envoi du message !!!", err);
        });
    },
    messageToUser(s_id, s_nom, s_prenom, s_departement, s_photo) {
      this.selectedUser.nom = s_nom;
      this.selectedUser.prenom = s_prenom;
      this.selectedUser.photo = s_photo;
      this.selectedUser.departement = s_departement;
      this.chat.sent_to_id = s_id;
      this.getConversationMessage();
    },
    activeMe(id) {
      var all_user = Array.from(document.querySelectorAll(".user_box"));
      var headBodyFooter = Array.from(document.querySelectorAll(".chat_mod"));
      for (var user of all_user) {
        user.classList.remove("active_chat");
      }
      for (var comp of headBodyFooter) {
        comp.classList.remove("dnone");
      }
      document.querySelector(`[data-id='${id}']`).classList.add("active_chat");
      this.loadOn();
    },
    getConversationMessage() {
      axiosClient
        .get("api/fetchConversationMessages", { params: this.chat })
        .then((res) => {
          let content = res.data.messages;
          this.conversationMessages = content;
          console.log("Valeur de res dans getConversationMessage:", content);
          //console.log("Valeur de res.data dans getDomaines:",res.data)
        })
        .catch((err) => {
          console.log("Valeur de err dans getConversationMessage:", err);
        });
    },
    hiddenThefilesOption() {
      document.querySelector(".mode-file").classList.toggle("dnone");
    },
    closeAllModal(e) {
      e.preventDefault();
      const allModal = Array.from(document.querySelectorAll(".modebox"));
      for (const modal of allModal) {
        modal.classList.add("dnone");
      }
      document.getElementById(e.target.dataset.modal).classList.remove("dnone");
      this.leave();
      this.calls = []
    },
    loadOff() {
      document.getElementById("loadTheMessage").classList.add("dnone");
    },
    loadOn() {
      document.getElementById("loadTheMessage").classList.remove("dnone");
    },
    toggleCallEvent(){
      window.Echo.channel(`staffCallNotification.${this.chat.sent_to_id}`).listen('CallUser', (e) => {
                alert("Normalement je suis appelé Apres le click de l'appel...")
                console.log("valeur de e from staffCall_notification broadcast: ",e)
                this.calls.push(e.staff)
      });
    }
  },

  created() {
    /*****************************/
    this.getDepartementUsers();
    //this.getConversationMessage();
    /*****************************/
    window.Echo.channel("chat").listen("MessageSent", (event) => {
      this.conversationMessages.push(event.message);
      console.log("Valeur de event Echo.channel : ", event);
    });
    //
     
  },
  mounted() {
    //
  },
};
</script>