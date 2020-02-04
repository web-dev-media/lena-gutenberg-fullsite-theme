document.addEventListener( 'DOMContentLoaded', function( event ) {
	import(/* webpackChunkName: "base-styles" */'../scss/core/base.scss');

	// observe default headlines
	window.observeElements( document.querySelectorAll( "h1,h2,h3,h4,h5,h6" ), () => {
		import(/* webpackChunkName: "base-styles-headlines" */'../scss/core/headlines.scss');
	}, {loop: false} );
});