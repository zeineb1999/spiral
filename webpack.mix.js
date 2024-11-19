const mix = require('laravel-mix');

mix
    .sass('resources/sass/app.scss', 'public/css') // Pour compiler Sass si vous utilisez SCSS
    .js('resources/js/app.js', 'public/js') // Pour compiler JS
    .js('resources/js/nav.js', 'public/js') 
    .sourceMaps(); // Optionnel, si vous voulez activer les cartes de source pour le débogage
