'use strict';
module.exports = function(grunt) {

	// load all tasks
	require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			files: ['sass/**/*.scss'],
			tasks: ['sass', 'autoprefixer']
		},
		sass: {
			default: {
				options : {
					style : 'expanded'
				},
				files: {
					'style.css':'sass/style.scss',
					'editor-style.css':'sass/editor-style.scss'
				}
			}
		},
	    autoprefixer: {
	        options: {
				browsers: ['> 1%', 'last 2 versions', 'Firefox ESR', 'Opera 12.1', 'ie 9']
			},
			single_file: {
				src: 'style.css',
				dest: 'style.css'
			}
		},
		uglify: {
		    build: {
		        src: 'js/public.js',
		        dest: 'js/public.min.js'
		    }
		},
	    replace: {
			styleVersion: {
				src: [
					'sass/style.scss',
				],
				overwrite: true,
				replacements: [{
					from: /Version:.*$/m,
					to: 'Version: <%= pkg.version %>'
				}]
			},
			functionsVersion: {
				src: [
					'functions.php'
				],
				overwrite: true,
				replacements: [ {
					from: /^define\( 'FOOTHILLS_VERSION'.*$/m,
					to: 'define( \'FOOTHILLS_VERSION\', \'<%= pkg.version %>\' );'
				} ]
			}
		}
	});

	grunt.registerTask( 'default', [
		'sass',
		'autoprefixer'
	]);

	grunt.registerTask( 'release', [
		'replace',
		'sass',
		'autoprefixer',
		'uglify:build'
	]);

};