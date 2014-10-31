<?php $this->load->view("header");?>
<body class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
    <header class="motopress-wrapper header">
    <div class="container">
        <div class="row">
            <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="540610a997216">
             <?php $this->load->view("nav_secondary");?>
            </div>
        </div>
    </div>
    </header>
    
<script src="<?php echo site_url().'static/cms/js/core/jquery.js';?>"></script>  
<div class="motopress-wrapper content-holder clearfix woocommerce">
<div class="container">
    <div class="row">
        <div class="span12" data-motopress-type="static">
            <section class="title-section">
                <h1 class="title-header">Compras</h1>
                <ul class="breadcrumb breadcrumb__t">
                    <li><a href="<?php echo site_url().'home';?>">Home</a></li>
                    <li class="divider"></li>
                    <li class="active">Compras</li>
                </ul>  
        </section> 
        </div>
    </div>
    
<div class="row">
<div class="span9 right" id="content">
    <?php if(count($obj_products)>0){ ?>
    <ul class="products">
        <?php foreach ($obj_products as $obj_products) { ?>
                    <li class="product">
                        <p class="number_text">Comisión</p>
                        <p class="number_price"><?php echo format_number($obj_products->pay_sale);?></p>
                            <span>
                                <img class="image_oferta" src="<?php echo site_url().'static/images/oferta.png';?>"/>
                            </span>
                        <a href="<?php echo site_url().convert_slug($obj_products->category."/".$obj_products->name);?>">
                            <img class="image_products" width="300" height="300" src="<?php echo SERVER2.$obj_products->big_image;?>" class="attachment-shop_catalog wp-post-image" alt="<?php echo convert_slug($obj_products->name);?>"/>
                            <h3><?php echo corta_texto($obj_products->name,22);?> </h3>
                         </a>
                        <div class="short_desc"><?php echo corta_texto($obj_products->sumilla,90);?></div>
                        <span class="price"><ins><span class="amount">S/.<?php echo $obj_products->price;?></span></ins></span>
                        <br/><br/>
                        <a onclick="add_car('<?php echo $obj_products->product_id;?>');" class="button add_to_cart_button product_type_simple">Agregar al Carro</a>
                    </li> 
        <?php } ?>
    </ul>
    <?php }else{ ?>
        <p>No se encontraron resultados.</p>
    <?php } ?>
        <!--PAGINATE-->   
        <?php
        $ruta = explode("/",uri_string()); 
        $price = $ruta[1];
        
            if($price!="porprecio"){ ?>
                <nav class="woocommerce-pagination">
                    <div class="subnav nobg">
                        <div class="span8">
                            <div class="pagination" style="margin-left: 50%">
                                <?php echo $obj_pagination; ?>
                            </div>
                        </div>
                    </div>
                </nav>
          <?php } ?>
        
        <!--END PAGINATE-->
</div>
<div class="sidebar span3" id="sidebar" data-motopress-type="static-sidebar" data-motopress-sidebar-file="sidebar.php">
    <div id="woocommerce_price_filter-2" class="widget">
        <h3>Filtrar por Precio</h3>
        <form method="post" action="<?php echo site_url().'compras/porprecio'; ?>">
            <div class="price_slider_wrapper">
            <div class="price_slider" style="display:none;"></div>
                <div class="price_slider_amount">
                <input type="text" id="min_price" name="min_price" value="" data-min="30" placeholder="Min price"/>
                <input type="text" id="max_price" name="max_price" value="" data-max="1000" placeholder="Max price"/>
                <button type="submit" class="button">Filtrar</button>
                <div class="price_label" style="display:none;">
                Precio: <span class="from"></span> &mdash; <span class="to"></span>
                </div>
                <div class="clear"></div>
                </div>
            </div>
        </form>
    </div>
    
    <div id="categories-3" class="visible-all-devices widget">
        <h3>Categorías</h3> 
        <ul>
            <?php foreach ($category as $value) { ?>
            <li class="cat-item cat-item-13"><a href="<?php echo site_url().convert_slug($value->name);?>" title="View all posts filed under Fusce feugiat"><?php echo $value->name;?></a></li>
            <?php } ?>
            
        </ul>
    </div>
</div>
</div>
</div>
</div>
    <?php $this->load->view("footer"); ?>
</div>
<script type='text/javascript' src='<?php echo site_url().'static/js/add_car.js';?>'></script>      
<script type="text/javascript" src='<?php echo site_url().'static/js/superfish.js';?>'></script>   
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.ui.widget.min.js';?>'></script> 
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.ui.mouse.min.js';?>'></script>
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.ui.slider.min.js';?>'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var woocommerce_price_slider_params = {"currency_symbol":"$","currency_pos":"left","min_price":"","max_price":""};
/* ]]> */
</script>

<script type='text/javascript' src='<?php echo site_url().'static/js/price-slider.min.js';?>'></script>
</body>
</html>