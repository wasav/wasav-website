
module.exports = function(grunt) {

  grunt.initConfig({
	copy: {
		'prod-site':{
			files:{
				'../wasav-website-<%= config.version %>/' : [ './pages/*.php',
															 './php-components/*.php',
															 './*.php']
			}
		},
		'prod-blog-theme':{
			expand: true,
			cwd:'<%= config.blog_output %>/',
			src: ['*.php',
				 'fonts/**/*',
				 'imgs/**/*',
				 'favicon*.*',
				 'style.css',
				 'css/<%= config.cssPackedName %>',
				 'js/<%= config.jsPackedName %>'],
			dest:'../wasav-blog-theme-<%= config.version %>/'
		}
	},
	uglify:{
		options:{
			// do not modify variable names
			mangle: false
		},
		release:{
			files:{
				'<%= config.jsPacked %>' : '<%= config.jsFiles %>'
			}
		}
	},
	cssmin:{
		release:{
			files:{
				'<%= config.cssPacked %>' : '<%= config.cssFiles %>'
			}
		}
	},
	config:{
		// JS Files, in a specific order
		jsFiles: [
			'./blog/wp-content/themes/wasav-blog-theme/js/vendor/jquery-1.10.1.min.js',
			'./blog/wp-content/themes/wasav-blog-theme/js/vendor/bootstrap.min.js'
		],
		
		// CSS files
		cssFiles: [
			'<%= config.blog_output %>/css/bootstrap.min.css',
			'<%= config.blog_output %>/css/bootstrap-theme.min.css',
			'<%= config.blog_output %>/style.css',
			'<%= config.blog_output %>/css/labs.css',
			'<%= config.blog_output %>/css/contacts.css'
		],
		
		blog_output: './blog/wp-content/themes/wasav-blog-theme',
		prod_output: 'wasav-prod-<%= config.version %>',
		jsPackedName: 'packed-<%= config.version %>.min.js',
		cssPackedName: 'style-<%= config.version %>.min.css',
		jsPacked: '<%= config.blog_output %>/js/<%= config.jsPackedName %>',
		cssPacked: '<%= config.blog_output %>/css/<%= config.cssPackedName %>',
		
		version: '1.1.0'
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