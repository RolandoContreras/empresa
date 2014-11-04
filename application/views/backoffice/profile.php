<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">
<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-modal.js"></script>
<script src="<?php echo site_url();?>static/cms/js/core/bootbox.min.js"></script>

<article class="main-content homepage" style="padding-bottom:5%;">
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
                                    <label for="nome">Nombres</label>
                                    <div class="input text required">
                                        <input name="first_name" class="form-control input-small" maxlength="100" type="text" value="<?php echo isset($obj_profile->first_name)?$obj_profile->first_name:"";?>" required="required"/>
                                    </div>                                
                                </div>
                                <div class="form-group">
                                    <label for="nome">Apellidos</label>
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
                            <?php 
                            $day = get_day_number($obj_profile->birth_date);
                            $month = get_month_number($obj_profile->birth_date);
                            $year_b = get_year_number($obj_profile->birth_date);
                            ?>
                            <div class="false">
                                <div class="controls">
                                    <select name="date" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoDay">
                                       <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option value="<?php echo $i;?>" <?php echo $day==$i?'selected':'';?>><?php echo $i?></option>
                                       <?php } ?>
                                    </select>
                                    
                                    <select name="month" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoMonth">
                                        <option value="01" <?php echo $month=="01"?'selected':'';?>>Enero</option>
                                        <option value="02" <?php echo $month=="02"?'selected':'';?>>Febrero</option>
                                        <option value="03" <?php echo $month=="03"?'selected':'';?>>Marzo</option>
                                        <option value="04" <?php echo $month=="04"?'selected':'';?>>Abril</option>
                                        <option value="05" <?php echo $month=="05"?'selected':'';?>>Mayo</option>
                                        <option value="06" <?php echo $month=="06"?'selected':'';?>>Junio</option>
                                        <option value="07" <?php echo $month=="07"?'selected':'';?>>Julio</option>
                                        <option value="08" <?php echo $month=="08"?'selected':'';?>>Agosto</option>
                                        <option value="09" <?php echo $month=="09"?'selected':'';?>>Setiembre</option>
                                        <option value="10" <?php echo $month=="10"?'selected':'';?>>Octubre</option>
                                        <option value="11" <?php echo $month=="11"?'selected':'';?>>Noviembre</option>
                                        <option value="12" <?php echo $month=="12"?'selected':'';?>>Diciembre</option>
                                    </select>
                                    
                                    <select name="year" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoYear">
                                            <?php  $year = date("Y");?>
                                            <?php for ($i = 1924; $i <= $year; $i++) { ?>
                                                 <option value="<?php echo $i;?>" <?php echo $i==$year_b?'selected':'';?>><?php echo $i;?></option>
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
  
                            <h2 class="blue">Dirección</h2>
                            <hr> 
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <div class="input text">
                                    <input name="address" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->address)?$obj_profile->address:"";?>" id="UserMoradaComplementar"/>
                                </div>                            
                            </div>
                            
                            <div class="form-group">
                                <label for="reference">Referencia</label>
                                <div class="input text">
                                    <input name="references" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->references)?$obj_profile->references:"";?>" id="UserMoradaComplementar"/>
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
                            
                            <h2 class="blue">Dirección de Facturación</h2>
                            <hr> 
                            <div class="form-group">
                                <label for="razon_social">Razón Social</label>
                                <div class="input text">
                                    <input name="razon_social" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->razon_social)?$obj_profile->razon_social:"";?>" id="UserMoradaComplementar"/>
                                </div>                            
                            </div>
                            <div class="form-group">
                                <label for="ruc">RUC</label>
                                <div class="input text">
                                    <input name="ruc" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->ruc)?$obj_profile->ruc:"";?>" id="UserMoradaComplementar"/>
                                </div>                            
                            </div>
                            <div class="form-group">
                                <label for="address2">Dirección</label>
                                <div class="input text">
                                    <input name="address2" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->address2)?$obj_profile->address2:"";?>" id="UserMoradaComplementar"/>
                                </div>                            
                            </div>
                           </fieldset> 
                    </div>
                    <div class="tab-pane forms" id="aba3">
                        <fieldset>                       

                        <h2>Change Password</h2>
                        <p style="font-size:14px;">La contraseña debería tener mínimo 8 caracteres, un numeral, una letra mayúscula y una letra minuscula.</p>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input text">
                                <div class="input password">
                                    <input name="password" value="<?php echo isset($obj_profile->password)?$obj_profile->password:"";?>" class="form-control input-medium" autocomplete="off" type="password" id="UserPassword"/>
                                </div>                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Repetir Contraseña</label>
                            <div class="input text">
                                <div class="input password">
                                    <input name="password2" value="<?php echo isset($obj_profile->password)?$obj_profile->password:"";?>" class="form-control input-medium" type="password" id="UserPasswordConfirm"/>
                                </div>                            
                            </div>
                        </div> 
                        </fieldset>
                    </div>
                     <input type="submit" class="btn btn-primary" value=Enviar>
                </div>
            </div>
            <br>
            
            
        </section>
    </div>
</article>
<script src="<?php echo site_url();?>static/backoffice/js/profile.js"></script>
