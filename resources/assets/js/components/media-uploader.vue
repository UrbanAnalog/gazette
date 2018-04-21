<template>
    <form @submit.prevent="uploadMedia" class="form-inline" enctype="multipart/form-data">
        <input type="file" name="asset" class="form-control" multiple>
        <button type="submit" class="btn btn-primary">
            Upload
        </button>
    </form>
</template>


<script>
    export default {
        props: ['id', 'emit'],

        methods: {
            uploadMedia(e) {
                var data = new FormData();
                data.append('asset', $(e.target).find('input[name=asset]')[0].files[0]);

                axios.post('/gazette/media', data)
                    .then(response => {
                        Bus.$emit(this.emit, response);
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
        }
    }
</script>