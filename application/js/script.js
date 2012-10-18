(function( $ ){

	/** add syntax highlighting on page load **/
	$( document ).ready( function() {
		prettyPrint();
	});
	
	
	/*---------------------------------------------------------*
	 * bind click event to listview 
	 * add class collapsed or expanded to list an save state
	 *--------------------------------------------------------*/
	$( 'h3' ).each( function( index, element ) {
		
		var $li = $( element ).next( 'ul' );
		var $id = $li.attr( 'data-id' );
		
		if( localStorage.getItem( 'item-'+$id ) == 1 && !$li.hasClass( 'expanded' ) ) {
			$li.addClass( 'expanded' );
			$li.removeClass( 'collapsed' );
		} else {
			$li.addClass( 'collapsed' );
			$li.removeClass( 'expanded' );
		}
		
		$( this ).on( 'click', function() { 
			if( $li.hasClass( 'expanded' ) ) { //set localStorage true
				localStorage.removeItem( 'item-'+$id );
				$li.removeClass( 'expanded' );		
				$li.addClass( 'collapsed' );			
			} else if( $li.hasClass( 'collapsed' ) ) { //remove item from localStorage
				localStorage.setItem( 'item-'+$id, 1 );
				$li.removeClass( 'collapsed' );		
				$li.addClass( 'expanded' );	
			}
		});
	});
	
	
})( jQuery );