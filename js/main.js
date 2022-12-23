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
        checkedItem(singleLang, i) {
            const img = document.querySelectorAll(".img-container");
            if (!singleLang.done) {
                img[i].style = "filter:grayscale(1)"
                singleLang.done = true;
            } else {
                img[i].style = "filter:grayscale(0)"
                singleLang.done = false;
            }

        },

        deleteItem(singleLang) {

            if (window.confirm("Are you sure to delete this item?")) {
                axios.post("./api/removeLang.php", singleLang, {
                    Headers: { "Content-Type": 'multipart/form-data' }
                })
                    .then(resp => {
                        this.fetchLangList();
                    })
            }
        }
    },
    mounted() {
        this.fetchLangList();
    }
}).mount("#app")