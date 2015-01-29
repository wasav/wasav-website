
module.exports = function(grunt) {

  grunt.initConfig({
	copy: {
		'prod-site':{
			files:{
				'<%= config.paths.output_prod_path %>/<%= config.paths.prod_site_name %>/' : [ './pages/*.php',
															 './php-components/*.php',
															 './*.php']
			}
		},
		'prod-blog-theme':{
			expand: true,
			cwd:'<%= config.paths.blog_location %>/',
			src: ['*.php',
				 'fonts/**/*',
				 'imgs/**/*',
				 'favicon*.*',
				 'style.css',
				 'css/<%= config.paths.cssPackedName %>',
				 'js/<%= config.paths.jsPackedName %>'],
			dest:'<%= config.paths.output_prod_path %>/<%= config.paths.prod_blog_name %>/'
		}
	},
	uglify:{
		options:{
			// do not modify variable names
			mangle: false
		},
		release:{
			files:{
				'<%= config.paths.jsPacked %>' : '<%= config.jsFiles %>'
			}
		}
	},
	cssmin:{
		release:{
			files:{
				'<%= config.paths.cssPacked %>' : '<%= config.cssFiles %>'
			}
		}
	},
	config:{
		// JS Files, in a specific order
		jsFiles: [
			'<%= config.paths.blog_location %>/js/vendor/jquery-1.10.1.min.js',
			'<%= config.paths.blog_location %>/js/vendor/bootstrap.min.js'
		],
		
		// CSS files
		cssFiles: [
			'<%= config.paths.blog_location %>/css/bootstrap.min.css',
			'<%= config.paths.blog_location %>/css/bootstrap-theme.min.css',
			'<%= config.paths.blog_location %>/style.css',
			'<%= config.paths.blog_location %>/css/labs.css',
			'<%= config.paths.blog_location %>/css/contacts.css'
		],
		
		version: '1.1.0',
		paths: grunt.file.readJSON('grunt-wasav-paths.json')
	}
	
  });
  
  // Telling Grunt to load plugins
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  
  var releaseSeq = ['cssmin:release','uglify:release'];
  var prod = ['cssmin:release','uglify:release', 'copy:prod-site', 'copy:prod-blog-theme'];
  
  // declaring actions
  grunt.registerTask('default', releaseSeq);
  grunt.registerTask('release', releaseSeq);
  grunt.registerTask('production', prod);
  
};