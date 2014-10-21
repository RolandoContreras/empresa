<?php $this->load->view("header");?>
<body class="page page-id-1917 page-template-default woocommerce-account woocommerce-page has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
 
<header class="motopress-wrapper header">
    <div class="container">
        <div class="row">
            <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="5409de05d6f77">
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
<h1 class="title-header">Registro</h1>
 
<ul class="breadcrumb breadcrumb__t"><li><a href="http://livedemo00.template-help.com/woocommerce_51107">Home</a></li><li class="divider"></li><li class="active">Registro</li></ul>  
</section>  </div>
</div>
<div class="row">
    <div class="span9 right right" id="content" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
        <div id="post-1917" class="post-1917 page type-page status-publish hentry page">
            <div class="woocommerce">
            <form method="post" class="login" action="<?php echo site_url().'registro/crear_cliente';?>">
                    <h2>Información Personal</h2><hr>
                    <p class="form-row form-row-wide">
                    <label for="username">Nombre<span class="required">*</span></label>
                    <input type="text" class="input-text" name="first_name" required="required"/>
                    </p>
                    <p class="form-row form-row-wide">
                    <label for="password">Apellidos<span class="required">*</span></label>
                    <input name="last_name" class="input-text" required="required"/>
                    </p>
                     <p class="form-row form-row-wide">
                    <label for="username">DNI<span class="required">*</span></label>
                    <input type="text" class="input-text" name="dni" required="required"/>
                    </p>
                    
                     <label for="fecha de nacimiento">Fecha de Nacimiento<span class="required">*</span></label>
                            <div class="false">
                                <div class="controls">
                                    <select name="date" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" required="required">
                                       <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i;?>"><?php echo $i?></option>
                                       <?php } ?>
                                    </select>
                                    
                                    <select name="month" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" required="required">
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select>
                                    
                                    <select name="year" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" required="required">
                                            <?php  $year = date("Y");?>
                                            <?php for ($i = 1924; $i <= $year; $i++) { ?>
                                                 <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div> 
                    
                    
                    
                     <p class="form-row form-row-wide">
                    <label for="Teléfono">Teléfono<span class="required">*</span></label>
                    <input type="text" class="input-text" name="phone" required="required"/>
                    </p>
                     <p class="form-row form-row-wide">
                    <label for="Celular">Celular<span class="required">*</span></label>
                    <input type="text" class="input-text" name="mobile"/>
                    </p>
                     <p class="form-row form-row-wide">
                    <label for="Dirección">Dirección<span class="required">*</span></label>
                    <input type="text" class="input-text" name="address" required="required"/>
                    </p>
                     <p class="form-row form-row-wide">
                    <label for="Referencia">Referencia<span class="required">*</span></label>
                    <input type="text" class="input-text" name="reference"/>
                    </p>
                     <p class="form-row form-row-wide">
                    <label for="Ciudad">Ciudad<span class="required">*</span></label>
                    <input type="text" class="input-text" name="city" required="required"/>
                    </p>
                     <p class="form-row form-row-wide">
                    <label for="Departamento">Departamento<span class="required">*</span></label>
                    <input type="text" class="input-text" name="deparment" id="username" value="Lima" required="required"/>
                    </p>
                     <p class="form-row form-row-wide">
                    <label for="País">País<span class="required">*</span></label>
                    <input type="text" class="input-text" name="country" value="Perú" id="username" required="required"/>
                    </p>
                    <hr><h2 class="blue">Login</h2><hr>
                    <p class="form-row form-row-wide">
                    <label for="E-mail">E-mail<span class="required">*</span></label>
                    <input class="input-text" type="email" name="email" id="email" required="required"/>
                    </p>
                    <p class="form-row form-row-wide">
                    <label for="Contraseña">Contraseña<span class="required">*</span></label>
                    <input class="input-text" type="password" class="input-text" name="password" id="password" required="required"/>
                    </p>
                    <hr><h2 class="blue">Producto</h2><hr>
                        <?php if(count($this->cart->contents())!=0){ ?>
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
                                                        <a onclick="delete_car('<?php echo $item['rowid'];?>');" class="" style="cursor: pointer;">
                                                          <img src="<?php echo site_url().'static/images/png/delete26.png';?>" width="30" alt="Eliminar">
                                                        </a> 
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
                            </form>
                            
                        <?php }else{ ?>
                                <p class="cart-empty">Debe seleccionar un producto.</p>
                        <?php } ?>
                   
                    <?php if(count($this->cart->contents())!=0){ ?>
                    <p class="form-row">
                       <input type="submit" class="button" value="Registrar"/>
                    </p>
                    <?php } ?>
                <p class="lost_password">
                </p>
                </form>
            </div>
        <div class="clear"></div>
        </div> 
    </div>
<div class="span3 sidebar" id="sidebar" data-motopress-type="static-sidebar" data-motopress-sidebar-file="sidebar.php">
    <div id="categories-3" class="visible-all-devices widget">
        <h3>Categorias</h3> 
    <ul>
        <?php foreach ($category as $value) { ?>
            <li class="cat-item cat-item-13"><a href="<?php echo site_url().convert_slug($value->name);?>"><?php echo $value->name;?></a>
        </li>
        <?php } ?>
        
   </ul>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php  $this->load->view("footer");?>   
</div>
 <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js';?>'></script>    
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.form.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery-cookie.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/device.min.js';?>'></script>
<script src="static/cms/js/core/bootstrap-alert.js"></script>
</body>
</html>