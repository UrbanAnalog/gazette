<media-browser inline-template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="uploadMedia" class="form-inline" enctype="multipart/form-data">
                    <input type="file" name="asset" class="form-control" multiple>
                    <button type="submit" class="btn btn-primary">
                        Upload
                    </button>
                </form>
            </div>
            <div class="col-md-6">
                <form @submit.prevent="searchMedia">
                    <input type="text" class="form-control" placeholder="Search for media">
                </form>
            </div>
        </div>

        <ul v-if="media">
            <li v-for="(file, index) in media">
                <img :src="file.filename | asset_url" width="100">
            </li>
        </ul>
    </div>
</media-browser>
