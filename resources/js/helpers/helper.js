

export default {  
    install: (app, options) => {    
        /*  our code for the plugin goes here
            app is the result of createApp()            
            options is user options passed in        */  
        app.mixin({      
            data() {        
                return {          
                    //featuredLink: "https://learnvue.co",        
                };      
            },
            methods:{
                //format date from mysql
                convert(jour){
                    let  date =  new Date(jour);
                    return  date.toLocaleDateString('en-GB') // "day-month-year"
                },
            },   
            created() {        
                console.log("Printing from created in helper.js");      
            },    
        });
    },
};
