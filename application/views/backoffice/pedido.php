<style>
    .spinner {
        position: fixed;
        top: 50%;
        left: 50%;
    }
</style>
<script src="<?php echo site_url().'static/js/spin.js';?>"></script>
<script>
    var opts = {
        lines: 11,
        length: 15,
        width: 10,
        radius: 30,
        corners: 1,
        rotate: 0,
        direction: 1,
        color: '#000',
        speed: 0.6,
        trail: 60,
        shadow: false,
        hwaccel: false,
        className: 'spinner',
        zIndex: 2e9,
        top: 'auto',
        left: 'auto'
    };
</script>
<article class="main-content homepage" style="padding-bottom:20%;">
    <div class="breadcrumbs transition" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url().'home';?>">Home</a> |  <a>Pedidos</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-xs-12 col-md-7">
                <section class="widget widget-points">
                    <div class="row">
                        <div class="col-xs-4 .col-sm-4">
                            <div class="wg-content">
                                <h3>Cuenta</h3>
                                <p>
                                    <?php ?> <?php echo strtoupper($_SESSION['customer']['franchise_name'])?>
                                    <img src="<?php 
                                    if($_SESSION['customer']['franchise_id'] == 1){
                                        echo site_url().'static/backoffice/images/golden.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 2){
                                        echo site_url().'static/backoffice/images/platinium.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 3){
                                        echo site_url().'static/backoffice/images/platinium.png';
                                    }else{
                                        echo site_url().'static/backoffice/images/diamond.png';
                                    }
                                    ?>" />
                                         <b style="margin-left: 43%;color: red;"> Pendiente</b>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
        <br/>
        <section class="widget">
            <nav class="abas">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#aba1" data-toggle="tab">Selección de Productos</a></li>
                </ul>
            </nav>

            <div class="wg-content_nav">
                <div class="tab-content">
                    
                    <div class="tab-pane forms active" id="aba1">
                        <?php if(count($this->cart->contents())!=0){ ?>
                                    <form class="cart" method="post" action="<?php echo base_url()."home/change_car"?>">
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
                                                                <a href="" onclick="delete_car('<?php echo $item['rowid'];?>');" class="button">Eliminar</a> 
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
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><?php echo format_number(10);?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p class="return-to-shop">
                                                                <a class="button" href="<?php echo site_url().'compras';?>">Volver a Comprar</a> |
                                                                <a onclick="empty_car();" href="" class="button"> Vaciar</a>
                                                            </p>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <?php 
                                                        $subtotal = $this->cart->total();
                                                        $total = $subtotal + 10;
                                                        ?>
                                                        <td class="right"><strong>Total</strong></td>
                                                        <td class="right"><?php echo format_number($total); ?></td>
                                                        <td></td>
                                                    </tr>   
                                            </tbody>
                                        </table>
                                        <button onclick="make_first_order();">Hacer Pedido</button>
                                    </form>
                            <?php }else{ ?>
                                    <p class="cart-empty">Tu carrito esta actualmente vacio.</p>
                                    <p class="return-to-shop">
                                        <a class="button" href="<?php echo site_url().'compras';?>" target="_blank">Comprar</a> 
                                    </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <br>
        </section>
    </div>
</article>
<!--<script src="<?php echo site_url();?>static/backoffice/js/new_member.js"></script>-->
<script type='text/javascript' src='<?php echo site_url().'static/js/make_order.js?999';?>'></script>
