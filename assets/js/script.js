( function() {
	var ready = function() {

		var tweetButtons = document.querySelectorAll( '.stq_button[data-text=""], .stq_button:not([data-text])' );
		[].forEach.call( tweetButtons, function( el ) {
			var parent = el.parentNode;
			var origLabel = el.innerHTML;
			el.innerHTML = '';

			// Find a parent with text.
			while ( parent && 'BODY' !== parent.tagName && '' === parent.innerText.trim() ) {
				parent = parent.parentNode;
			}

			el.setAttribute( 'data-text', parent.innerText.trim() );
			el.innerHTML = origLabel;
		} );
	};

	if ( 'loading' !== document.readyState ) {
		ready();
	} else {
		document.addEventListener( 'DOMContentLoaded', ready );
	}

} )();
