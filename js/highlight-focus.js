(function($) {
	'use strict';
    
    var ringElem = null;
    var keyDownTime = 0;
    
    $(function() {
        ringElem = $('<div id="highlight-focus"></div>'); // use uniq element name to decrease the chances of a conflict with website styles
        $( 'body' ).append( ringElem );
        
        if( hf_params.noOutline === "1" )
            $( 'body' ).addClass( 'no-outline' );
        
        $( 'body' ).keydown( function( event ) {
            if ( event.which == 9 ) {
                keyDownTime = Date.now();
            }
        });
    });

    $(window).load(function() {        
        $( '*' ).bind( 'focus', function( event ) {
            if( Date.now() - keyDownTime > 40  )
                return;
            
            var offset = $(this).offset();
            
            $( ringElem )
                .finish()
                .addClass( 'highlight-focus-visible' )
                .animate({
                    'left': offset.left,
                    'top': offset.top,
                    'width': $(this).outerWidth(),
                    'height': $(this).outerHeight(),
                    'opacity': 1
                }, parseInt( hf_params.slideDuration ))
                .delay( parseInt( hf_params.slideDuration ) )
                .animate({
                    'opacity': 0
                }, parseInt( hf_params.hideDelay ), 'swing', function() {
                    $( ringElem ).removeClass( 'highlight-focus-visible' );
                })
            ;
        });
    });
})(jQuery);
