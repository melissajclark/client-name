var gulp = require('gulp');
		browsersync = require('browser-sync').create();
		reload = browsersync.reload;
		styles = require('gulp-sass');
		clean = require('gulp-clean-css');
		autoprefixer = require('gulp-autoprefixer');
		sourcemaps = require('gulp-sourcemaps');
		rename = require('gulp-rename');
		concat = require('gulp-concat');
		uglify = require('gulp-uglify');

var paths = {
	src: {
		js: 'assets/js/**/*.js',
		php: './**/*.php',
		json: './**/*.json',
		scss: 'assets/sass/*.scss',
		scssWatch: 'assets/sass/**/*.scss'
	},
	dest: {
		js: 'assets/js/',
		scss: 'assets/css/'
	}
}

gulp.task('browser-sync', function() {
	browsersync.init({
		proxy: "http://client.test",
		open: "ui",
		// browser: "google chrome"
	});
});

gulp.task('styles', function() {
	return gulp.src(paths.src.scss)
		.pipe(sourcemaps.init())
		.pipe(styles({
			errLogToConsole: true,
			outputStyle: 'compressed',
		}))
		// .pipe(clean())
		.pipe(autoprefixer())
		// .pipe(rename({
		// 	suffix: '.min'
		// }))
		.pipe(sourcemaps.write('./'))
		.pipe(gulp.dest(paths.dest.scss))
		.pipe(reload({
			stream: true
		}))
});

gulp.task('js', function() {
	return gulp.src(paths.src.js)
// 		.pipe(concat('app.min.js'))
// 		.pipe(uglify())
// 		.pipe(gulp.dest(paths.dest.js))
		.pipe(reload({
			stream: true
		}))
});

gulp.task('watch', function() {
	gulp.watch(paths.src.php).on('change', reload);
	gulp.watch(paths.src.scssWatch, gulp.series(['styles']));
	gulp.watch(paths.src.js, gulp.series(['js']));
});

gulp.task('default', gulp.parallel(['browser-sync', 'styles', 'watch', 'js']));
