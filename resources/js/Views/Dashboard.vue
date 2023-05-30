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
      <div class="content" style="z-index: 10">
        <div class="content_body">
          <!-- router-view-begin -->
          <ContentHeader message="Tableau de bord !!!" />
          <div>
            <div class="spin"></div>
          </div>
          <!--Am The Dashboard Components !!!-->
          <div class="card" style="">
            <!--The First part-->
            <div class="card_box" style="columns: 3 auto">
              <div v-if="$can('domaine-total')" class="single_card" style="">
                <span class="icon"><i class="fas fa-globe ico_size"></i></span>
                <p>
                  Total domaine:
                  <span style="font-weight: bold">{{ domaines }}</span>
                </p>
              </div>

              <div v-if="$can('domaine-expire')" class="single_card" style="">
                <span class="icon"><i class="fas fa-globe ico_size"></i></span>
                <p>
                  Total domaine s'expirant dans 1 semaine:
                  <span style="font-weight: bold">{{ expire_domaines }}</span>
                </p>
              </div>
              <div v-if="$can('serveur-total')" class="single_card" style="">
                <span class="icon"><i class="fas fa-server ico_size"></i></span>
                <p>
                  Total Serveur:
                  <span style="font-weight: bold">{{ servers }}</span>
                </p>
              </div>

              <div v-if="$can('serveur-expire')" class="single_card" style="">
                <span class="icon"><i class="fas fa-server ico_size"></i></span>
                <p>
                  Total serveur s'expirant dans 1 semaine:
                  <span style="font-weight: bold">{{ expire_servers }}</span>
                </p>
              </div>
              <div
                v-if="$can('departement-total-actif')"
                class="single_card"
                style=""
              >
                <span class="icon"
                  ><i class="fas fa-building ico_size"></i
                ></span>
                <p>
                  Total departement actif:
                  <span style="font-weight: bold">{{ departement_actif }}</span>
                </p>
              </div>

              <div
                v-if="$can('staff-total-actif')"
                class="single_card"
                style=""
              >
                <span class="icon"
                  ><i class="fas fa-user-alt ico_size"></i
                ></span>
                <p>
                  Total staff actif:
                  <span style="font-weight: bold">{{ staff_actif }}</span>
                </p>
              </div>
            </div>
            <!--The second part-->
            <div class="card_box" style="columns: 3 auto"></div>
            <!---->
            <hr style="width: 10px; margin-bottom: 1rem" />
            <!-- <div class="conteneur" style="border:1px solid red;columns:3 auto">
                                    <div v-if="$can('server-list')" style="border:1px solid rgba(0, 0, 0,  0.1);box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.20);border-radius:6px;padding:10px;display:block;width:390px;margin-bottom:1rem">1
                                        <span class="icon"><i class="fas fa-server ico_size"></i></span>
                                        <p>Total Serveur: <span style="font-weight:bold">{{servers}}</span> </p>
                                    </div>
                                    <div v-if="$can('server-list')" style="border:1px solid rgba(0, 0, 0,  0.1);box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.20);border-radius:6px;padding:10px;display:block;width:390px;margin-bottom:1rem">2
                                        <span class="icon"><i class="fas fa-server ico_size"></i></span>
                                        <p>Total serveur qui s'expirent dans 1 semaine: <span style="font-weight:bold">{{expire_servers}}</span></p>
                                    </div>
                                    <div v-if="$can('domaine-list')" style="border:1px solid rgba(0, 0, 0,  0.1);box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.20);border-radius:6px;padding:10px;display:block;width:390px;margin-bottom:1rem">3
                                        <span class="icon"><i class="fas fa-globe ico_size"></i></span>
                                        <p>Total domaine: <span style="font-weight:bold">{{domaines}}</span></p>
                                    </div>
                                    <div v-if="$can('domaine-list')" style="border:1px solid rgba(0, 0, 0,  0.1);box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.20);border-radius:6px;padding:10px;display:block;width:390px;margin-bottom:1rem">4
                                        <span class="icon"><i class="fas fa-globe ico_size"></i></span>
                                        <p>Total domaine qui s'expirent dans 1 semaine: <span style="font-weight:bold">{{expire_domaines}}</span></p>
                                    </div>
                                    <div v-if="$can('departement-list')" style="border:1px solid rgba(0, 0, 0,  0.1);box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.20);border-radius:6px;padding:10px;display:block;width:390px;margin-bottom:1rem">5
                                        <span class="icon"><i class="fas fa-building ico_size"></i></span>
                                        <p>Total departement actif: <span style="font-weight:bold">{{departement_actif}}</span></p>
                                    </div>
                                    <div v-if="$can('staff-list')" style="border:1px solid rgba(0, 0, 0,  0.1);box-shadow: 0px 0px 15px -4px rgba(0,0,0,0.20);border-radius:6px;padding:10px;display:block;width:390px;margin-bottom:1rem">5
                                        <span class="icon"><i class="fas fa-user-alt ico_size"></i></span>
                                        <p>Total staff actif: <span style="font-weight:bold">{{staff_actif}}</span></p>
                                    </div>
                                </div> -->

            <!-- <div style="border:1px solid red;display:flex;flex-wrap:wrap;">
                                    <div style="border:1px solid green;display-block:inline;width:33%;margin:1rem">1</div>
                                    <div style="border:1px solid green;display-block:inline;width:33%;margin:1rem">2</div>
                                    <div style="border:1px solid yellow;display-block:inline;width:33%;margin:1rem">3</div>
                                    <div style="border:1px solid green;display-block:inline;width:33%;margin:1rem">4</div>
                                    <div style="border:1px solid green;display-block:inline;width:33%;margin:1rem">5</div>
                                    <div style="border:1px solid yellow;display-block:inline;width:33%;margin:1rem">6</div>
                                    <div style="border:1px solid green;display-block:inline;width:33%;margin:1rem">7</div>
                                    <div style="border:1px solid yellow;display-block:inline;width:33%;margin:1rem">8</div>
                                </div> -->
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
import ContentHeader from "../components/ContentHeader.vue";
import { onMounted } from "vue";
import axiosClient from "../axios/index";
/* import {useAuthStore} from "../store/index"
    const userStore  = useAuthStore();
    console.log("From dashboard:",userStore.getUserRoleAndPermission()) */
