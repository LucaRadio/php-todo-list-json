const {createApp} = Vue;


createApp({
    data(){
        return{
            ListPL:[],
            newLang:"",
            params:{
                name: null,
                usedFor:"",
                logo: "https://picsum.photos/200/300"
            }

        }
    },
    methods:{
        fetchLangList(){
            axios.get("./api/programmingLanguageList.php")
            .then(resp=>{
                console.log(resp.data);
                this.ListPL = resp.data;
            })
        },
        insertNew(){

            axios.post("./api/newPLang.php",this.params,{
                headers:{"Content-Type":'multipart/form-data'}
            })
            .then(resp=>{
                this.fetchLangList();
            })
        }
    },
    mounted(){
        this.fetchLangList();
    }
}).mount("#app")