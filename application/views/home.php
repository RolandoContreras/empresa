<?php $this->load->view("header");?>

<?php 

//var_dump($data);
//die();
?>

<body class="home page page-id-203 page-template page-template-page-home-php has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
    <header class="motopress-wrapper header">
    <div class="container">
    <div class="row">
    <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="5406108c02e7c">
    
    <!--Menu Navigacion Secundary-->
 <?php $this->load->view("nav_secondary");?>
     <!--------------------------->
 
    </div>
    </div>
    </div>
    </header>
    
    <!---------Slide fro banner-------->
    <script type='text/javascript' src='<?php echo site_url().'static/js/banner.js';?>'></script>    
    <div id="parallax-slider-5406108c1acd1" class="parallax-slider">
      <ul class="baseList">
          <li data-preview="<?php echo site_url().'static/images/banner/slide01.jpg';?>">
<!--                <div class="slider_caption>"><h2><span>Productos Top</span></h2>
                    <h3>
                        <p>
                        <span>Lorem ipsum dolor sit amet, consectetur. </span>
                        </p>
                        <a href="blog/">Mostrar Ahora!</a> Go to product's detail
                    </h3>
                </div>-->
          </li>
          <li data-preview="<?php echo site_url().'static/images/banner/slide02.jpg';?>">
<!--              <div class="slider_caption>"><h2><span>Productos Top</span></h2>
                    <h3>
                        <p>
                        <span>Lorem ipsum dolor sit amet, consectetur. </span>
                        </p>
                        <a href="blog/">Mostrar Ahora!</a> Go to product's detail
                    </h3>
            </div>-->
          </li>
          
          <!--<li data-preview="<?php echo site_url().'static/images/banner/slide03.jpg';?>" data-img-width="1920" data-img-height="700">-->
          <li data-preview="<?php echo site_url().'static/images/banner/slide03.jpg';?>">
<!--                <div class="slider_caption>"><h2><span>Productos Top</span></h2>
                    <h3>
                        <p>
                        <span>Lorem ipsum dolor sit amet, consectetur. </span>
                        </p>
                        <a href="blog/">Mostrar Ahora!</a> Go to product's detail
                    </h3>
                </div>-->
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
                <?php foreach ($product_custom as $value) {?>
                        <div class="span4 ">
                            <a href="<?php echo site_url().$value->category;?>" class="banner-wrap ">
                                <figure class="featured-thumbnail">
                                    <img src="<?php echo SERVER2.$value->custom_image;?>" alt="<?php echo $value->name;?>"/>
                                </figure>
                                <div class="extra-wrap"><h5><?php echo corta_texto($value->name,16); ?></h5>
                                    <div class="link-align banner-btn">Comprar Ahora</div>
                                </div>
                            </a> 
                        </div>
                <?php } ?>
            </div> 
        </div>
    </div>
        
    <div class="row ">
    <div class="span3 ">
        <!---------------------Categories--------------->            
        <div class="featured_categories">
            <div class="featured_categories_wrap_inner">
                <h2>Categorias</h2>
                <ul class='advanced_categories cols_1'>
                    <?php foreach ($category as $value) { ?>
                            <li class='advanced_categories_item last'>
                                <div class='advanced_categories_item_inner'>
                                <h4><a href=''><?php echo $value->name;?></a></h4>
                                </div>
                            </li>
                    <?php } ?>
                    
                  </ul>
            </div>
        </div>
        <!--------------------------------------------->
    </div>
      
    <!-----Featured Products----->    
    <div class="span9 ">
        <div class="featured_products">
            <div class="featured_products_wrap_inner">
                <h2>Productos Destacados</h2>
                    <div class="woocommerce columns-3">
                        <ul class="products">

                        <?php foreach ($data as $product) {?>
                                    <li class="post-1946 product type-product status-publish has-post-thumbnail last featured shipping-taxable purchasable product-type-simple product-cat-product-category-4 product-tag-sed-blandit-massa product-tag-vel-mauris instock">
                                        <a href="<?php echo site_url().$product->category;?>">
                                        <img src="<?php echo SERVER2.$product->big_image;?>" class="attachment-shop_catalog wp-post-image" alt=/>
                                        <h3><?php echo corta_texto($product->name,17);?></h3>
                                        </a>
                                        <div class="short_desc">
                                            <?php echo corta_texto($product->description,100);?>
                                        </div>
                                            <span class="price">
                                                <span class="amount">S/.<?php echo $product->price?></span>
                                            </span>
                                       <br/><br/>
                                        <a href="/woocommerce_51107/?add-to-cart=1938" rel="nofollow" data-product_id="1938" data-product_sku="" class="button add_to_cart_button product_type_simple">Add to cart</a>
                                      
                                    </li>
                        <?php } ?>
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