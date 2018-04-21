##1. Install the composer package

```
composer require urbananalog/gazette
```

##2. Add the Gazette Servier Provider

Add the following line to the `config/app.php` file's `providers` array:

```
UrbanAnalog\Gazette\GazetteServiceProvider::class,
```

##3. Install the required Node packages

```
npm install tinymce --save
```

```
npm install vue-tinymce --save
```

##4. Add a resolve path to webpack.mix.js

```
path.resolve(__dirname, 'vendor/urbananalog/gazette/resources/assets/js'),
```

Tip: Add the following items to your [Laravel Mix `.extract()`](https://github.com/JeffreyWay/laravel-mix/blob/master/docs/extract.md) array:

```
'tinymce', 'tinymce/themes/modern/theme', 'tinymce/plugins/media/plugin', 'tinymce/plugins/directionality/plugin', 'tinymce/plugins/paste/plugin', 'tinymce/plugins/link/plugin', 'tinymce/plugins/autoresize/plugin', 'tinymce/plugins/code/plugin', 'tinymce/plugins/imagetools/plugin', 'tinymce/plugins/image/plugin', 'tinymce/plugins/advlist/plugin', 'tinymce/plugins/table/plugin', 'tinymce/plugins/hr/plugin'
```

##5. Include the JS bootstrap file

Add the following line to your app's main JS file.

```
require('gazette');
```

##6. Include the TinyMCE Skin CSS file

Add the following line to your app's main CSS file.

```
@import "./../../../node_modules/tinymce/skins/lightgray/skin.min.css";
```

##7. Add Kiosk Components

Add the following code to the sidebar in `resources/views/vendor/spark/kiosk.blade.php`, right after the first `<aside>` element

```
@include('gazette::kiosk.content.menu')
```

Add the following code to the content area in `resources/views/vendor/spark/kiosk.blade.php`, right before the closing tag for the `.tab-content` container.

```
@include('gazette::kiosk.content.panes')
```

##8. Publish Stubs

Run the following command in a command line tool:

```
php artisan vendor:publish
```

```
php artisan vendor:publish --tag=croppa
```

##9. Migrate the Database

Run the following command to update the database:

```
php run migrate
```


##10. Compile Assets

Run one of the `npm run (watch|dev|production)` commands to compile your assets.


##11. Change Croppa config

Adjust the `config/croppa.php` file to match the below:

```php
'src_dir' => storage_path('app/public'),
'crops_dir' => storage_path('app/public'),
'path' => '(.*)$',
```

##12. Reset the Route Cache

Run:

```
php artisan route:cache
```
