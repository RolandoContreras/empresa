/* Copyright (c) 2010 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.4
 * 
 * Requires: 1.2.2+
 */
(function(b){var c=["DOMMouseScroll","mousewheel"];b.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var d=c.length;d;){this.addEventListener(c[--d],a,false)}}else{this.onmousewheel=a}},teardown:function(){if(this.removeEventListener){for(var d=c.length;d;){this.removeEventListener(c[--d],a,false)}}else{this.onmousewheel=null}}};b.fn.extend({mousewheel:function(d){return d?this.bind("mousewheel",d):this.trigger("mousewheel")},unmousewheel:function(d){return this.unbind("mousewheel",d)}});function a(d){var h=d||window.event,i=[].slice.call(arguments,1),e=0,f=true,j=0,g=0;d=b.event.fix(h);d.type="mousewheel";if(d.wheelDelta){e=d.wheelDelta/120}if(d.detail){e=-d.detail/3}g=e;if(h.axis!==undefined&&h.axis===h.HORIZONTAL_AXIS){g=0;j=-1*e}if(h.wheelDeltaY!==undefined){g=h.wheelDeltaY/120}if(h.wheelDeltaX!==undefined){j=-1*h.wheelDeltaX/120}i.unshift(d,e,j,g);return b.event.handle.apply(this,i)}})(jQuery);