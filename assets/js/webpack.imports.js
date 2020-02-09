Promise.all([
	import(/* webpackChunkName: "base-styles" */'../scss/styles.scss')
]).then(() => {
	window.observeElements( document.querySelectorAll( "h1,h2,h3,h4,h5,h6" ), (node) => {
		import(/* webpackChunkName: "base-styles-headlines" */'../scss/components/headlines.scss');
	}, {loop: false} );

	window.observeElements( document.querySelector( ".alert" ), (node) => {
		import(/* webpackChunkName: "base-styles-alerts" */'../scss/components/alerts.scss');
	}, {loop: false} );

	window.observeElements( document.querySelectorAll( ".article" ), (node) => {
		import(/* webpackChunkName: "base-styles-alerts" */'../scss/components/article.scss');
	}, {loop: false} );
/*
	window.observeElements( document.querySelectorAll( "blockquote" ), (node) => {
		import(/!* webpackChunkName: "base-styles-headlines" *!/'../scss/components/_blockquote.scss');
	}, {loop: false} );*/
});