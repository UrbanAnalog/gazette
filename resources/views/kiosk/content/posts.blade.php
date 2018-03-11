<post-list type="post" prefix="{{ config('gazette.post.prefix') }}" inline-template>
    <div>
        <div v-show="! editingPost">
            <div class="form-group">
                <button class="btn btn-primary" @click="newPost">
                    New Post
                </button>
            </div>

            <div v-if="posts" class="panel panel-default">
                <table class="table table-hover">
                    <thead>
                        <th>Title</th>
                    </thead>
                    <tbody>
                        <tr v-for="(post, index) in posts">
                            <td>
                                <a href="#" @click.prevent="showPost(post)">
                                    @{{ post.title }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div v-show="editingPost">
            @include('gazette::kiosk.content.post')
        </div>
    </div>
</post-list>
