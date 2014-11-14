<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en-US"> <!--<![endif]-->
<head>
<title>Waveline | <?php echo $title?></title>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $meta_description;?>" />
<meta name="keywords" content="<?php echo $meta_keywords;?>" />
<meta name="author" content="Waveline S.A.C." />
<meta name="rating" content="General" />
<meta name="robots" CONTENT="index,follow" />
<link rel="shortcut icon" href="<?php echo site_url().'static/images/icon.ico';?>">

<link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/bootstrap/bootstrap.css?1';?>"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/bootstrap/responsive.css?1';?>"/>
<link rel='stylesheet' href='http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css?ver=3.2.1' type='text/css' media='all'/>
<link rel='stylesheet' href='<?php echo site_url().'static/css/style/style.css'?>' type='text/css' media='all'/>
<link rel='stylesheet' href='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/theme51107/main-style.css' type='text/css' media='all'/>
<link rel='stylesheet' href='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/css/woocommerce.css?ver=2.1.12' type='text/css' media='all'/>
<link rel='stylesheet' href='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/css/woocommerce-layout.css?ver=2.1.12' type='text/css' media='all'/>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery-migrate-1.2.1.min.js?ver=1.2.1'></script>

<!--Banner Grande-->
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js?1';?>'></script>
<!--Banner Grande-->
<script src="<?php echo site_url().'static/cms/js/core/bootstrap-modal.js?1';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js?1';?>"></script>

<style type='text/css'>
    h1{font:normal 30px/35px Open Sans;color:#000000;}
    h2{font:normal 22px/22px Open Sans;color:#000000;}
    h3{font:normal 18px/22px Open Sans;color:#000000;}
    h4{font:normal 15px/18px Open Sans;color:#000000;}
    h5{font:normal 12px/18px Open Sans;color:#000000;}
    h6{font:normal 12px/18px Open Sans;color:#000000;}
    body{font-weight:normal;}
    .logo_h__txt,.logo_link{font:normal 40px/48px Open Sans;color:#2a343c;}
    .sf-menu>li>a{font:normal 14px/18px Open Sans;color:#626262;}
    .nav.footer-nav a{font:normal 13px/18px Open Sans;color:#ffffff;}
</style>

<script type="text/javascript">
		jQuery(function(){
			jQuery('ul.sf-menu').superfish({
				delay: 1000, // the delay in milliseconds that the mouse can remain outside a sub-menu without it closing
				animation: {
					opacity: "show",
					height: "show"
				}, // used to animate the sub-menu open
				speed: "normal", // animation speed
				autoArrows: false, // generation of arrow mark-up (for submenu)
				disableHI: true // to disable hoverIntent detection
			});
			var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
				ua = navigator.userAgent,
				gestureStart = function () {
					viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
				},
				scaleFix = function () {
					if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
						viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
						document.addEventListener("gesturestart", gestureStart, false);
					}
				};
			scaleFix();
		})
</script>
<script type="text/javascript">
            var site = '<?php echo site_url();?>';
</script>
</head>