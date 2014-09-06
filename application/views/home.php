<?php $this->load->view("header");?>

<body class="home page page-id-203 page-template page-template-page-home-php has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
    <header class="motopress-wrapper header">
    <div class="container">
    <div class="row">
    <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="5406108c02e7c">
    
    <!--Menu Navigacion Secundary-->
    <div class="row">
    <div class="span12 full-top-shop" data-motopress-type="static" data-motopress-static-file="static/static-shop-nav.php">
        <div id="woocommerce_widget_cart-2" class="cart-holder">
            <h3>Carrito</h3>
            <div class="widget_shopping_cart_content"></div><!--Mensaje de carrito no hay productos-->
        </div>
         <div class="shop-nav">
             <ul id="shopnav" class="shop-menu">
                    <li><a href="" class='register-link' title="Registro">Registro</a></li>
                    <li id="menu-item-2020" title=""><a href="Delivery">Delivery</a></li>
                    <li id="menu-item-2021" title="Mi Cuenta"><a href="">Mi Cuenta</a></li>
            </ul>
         </div> 
    </div>
    </div>
     <!--------------------------->
     
    <div class="row">
    <div class="span12 full-top-nav">
    <div class="row">
    <div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
        <div class="logo pull-left">
            <a href="<?php echo site_url().'home';?>" class="logo_h logo_h__img"><img src="<?php echo site_url().'static/images/logo.png';?>" alt="TradeE&C" title="Logo"></a>
        </div>
    </div>
    <div class="span6" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
        <!--Show the NAV-->
        <?php $this->load->view("nav");?>
        <!---------------->
    </div>

    <!----Search---->
    <div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-search.php">
        <div class="search-form search-form__h clearfix">
            <form id="search-header" class="navbar-form pull-right" method="get" action="" accept-charset="utf-8">
            <input type="text" name="s" placeholder="search" class="search-form_it">
            <input type="submit" value="Go" id="search-form_is" class="search-form_is">
            </form>
        </div>
    </div>
    <!----Search----> 
        
    </div>
    </div>
    </div> 
    </div>
    </div>
    </div>
    </header>
    
    <!---------Slide fro banner-------->
    <script type='text/javascript' src='<?php echo site_url().'static/js/banner.js';?>'></script>    
    <div id="parallax-slider-5406108c1acd1" class="parallax-slider">
      <ul class="baseList">
          <li data-preview="<?php echo site_url().'static/images/banner/slide01.jpg';?>">
                <div class="slider_caption>"><h2><span>Productos Top</span></h2>
                    <h3>
                        <p>
                        <span>Lorem ipsum dolor sit amet, consectetur. </span>
                        </p>
                        <a href="blog/">Mostrar Ahora!</a> <!--Go to product's detail-->
                    </h3>
                </div>
          </li>
          <li data-preview="<?php echo site_url().'static/images/banner/slide02.jpg';?>">
              <div class="slider_caption>"><h2><span>Productos Top</span></h2>
                    <h3>
                        <p>
                        <span>Lorem ipsum dolor sit amet, consectetur. </span>
                        </p>
                        <a href="blog/">Mostrar Ahora!</a> <!--Go to product's detail-->
                    </h3>
            </div>
          </li>
          
          <!--<li data-preview="<?php echo site_url().'static/images/banner/slide03.jpg';?>" data-img-width="1920" data-img-height="700">-->
          <li data-preview="<?php echo site_url().'static/images/banner/slide03.jpg';?>">
                <div class="slider_caption>"><h2><span>Productos Top</span></h2>
                    <h3>
                        <p>
                        <span>Lorem ipsum dolor sit amet, consectetur. </span>
                        </p>
                        <a href="blog/">Mostrar Ahora!</a> <!--Go to product's detail-->
                    </h3>
                </div>
          </li>
      </ul>
    </div>
    <!---------Slide fro banner-------->
    
    <div class="motopress-wrapper content-holder clearfix">
    <div class="container">
    <div class="row">
    <div class="span12" data-motopress-wrapper-file="page-home.php" data-motopress-wrapper-type="content">
    <div class="row">
    <div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-slider.php">
    <div class="slider_off"></div>
    </div>
    </div>
        
    <div class="row">
    <div class="span12" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
    <div id="post-203" class="post-203 page type-page status-publish hentry page">
    
    <!----Custom banners---->    
    <div class="custom_banners">
        <div class="custom_banners_wrap_inner">
            <div class="row ">
                <div class="span4 ">
                    <a href="product/product-12/" title="Meat Grinder -20%" class="banner-wrap ">
                        <figure class="featured-thumbnail">
                            <img src="<?php echo site_url().'static/images/custom/banner01.jpg';?>" title="Meat Grinder -20%" alt=""/>
                        </figure>
                        <div class="extra-wrap"><h5>Meat Grinder -20%</h5><p><span>Nunc pulvinar turpis</span></p>
                            <div class="link-align banner-btn">Comprar Ahora</div>
                        </div>
                    </a> 
                </div>

                <div class="span4 ">
                    <a href="product/product-9/" title=" Vacuum Cleaner -10%" class="banner-wrap ">
                        <figure class="featured-thumbnail">
                            <img src="<?php echo site_url().'static/images/custom/banner02.jpg';?>" title=" Vacuum Cleaner -10%" alt=""/>
                        </figure>
                        <div class="extra-wrap"><h5> Vacuum Cleaner -10%</h5><p><span>Nunc pulvinar turpis</span></p>
                            <div class="link-align banner-btn">Comprar Ahora</div>
                        </div>
                    </a> 
                </div>

                <div class="span4 ">
                    <a href="product/product-4/" title="Plasma Television -15%" class="banner-wrap ">
                        <figure class="featured-thumbnail">
                            <img src="<?php echo site_url().'static/images/custom/banner03.jpg';?>" title="Plasma Television -15%" alt=""/>
                        </figure>
                        <div class="extra-wrap"><h5>Plasma Television -15%</h5><p><span>Alli Nunc pulvinar turpis</span></p>
                            <div class="link-align banner-btn">Comprar Ahora</div>
                        </div>
                    </a> 
                </div>
            </div> 
        </div>
    </div>
    <!----Custom banners---->    
        
    <div class="row ">
    <div class="span3 ">
        <!----Categories---->            
        <div class="featured_categories">
            <div class="featured_categories_wrap_inner">
                <h2>Categorias</h2>
                <ul class='advanced_categories cols_1'>
                    <li class='advanced_categories_item last'>
                        <div class='advanced_categories_item_inner'>
                        <h4><a href='http://livedemo00.template-help.com/woocommerce_51107/product-category/product-category-2/'>ElectroHogar</a></h4>
                        </div>
                    </li>
                    
                    <li class='advanced_categories_item last'>
                        <div class='advanced_categories_item_inner'>
                        <h4><a href='http://livedemo00.template-help.com/woocommerce_51107/product-category/product-category-1/'>Tecnología</a></h4>
                        </div>
                    </li>
                    
                    <li class='advanced_categories_item last'>
                        <div class='advanced_categories_item_inner'>
                        <h4><a href='http://livedemo00.template-help.com/woocommerce_51107/product-category/product-category-4/'>Muebles</a></h4>
                        </div>
                    </li>
                    
                    <li class='advanced_categories_item last'>
                        <div class='advanced_categories_item_inner'>
                        <h4><a href='http://livedemo00.template-help.com/woocommerce_51107/product-category/product-category-5/'>Infantil</a></h4>
                        </div>
                    </li>
                    
                    <li class='advanced_categories_item last'>
                        <div class='advanced_categories_item_inner'>
                        <h4><a href='http://livedemo00.template-help.com/woocommerce_51107/product-category/product-category-3/'>Accesorios y Belleza</a></h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!---------------->
    </div>
      
    <!-----Featured Products----->    
    <div class="span9 ">
        <div class="featured_products">
            <div class="featured_products_wrap_inner">
                <h2>Productos Destacados</h2>
                    <div class="woocommerce columns-3">
                        <ul class="products">
                        <li class="post-1958 product type-product status-publish has-post-thumbnail first featured shipping-taxable purchasable product-type-simple product-cat-product-category-2 product-cat-product-category-4 product-tag-etiam-dictum product-tag-mauris-posuere product-tag-vel-mauris instock">
                            <a href="http://livedemo00.template-help.com/woocommerce_51107/product/product-15/">
                                <!--<span class="onsale">Sale!</span>-->
                                <img width="300" height="300" src="<?php echo site_url().'upload/products/acer.jpg';?>" class="attachment-shop_catalog wp-post-image" alt=""/>
                                <h3>Acer h233h bmid... </h3>
                                
                                <div class="star-rating" title="Rated 5.00 out of 5">
                                    <span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
                                </div>
                            </a>
                            <div class="short_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <span class="price">
                                <del><span class="amount">&#36;75.00</span></del><!----Precio tachado----->
                                <ins>
                                    <span class="amount">&#36;70.00</span>
                                </ins>
                            </span>
                            <a href="/woocommerce_51107/?add-to-cart=1958" rel="nofollow" data-product_id="1958" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                        </li>
                        
                        <li class="post-1954 product type-product status-publish has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple product-cat-product-category-5 product-tag-sed-blandit-massa product-tag-vel-mauris instock">
                            <a href="">
                                <img  width="300" height="300" src="<?php echo site_url().'upload/products/spaker.jpg'?>" class="attachment-shop_catalog wp-post-image" alt=""/>
                                <h3>Altec lansing fx3022... </h3>
                            </a>
                            <div class="short_desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <span class="price">
                                    <span class="amount">&#36;70.00</span>
                            </span>
                            <a href="/woocommerce_51107/?add-to-cart=1954" rel="nofollow" data-product_id="1954" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                        </li>
                        
                        <li class="post-1950 product type-product status-publish has-post-thumbnail last featured shipping-taxable purchasable product-type-simple product-cat-product-category-2 product-cat-product-category-4 product-tag-etiam-dictum product-tag-mauris-posuere product-tag-sed-blandit-massa product-tag-vel-mauris instock">
                            <a href="">
                                <img src="<?php echo site_url().'upload/products/apple.jpg';?>" class="attachment-shop_catalog wp-post-image" alt=""/>
                            <h3>Apple mac mini</h3>
                            </a>
                            
                            <div class="short_desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <span class="price">
                                <span class="amount">&#36;100.00</span>
                            </span>
                            <a href="/woocommerce_51107/?add-to-cart=1950" rel="nofollow" data-product_id="1950" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                        </li>
                        
                        <li class="post-1946 product type-product status-publish has-post-thumbnail first featured shipping-taxable purchasable product-type-simple product-cat-product-category-1 product-cat-product-category-5 product-tag-lorem-ipsum product-tag-sed-blandit-massa product-tag-vel-mauris instock">
                            <a href="">
                            <img src="<?php echo site_url().'upload/products/headphone.jpg';?>" class="attachment-shop_catalog wp-post-image" alt=""/>
                            <h3>Behringer headphones hps3000</h3>
                            </a>
                            
                            <div class="short_desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                            <span class="price"><span class="amount">&#36;120.00</span></span>
                            <a href="/woocommerce_51107/?add-to-cart=1946" rel="nofollow" data-product_id="1946" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                        </li>
                        
                        <li class="post-1942 product type-product status-publish has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple product-cat-product-category-2 product-tag-etiam-dictum product-tag-mauris-posuere product-tag-sed-blandit-massa product-tag-vel-mauris instock">
                            <a href="">
                            <img src="<?php echo site_url().'upload/products/loudspeakers.jpg';?>" class="attachment-shop_catalog wp-post-image" alt=""/>
                            <h3>B-e-w 803 diamond... </h3>
                            </a>
                            
                            <div class="short_desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                            <span class="price"><del><span class="amount">&#36;94.50</span></del> <ins><span class="amount">&#36;80.00</span></ins></span>
                            <a href="/woocommerce_51107/?add-to-cart=1942" rel="nofollow" data-product_id="1942" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                        </li>
                        
                        <li class="post-1938 product type-product status-publish has-post-thumbnail last featured shipping-taxable purchasable product-type-simple product-cat-product-category-4 product-tag-sed-blandit-massa product-tag-vel-mauris instock">
                            <a href="">
                            <img src="<?php echo site_url().'upload/products/camera.jpg';?>" class="attachment-shop_catalog wp-post-image" alt=/>
                            <h3>Canon eos rebel... </h3>
                            </a>
                            
                            <div class="short_desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                            <span class="price">
                                <span class="amount">&#36;104.00</span>
                            </span>
                            <a href="/woocommerce_51107/?add-to-cart=1938" rel="nofollow" data-product_id="1938" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------->   
    </div> 
    <div class="clear"></div>

    </div> 
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
<!------call footer----->    
    <?php $this->load->view("footer");?>
