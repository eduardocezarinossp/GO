// Run javascript after DOM is initialized
$(document).ready(function() {

	$('#map_canvas').mapit();
	$('#map_canvas').trigger('show', '1')
});