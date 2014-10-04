<?php 
$this->load->view("header");
?>
<body class="single single-product postid-1946 woocommerce woocommerce-page has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
 
<header class="motopress-wrapper header">
<div class="container">
<div class="row">
<div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="540e243e4744b">
 <?php
 $this->load->view("nav_secondary");
 ?>
 </div>
</div>
</div>
</header>
<div class="motopress-wrapper content-holder clearfix woocommerce">
<div class="container">
<div class="row">
<div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
    <section class="title-section">
        <h1 class="title-header"><?php echo $obj_products->name;?></h1>
        <ul class="breadcrumb breadcrumb__t">
            <a class="home" href="<?php echo site_url().'home';?>">Home</a> / 
            <a href="<?php echo site_url().convert_slug($obj_products->category);?>"><?php echo $obj_products->category ?></a> / <?php echo $obj_products->name;?></ul>  
    </section> 
</div>
</div>
<div class="row">
<div class="span9 right" id="content">
<div itemscope itemtype="http://schema.org/Product" id="product-1946" class="post-1946 product type-product status-publish has-post-thumbnail featured shipping-taxable purchasable product-type-simple product-cat-product-category-1 product-cat-product-category-5 product-tag-lorem-ipsum product-tag-sed-blandit-massa product-tag-vel-mauris instock">
    <div class="images">
    <!---------Principal Image----------->    
    <a href="<?php echo SERVER2.$obj_products->medium_image;?>" itemprop="image" class="woocommerce-main-image zoom">
        <img src="<?php echo SERVER2.$obj_products->medium_image;?>" class="attachment-shop_single wp-post-image" alt="<?php echo convert_slug($obj_products->name);?>"/>
    </a>
    <!---------Show Thumbnails---------->
        <div class="thumbnails">
            <a href="<?php echo SERVER2.$obj_products->big_image;?>" class="zoom first" data-rel="prettyPhoto[product-gallery]">
                <img width="90" height="90" src="<?php echo SERVER2.$obj_products->big_image;?>" class="attachment-shop_thumbnail" alt="<?php echo convert_slug($obj_products->name);?>"/>
            </a>
            <a href="<?php echo SERVER2.$obj_products->medium_image;?>" class="zoom" data-rel="prettyPhoto[product-gallery]">
                <img width="90" height="90" src="<?php echo SERVER2.$obj_products->medium_image;?>" class="attachment-shop_thumbnail" alt="<?php echo convert_slug($obj_products->name);?>"/>
            </a>
            <a href="<?php echo SERVER2.$obj_products->small_image;?>" class="zoom last" data-rel="prettyPhoto[product-gallery]">
                <img width="90" height="90" src="<?php echo SERVER2.$obj_products->small_image;?>" class="attachment-shop_thumbnail" alt="<?php echo convert_slug($obj_products->name);?>"/>
            </a>
        </div>
    <!---------------------------------->
    </div>
    
<div class="summary entry-summary">
    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <p class="price"><span class="amount">S/.<?php echo $obj_products->price;?></span></p>
    <meta itemprop="price" content="120"/>
    <meta itemprop="priceCurrency" content="USD"/>
    <link itemprop="availability" href="http://schema.org/InStock"/>
    </div>
    
    <div itemprop="description">
    </div>
<p class="stock "><?php echo $obj_products->stock;?> en stock</p>

<form class="cart" method="post" action="<?php echo site_url()."home/add_car"?>">
    <div class="quantity">
        <input type="number" step="1" min="1" max="150" name="quantity" value="1" class="input-text qty text" size="4"/>
        <input type="hidden" name="product_id" value="<?php echo $obj_products->product_id;?>" class="input-text text" size="4"/>
    </div>
    <button type="submit" class="button">Agregar al Carro</button>
</form>

<div class="product_meta">
<span class="tagged_as">Tags:
    <?php $tags = explode(",",$obj_products->tags);
    
             foreach ($tags as $value) { ?>
    <a href="<?php echo site_url().'tags/'.convert_slug($value);?>"><?php echo $value;?></a>&nbsp;
    <?php }  ?>
</span>
</div>
 
<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
 
