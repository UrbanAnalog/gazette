Vue.component('post-editor', {
    props: ['type', 'prefix'],

    data() {
        return {
            post: null,
            loading: true,
            unsavedChanges: false,
            content: null,
            errors: [],
            tinymceOptions: {
                skin: false,
                menubar: true,
                plugins: [
                    'advlist link image hr media table directionality paste imagetools autoresize code',
                ],
                toolbar1: 'styleselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | hr table link media image',
                images_upload_url: '/gazette/media',
                images_upload_handler: this.imageHandler
            }
        }
    },

    computed: {
        fullUrl() {
            return [this.prefix, this.post.slug].filter(n => n).join('/');
        }
    },

    created() {
        this.loading = true;

        this.$parent.$on('showPost', (post) => {
            this.loading = true;
            this.getPost(post);
        });

		Bus.$on('uploaded-featured-image', this.uploadComplete);

		// stickybits('#post-actions', {verticalPosition: 'bottom'});
    },

    methods: {
        cancel() {
            Bus.$emit('cancelPostEdit');
        },

        uploadComplete(response) {
			console.log(response);
            if (this.post === null) {
				console.log('bad');
                return;
            }

            this.post.media_id = response.data.id;
            this.post.featured_image = response.data;
        },

        removeMedia() {
            this.post.media_id = null;
            this.post.featured_image = null;
        },

        imageHandler(asset, success, failure) {
            var formData = new FormData();
            formData.append("asset", asset.blob(), asset.filename());

            axios.post('/gazette/media', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    responseType: 'json'
                }).then(res => {
                    const location = `//${window.location.host}/storage/${res.data.filename}`;
                    success(location);
                }).catch(e => {
                    console.error(e);
                });
        },

        getPost(post) {
            if ( post.id === null || post.id === 'new' ) {
                this.post = {
                    'id': null,
                    'title': null,
                    'content': null,
                    'type': this.type,
                    'slug': null,
                    'media_id': null,
                    'featured_image': null
                };

                this.content = '';

                this.loading = false;
            } else {
                axios.get(`/gazette/posts/${post.id}`)
                    .then(response => {
                        this.post = response.data;
                        this.content = this.post.content;
                        this.loading = false;
                    }, error => {
                        console.error(error);
                    });
            }
        },

        savePost() {
            this.errors = [];

            if ( this.post.id === null ) {
                axios.post('/gazette/posts', this.post)
                    .then(response => {
                        this.post = response.data;
                        history.pushState(null, null, `#/${this.type}s/${this.post.id}`);
                        alert('Post was saved');
                    }).catch(error => {
                        this.showErrors(error.response.data);
                    });
            } else {
                axios.put(`/gazette/posts/${this.post.id}`, this.post)
                    .then(response => {
                        this.post = response.data;
                        alert('Post was saved');
                    }).catch(error => {
                        this.showErrors(error.response.data.errors);
                    });
            }
        },

        showErrors(errors) {
            console.log(errors);
            this.errors = errors;
            alert('There were some errors when saving.');
        }
    }
});
