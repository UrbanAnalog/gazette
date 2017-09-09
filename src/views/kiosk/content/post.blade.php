<post-editor :type="type" :prefix="prefix" inline-template>
    <form @submit.prevent="savePost" v-if="post">
        <div class="form-group">
            <button
                type="submit"
                class="btn btn-primary">
                Save Changes
            </button>
        </div>

        <div class="panel panel-default panel-quill">
            <div class="panel-heading">
                Content
            </div>
            <div class="panel-body">
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

        <div class="panel panel-default">
            <div class="panel-heading">
                Search Engine Optimization
            </div>
            <div class="panel-body">
                <div class="form-group" :class="{ 'has-error': errors.slug }">
                    <label for="slug" class="control-label">URL Slug</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            {{ rtrim(config('app.url'), '/') }}/<span v-if="prefix">@{{ prefix }}/</span>
                        </span>
                        <input
                            type="text"
                            id="slug"
                            class="form-control"
                            v-model="post.slug">

                        <span class="input-group-addon" v-if="post.slug && post.id">
                            <a :href="'{{ rtrim(config('app.url'), '/') }}/' + fullUrl" target="_blank">
                                <i class="fa fa-external-link"></i>
                            </a>
                        </span>
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
    </form>
</post-editor>
