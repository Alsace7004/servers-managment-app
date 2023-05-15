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
    
    
    export default{
        components:{
            Navbar,Sidebar
        },
        data(){
            return{
                //
            }
        },
        methods:{
            //
        },
        created(){
            //
            /* axios.interceptors.response.use(
                    response => response.data,
                    error => {
                        if (error.response && 419 === error.response.status) {
                            window.location.reload()
                        }

                        return Promise.reject(error)
                    }
                ) */
                /*authClient.interceptors.response.use(
                (response) => {
                    return response;
                },
                function(error) {
                    if (error.response.status === 401 || error.response.status === 419) {
                    store.dispatch("auth/logout");
                    }
                    return Promise.reject(error.response);
                }
                );  */
        },
        mounted(){
            //
        },
        /* 
        Module domaine

        -nom de domaine
        -hebergeur
        -registre personne chez qui on prend le domaine
        -date expirartion

            arrive dans une semaine on envoi notification mail pour informer que la date arrive a expirartion 
            et on donne la date d'expirartion
        */
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
            (Done)
        -----Placer le logo de EBA dans la SIDEBAR
        -----Nouveau Menu Departement:
            Action:Création,Liste,Modification,Suppretion
            Creation : Name, created_at,superviseur (c'est un utilisateur)
            (Done)
        -----Type de Staff :
            Action:Creation,Liste,Modification,Suppretion
            Creation:Name,created_at
            (.....)
        -----Nouveau Menu Staff :
            Action:Creation,Liste,Modification,Retrait
            Creation:Nom,Prenom,adresse,email,departement,type de staff,photo
            06-03-2023
                -Au niveau du module des staff, ajouté le champ "password"
                Faire en sorte a ce que les staff puisse se conneté a l'application
                en ayant un role et une permission
                -Ajouté un input de type checkbox,
                en creant un staff, si le checkbox est coché,
                    lorsque le staff voudra se connecter, il devra avoir la possibilité
                    de modifier son mot de passe
                en creant un staff, si le checkbox n'est pas coché,
                    lorsque le staff voudra se connecter, on ne lui demande pas de modifier
                    son mot de passe
            07-03-2023
            Nouvelles Taches :
            Au niveau du module des serveurs, ajouté un champ pour la date d'expiration,
            Ensuite, le tableau qui est envoyé par mail à l'administrateur,
            on change "NOM DE DOMAINE" en "DOMAINE/HEBERGEMENT"
            on ajoute une nouvelle colonne type

            si le type est un domaine->DOMAINE/HERGEMENT prend: url
            si le type est un serveur->DOMAINE/HEBERGEMMENT prend nom de l'hebergeur

            08-03-2023
            Correction sur la tache du 07-03-2023
            Au niveau du message envoyé par mail:
            DOMAINE/HEBERGEMENT TYPE
            nom du domaine      domaine
            nom du serveur      serveur
            ---------------------------------
            Nouvelles Taches à faire:
            Au niveau du Tableau de bord
            selon le profile et selon la permission
                Afficher:
                -le nombre total de serveur
                -le nombre total se serveur qui vont expiré dans 1 semaine
                -le nombre total de domaine
                -le nombre total de domaine qui vont expiré dans 1 semaine
                -le nombre total de departement actif
                -le nombre total de staff actif
            14-03-2023
            Nouvelles Taches à faire:
                -Creation d'une nouvelle table CategeorieServeur
                qui aura comme attribut (id,name)
                name prend uniquement deux valeurs(local-client & cloud)
                Pour Ajouter un Serveur, il y aura un select pour selectionner 
                la categorie de serveur
                -Au niveau de la table Serveur, Ajouter un nouveau attribut (Proprietaire-Serveur)
                qui aura par defaut EBA
                Montré-Verifié-ok
            15-03-2023
            Nouvelles Taches à faire
                -Creation d'une nouvelle table TypeOutil
                    TypeOutil(id,name)
                    Action a faire: (Creation,Liste,Modification,Suppretion(logique))
                -Creation d'une nouvelle table Outil
                    Outil(id,type-outil,name,username,password,url(optionnel))
                NB: Pas d'outils ayant le meme nom   
            16-03-2023
                Apres demo, Rectificatifs a faire:
                Au niveau des outils: Ajouter l'option pour voir les details
                Le mot de passe ne doit pas etre haché au niveau de la BDD
                Ajouter des permissions pour les modules type-outils et outils

        */
        /*
            PascalCase/CapitalCase ex: FirstName
            camelCase   ex:firstName
            Kebab-case  ex:first-name
            snake_case  ex:first_name
            Remove animate-left from conversationMessages

            Comment associer un deuxième commercial à un intermédiaire svp?

            Dis c'est lors de la création d'un commercial qu'on lui associe un intermédiaire non?
            ==>
            20-04-2023
            ---scenario pour terminer un appel---
            1- A appel B
            2- B recoit une notification de A
            3- B accepte l'appel
            4- Il ya communication entre A et B
            5- Si A termine l'appel B recoit une notification (et l'appel se termine chez B egalement)
            6- Si B termine l'appel A recoit une notification (et l'appel se termine chez A egalement)
        */
        
    }
</script>
