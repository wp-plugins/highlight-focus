(function($) {
    'use strict';
    
    var DURATION = hf_params.duration;

    var ringElem = null;
    var movingId = 0;
    var prevFocused = null;
    var keyDownTime = 0;

    var win;
    var doc;
    var docElem;
    var body;

    $(function() {
        $( '*' ).bind( 'focus', function( event ) {
            console.log( $( this ) );
        });
         
        win = window;
        doc = document;
        docElem = doc.documentElement;
        body = doc.body;


        docElem.addEventListener('keydown', function(event) {
            var code = event.which;
            // Show animation only upon Tab or Arrow keys press.
            if (code === 9 || (code > 36 && code < 41)) {
                keyDownTime = Date.now();
            }
        }, false);


        docElem.addEventListener('focus', function(event) {
            var target = event.target;
            if (target.id === 'highlight-focus') {
                return;
            }

            var isFirstFocus = false;
            if (!ringElem) {
                isFirstFocus = true;
                initialize();
            }

            var offset = offsetOf(target);
            ringElem.style.left = offset.left + 'px';
            ringElem.style.top = offset.top + 'px';
            ringElem.style.width = target.offsetWidth + 'px';
            ringElem.style.height = target.offsetHeight + 'px';

            if (isFirstFocus || !isJustPressed()) {
                return;
            }

            onEnd();
            target.classList.add('highlight-focus_target');
            ringElem.classList.add('highlight-focus_visible');
            prevFocused = target;
            movingId = setTimeout(onEnd, DURATION);
        }, true);


        docElem.addEventListener('blur', function() {
            onEnd();
        }, true);
    });
    
    function onEnd() {
        if (!movingId) {
            return;
        }
        clearTimeout(movingId);
        movingId = 0;
        ringElem.classList.remove('highlight-focus_visible');
        prevFocused.classList.remove('highlight-focus_target');
        prevFocused = null;
    }


    function isJustPressed() {
        return Date.now() - keyDownTime < 42
    }


    function offsetOf(elem) {
        var rect = elem.getBoundingClientRect();
        var clientLeft = docElem.clientLeft || body.clientLeft;
        var clientTop  = docElem.clientTop  || body.clientTop;
        var scrollLeft = win.pageXOhfset || docElem.scrollLeft || body.scrollLeft;
        var scrollTop  = win.pageYOhfset || docElem.scrollTop  || body.scrollTop;
        var left = rect.left + scrollLeft - clientLeft;
        var top =  rect.top  + scrollTop  - clientTop;
        return {
            top: top || 0,
            left: left || 0
        };
    }

    function initialize() {
        ringElem = doc.createElement('div'); // use uniq element name to decrease the chances of a conflict with website styles
        ringElem.id = 'highlight-focus';
        ringElem.style.transitionDuration = ringElem.style.WebkitTransitionDuration = parseInt( DURATION ) / 1000 + 's';
        ringElem.style.boxShadow = '0 0 2px 3px ' + hf_params.color + ', 0 0 2px ' + hf_params.color + ' inset';
        body.appendChild(ringElem);
    }
})(jQuery);
