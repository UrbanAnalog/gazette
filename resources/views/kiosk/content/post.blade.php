<post-editor :type="type" :prefix="prefix" inline-template>
    <div>
        <div v-show="loading">
            Loading
        </div>
        <div v-show="!loading">
            <form @submit.prevent="savePost" v-if="post">
                <div class="card">
                    <div class="card-header">
                        Content
                    </div>
                    <div class="card-body">
                        <div class="form-group" :class="{ 'has-error': errors.title }">
                            <input
                                type="text"
                                class="form-control input-lg"
                                placeholder="Title"
                                v-model="post.title">
                            <p class="help-block" v-for="error in errors.title">
                                @{{ error }}
                            </p>
                        </div>

                        <tinymce
                            :id="'editor-' + post.type"
                            v-model="post.content"
                            :content="content"
                            :options="tinymceOptions">
                        </tinymce>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Featured Image
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div v-if="post.featured_image">
                                <img :src="'/storage/' + post.featured_image.filename" width="200">
                                <a href="#" @click.prevent="removeMedia" class="text-danger">Remove</a>
                            </div>
                            <div v-else>
                                <media-uploader emit="uploaded-featured-image"></media-uploader>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Search Engine Optimization
                    </div>
                    <div class="card-body">
                        <div class="form-group" :class="{ 'has-error': errors.slug }">
                            <label for="slug" class="control-label">URL Slug</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    {{ rtrim(config('app.url'), '/') }}/<span v-if="prefix">@{{ prefix }}/</span>
                                    </span>
                                </div>
                                <input
                                    type="text"
                                    id="slug"
                                    class="form-control"
                                    v-model="post.slug">

                                <div class="input-group-append" v-if="post.slug && post.id">
                                    <span class="input-group-text">
                                        <a :href="post.path" target="_blank">
                                            <i class="fa fa-external-link"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <p class="help-block" v-for="error in errors.slug">
                                @{{ error }}
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="meta_title" class="control-label">Meta Title</label>
                            <input type="text" v-model="post.meta_title" id="meta_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="meta_description" class="control-label">Meta Description</label>
                            <textarea v-model="post.meta_description" id="meta_description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_title" class="control-label">Robots</label>
                            <input type="text" v-model="post.robots" id="robots" class="form-control" placeholder="Ex: index,follow">
                        </div>
                    </div>
                </div>

                <div id="post-actions" class="form-group">
                    <button
                        type="submit"
                        class="btn btn-primary">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</post-editor>
