<media-browser inline-template>
        <div>
            <div class="row">
                <div class="col-md-6">
                    <media-uploader emit="uploaded-to-media-browser"></media-uploader>
                </div>
                <div class="col-md-6">
                    <form @submit.prevent="searchMedia">
                        <input type="text" class="form-control" placeholder="Search for media">
                    </form>
                </div>
            </div>

            <ul class="list-unstyled row text-center mt-4" v-if="media">
                <li class="col-6 col-sm-3 pb-4" v-for="(file, index) in media">
                    <img :src="file.filename | asset_url" width="100">
                    <button class="btn btn-sm btn-secondary mt-2" @click.prevent="copyUrl(file)" v-if="file.filename.indexOf('.pdf') > -1">Copy URL</button>
                </li>
            </ul>
        </div>
    </media-browser>
