1. Install the composer package

```
composer require urbananalog/gazette
```

2. Add the Gazette Servier Provider

Add the following line to the `config/app.php` file's `providers` array:

```
UrbanAnalog\Gazette\GazetteServiceProvider::class,
```

3. Install the Vue-TinyMCE and TinyMCE node packages

```
npm install tinymce --save
```

```
npm install vue-tinymce --save
```

4. Add a resolve path to webpack.mix.js

```
path.resolve(__dirname, 'vendor/urbananalog/gazette/resources/js'),
```

5. Include the JS bootstrap file

Add the following line to your app's main JS file.

```
require('gazette');
```

6. Include the TinyMCE Skin CSS file

Add the following line to your app's main CSS file.

```
@import "./../../../node_modules/tinymce/skins/lightgray/skin.min.css";
```

7. Add Kiosk Components

Add the following code to the sidebar in `resources/views/vendor/spark/kiosk.blade.php`

```
@include('gazette::kiosk.content.menu')
```

Add the following code to the content area in `resources/views/vendor/spark/kiosk.blade.php`

```
@include('gazette::kiosk.content.panes')
```

8. Publish Stubs

Run the following command in a command line tool:

```
artisan vendor:publish
```
