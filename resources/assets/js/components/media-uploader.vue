<template>
    <form @submit.prevent="uploadMedia" class="form-inline" enctype="multipart/form-data">
        <input type="file" name="asset" class="form-control" multiple>
        <button type="submit" class="btn btn-primary" :disabled="uploading">
            <span v-if="uploading">Uploading</span>
			<span v-else>Upload</span>
        </button>

		<div v-if="errors" class="alert alert-danger my-4">
			<ul class="mb-0">
				<li v-for="error in errors" :key="error">{{ error }}</li>
			</ul>
		</div>
    </form>
</template>


<script>
    export default {
        props: {
			id: {
				default: function () {
					return 'media-uploader-' + Math.random() * 10;
				},
				type: String
			},
			emit: {
				default: 'media-uploaded',
				type: String
			}
		},

		data() {
			return {
				errors   : null,
				uploading: false,
			}
		},

        methods: {
            uploadMedia(e) {
				var data = new FormData();
				data.append('asset', $(e.target).find('input[name=asset]')[0].files[0]);

				this.errors  = null;
				this.uploading = true;

                axios.post('/gazette/media', data)
                    .then(response => {
						Bus.$emit('uploaded-to-media-browser', response);
						e.target.reset();
						this.uploading = false;
                    }, error => {
						this.errors = error.response.data.errors.asset;
						this.uploading = false;
                    });
            },
        }
    }
</script>
