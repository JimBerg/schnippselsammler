(function( $ ){

	var preview = $( '#previewbox > pre' );
	var hoverState = true;
	

	/** add syntax highlighting on page load **/
	$( document ).ready( function() {
		prettyPrint();
	});
	
	
	/*---------------------------------------------------------*
	 * bind click event to listview head == h3
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
	
	
	/*---------------------------------------------------------*
	 * bind click event to listview items 
	 * to display snippet in box and make it editable
	 *--------------------------------------------------------*/
	$( 'li' ).each( function( index, element ) { 
		$( this ).on( 'click', function() {
			var $li = $( element );
			
			if( $li.hasClass( 'highlighted' ) ) {
				$li.removeClass( 'highlighted' );
				hoverState = true;
			} else { 
				$li.addClass( 'highlighted' );
				$( 'li' ).not( $li ).removeClass( 'highlighted' );
				hoverState = false;
			}
			
			
		});
	});
	
	
	/*---------------------------------------------------------*
	 * hover event for listview items 
	 * display snippet in preview box
	 *--------------------------------------------------------*/
	var previewHandler = function( event ) {
		if(  hoverState === true ) {
			var element = event.data.element;
			var snippetId =  $( element ).attr( 'data-id' );
			var text =  $( element ).attr( 'data-attr' );
			
			$( '#snippetId' ).val( snippetId );
			preview.html( ''+text+'' );
			prettyPrint();	
			
			// not here but for now...			
			$( '#snippet' ).val( text );
		}
	}
	
	$( 'li' ).each( function( index, element ) { 
		$( this ).bind( 'mouseover', { 'element': element }, previewHandler );
	});
	
})( jQuery );