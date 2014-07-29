(function () {
   'use strict';
}());
module.exports = function(grunt) {
	// load all grunt tasks
	require('jit-grunt')(grunt);
	// for checking execution time
	require('time-grunt')(grunt);

	grunt.initConfig({
	
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			options: {
				separator: '\r\n\r\n'
			},
			dist: {
				src: ['dev/js/**/*.js'],
				dest: 'public/js/main.js'
			}
		},

		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
			},
			dist: {
				files: {
					'public/js/main.min.js': ['<%= concat.dist.dest %>']
				}
			}
		},

		jshint: {
			files: ['gruntfile.js', 'dev/js/*.js'],
			options: {
				globals: {
					jQuery: true,
					console: true,
					module: true
				}
			}
		},
		
		bowercopy:{
			options:{
				clean: true
			},
			bootstrap:{
				options:{
					destPrefix:'dev/'
				},
				files:{
					'js/bootstrap-sass/bootstrap/': 'bootstrap-sass-official/vendor/assets/javascripts/bootstrap/*.js',
					'js/bootstrap-sass/bootstrap.js': 'bootstrap-sass-official/vendor/assets/javascripts/bootstrap.js',
					'scss/bootstrap-sass/bootstrap/': 'bootstrap-sass-official/vendor/assets/stylesheets/bootstrap/*.scss',
					'scss/bootstrap-sass/': 'bootstrap-sass-official/vendor/assets/stylesheets/*.scss',
					'fonts/bootstrap-sass/': 'bootstrap-sass-official/vendor/assets/fonts/bootstrap/*.*',
					'js/jquery/jquery.js': 'jquery/dist/jquery.js',
					'scss/bootstrap-sass/bootstrap/mixins/': 'bootstrap-sass-official/vendor/assets/stylesheets/bootstrap/mixins/*.scss'					
					
				}

			},
			gridle:{
				options:{
					destPrefix:'dev/'
				},
				files:{
					'scss/gridle/': 'gridle/sass/*.scss',
					'scss/gridle/gridle': 'gridle/sass/gridle/*.scss',
					'js/gridle/gridle.js': 'gridle/js/gridle.js',
					'js/other/respond.js': 'gridle/js/respond.js'
				}

			},
			faker:{
				options:{
					destPrefix:'dev/'
				},
				files:{
					'js/faker/faker.js': 'faker/dist/faker.js'
				}
			}
			
		},

		exec:{
			geminstall:{
				command: 'bundle install'
			},
			underscoregridlefiles:{
				cwd: '/var/www/dev/scss/gridle',
				command: 'mv style.scss _style.scss && mv grid-bootstrap.scss _grid-bootstrap.scss && mv grid.scss _grid.scss && mv style-bootstrap.scss _style-bootstrap.scss',
			},
			underscoretwbsfiles:{
				cwd: '/var/www/dev/scss/bootstrap-sass',
				command: 'mv bootstrap.scss _bootstrap.scss && mv bootstrap/bootstrap.scss bootstrap/_bootstrap.scss',
			},
			removehtmlfolder:{
				cwd: '/var/www/',
				command: 'rm -rf html'
			}

		},
	
		compass: {
			dist: {
				options: {
					config: 'compass_config.rb',
				}
			}
		},

		watch: {
			files: ['<%= jshint.files %>', 'dev/scss/**/*.scss'],
			tasks: ['concat', 'uglify', 'jshint', 'compass'],
			options: {
				livereload: false,
				nospawn: true,
			}
		}

		

	});
	
	grunt.registerTask( 'default', [ 'jshint', 'concat', 'uglify', 'compass', 'watch' ]);
	grunt.registerTask( 'depends', [ 'bowercopy', 'exec' ]);

};