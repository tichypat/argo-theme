// On <a> element click inside offcanvas, hide the offcanvas
window.addEventListener( 'load', ( e ) => {
	const offcanvasEls = document.querySelectorAll( '.offcanvas' );

	offcanvasEls.forEach( ( offcanvasElement ) => {
		const linksInOffcavas = offcanvasElement.querySelectorAll( 'a' );

		linksInOffcavas.forEach( ( link ) => {
			link.addEventListener( 'click', ( e ) => {
				const bsOffcanvas = bootstrap.Offcanvas.getInstance(
					'#' + offcanvasElement.getAttribute( 'id' )
				);
				bsOffcanvas.hide();
			} );
		} );
	} );
} );
