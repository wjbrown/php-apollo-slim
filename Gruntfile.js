module.exports = function(grunt) {
    
    var cfg = {

    };

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            dist: {
                files: {
                    'public/css/main.css': 'public/scss/main.scss'
                }
            }
        },
        cssmin: {
            target: {
                files: [{
                    expand: true,
                    cwd   : 'public/css',
                    src   : ['*.css', '!*.min.css'],
                    dest  : 'public/css',
                    ext   : '.min.css',
                    extDot: 'last'
                }]
            }
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                files : [{

                    expand: true,
                    src   : ['public/js/*.js', '!public/js/*.min.js'],
                    dest  : '.',
                    cwd   : '.',
                    rename: function (dst, src) {
                        // To keep the source js files and make new files as `*.min.js`:
                        return dst + '/' + src.replace(/\.js$/, '.min.js');
                    }

                }]
            }
        },
        jshint: {
            all: ['Gruntfile.js', 'public/js/**/*.js', '!public/js/**/*.min.js'],
            options: {
                // ignore defensive semicolon
                "-W032": true
            }
        },
        jscs: {
            src: ["public/js/**/*.js", '!public/js/**/*.min.js'],
            options: {
                config            : ".jscs",
                esnext            : false,
                verbose           : true,
                fix               : false,
                requireCurlyBraces: [ "if" ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-jscs');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Default task(s).
    grunt.registerTask('css', ['sass', 'cssmin']);
    grunt.registerTask('js', ['jscs', 'jshint', 'uglify']);
    grunt.registerTask('default', ['css', 'js']);
    
};