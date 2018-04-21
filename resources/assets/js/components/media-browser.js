Vue.component('media-browser', {
    data() {
        return {
            page: 0,
            media: []
        }
    },

    mounted() {
        this.loadPage(this.page);

        Bus.$on('uploaded-to-media-browser', this.uploadComplete);
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

        uploadComplete(response) {
            console.log(response);
            this.media.splice(0, 0, response.data);
        },

        searchMedia() {
            return;
        }
    }
});
