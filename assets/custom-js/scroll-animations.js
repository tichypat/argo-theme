function setupOnScrollAnimations() {
	const sections = document.querySelectorAll( 'section' );

	sections.forEach( ( section ) => {
		const fadeTopElements = section.querySelectorAll( '.fade-in-to-top' );
		let delay = 0;

		fadeTopElements.forEach( ( fadingEl ) => {
			var tl = gsap.timeline( {
				scrollTrigger: {
					trigger: fadingEl,
					start: 'top bottom',
					// markers: true // for testing
				},
			} );

			tl.to( fadingEl, {
				y: 0,
				opacity: 1,
				duration: 0.8,
				delay: delay,
			} );

			delay += 0.05;
		} );
	} );
}

window.addEventListener( 'resize', ( e ) => {
	setupOnScrollAnimations();
} );
