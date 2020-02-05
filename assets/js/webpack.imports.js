Promise.all([
	import(/* webpackChunkName: "base-styles" */'../scss/base.scss')
]).then(() => {
	window.observeElements( document.querySelectorAll( "h1,h2,h3,h4,h5,h6" ), (node) => {
		import(/* webpackChunkName: "base-styles-headlines" */'../scss/components/headlines.scss');
	}, {loop: false} );

	window.observeElements( document.querySelectorAll( "blockquote" ), (node) => {
		import(/* webpackChunkName: "base-styles-headlines" */'../scss/components/blockquote.scss');
	}, {loop: false} );
});