export default {
  name: "",
  components: {
    Sidebar,
    Navbar,
    ContentHeader,
  },
  data() {
    return {
      servers: "0",
      expire_servers: "0",
      domaines: "0",
      expire_domaines: "0",
      departement_actif: "0",
      staff_actif: "0",
    };
  },
  methods: {
    getCountServers() {
      axiosClient
        .get("api/getCountServers")
        .then((res) => {
          let content = res.data;
          this.servers = content.servers;
          //console.log("Valeur de res dans getCountServers:",content)
        })
        .catch((err) => {
          console.log("Valeur de err dans getCountServers:", err);
        });
    },
    getCountDomaines() {
      axiosClient
        .get("api/getCountDomaines")
        .then((res) => {
          let content = res.data;
          this.domaines = content.domaines;
          //console.log("Valeur de res dans getCountDomaines:",content)
        })
        .catch((err) => {
          console.log("Valeur de err dans getCountDomaines:", err);
        });
    },
    getCountDepartements() {
      axiosClient
        .get("api/getCountDepartements")
        .then((res) => {
          let content = res.data;
          this.departement_actif = content.departements;
          //console.log("Valeur de res dans getCountDepartements:",content)
        })
        .catch((err) => {
          console.log("Valeur de err dans getCountDepartements:", err);
        });
    },
    getCountStaffs() {
      axiosClient
        .get("api/getCountStaffs")
        .then((res) => {
          let content = res.data;
          this.staff_actif = content.staffs;
          //console.log("Valeur de res dans getCountStaffs:",content)
        })
        .catch((err) => {
          console.log("Valeur de err dans getCountStaffs:", err);
        });
    },
    getExpireServer() {
      axiosClient
        .get("api/getExpireServer")
        .then((res) => {
          let content = res.data;
          this.expire_servers = content.servers;
          //console.log("Valeur de res dans getExpireServer:",content)
        })
        .catch((err) => {
          console.log("Valeur de err dans getExpireServer:", err);
        });
    },
    getExpireDomaines() {
      axiosClient
        .get("api/getExpireDomaines")
        .then((res) => {
          let content = res.data;
          this.expire_domaines = content.domaines;
          //console.log("Valeur de res dans getExpireDomaines:",content)
        })
        .catch((err) => {
          console.log("Valeur de err dans getExpireDomaines:", err);
        });
    },
  },
  created() {
    this.getCountStaffs();
    this.getCountServers();
    this.getCountDomaines();
    this.getCountDepartements();
    this.getExpireServer();
    this.getExpireDomaines();
  },
};
</script>

<style scoped>
.card_box {
  /* display:flex;
        justify-content:space-between;
        align-items:center; */
  /*  margin:30px 0px 10px 0px;/*TRBL*/
  /*  margin:30px 0px 10px 0px; */
  display: flex;
  flex-wrap: wrap;
}
.single_card {
  width: 30%;
  border: 1px solid rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 15px -4px rgba(0, 0, 0, 0.2);
  border-radius: 6px;
  padding: 10px;
  height: 100px;
  background-color: #fff;
  /*  height:100px;
            border-radius:5px;
        */
  margin: 1rem;
}
.ico_size {
  font-size: 40px;
}
/*Responsive design*/
@media only screen and (max-width: 680px) {
  .card_box {
    /* border: 1px solid red; */
    /* display: flex;
            flex-direction: column; */
    display: flex;
    flex-wrap: wrap;
  }
  .single_card {
    /* border: 1px solid green; */
    width: 100%;
    margin: 10px 0px 10px 0px; /*TRBL*/
  }
}
</style>
