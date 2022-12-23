const { createApp } = Vue;


createApp({
    data() {
        return {
            ListPL: [],
            newLang: "",
            params: {
                name: '',
                usedFor: "",
                logo: "",
                done: false
            }

        }
    },
    methods: {
        fetchLangList() {
            axios.get("./api/programmingLanguageList.php")
                .then(resp => {
                    console.log(resp.data);
                    this.ListPL = resp.data;
                })
        },
        insertNew() {
            this.params.name = this.newLang
            axios.post("./api/newPLang.php", this.params, {
                headers: { "Content-Type": 'multipart/form-data' }
            })
                .then(resp => {
                    this.fetchLangList();
                })

            this.newLang = "";
        },
        checkedItem(singleLang) {
            if (!singleLang.done) {
                singleLang.done = true
            } else {
                singleLang.done = false
            }

        },

        deleteItem(singleLang) {
            axios.post("./api/removeLang.php", singleLang, {
                Headers: { "Content-Type": 'multipart/form-data' }
            })
                .then(resp => {
                    this.fetchLangList();
                })
        }
    },
    mounted() {
        this.fetchLangList();
    }
}).mount("#app")