<!------call footer----->
</div>

<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-includes/js/comment-reply.min.js?ver=3.9.1'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/contact-form-7/includes/js/jquery.form.min.js?ver=3.50.0-2014.02.05'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/livedemo00.template-help.com\/woocommerce_51107\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=3.8'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_add_to_cart_params = {"ajax_url":"\/woocommerce_51107\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/livedemo00.template-help.com\/woocommerce_51107\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif","i18n_view_cart":"View Cart","cart_url":"http:\/\/livedemo00.template-help.com\/woocommerce_51107\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
/* ]]> */
</script>
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=2.1.12'></script>
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.60'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_params = {"ajax_url":"\/woocommerce_51107\/wp-admin\/admin-ajax.php","ajax_loader_url":"\/\/livedemo00.template-help.com\/woocommerce_51107\/wp-content\/plugins\/woocommerce\/assets\/images\/ajax-loader@2x.gif"};
/* ]]> */
</script>
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=2.1.12'></script>
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min.js?ver=1.3.1'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_cart_fragments_params = {"ajax_url":"\/woocommerce_51107\/wp-admin\/admin-ajax.php","fragment_name":"wc_fragments"};
/* ]]> */
</script>
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=2.1.12'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/superfish.js?ver=1.5.3'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery.mobilemenu.js?ver=1.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery.magnific-popup.min.js?ver=0.9.3'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/cherry-plugin/lib/js/FlexSlider/jquery.flexslider-min.js?ver=2.2.2'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jplayer.playlist.min.js?ver=2.3.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery.jplayer.min.js?ver=2.6.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/tmstickup.js?ver=1.0.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/device.min.js?ver=1.0.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery.zaccordion.min.js?ver=2.1.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/camera.min.js?ver=1.3.4'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery.debouncedresize.js?ver=1.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery.ba-resize.min.js?ver=1.1'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/CherryFramework/js/jquery.isotope.js?ver=1.5.25'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/cherry-plugin/includes/js/cherry-plugin.js?ver=1.2.3'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/theme51107/js/custom-script.js?ver=1.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/theme51107/js/parallaxSlider.js?ver=1.0'></script>
<script type='text/javascript' src='http://livedemo00.template-help.com/woocommerce_51107/wp-content/themes/theme51107/js/smoothing-scroll.js?ver=1.0'></script>
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