<post-list type="post" prefix="{{ config('gazette.post.prefix') }}" inline-template>
    <div>
        <div v-show="! editingPost">
            <div class="form-group">
                <button class="btn btn-primary" @click="newPost">
                    New Post
                </button>
            </div>

            <div v-if="posts" class="card">
                <div class="card-body p-0">
                    <table class="table mb-0">
                        <thead>
                            <th class="border-0">Title</th>
                            <th class="border-0">Updated At</th>
                            <th class="border-0">Created At</th>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts">
                                <td>
                                    <a href="#" @click.prevent="showPost(post)">
                                        <b>@{{ post.title }}</b>
                                    </a>
                                </td>
                                <td>
                                    @{{ post.updated_at | date }}
                                </td>
                                <td>
                                    @{{ post.created_at | date }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div v-show="editingPost">
            @include('gazette::kiosk.content.post')
        </div>
    </div>
</post-list>
