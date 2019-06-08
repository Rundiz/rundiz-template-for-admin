module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! Rundiz template for admin v <%= pkg.version %> \n' +
            'License: <%= pkg.license %>*/',
        sourceMap: true,
        sourceMapName: "assets/js/rdta/rundiz-template-admin.min.map"
      },
      build: {
        src: 'assets/js/rdta/rundiz-template-admin.js',
        dest: 'assets/js/rdta/rundiz-template-admin.min.js'
      }
    }
  });

  // Load the plugin that provides the "uglify" task.
  grunt.loadNpmTasks('grunt-contrib-uglify-es');

  // Default task(s).
  grunt.registerTask('default', ['uglify']);

};