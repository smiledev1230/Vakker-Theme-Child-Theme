(function($) {
    "use strict";

    var searchExpanding = {};
    eltd.modules.searchExpanding = searchExpanding;

    searchExpanding.eltdOnDocumentReady = eltdOnDocumentReady;

    $(document).ready(eltdOnDocumentReady);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function eltdOnDocumentReady() {
	    eltdSearchExpanding();
    }
	
	/**
	 * Init Search Types
	 */
	function eltdSearchExpanding() {
		var searchHolder = $('.eltd-search-widget-holder.eltd-search-expanding');

		if(searchHolder.length) {
			searchHolder.each(function(){
				var thisHolder = $(this),
					opener = thisHolder.find('.eltd-search-opener');
				
				opener.click(function (e) {
					e.preventDefault();
					
					thisHolder.toggleClass('eltd-is-active');
				});
			});
		}
	}

})(jQuery);