<script type="text/javascript">
			(function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = '//apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
		</script>
    <ul class="share-buttons unstyled clearfix">
        <li class="twitter">
        <a href="//twitter.com/share" class="twitter-share-button">Tweet this article</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </li>
        
        <li class="facebook">
        <div id="fb-root"></div><div class="fb-like" data-href="http://livedemo00.template-help.com/woocommerce_51107/product/product-12/" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div>
        </li>
        
        <li class="google">
        <div class="g-plusone" data-size="medium" data-href="http://livedemo00.template-help.com/woocommerce_51107/product/product-12/"></div>
        </li>
        
        <li class="pinterest">
        <a href="javascript:void((function(){var e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)})());"><img src='//assets.pinterest.com/images/PinExt.png' alt=""/></a>
        </li>
    </ul> 
</div> 
    <div class="woocommerce-tabs">
    <ul class="tabs">
    <li class="description_tab">
    <a href="#tab-description">Descripción</a>
    </li>
    <li class="reviews_tab">
        <a href="#tab-reviews">Comentarios <?php echo "(".count($comments).")";?></a>
    </li>
    </ul>
        <div class="panel entry-content" id="tab-description">
        <h2>Descripcion del Producto</h2>
        <br/>
        <p><?php echo $obj_products->description;?></p>
        </div>
        
    <div class="panel entry-content" id="tab-reviews">
        <div id="reviews">
            <div id="comments">
                <ol class="commentlist">
                    <?php foreach ($comments as $value) { ?>
                            <li class="comment even thread-even depth-1">
                                <div class="comment_container">
                                    <img alt='<?php echo $value->name;?>' src='<?php echo site_url().'static/images/person.png';?>' class='avatar avatar-60 photo' height='60' width='60'/>
                                    <div class="comment-text">
                                        <p class="meta">
                                            <strong itemprop="author"><?php echo $value->name;?></strong> &ndash; <time datetime="2014-01-27T16:22:02+00:00"><?php echo formato_fecha($value->date_comment);?></time> 
                                        </p>

                                        <div class="description">
                                            <p><?php echo $value->comment;?></p>
                                        </div>
                                    </div>
                                </div>
                            </li> 
                 <?php } ?>
                </ol>
            </div>
            
            <div id="review_form_wrapper">
                <div id="review_form">
                    <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Agregar un Comentario</h3>
                    <p></p>
                        <form action="" method="post" id="commentform" class="comment-form">
                            <p class="comment-form-author">
                                <label for="author">Nombre <span class="required">*</span></label> 
                                <input id="name" name="name" type="text" value="" size="30" aria-required="true"/>
                            </p>
                            <p class="comment-form-email">
                                <label for="email">Correo <span class="required">*</span></label> 
                                <input id="email" name="email" type="text" value="" size="30" aria-required="true"/>
                            </p>
                            <p class="comment-form-comment">
                                <label for="comment">Comentario</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                            </p>
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" value="Enviar"/>
                            </p>
                        </form>
                    </div> 
                </div>
            </div>
        <div class="clear"></div>
      </div> 
    </div>
    </div>
    <!---------------PRODUCTOS RELACIONADOS----------------->
    <div class="related products">
    <h2>Productos Relacionados</h2>
        <ul class="products">
           <?php foreach ($related as $value) { ?>
                    <li class="post-1954 product type-product status-publish has-post-thumbnail first sale featured shipping-taxable purchasable product-type-simple product-cat-product-category-5 product-tag-sed-blandit-massa product-tag-vel-mauris instock">
                        <a href="<?php echo site_url().convert_slug($value->category."/".$value->name);?>">
                        <span class="onsale">Sale!</span>
                        <img src="<?php echo SERVER2.$value->big_image;?>" class="attachment-shop_catalog wp-post-image" alt="<?php echo convert_slug($value->name);?>"/>
                        <h3><?php echo corta_texto($value->name,20);?></h3>
                        </a>
                            <div class="short_desc">
                            <?php echo corta_texto($value->description,100);?> 
                            </div>
                    <span class="price"><ins><span class="amount">S/.<?php echo $value->price; ?></span></ins></span>
                    <br/><br/>
                    <a href="/woocommerce_51107/product/product-12/?add-to-cart=1954" rel="nofollow" data-product_id="1954" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                    </li>
            <?php } ?>
        </ul>
    </div>
    
    <meta itemprop="url" content="http://livedemo00.template-help.com/woocommerce_51107/product/product-12/"/>
</div> 
</div>
    <!-------------CATEGORIAS-------------------------->
        <div class="sidebar span3" id="sidebar" data-motopress-type="static-sidebar" data-motopress-sidebar-file="sidebar.php">
            <div id="categories-3" class="visible-all-devices widget">
                <h3>Categorías</h3> 
                <ul>
                    <?php foreach ($category as $value) { ?>
                    <li class="cat-item cat-item-13"><a href="<?php echo site_url().  convert_slug($value->name);?>"><?php echo $value->name;?></a></li>
                     <?php } ?>
                </ul>
            </div>
        </div>
    <!-------------------------------------------------->
</div>
</div>
</div>
<?php 

$this->load->view("footer");
?>
</div>
    
 
<script type='text/javascript' src='<?php echo site_url().'static/js/add_car.js';?>'></script>    
    

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
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.min.js?ver=3.1.5'></script>
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/prettyPhoto/jquery.prettyPhoto.init.min.js?ver=2.1.12'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes"};
/* ]]> */
</script>
<script type='text/javascript' src='//livedemo00.template-help.com/woocommerce_51107/wp-content/plugins/woocommerce/assets/js/frontend/single-product.min.js?ver=2.1.12'></script>
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