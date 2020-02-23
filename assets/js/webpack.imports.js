Promise.all([
	import(/* webpackChunkName: "base-styles" */'../scss/base.scss'),
	import(/* webpackChunkName: "base-font-faces" */'../scss/font-faces.scss')
]).then(() => {
	window.observeElements( document.querySelectorAll( "h1,h2,h3,h4,h5,h6" ), (node) => {
		import(/* webpackChunkName: "base-styles-headlines" */'../scss/components/headlines.scss');
	});

	window.observeElements( document.querySelectorAll( "blockquote" ), (node) => {
		import(/* webpackChunkName: "base-styles-headlines" */'../scss/components/blockquote.scss');
	});

	window.observeElements( document.querySelectorAll( ".alert" ), (node) => {
		import(/* webpackChunkName: "base-styles-headlines" */'../scss/components/alerts.scss');
	});

	window.observeElements( document.querySelectorAll( ".wp-admin.block-editor-page" ), (node) => {
		import(/* webpackChunkName: "wp-admin-styles" */'../scss/wp-admin.scss');
	});

});


