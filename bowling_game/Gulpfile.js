var gulp = require("gulp");
var phpspec = require("gulp-phpspec");
var run = require("gulp-run");
var notify = require("gulp-notify");

// Setting up the task to run PHPSpec
gulp.task('test', function() {
  gulp.src('spec/**/*.php')
      .pipe(run('clear'))
      .pipe(phpspec('', {notify: true}))
      .on('error', notify.onError({
        title: "Crap",
        message: "Your tests failed, Brian!"
      }))
      .pipe(notify({
        title: "Success",
        message: "All tests are green!"
      }));
});

// Watching all php files in the spec and src directories for changes
// and running test task whenever they are changed
gulp.task('watch', function(){
  gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
});

gulp.task('default', ['test', 'watch']);
