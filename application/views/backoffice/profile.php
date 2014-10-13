<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-modal.js"></script>
<script src="<?php echo site_url();?>static/cms/js/core/bootbox.min.js"></script>

<article class="main-content homepage" style="padding-bottom:20%;">
    <div class="breadcrumbs transition" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url().'home';?>">Home</a> |  <a>Mi Cuenta</a>
            </li>
        </ul>
    </div>
  
    <div class="content">
        <section class="widget">
            <nav class="abas">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#aba1" data-toggle="tab">Informacion de Usuario</a></li>
                    <li><a href="#aba3" data-toggle="tab">Contraseña</a></li>
                </ul>
            </nav>

            <div class="wg-content_nav">
                <div class="tab-content">
                    <div class="tab-pane active" id="aba1">
                        <h2>Informacion Personal</h2><hr>
                        <form action="<?php echo site_url().'backoffice/micuenta/validate';?>" class="forms" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="nome">First Name</label>
                                    <div class="input text required">
                                        <input name="first_name" class="form-control input-small" maxlength="100" type="text" value="<?php echo isset($obj_profile->first_name)?$obj_profile->first_name:"";?>" required="required"/>
                                    </div>                                
                                </div>
                                <div class="form-group">
                                    <label for="nome">Last Name</label>
                                    <div class="input text required">
                                        <input name="last_name" class="form-control input-small" maxlength="100" type="text" value="<?php echo isset($obj_profile->last_name)?$obj_profile->last_name:"";?>" required="required"/>
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <div class="input email required">
                                        <input name="email" class="form-control input-medium" maxlength="45" type="email" value="<?php echo isset($obj_profile->email)?$obj_profile->email:"";?>" id="UserEmail" required="required"/>
                                    </div>                            
                                </div>
                                <div class="form-group">
                                    <label for="nome">DNI</label>
                                    <div class="input text">
                                        <input name="dni" class="form-control input-small" maxlength="45" type="text" value="<?php echo isset($obj_profile->dni)?$obj_profile->dni:"";?>" id="UserNationalIdentification"/>
                                    </div>                            
                                </div>

                            <label for="date">Fecha de Nacimiento</label>
                            <div class="false">
                                <div class="controls">
                                    <select name="date" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoDay">
                                       <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i;?>"><?php echo $i?></option>
                                       <?php } ?>
                                        <!--<option value="06" selected="selected">6</option>-->
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
                                    <input name="phone" class="form-control input-small" maxlength="45" type="text" value="<?php echo isset($obj_profile->phone)?$obj_profile->phone:"";?>" id="UserTelefone"/>
                                </div>                            
                            </div>

                            <div class="form-group">
                                <label for="phone">Celular</label>
                                <div class="input text">
                                    <input name="mobile" class="form-control input-small" maxlength="45" type="text" value="<?php echo isset($obj_profile->mobile)?$obj_profile->mobile:"";?>" id="UserTelemovel"/>
                                </div>                            
                            </div>
  
                            <h2 class="blue">Direccion</h2>
                            <hr> 
                            <div class="form-group">
                                <label for="phone">Dirección</label>
                                <div class="input text">
                                    <input name="address" class="form-control input-medium" maxlength="45" type="text" value="<?php echo isset($obj_profile->address)?$obj_profile->address:"";?>" id="UserMoradaComplementar"/>
                                </div>                            
                            </div>

                            <div class="form-group">
                                <label for="phone">Ciudad</label>
                                <div class="input text">
                                    <input name="city" class="form-control input-medium" maxlength="45" type="text" value="<?php echo isset($obj_profile->city)?$obj_profile->city:"";?>" id="UserCidade"/>
                                </div>                            
                            </div>

                            <div class="form-group">
                                <label for="phone">País</label>
                                <div class="input text">
                                    <input name="country" disabled="disabled" class="form-control input-medium" maxlength="45" type="text" value="<?php echo isset($obj_profile->country)?$obj_profile->country:"";?>" id="UserCountry"/>
                                </div>                            
                            </div>
                           </fieldset> 
                        <!--</form>-->
                    </div>
                    <div class="tab-pane forms" id="aba3">
                        <fieldset>                       

                        <h2>Change Password</h2>
                        <p style="font-size:14px;">La contraseña debería tener mínimo 8 caracteres, un numeral, una letra mayúscula y una letra minuscula.</p>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input text">
                                <div class="input password">
                                    <input name="" class="form-control input-medium" autocomplete="off" type="password" id="UserPassword"/>
                                </div>                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Repetir Contraseña</label>
                            <div class="input text">
                                <div class="input password">
                                    <input name="" class="form-control input-medium" type="password" id="UserPasswordConfirm"/>
                                </div>                            
                            </div>
                        </div> 
                        </fieldset>
                    </div>
                     <input type="submit" onclick="validate();" class="btn btn-primary" value=Enviar>
                </div>
            </div>
            <br>
            
            
        </section>
    </div>
</article>
<script src="<?php echo site_url();?>static/backoffice/js/profile.js"></script>
