(function (win,doc) {

	var JK = {

		init: function(){
			JK.setupFeaturedImage();
		},

		setupFeaturedImage: function(){
			var featuredImage = doc.querySelector('.featured-image');
			if(featuredImage){
				JK.featuredImage = featuredImage;
				window.addEventListener('scroll', JK.onBlogScroll)
			}
		},

		onBlogScroll: function(){
			offset = window.pageYOffset;
			header = doc.querySelector('.article-header');
			if(offset < 480){
				pos = offset * 0.2;
				header.style.marginTop = pos + "px";
			}
		}


	}

	// cutting the mustard
	if ('querySelector' in document && 'localStorage' in window && 'addEventListener' in window ) {

		JK.init();

	}

}(window, document));