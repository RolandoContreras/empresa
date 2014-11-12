<?php $this->load->view("header");?>
<body class="page page-id-1797 page-parent page-template page-template-page-fullwidth-php has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
 <script src="<?php echo site_url().'static/cms/js/core/jquery.js';?>"></script> 
<header class="motopress-wrapper header">
<div class="container">
    <div class="row">
        <div class="span12">
            <!--Call Nav_secundary-->
            <?php $this->load->view("nav_secondary");?>
        </div>
    </div>
</div>
</header>
    
<div class="motopress-wrapper content-holder clearfix">
<div class="container">
<div class="row">
<div class="span12">
    <div class="row">
        <div class="span12">
            <section class="title-section">
            <h1 class="title-header">Carrito</h1>
                <ul class="breadcrumb breadcrumb__t"><li><a href="<?php echo site_url().'home';?>">Home</a></li>
                    <li class="divider"></li><li class="active">Carrito</li></ul>  
            </section>  
        </div>
    </div>
<div class="row">
    <div class="span9 right right" id="content">
        <div id="post-1915" class="post-1915 page type-page status-publish hentry page">
            <div class="woocommerce">
                <?php
                if(count($this->cart->contents())!=0){ ?>
                <form class="cart" method="post">
                    
                    <table class="table smallfont">
                        
                        <thead>
                            <tr>
                                <td><b>IMAGEN</b></td>
                                <td><b>NOMBRE</b></td>
                                <td><b>PRECIO</b></td>
                                <td><b>CANTIDAD</b></td>
                                <td><b>TALLA</b></td>
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
                                        <td>
                                           <?php if ($this->cart->has_options($item['rowid']) == TRUE){
                                                    foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value){
                                                           echo $option_value;
                                                    } 
                                                }?>
                                        </td>
                                        <td>S/.<?php echo $this->cart->format_number($item['subtotal']);?></td>
                                        <td>
                                            <p>
                                                <a onclick="delete_car('<?php echo $item['rowid'];?>');" class="" style="cursor: pointer;">
                                                    <img src="<?php echo site_url().'static/images/png/delete26.png';?>" width="30" alt="Eliminar">
                                                </a> 
                                            </p>
                                        </td>
                                    </tr>
                            <?php 
                              $i++;
                            endforeach; ?>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="post_title">Gastos de envío</div>
                                    </td>
                                    <td colspan="3"></td>
                                    <td><?php echo format_number(10);?></td>
                                    <td colspan="2"></td>
                                </tr>   
                                 <tr>
                                      <?php 
                                            $subtotal = $this->cart->total();
                                            $total = $subtotal + 10;
                                      ?>                                   

                                    <td><p class="return-to-shop"><a onclick="empty_car();" class="button"> Vaciar</a></p></td>
                                    <td colspan="2"></td>
                                    <td class="right"><strong>Total</strong></td>
                                    <td></td>
                                    <td class="right"><?php echo format_number($total); ?></td>
                                    <td></td>
                                  </tr>   

                        </tbody>
                    </table>
                        
                </form>
                <p class="return-to-shop">
                    <a class="button" href="<?php echo site_url().'compras';?>"> Volver a Comprar</a> 
                    <a class="button pay" onclick="make_order();">Hacer Pedido</a>
                </p>
                
                <?php }else{ ?>
                        <p class="cart-empty">Tu carrito esta actualmente vacio.</p>
                        <p class="return-to-shop">
                            <a class="button" href="<?php echo site_url().'compras';?>"> Volver a Comprar</a> 
                        </p>
                <?php } ?>
            
            </div>
            
        <div class="clear"></div>
        </div> 
    </div>
    
    <div class="span3 sidebar" id="sidebar">
        <div id="categories-3" class="visible-all-devices widget">
            <h3>Categorías</h3>
            <ul>
                <?php foreach ($category as $value) { ?>
                    <li class="cat-item cat-item-13"><a href="<?php echo site_url().convert_slug($value->name);?>" title="<?php echo $value->name;?>"><?php echo $value->name;?></a></li>
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
<script type='text/javascript' src='<?php echo site_url().'static/js/registrar.js';?>'></script>  
<script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js';?>'></script>
</body>
</html>