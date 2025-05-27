const { task, src, dest, watch, series, parallel } = require('gulp')
const sourcemap = require('gulp-sourcemaps')
const concat = require("gulp-concat")
const stylus = require('gulp-stylus')
const purge = require("gulp-purgecss");
const minify = require('gulp-minify')
const bSync = require('browser-sync').create()
const rename = require('gulp-rename')

// npm install gulp-sourcemaps gulp-concat gulp-stylus gulp-minify browser-sync gulp-rename gulp-purgecss

const source = {
    stylMain: './src/styl/main.styl',
    stylAll: './src/styl/**/*.styl',
    css: './dist/css',
    php: "**/*.php",
    jsAll: './src/js/**/*.js',
    jsDest: './dist/js'
}


// Compila Stylus p/ CSS
task('css', () => {
    return src(source.stylAll)
      .pipe(sourcemap.init())
      .pipe(stylus({ compress: true }))
      .pipe(minify())
    //   .pipe(concat('app.min.css'))
      .pipe(sourcemap.write('.'))
      .pipe(dest(source.css))
})

// Compila demais JS que não precisam de babel
task('js', () => {
    return src([
        source.jsAll,
        './src/js/app.js'
    ])
    .pipe(concat('app.js'))
    .pipe(minify({
    ext: {
        min: '.min.js'
    }
    }))
    .pipe(dest(source.jsDest))
})


// Browser Sync
task('browser-sync', () => {
    bSync.init({
        proxy: 'localhost/lp-equipe-cont/',
        notify: false
    })

    return watch([source.stylAll, source.jsAll]).on('change', bSync.reload)
})

task("purgecss", () => {
    return src("dist/css/bootstrap.min.css")
    .pipe(
        purge({
            content: ["./dist/js/**/*.js", source.php],
        })
    )
    .pipe(dest("dist/build/css"));
});


// Observa CSS e JS
task('watch', () => {
    watch([source.stylAll, source.jsAll, source.php], series(['css', 'js', 'purgecss']))
})


// Main task
task('default', series(['css',  'js', 'watch']))
task('dev', parallel(['css',  'js', 'watch', 'browser-sync']))