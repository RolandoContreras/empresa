<?php $this->load->view("header");?>

<body class="home page page-id-203 page-template page-template-page-home-php has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
    <header class="motopress-wrapper header">
    <div class="container">
    <div class="row">
    <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="5406108c02e7c">
    
    <!--Menu Navigacion Secundary-->
 <?php $this->load->view("nav_secondary");?>
 
    </div>
    </div>
    </div>
    </header>
    
    <script src="<?php echo site_url().'static/cms/js/core/jquery.js';?>"></script>  
    
   <!--Slide Banner-->
    <script type='text/javascript' src='<?php echo site_url().'static/js/banner.js';?>'></script>    
    <div id="parallax-slider-5406108c1acd1" class="parallax-slider">
      <ul class="baseList">
          <li data-preview="<?php echo site_url().'static/images/banner/slide01.jpg';?>">
          </li>
          <li data-preview="<?php echo site_url().'static/images/banner/slide02.jpg';?>">
          </li>
          <li data-preview="<?php echo site_url().'static/images/banner/slide03.jpg';?>">
          </li>
      </ul>
    </div>
    <!--End Slide for banner-->
    
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
    
    <!--Custom banners-->    
    <div class="custom_banners">
        <div class="custom_banners_wrap_inner">
            <div class="row ">
                <?php foreach ($product_custom as $value) {?>
                        <div class="span4 ">
                            <a href="<?php echo site_url().convert_slug($value->category."/".$value->name);?>" class="banner-wrap ">
                                <figure class="featured-thumbnail">
                                    <img src="<?php echo SERVER2.$value->custom_image;?>" alt="<?php echo $value->name;?>"/>
                                </figure>
                                <div class="extra-wrap"><h5><?php echo corta_texto($value->name,16);?></h5>
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
        <!--Categories-->            
        <div class="featured_categories">
            <div class="featured_categories_wrap_inner">
                <h2>Categorias</h2>
                <ul class='advanced_categories cols_1'>
                    <?php foreach ($category as $value) { ?>
                            <li class='advanced_categories_item last'>
                                <div class='advanced_categories_item_inner'>
                                    <h4><a href='<?php echo site_url().convert_slug($value->name);?>'><?php echo $value->name;?></a></h4>
                                </div>
                            </li>
                    <?php } ?>
                    
                  </ul>
            </div>
        </div>
        <br/>
    </div>
      
    <!--Featured Products-->    
    <div class="span9 ">
        <div class="featured_products">
            <div class="featured_products_wrap_inner">
            <?php foreach ($obj_category as $key => $value) {
                    if($key == 0){ ?>
                        <h2><?php echo $value->name;?></h2>
                    <?php } ?>
            <?php } ?>
                    <div class="woocommerce columns-3">
                        <ul class="products">

                        <?php foreach ($zapatillas as $product) {?>
                                    <li class="product">
                                        <p class="number_text">Comisión</p>
                                        <p class="number_price"><?php echo format_number($product->pay_sale);?></p>
                                         <span>
                                            <img class="image_oferta" src="<?php echo site_url().'static/images/oferta.png';?>"/>
                                        </span>
                                            <a href="<?php echo site_url().convert_slug($product->category."/".$product->name);?>">
                                                <img class="image_products" src="<?php echo SERVER2.$product->big_image;?>" class="attachment-shop_catalog wp-post-image" alt="<?php echo $product->name;?>"/>
                                                <h3><?php echo corta_texto($product->name,17);?></h3>
                                            </a>
                                            <div class="short_desc">
                                                <?php echo corta_texto($product->sumilla,60);?>
                                            </div>
                                            <span class="price">
                                                <span class=""><?php echo format_number($product->price)?></span>
                                            </span>
                                       <br/><br/>
                                       <a onclick="add_car('<?php echo $product->product_id;?>');" class="button add_to_cart_button product_type_simple">Agregar al Carro</a>
                                    </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            
            
            <div class="featured_products_wrap_inner">
                <?php foreach ($obj_category as $key => $value) {
                    if($key == 1){ ?>
                        <h2><?php echo $value->name;?></h2>
                    <?php } ?>
                <?php } ?>
                    <div class="woocommerce columns-3">
                        <ul class="products">
                        <?php foreach ($ropa as $product) {?>
                                    <li class="product">
                                        <p class="number_text">Comisión</p>
                                        <p class="number_price"><?php echo format_number($product->pay_sale);?></p>
                                         <span>
                                            <img class="image_oferta" src="<?php echo site_url().'static/images/oferta.png';?>"/>
                                        </span>
                                            <a href="<?php echo site_url().convert_slug($product->category."/".$product->name);?>">
                                                <img class="image_products" src="<?php echo SERVER2.$product->big_image;?>" class="attachment-shop_catalog wp-post-image" alt="<?php echo $product->name;?>"/>
                                                <h3><?php echo corta_texto($product->name,17);?></h3>
                                            </a>
                                            <div class="short_desc">
                                                <?php echo corta_texto($product->sumilla,60);?>
                                            </div>
                                            <span class="price">
                                                <span class=""><?php echo format_number($product->price)?></span>
                                            </span>
                                       <br/><br/>
                                       <a onclick="add_car('<?php echo $product->product_id;?>');" class="button add_to_cart_button product_type_simple">Agregar al Carro</a>
                                      
                                    </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            
            
            <div class="featured_products_wrap_inner">
                <?php foreach ($obj_category as $key => $value) {
                    if($key == 2){ ?>
                        <h2><?php echo $value->name;?></h2>
                    <?php } ?>
                <?php } ?>
                    <div class="woocommerce columns-3">
                        <ul class="products">
                        <?php foreach ($limpieza as $product) {?>
                                    <li class="product">
                                        <p class="number_text">Comisión</p>
                                        <p class="number_price"><?php echo format_number($product->pay_sale);?></p>
                                         <span>
                                            <img class="image_oferta" src="<?php echo site_url().'static/images/oferta.png';?>"/>

                                        </span>
                                            <a href="<?php echo site_url().convert_slug($product->category."/".$product->name);?>">

                                                <img class="image_products" src="<?php echo SERVER2.$product->big_image;?>" class="attachment-shop_catalog wp-post-image" alt="<?php echo $product->name;?>"/>
                                                <h3><?php echo corta_texto($product->name,17);?></h3>
                                            </a>
                                            <div class="short_desc">
                                                <?php echo corta_texto($product->sumilla,60);?>
                                            </div>
                                            <span class="price">
                                                <span class=""><?php echo format_number($product->price)?></span>
                                            </span>
                                       <br/><br/>
                                       <a onclick="add_car('<?php echo $product->product_id;?>');" class="button add_to_cart_button product_type_simple">Agregar al Carro</a>
                                    </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div> 
    <div class="clear"></div>

    </div> 
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
<!--call footer-->    
    <?php $this->load->view("footer");?>
<!--End call footer-->
</div>
<script type='text/javascript' src='<?php echo site_url().'static/js/add_car.js';?>'></script>    
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js';?>'></script>    
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.form.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery-cookie.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/device.min.js';?>'></script>
<!--Script perzonalizado de Mensaje del precio -->
<script type='text/javascript' src='<?php echo site_url().'static/js/parallaxSlider.js';?>'></script>
</body>
</html>