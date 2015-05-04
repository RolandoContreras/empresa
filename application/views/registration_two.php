<?php $this->load->view("header");?>
<input type="hidden" id="kit" value="<?php echo $data['kit'];?>"/> 
<input type="hidden" id="first_name" value="<?php echo $data['first_name'];?>"/> 
<input type="hidden" id="last_name" value="<?php echo $data['last_name'];?>"/> 
<input type="hidden" id="dni" value="<?php echo $data['dni'];?>"/> 
<input type="hidden" id="birth_date" value="<?php echo $data['birth_date'];?>"/> 
<input type="hidden" id="phone" value="<?php echo $data['phone'];?>"/> 
<input type="hidden" id="mobile" value="<?php echo $data['mobile'];?>"/> 
<input type="hidden" id="address" value="<?php echo $data['address'];?>"/> 
<input type="hidden" id="references" value="<?php echo $data['references'];?>"/>
<input type="hidden" id="city" value="<?php echo $data['city'];?>"/> 
<input type="hidden" id="department" value="<?php echo $data['department'];?>"/> 
<input type="hidden" id="country" value="<?php echo $data['country'];?>"/> 
<input type="hidden" id="email" value="<?php echo $data['email'];?>"/> 
<input type="hidden" id="password" value="<?php echo $data['password'];?>"/> 
<input type="hidden" id="ruc" value="<?php echo $data['ruc'];?>"/> 
<input type="hidden" id="razon_social" value="<?php echo $data['razon_social'];?>"/> 
<input type="hidden" id="address2" value="<?php echo $data['address2'];?>"/> 


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

<body class="page">
    <div id="motopress-main" class="main-holder">
        <script src="<?php echo site_url().'static/cms/js/core/jquery.js?999';?>"></script>
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <!--Menu Navigacion Secundary-->
                        <?php $this->load->view("nav_secondary");?> </div>
                </div>
            </div>
        </header>
        <div class="content-holder">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="row">
                            <div class="span12">
                                <section class="title-section">
                                    <h1 class="title-header">Registro</h1>
                                    <ul class="breadcrumb breadcrumb__t">
                                        <li><a href="<?php echo site_url().'home';?>">Home</a> </li>
                                        <li class="divider"></li>
                                        <li class="active">Registro</li>
                                    </ul>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="span9 right right" id="content">
                                <div id="post-1917" class="post-1917 page">
                                    <div class="woocommerce">
                                        <form class="login">
                                            <h2 class="blue">Producto</h2>
                                            <!--SPINNER-->
                                            <div id='spinner' class='spinner'></div>
                                            <!--END SPINNER-->
                                            <hr>
                                            <?php if(count($this->cart->contents())!=0){ ?>
                                            <table class="table smallfont">
                                                <thead>
                                                    <tr>
                                                        <td><b>IMAGEN</b> </td>
                                                        <td><b>NOMBRE</b> </td>
                                                        <td><b>PRECIO</b> </td>
                                                        <td><b>CANTIDAD</b> </td>
                                                        <td><b>TALLA</b> </td>
                                                        <td><b>SUB TOTAL</b> </td>
                                                        <td><b>ACCIONES</b> </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1 ; foreach ($this->cart->contents() as $item): ?>
                                                    <input type="hidden" name="<?php echo $i;?>['rowid']" value="<?php echo $item['rowid'];?>">
                                                    <tr>
                                                        <td><img src="<?php echo SERVER2.$item['big_image'];?>" height="42" width="42"> </td>
                                                        <td>
                                                            <div class="post_title">
                                                                <?php echo $item[ 'name'];?> </div>
                                                        </td>
                                                        <td>S/.
                                                            <?php echo $this->cart->format_number($item['price']);?></td>
                                                        <td>
                                                            <div class="quantity">
                                                                <input name="qty" type="number" value="<?php echo $item['qty']; ?>" class="input-text qty text" size="4"> </div>
                                                        </td>
                                                        <td>
                                                            <?php if ($this->cart->has_options($item['rowid']) == TRUE){ foreach ($this->cart->product_options($item['rowid']) as $option_name => $option_value){ echo $option_value; } }?> </td>
                                                        <td>S/.
                                                            <?php echo $this->cart->format_number($item['subtotal']);?></td>
                                                            <!--SAVE THE PRICE UN A TEXT HIDDEN-->
                                                            <input type="hidden" id="sub_total" value="<?php echo $this->cart->total();?>"/> 
                                                        <td> <a onclick="delete_car('<?php echo $item['rowid'];?>');" class="" style="cursor: pointer;"> <img src="<?php echo site_url().'static/images/png/delete26.png?999';?>" width="30" alt="Eliminar"> </a> </td>
                                                    </tr>
                                                    <?php $i++; endforeach; ?>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="post_title">Gastos de Partnet</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <?php echo format_number(49);?> </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <div class="post_title">Gastos de Envío</div>
                                                        </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td>
                                                            <?php echo format_number(10);?> </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td> </td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <?php $subtotal=$this->cart->total(); $total = $subtotal + 10 + 49; ?>
                                                        <td class="right"><strong>Total</strong> </td>
                                                        <td class="right">
                                                            <?php echo format_number($total); ?> </td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p class="return-to-shop"><a class="button pay" onclick="registrar();">Registrar</a> </p>
                                            <?php }else{ ?>
                                            <p class="cart-empty">Debe seleccionar un producto.</p>
                                            <?php } ?> 
                                        </form>
                                        </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <div class="span3 sidebar" id="sidebar">
                                <div id="categories-3" class="visible-all-devices widget">
                                    <h3>Categorias</h3>
                                    <ul>
                                        <?php foreach ($category as $value) { ?>
                                        <li>
                                            <a href="<?php echo site_url().convert_slug($value->name);?>">
                                                <?php echo $value->name;?></a>
                                        </li>
                                        <?php } ?> </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view("footer");?> </div>
    <script type='text/javascript' src='<?php echo site_url().'static/js/registrar.js?999';?>'></script>
    <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js?999';?>'></script>
    <script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js?999';?>'></script>
    <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js?999';?>'></script>
</body>

</html>