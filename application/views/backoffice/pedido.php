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
                                        echo site_url().'static/backoffice/images/diamante.png';
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
                    <li class="blog"><a href="#aba2" data-toggle="tab">Informacion de Usuario</a></li>
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
                                    </form>
                            
                        <?php }else{ ?>
                                <p class="cart-empty">Tu carrito esta actualmente vacio.</p>
                                <p class="return-to-shop">
                                    <a class="button" href="<?php echo site_url().'compras';?>" target="_blank">Comprar</a> 
                                </p>
                        <?php } ?>
                    </div>
                    
                    <div class="tab-pane" id="aba2">
                        <h2>Informacion Personal</h2><hr>
                        <form action="<?php echo site_url().'backoffice/nuevomiembro/validate';?>" class="forms" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="nome">Nombres</label>
                                    <div class="input text required">
                                        <input name="first_name" class="form-control input-small" maxlength="100" type="text" value="" required="required"/>
                                    </div>                                
                                </div>
                                <div class="form-group">
                                    <label for="nome">Apellidos</label>
                                    <div class="input text required">
                                        <input name="last_name" class="form-control input-small" maxlength="100" type="text" value="" required="required"/>
                                    </div>                            
                                </div>
                                
                                <div class="form-group">
                                    <label for="nome">DNI</label>
                                    <div class="input text">
                                        <input name="dni" class="form-control input-small" maxlength="45" type="text" value="" id="UserNationalIdentification" required="required"/>
                                    </div>                            
                                </div>

                            <label for="date">Fecha de Nacimiento</label>
                          
                            <div class="false">
                                <div class="controls">
                                    <select name="date" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoDay">
                                       <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i;?>"><?php echo $i?></option>
                                       <?php } ?>
                                    </select>
                                    
                                    <select name="month" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoMonth">
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
                                    
                                    <select name="year" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoYear">
                                            <?php  $year = date("Y");?>
                                            <?php for ($i = 1924; $i <= $year; $i++) { ?>
                                                 <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>                        

                            <div class ="clearfix"></div>

                            <div class="form-group" style = "margin-top: 15px;">
                                <label for="phone">Teléfono</label>
                                <div class="input text">
                                    <input name="phone" class="form-control input-small" maxlength="45" type="text" value="" id="UserTelefone"/>
                                </div>                            
                            </div>

                            <div class="form-group">
                                <label for="phone">Celular</label>
                                <div class="input text">
                                    <input name="mobile" class="form-control input-small" maxlength="45" type="text" value="" id="UserTelemovel"/>
                                </div>                            
                            </div>
  
                            <h2 class="blue">Direccion</h2>
                            <hr> 
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <div class="input text">
                                    <input name="address" class="form-control input-medium" maxlength="100" type="text" value="" id="UserMoradaComplementar" required="required"/>
                                </div>                            
                            </div>
                            
                            <div class="form-group">
                                <label for="reference">Referencia</label>
                                <div class="input text">
                                    <input name="references" class="form-control input-medium" maxlength="100" type="text" value="" id="UserMoradaComplementar"/>
                                </div>                            
                            </div>
                            
                            <div class="form-group">
                                <label for="city">Ciudad</label>
                                <div class="input text">
                                    <input name="city" class="form-control input-medium" maxlength="45" type="text" value="" id="UserCidade" required="required"/>
                                </div>                            
                            </div>
                            
                            <div class="form-group">
                                <label for="department">Departamento</label>
                                <div class="input text">
                                    <input name="department" class="form-control input-medium" maxlength="45" type="text" value="Lima" id="UserCidade" required="required"/>
                                </div>                            
                            </div>

                            <div class="form-group">
                                <label for="department">País</label>
                                <div class="input text">
                                    <input name="country" class="form-control input-medium" maxlength="45" type="text" value="Perú" id="UserCidade" required="required"/>
                                </div>                            
                            </div>
                           </fieldset> 
                        
                            <h2 class="blue">Login</h2>
                            <hr> 
                            
                            <fieldset>                       
                            <p style="font-size:14px;">La contraseña debería tener mínimo 8 caracteres, un numeral, una letra mayúscula y una letra minuscula.</p>

                           <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <div class="input email required">
                                        <input name="email" class="form-control input-medium" maxlength="45" type="email" value="" id="UserEmail" required="required"/>
                                    </div>                            
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <div class="input text">
                                    <div class="input password">
                                        <input name="password" value="" class="form-control input-medium" type="password" id="UserPasswordConfirm" required="required"/>
                                    </div>                            
                                </div>
                            </div> 
                         </fieldset>
                            <input type="submit" class="btn btn-primary" value="Enviar Registro">
                        </form>
                    </div>
                    
                     
                </div>
            </div>
            <br>
        </section>
    </div>
</article>
<script src="<?php echo site_url();?>static/backoffice/js/new_member.js"></script>
