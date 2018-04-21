Vue.component('post-list', {
    props: ['type', 'prefix'],

    data() {
        return {
            posts: [],
            editingPost: null
        }
    },

    created() {
        this.getPosts();

        Bus.$on('sparkHashChanged', (hash, parameters) => {
            if (hash != this.type + 's') {
                return true;
            }

            if (parameters && parameters.length > 0) {
                this.loadPost({ id: parameters[0] });
            } else {
                this.showPosts();
                this.editingPost = false;
            }

            return true;
        });

        Bus.$on('cancelPostEdit', () => {
            this.editingPost = false
        });
    },

    methods: {
        getPosts() {
            axios.get('/gazette/posts', {
                params: {
                    type: this.type
                }
            }).then(response => {
                this.posts = response.data;
            });
        },

        showPosts() {
            this.editingPost = null;
        },

        newPost() {
            this.showPost({
                id: null
            });

            this.editingPost = true;
        },

        showPost(post) {
            history.pushState(null, null, `#/${this.type}s/${post.id || 'new'}`);

            this.loadPost(post);
        },

        loadPost(post) {
            this.$emit('showPost', post);

            this.editingPost = true;
        }
    }
});
