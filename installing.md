1. Add a resolve path to webpack.mix.js

```
path.resolve(__dirname, 'packages/urbananalog/gazette/src/resources/js'),
```

2. Install the Vuejs Quill NPM packages (wysiwyg editor)

```
npm install vue-quill-editor --save
```

3. Include the Gazette styles in `/resources/assets/less/app.less`

```
@import "./../../../vendor/urbananalog/gazette/src/resources/assets/less/gazette";
```
