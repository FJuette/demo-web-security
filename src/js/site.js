function ResetDatabase() {
	$.get( "reset.php", function( data ) {
		$( "#info" ).html( data );
		console.log( "Reset was performed." );
	});
}

function CreateDatabase() {
	$.get( "reset.php", function( data ) {
		$( "#info" ).html( data );
		console.log( "Reset was performed." );
	});
}