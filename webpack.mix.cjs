const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').babelConfig({
    presets: ['@babel/preset-env']
   .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
   .postCss('resources/css/a11y-dark.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
});
if (mix.inProduction()) {
    mix.version();
}
