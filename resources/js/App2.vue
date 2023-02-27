<template>
    <div>
        <!-- Begin -->
        <div class="wrapper">
            <!-- The Sidebar -->
            <div v-if="authenticated">
                <Sidebar/>
            </div>
                
            <!-- The Section -->
            <div class="section">
                <!-- The navbar -->
                <div v-if="authenticated">
                    <Navbar />
                </div>
                <!-- The Content -->
                <div class="content">
                    <div class="content_body">
                        <router-view/>
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
        <!-- End -->
    </div>
</template>

<script>
    import Sidebar from "./components/Sidebar.vue"
    import Navbar from "./components/Navbar.vue"
    
    //import { onMounted,ref } from "vue"
    //let authenticated = ref(false)
    /* onMounted(()=>{
        let token = localStorage.getItem("jwt");
        if(token != null){
            authenticated.value = true
            console.log("Valeur de authenticated.value if :",authenticated.value)
        }else{
            authenticated.value = false
            console.log("Valeur de authenticated.value else:",authenticated.value)
        }
    }) */
    export default{
        components:{
            Navbar,Sidebar
        },
        data(){
            return{
                authenticated:false,
                authUser: window.authUser
            }
        },
        methods:{

        },
        created(){
            console.log("valeur de this.authUser:",this.authUser);

            let token = localStorage.getItem("jwt");
            console.log("valeur de token:",token)
            if(token != null){
                this.authenticated = true
                console.log("Valeur de authenticated.value if :",this.authenticated)
            }else{
                this.authenticated = false
                console.log("Valeur de authenticated.value else:",this.authenticated)
            }
        },
        mounted(){

        },

        /* 
        23-02-2023
        Probleme de validation au niveau du nom de domaine (Resolut)
        Tache
        Affiché les domaines expirés dans un tableau html mis en forme 
        envoyé à l'administrateur avec le nombre de jour restant avant l'expirartion
        des domaines
        24-02-2023
        Aujourd'hui j'ai taffé sur la fonctionnalité d'envoie de mail a l'administrateur,
        Le mail envoyé contient un tableau html mis en forme contenant la liste
        des domaines qui vont s'expiré dans exactement 7 jours avec pour chaque
        domaine le nombre de jour lui restant avant son expiration

        Nouvelles Taches Recu :
        -----SERVEURS
        -Au niveau du serveur, le username ne doit pas etre affiché
        -Le username doit etre affciher au niveau des details d'un serveur
        et la personne le vois s'il a les permissions
        -Le mot de passe doit etre affiché en claire au niveau des details d'un serveur
        -----Domaines
        Pour ajouter un serveur, au niveau de l'hebergeur,on choisit un serveur,
        (il existe une relation entre les deux)
        27-02-2023
        Tache du 24-02-2023 resolu
        Nouvelles Taches Recu :
        -----SIDE BAR, afficher les menu comme suit:
            #Tableau de bord
            #Serveur
            #Domaine
            #Departement
            #Type de Staff
            #Staff
            #Role
            #Utilisateur
        -----Placer le logo de EBA dans la SIDEBAR
        -----Nouveau Menu Departement:
            Action:Création,Liste,Modification,Suppretion
            Creation : Name, created_at,superviseur (c'est un utilisateur)
        -----Type de Staff :
            Action:Creation,Liste,Modification,Suppretion
            Creation:Name,created_at
        -----Nouveau Menu Staff :
            Action:Creation,Liste,Modification,Retrait
            Creation:Nom,Prenom,adresse,email,departement,type de staff,photo
        */
        
    }
</script>
