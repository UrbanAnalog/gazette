import tinymce from 'tinymce/tinymce';
import 'tinymce/themes/modern/theme';
import 'tinymce/plugins/directionality/plugin';
import 'tinymce/plugins/paste/plugin';
import 'tinymce/plugins/link/plugin';
import 'tinymce/plugins/autoresize/plugin';
import 'tinymce/plugins/code/plugin';
import 'tinymce/plugins/media/plugin';
import 'tinymce/plugins/imagetools/plugin';
import 'tinymce/plugins/image/plugin';
import 'tinymce/plugins/advlist/plugin';
import 'tinymce/plugins/table/plugin';
import 'tinymce/plugins/hr/plugin';
import VueTinymce from 'vue-tinymce';
Vue.use(VueTinymce);

Vue.component('media-uploader', require('./components/media-uploader'));
require('./components/media-browser');
require('./components/post-list');
require('./components/post-editor');

Vue.filter('asset_url', function (filename, ignorePdf) {
	if (filename.indexOf('.pdf') > -1 && ignorePdf !== true) {
		return '//placehold.it/300x300?text=PDF';
	}

    return `//${window.location.host}/storage/${filename}`
});
