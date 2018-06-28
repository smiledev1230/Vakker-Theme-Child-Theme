(function($) {
    "use strict";

    var headerExpanding = {};
    eltd.modules.headerExpanding = headerExpanding;

	headerExpanding.eltdOnDocumentReady = eltdOnDocumentReady;
	headerExpanding.eltdOnWindowLoad = eltdOnWindowLoad;
	headerExpanding.eltdOnWindowResize = eltdOnWindowResize;
	headerExpanding.eltdOnWindowScroll = eltdOnWindowScroll;

    $(document).ready(eltdOnDocumentReady);
    $(window).load(eltdOnWindowLoad);
    $(window).resize(eltdOnWindowResize);
    $(window).scroll(eltdOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdExpandingMenu();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function eltdOnWindowLoad() {
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function eltdOnWindowResize() {
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function eltdOnWindowScroll() {
    }

	/**
	 * Init Expanding Menu
	 */
	function eltdExpandingMenu() {

		if ($('a.eltd-expanding-menu-opener').length) {

			var expandingMenuOpener = $( 'a.eltd-expanding-menu-opener');

			// Open expanding menu
			expandingMenuOpener.on('click',function(e){
				e.preventDefault();

				if (!expandingMenuOpener.hasClass('eltd-fm-opened')) {
					expandingMenuOpener.addClass('eltd-fm-opened');
					eltd.body.addClass('eltd-expanding-menu-opened');
					$(document).keyup(function(e){
						if (e.keyCode == 27 ) {
							expandingMenuOpener.removeClass('eltd-fm-opened');
							eltd.body.removeClass('eltd-expanding-menu-opened');
						}
					});
				} else {
					expandingMenuOpener.removeClass('eltd-fm-opened');
					eltd.body.removeClass('eltd-expanding-menu-opened');
				}
			});
		}
	}

})(jQuery);