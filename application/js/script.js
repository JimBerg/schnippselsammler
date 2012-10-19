(function( $ ){
	
	var previewBox = $( '#codebox' );
	var preview = $( '#previewbox > pre' );
	var hoverState = true;
	

	/*---------------------------------------------------------*
	 * add syntax highlighting on page load
	 *--------------------------------------------------------*/
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
			var codebox = document.getElementById( 'codebox' );
			var lastElement = $( '.highlighted' );
			
			if ( hoverState === false && $li.hasClass( 'highlighted' ) ) {
				$li.removeClass( 'highlighted' );
				hoverState = true;
			}
			
			if( hoverState === true && lastElement.length == 0 ) {
				$li.addClass( 'highlighted' );
				$( 'li' ).not( $li ).removeClass( 'highlighted' );
				hoverState = false;
				setEndOfContenteditable( codebox );	
			} else if ( hoverState === false && lastElement.length > 0 ) {
				lastElement.removeClass( 'highlighted' );
				$li.addClass( 'highlighted' );
				
				var snippetId =  $li.attr( 'data-id' );
				var text =  $li.attr( 'data-attr' );
				
				$( '#snippetId' ).val( snippetId );
				preview.html( ''+text+'' );
				prettyPrint();	
					
				$( '#snippet' ).val( text );
			} 
			
		});
	});
	
	/*---------------------------------------------------------*
	 * set cursor at the end of the textbox
	 * @param element, where the cursor is placed
	 *--------------------------------------------------------*/
	function setEndOfContenteditable( element ) {
	    var range;
	    var selection;
	    
	    if ( document.createRange ) { //Firefox, Chrome, Opera, Safari, IE 9+
	        range = document.createRange();//Create a range (a range is a like the selection but invisible)
	        range.selectNodeContents( element );//Select the entire contents of the element with the range
	        range.collapse( false );//collapse the range to the end point. false means collapse to end rather than the start
	       
	        selection = window.getSelection();//get the selection object (allows you to change selection)
	        selection.removeAllRanges();//remove any selections already made
	        selection.addRange( range );//make the range you have just created the visible selection
	    }
	    else if( document.selection ) { //IE 8 and lower
	        range = document.body.createTextRange();//Create a range (a range is a like the selection but invisible)
	        range.moveToElementText();//Select the entire contents of the element with the range
	        range.collapse( false );//collapse the range to the end point. false means collapse to end rather than the start
	        range.select();//Select the range (make it the visible selection
	    }
	}
	
	
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
	
	
	/*---------------------------------------------------------*
	* knockout data binding to update preview and write it
	* to hidden input field for save / update data
	*--------------------------------------------------------*/
	ko.bindingHandlers.htmlValue = {
	    init: function(element, valueAccessor, allBindingsAccessor) {
	        ko.utils.registerEventHandler(element, "keyup", function() {
	            var modelValue = valueAccessor();
	            var elementValue = element.innerText;
	            if (ko.isWriteableObservable(modelValue)) {
	                modelValue(elementValue);
	                
	            }
	            else { //handle non-observable one-way binding
	                var allBindings = allBindingsAccessor();
	                if (allBindings['_ko_property_writers'] && allBindings['_ko_property_writers'].htmlValue) allBindings['_ko_property_writers'].htmlValue(elementValue);
	            }
	        })
	    },
	    update: function(element, valueAccessor) {
	        var value = ko.utils.unwrapObservable(valueAccessor()) || "";
	        if (element.innerText !== value) {
	            element.innerText = value;    
	        }
	    }
	};

	function ViewModel() {
	    this.snippet = ko.observable( 'snippet' );
	}
	
	// Activates knockout.js
	ko.applyBindings( new ViewModel() );
	
	
})( jQuery );