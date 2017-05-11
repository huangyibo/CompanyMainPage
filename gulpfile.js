var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');
require('laravel-elixir-compress');

var production = elixir.config.production;
var basejs = [
    'resources/assets/js/vendor/jquery.min.js',
    'resources/assets/js/vendor/bootstrap.min.js',
    'resources/assets/js/vendor/masonry.min.js',
    'resources/assets/js/vendor/simplemde.min.js',
    'resources/assets/js/vendor/analytics.js',
    'resources/assets/js/vendor/jquery.form.min.js',
    // 'resources/assets/js/vendor/analytics.js',
    // 'resources/assets/js/vendor/moment.min.js',
    // 'resources/assets/js/vendor/upload-image.js',
    // 'node_modules/wangeditor/dist/wangEditor.min.js',
    'node_modules/sweetalert/dist/sweetalert.min.js',
    'node_modules/social-share.js/dist/js/social-share.min.js',
];

elixir(function(mix) {
    mix
        .copy([
            'node_modules/bootstrap-sass/assets/fonts/bootstrap'
        ], 'public/assets/fonts/bootstrap')

        .copy([
            'node_modules/font-awesome/fonts'
        ], 'public/assets/fonts/font-awesome')

        // https://github.com/overtrue/share.js
        .copy([
            'node_modules/social-share.js/dist/fonts'
        ], 'public/assets/fonts/iconfont')

        .copy([
            'node_modules/social-share.js/dist/fonts'
        ], 'public/build/assets/fonts/iconfont')

        .sass([
            'base.scss',
            'main.scss'
        ], 'public/assets/css/styles.css')

        .scripts(basejs.concat([
            'resources/assets/js/main.js',
            'resources/assets/js/ajaxscript.js'
        ]), 'public/assets/js/scripts.js', './')

        .version([
            'assets/css/styles.css',
            'assets/js/scripts.js',
        ])

        .livereload();

    if (production) {
        mix.compress();
    }
});
