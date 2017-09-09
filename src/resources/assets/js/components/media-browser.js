Vue.component('media-browser', {
    data() {
        return {
            page: 0,
            media: []
        }
    },

    mounted() {
        this.loadPage(this.page);
    },

    methods: {
        loadPage(page) {
            axios.get('/gazette/media', {
                params: {
                    page: this.page + 1
                }
            }).then(response => {
                response.data.data.forEach((media) => {
                    this.media.push(media);
                });

                page++;
            });
        },

        uploadMedia(e) {
            var data = new FormData();
            data.append('asset', $('input[name=asset]')[0].files[0]);

            axios.post('/gazette/media', data)
                .then(response => {
                    console.log(response.data);
                    this.media.splice(0, 0, response.data);
                })
                .catch(error => {
                    console.error(error);
                });
        },

        searchMedia() {
            return;
        }
    }
});
