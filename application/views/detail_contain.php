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

<form class="cart" method="post" enctype='multipart/form-data'>
<div class="quantity"><input type="number" step="1" min="1" max="150" name="quantity" value="1" title="Qty" class="input-text qty text" size="4"/></div>
<input type="hidden" name="add-to-cart" value="1946"/>
<button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>
</form>
<div class="product_meta">
<span class="posted_in">Categories: <a href="http://livedemo00.template-help.com/woocommerce_51107/product-category/product-category-1/" rel="tag">Lorem ipsum</a>, <a href="http://livedemo00.template-help.com/woocommerce_51107/product-category/product-category-5/" rel="tag">Proin ut</a>.</span>
<span class="tagged_as">Tags: <a href="http://livedemo00.template-help.com/woocommerce_51107/product-tag/lorem-ipsum/" rel="tag">Lorem ipsum</a>, <a href="http://livedemo00.template-help.com/woocommerce_51107/product-tag/sed-blandit-massa/" rel="tag">Sed blandit massa</a>, <a href="http://livedemo00.template-help.com/woocommerce_51107/product-tag/vel-mauris/" rel="tag">vel mauris</a>.</span>
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
    <a href="#tab-description">Description</a>
    </li>
    <li class="reviews_tab">
    <a href="#tab-reviews">Comentarios (2)</a>
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
            <h2>2 reviews for Behringer headphones hps3000</h2>
                <ol class="commentlist">
                    <li itemprop="reviews" itemscope itemtype="http://schema.org/Review" class="comment even thread-even depth-1" id="li-comment-29">
                        <div id="comment-29" class="comment_container">
                        <img alt='admin' src='http://1.gravatar.com/avatar/5cdc09662dd539303e316621ec21b6be?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60'/>
                            <div class="comment-text">
                                <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="Rated 3 out of 5">
                                <span style="width:60%"><strong itemprop="ratingValue">3</strong> out of 5</span>
                                </div>
                            <p class="meta">
                            <strong itemprop="author">admin</strong> &ndash; <time itemprop="datePublished" datetime="2014-01-27T16:22:02+00:00">January 27, 2014</time>:
                            </p>
                            <div itemprop="description" class="description"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices tellus eget ipsum ornare molestie scelerisque eros dignissim. Phasellus fringilla hendrerit lectus nec vehicula.</p>
                            </div>
                            </div>
                        </div>
                    </li> 
                
                    <li itemprop="reviews" itemscope itemtype="http://schema.org/Review" class="comment odd alt thread-odd thread-alt depth-1" id="li-comment-30">
                        <div id="comment-30" class="comment_container">
                        <img alt='admin' src='http://1.gravatar.com/avatar/5cdc09662dd539303e316621ec21b6be?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60'/>
                            <div class="comment-text">
                                <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="Rated 5 out of 5">
                                <span style="width:100%"><strong itemprop="ratingValue">5</strong> out of 5</span>
                                </div>
                            <p class="meta">
                            <strong itemprop="author">admin</strong> &ndash; <time itemprop="datePublished" datetime="2014-01-27T16:22:39+00:00">January 27, 2014</time>:
                            </p>
                            <div itemprop="description" class="description"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit massa vel mauris sollicitudin dignissim. Phasellus ultrices tellus eget</p>
                            </div>
                            </div>
                        </div>
                    </li> 
                </ol>
            </div>
            
        <div id="review_form_wrapper">
            <div id="review_form">
                <div id="respond" class="comment-respond">
                <h3 id="reply-title" class="comment-reply-title">Add a review <small><a rel="nofollow" id="cancel-comment-reply-link" href="/woocommerce_51107/product/product-12/#respond" style="display:none;">Cancel reply</a></small></h3>
                    <form action="http://livedemo00.template-help.com/woocommerce_51107/wp-comments-post.php" method="post" id="commentform" class="comment-form">
                    <p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input id="author" name="author" type="text" value="" size="30" aria-required="true"/></p>
                    <p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input id="email" name="email" type="text" value="" size="30" aria-required="true"/></p>
                    <p class="comment-form-rating"><label for="rating">Your Rating</label>
                        <select name="rating" id="rating">
                            <option value="">Rate&hellip;</option>
                            <option value="5">Perfect</option>
                            <option value="4">Good</option>
                            <option value="3">Average</option>
                            <option value="2">Not that bad</option>
                            <option value="1">Very Poor</option>
                        </select>
                    </p>
                    <p class="comment-form-comment"><label for="comment">Your Review</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p> <p class="form-submit">
                    <input name="submit" type="submit" id="submit" value="Submit"/>
                    <input type='hidden' name='comment_post_ID' value='1946' id='comment_post_ID'/>
                    <input type='hidden' name='comment_parent' id='comment_parent' value='0'/>
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