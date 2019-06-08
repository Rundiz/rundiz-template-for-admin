/**
 * @link https://gruntjs.com/configuring-tasks#building-the-files-object-dynamically Building the files object dynamically
 * @link https://github.com/laurenhamel/grunt-dart-sass Dart-sass on Grunt
 */
module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // Compile SASS and minify them.
        'dart-sass': {
            target: {
                options: {
                    outputStyle: 'expanded',
                    sourceMap: true
                },
                files: [
                    {
                        expand: true,
                        cwd: 'assets/scss/',
                        src: ['**/*.scss'],
                        dest: 'assets/css/',
                        ext: '.css'
                    }
                ]
            },
            targetMinified: {
                options: {
                    outputStyle: 'compressed',
                    sourceMap: true
                },
                files: [
                    {
                        expand: true,
                        cwd: 'assets/scss/',
                        src: ['**/*.scss'],
                        dest: 'assets/css/',
                        ext: '.min.css',
                        extDot: 'first'
                    }
                ]
            }
        },
        // Replace version number.
        'string-replace': {
            dist: {
                options: {
                    replacements: [
                        {pattern: '__RDTA.VERSION__', replacement: '<%= pkg.version %>'}
                    ]
                },
                files: [
                    {
                        expand: true,
                        cwd: 'assets/css/rdta/',
                        src: ['*.css'],
                        dest: 'assets/css/rdta/'
                    }
                ]
            }
        },
        // Minify JS.
        uglify: {
            myjs: {
                options: {
                    banner: '/*! Rundiz template for admin v <%= pkg.version %> \n' +
                            'License: <%= pkg.license %>*/',
                    sourceMap: true,
                    sourceMapName: "assets/js/rdta/rundiz-template-admin.min.map"
                },
                files: [
                    {src: 'assets/js/rdta/rundiz-template-admin.js', dest: 'assets/js/rdta/rundiz-template-admin.min.js'}
                ]
            }
        },
        watch: {
            files: ['assets/js/rdta/*.js', 'assets/scss/**/*.scss'],
            tasks: ['uglify', 'dart-sass']// no need to replace version number on development.
        }
    });

    // Load the plugin that provides the "uglify" task.
    grunt.loadNpmTasks('grunt-contrib-uglify-es');
    // Load the plugin that watch files changed.
    grunt.loadNpmTasks('grunt-contrib-watch');
    // Load the plugin that will compile SASS.
    grunt.loadNpmTasks('grunt-dart-sass');
    // Load the plugin that replace text string in file.
    grunt.loadNpmTasks('grunt-string-replace');

    // Default task(s).
    grunt.registerTask('default', ['uglify', 'dart-sass', 'string-replace']);

};