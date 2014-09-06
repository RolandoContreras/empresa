                    jQuery(function() {
                            var isparallax = true;
                            if(!device.mobile() && !device.tablet()){
                                    isparallax = true;
                            }else{
                                    isparallax = false;
                            }

                                    jQuery('#parallax-slider-5406108c1acd1').parallaxSlider({
                                            animateLayout: "simple-fade-eff"
                                    ,	parallaxEffect: isparallax
                                    ,	duration: 1500				,	autoSwitcher: true				,	autoSwitcherDelay: 7000				,	slider_navs: true				,	slider_pagination: false				});

                    });