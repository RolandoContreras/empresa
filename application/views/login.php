<?php $this->load->view("header");?>
<body class="page page-id-1917 page-template-default woocommerce-account woocommerce-page has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
 
<header class="motopress-wrapper header">
<div class="container">
<div class="row">
<div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="5411f23185347">

<div class="row">
<div class="span12 full-top-nav">
  <?php $this->load->view("nav_secondary");?>
</div>
</div>
</div>
</header>
<div class="motopress-wrapper content-holder clearfix">
<div class="container">
<div class="row">
<div class="span12" data-motopress-wrapper-file="page.php" data-motopress-wrapper-type="content">
<div class="row">
<div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
    <section class="title-section">
        <h1 class="title-header">Mi Cuenta</h1>
            <ul class="breadcrumb breadcrumb__t">
                <li><a href="<?php echo site_url().'home';?>">Home</a></li>
                <li class="divider"></li><li class="active">My Account</li>
            </ul>  
    </section>  
</div>
</div>
<div class="row">
<div class="span9 right right" id="content" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
<div id="post-1917" class="post-1917 page type-page status-publish hentry page">
<div class="woocommerce">
<h2>Login</h2>
<form method="post" class="login">
<p class="form-row form-row-wide">
<label for="username">Usuario o Correo <span class="required">*</span></label>
<input type="text" class="input-text" name="username" id="username" value=""/>
</p>
<p class="form-row form-row-wide">
<label for="password">Contraseña<span class="required">*</span></label>
<input class="input-text" type="password" name="password" id="password"/>
</p>
<p class="form-row">
<input type="hidden" id="_wpnonce" name="_wpnonce" value="2e230f1a3a"/><input type="hidden" name="_wp_http_referer" value="/woocommerce_51107/my-account/"/> <input type="submit" class="button" name="login" value="Login"/>
<label for="rememberme" class="inline">
<input name="rememberme" type="checkbox" id="rememberme" value="forever"/> Remember me </label>
</p>
<p class="lost_password">
<a href="http://livedemo00.template-help.com/woocommerce_51107/my-account/lost-password/">¿Olvidaste tu contraseña?</a>
</p>
</form>
</div>
<div class="clear"></div>
 
</div> 
</div>
<div class="span3 sidebar" id="sidebar" data-motopress-type="static-sidebar" data-motopress-sidebar-file="sidebar.php">
<div id="categories-3" class="visible-all-devices widget"><h3>Categories</h3> <ul>
<li class="cat-item cat-item-13"><a href="http://livedemo00.template-help.com/woocommerce_51107/category/fusce-feugiat/" title="View all posts filed under Fusce feugiat">Fusce feugiat</a>
</li>
<li class="cat-item cat-item-15"><a href="http://livedemo00.template-help.com/woocommerce_51107/category/phasellus-porta/" title="View all posts filed under Phasellus porta">Phasellus porta</a>
</li>
<li class="cat-item cat-item-16"><a href="http://livedemo00.template-help.com/woocommerce_51107/category/sit-amet-2/" title="View all posts filed under Sit amet">Sit amet</a>
</li>
<li class="cat-item cat-item-1"><a href="http://livedemo00.template-help.com/woocommerce_51107/category/uncategorized/" title="View all posts filed under Uncategorized">Uncategorized</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php  $this->load->view("footer");?>    
</div>
    
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js';?>'></script>    
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.form.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery-cookie.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/device.min.js';?>'></script>
<!----Script perzonalizado de Mensaje del precio ------>
<script type='text/javascript' src='<?php echo site_url().'static/js/custom-script.js';?>'></script>
<!----------------------------------------------------->
<script type='text/javascript' src='<?php echo site_url().'static/js/parallaxSlider.js';?>'></script>

<script>
			(function($) {
				$(window).load(function() {
					if ($('.widget_shopping_cart_content').is(':empty')) {
						$('.widget_shopping_cart_content').text('No products in the cart.');
					}
				});
			})(jQuery);
</script>
</body>
</html>