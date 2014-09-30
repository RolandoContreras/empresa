<?php $this->load->view("header");?>
<body class="page page-id-1915 page-template-default woocommerce-cart woocommerce-page has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
    <header class="motopress-wrapper header">
    <div class="container">
        <div class="row">
            <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="542343104e034">
                <!--Menu Navigacion Secundary-->
                     <?php $this->load->view("nav_secondary");?>
                 <!--------------------------->
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
<h1 class="title-header">Carrito</h1>
 
    <ul class="breadcrumb breadcrumb__t"><li><a href="<?php echo site_url().'home';?>">Home</a></li><li class="divider"></li><li class="active">Carrito</li></ul>  
</section>  </div>
</div>
<div class="row">
    <div class="span9 right right" id="content" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
        <div id="post-1915" class="post-1915 page type-page status-publish hentry page">
            <div class="woocommerce">
                <?php
                if(count($this->cart->contents())!=0){ ?>
                <form class="cart" method="post" action="<?php echo base_url()."home/change_car"?>">
                    
                    <table class="table smallfont">
                        
                        <thead>
                            <tr>
                                <td><b>IMAGEN</b></td>
                                <td><b>NOMBRE</b></td>
                                <td><b>PRECIO</b></td>
                                <td><b>CANTIDAD</b></td>
                                <td><b>SUB TOTAL</b></td>
                                <td><b>ACCIONES</b></td>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php 
                            $i = 1;
                                foreach ($this->cart->contents() as $item): ?>
                                <input type="hidden" name="<?php echo $i;?>['rowid']" value="<?php echo $item['rowid'];?>" >
                                    <tr>
                                        <td><img src="<?php echo SERVER2.$item['big_image'];?>" height="42" width="42"></td>
                                        <td><div class="post_title"><?php echo $item['name'];?></div></td>
                                        <td>S/.<?php echo $this->cart->format_number($item['price']);?></td>
                                        <td>
                                            <div class="quantity">
                                                <input name="qty" type="number" value="<?php echo $item['qty']; ?>" class="input-text qty text" size="4">
                                            </div>
                                        </td>
                                        <td>S/.<?php echo $this->cart->format_number($item['subtotal']);?></td>
                                        <td><p><a onclick="update_car('<?php echo $item['rowid'];?>');" class="button">Editar</a> 
                                            <a onclick="delete_car('<?php echo $item['rowid'];?>');" class="button">Eliminar</a> </p>
                                        </td>
                                    </tr>
                            <?php 
                              $i++;
                            endforeach; ?>
                                 <tr>
                                    
                                    <td><p class="return-to-shop"><a onclick="empty_car();" class="button"> Vaciar</a></p></td>
                                    <td></td>
                                    <td></td>
                                    <td class="right"><strong>Total</strong></td>
                                    <td class="right">S/.<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                    <td></td>
                                  </tr>   

                        </tbody>
                    </table>
                        
                </form>
                <?php }else{ ?>
                        <p class="cart-empty">Tu carrito esta actualmente vacio.</p>
                <?php } ?>
            <p class="return-to-shop">
                <a class="button" href="<?php echo site_url().'compras';?>"> Volver a Comprar</a> 
                <a class="button pay" href="<?php echo site_url().'checkout/pagar';?>">Hacer Pedido</a>
            </p>
            </div>
            
        <div class="clear"></div>
        </div> 
    </div>
    
    <div class="span3 sidebar" id="sidebar" data-motopress-type="static-sidebar" data-motopress-sidebar-file="sidebar.php">
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
</div>
</div>

<!------call footer----->    
    <?php $this->load->view("footer");?>
<!------call footer----->
 
</div>
<script type='text/javascript' src='<?php echo site_url().'static/js/add_car.js';?>'></script>    
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js';?>'></script>    
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.form.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery-cookie.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/device.min.js';?>'></script>
<!----Script perzonalizado de Mensaje del precio ------>
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


<!--var porId=document.getElementById("nombre").value;-->

</body>
</html>