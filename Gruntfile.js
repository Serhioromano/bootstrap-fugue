module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		cssmin: {
			compress: {
				files: {
					'css/bootstrap-fugue-min.css': ['css/bootstrap-fugue.css'],
					'css/bootstrap-fugue-shadow-min.css': ['css/bootstrap-fugue-shadow.css']
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-cssmin');

	grunt.registerTask('default', ['cssmin']);
};