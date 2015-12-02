<!--<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js?999';?>'></script>-->
<script type='text/javascript' src='<?php echo site_url().'static/js/validator.js';?>'></script>

<style>
    .spinner {
        position: fixed;
        top: 50%;
        left: 50%;
    }
</style>
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

<!--SPINNER-->
<div id='spinner' class='spinner'></div>
<!--END SPINNER-->

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
            <!--SPINNER-->
            <div id='spinner' class='spinner'></div>
            <!--END SPINNER-->
            
            <form id="form" class="forms" method="post" data-toggle="validator" onsubmit="return validator();" action="<?php echo site_url().'backoffice/micuenta/validate'?>">
                <div class="wg-content_nav">
                    <div class="tab-content">
                        <div class="tab-pane active" id="aba1">
                            <div id="mensaje"></div>
                            <h2>Información Personal</h2><hr>

                                <fieldset>
                                    <div class="form-group">
                                        <label for="name" class="control-label">Nombres</label>
                                        <div class="input text required">
                                            <input name="first_name" class="form-control input-small" maxlength="100" type="text" value="<?php echo isset($obj_profile->first_name)?$obj_profile->first_name:"";?>" required placeholder="Ingrese Nombre"/>
                                        </div>                                
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="apellido" class="control-label">Apellidos</label>
                                        <div class="input text required">
                                            <input name="last_name" class="form-control input-small" maxlength="100" type="text" value="<?php echo isset($obj_profile->last_name)?$obj_profile->last_name:"";?>" required="required" placeholder="Ingrese Apellido"/>
                                        </div> 
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="control-label">E-mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="email" class="form-control input-medium" maxlength="45" type="email" value="<?php echo isset($obj_profile->email)?$obj_profile->email:"";?>" id="UserEmail" required="required" placeholder="Ingrese E-mail"/>
                                         </div>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nome" class="control-label">DNI</label>
                                        <div class="input text">
                                            <input name="dni" class="form-control input-small" maxlength="45" type="text" value="<?php echo isset($obj_profile->dni)?$obj_profile->dni:"";?>" id="UserNationalIdentification" disabled="disabled"/>
                                        </div>                            
                                    </div>

                                <label for="date" class="control-label">Fecha de Nacimiento</label>
                                <?php 
                                $day = get_day_number($obj_profile->birth_date);
                                $month = get_month_number($obj_profile->birth_date);
                                $year_b = get_year_number($obj_profile->birth_date);
                                ?>
                                <div class="false">
                                    <div class="controls">
                                        <select name="date" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoDay" disabled="disabled">
                                           <?php for ($i = 1; $i <= 31; $i++) { ?>
                                            <option value="<?php echo $i;?>" <?php echo $day==$i?'selected':'';?>><?php echo $i?></option>
                                           <?php } ?>
                                        </select>

                                        <select name="month" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoMonth" disabled="disabled">
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

                                        <select name="year" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" id="UserDataNascimentoYear" disabled="disabled">
                                                <?php  $year = date("Y");?>
                                                <?php for ($i = 1924; $i <= $year; $i++) { ?>
                                                     <option value="<?php echo $i;?>" <?php echo $i==$year_b?'selected':'';?>><?php echo $i;?></option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>                        

                                <div class ="clearfix"></div>

                                <div class="form-group" style = "margin-top: 15px;">
                                    <label for="phone" class="control-label">Teléfono</label>
                                    <div class="input text">
                                        <input name="phone" class="form-control input-small" maxlength="45" type="text" value="<?php echo isset($obj_profile->phone)?$obj_profile->phone:"";?>" placeholder="Ingrese Telefono" required="required"/>
                                    </div>   
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="control-label">Celular</label>
                                    <div class="input text">
                                        <input name="mobile" class="form-control input-small" maxlength="45" type="text" value="<?php echo isset($obj_profile->mobile)?$obj_profile->mobile:"";?>" placeholder="Ingrese Movil"/>
                                    </div>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>

                                <h2 class="blue" >Dirección</h2>
                                <hr> 
                                <div class="form-group">
                                    <label for="address" class="control-label">Dirección</label>
                                    <div class="input text">
                                        <input name="address" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->address)?$obj_profile->address:"";?>" placeholder="Ingrese Dirección" required="required"/>
                                    </div> 
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="reference" class="control-label">Referencia</label>
                                    <div class="input text">
                                        <input name="references" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->references)?$obj_profile->references:"";?>" placeholder="Ingrese Referencia" required="required"/>
                                    </div>   
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>

                                <div class="form-group">
                                    <label for="pais">País</label>
                                    <div class="input text">
                                        <input name="pais" disabled="disabled" class="form-control input-medium" maxlength="45" type="text" value="<?php echo isset($obj_profile->paises)?$obj_profile->paises:"";?>"/>
                                    </div>                            
                                </div>

                                <div class="form-group">
                                    <label for="region">Región</label>
                                    <div class="input text">
                                        <input name="region"  disabled="disabled" class="form-control input-medium" maxlength="45" type="text" value="<?php echo isset($obj_profile->regiones)?$obj_profile->regiones:"";?>"/>
                                    </div>                            
                                </div>

                                <div class="form-group">
                                    <label for="localidad">Localidad</label>
                                    <div class="input text">
                                        <input name="localidad" disabled="disabled" class="form-control input-medium" maxlength="45" type="text" value="<?php echo isset($obj_profile->localidades)?$obj_profile->localidades:"";?>"/>
                                    </div>                            
                                </div>

                                <h2 class="blue">Dirección de Facturación</h2>
                                <p style="font-size:14px;">Información complementaria para el cobro.</p>
                                <hr> 
                                <div class="form-group">
                                    <label for="razon_social" class="control-label">Razón Social</label>
                                    <div class="input text">
                                        <input name="razon_social" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->razon_social)?$obj_profile->razon_social:"";?>" placeholder="Ingrese Razón Social"/>
                                    </div>    
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>
                                <div class="form-group">
                                    <label for="ruc" class="control-label">RUC</label>
                                    <div class="input text">
                                        <input name="ruc" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->ruc)?$obj_profile->ruc:"";?>" id="UserMoradaComplementar" placeholder="Ingrese RUC"/>
                                    </div> 
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>
                                <div class="form-group">
                                    <label for="address2" class="control-label">Dirección</label>
                                    <div class="input text">
                                        <input name="address2" class="form-control input-medium" maxlength="100" type="text" value="<?php echo isset($obj_profile->address2)?$obj_profile->address2:"";?>" placeholder="Ingrese Direccion"/>
                                    </div>   
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>
                               </fieldset> 
                        </div>
                        <div class="tab-pane forms" id="aba3">
                            <h2>Change Password</h2>
                            <p style="font-size:14px;">La contraseña debería tener mínimo 6 caracteres, un numeral, una letra mayúscula y una letra minuscula.</p>

                            <div class="form-group">
                                <label for="password" class="control-label">Contraseña</label>
                                <div class="input text">
                                    <div class="input password">
                                        <input name="password" data-minlength="6" value="<?php echo isset($obj_profile->password)?$obj_profile->password:"";?>" class="form-control input-medium" type="password" id="password" required="required" placeholder="Ingrese Contraseña"/>
                                    </div>     
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Repetir Contraseña</label>
                                <div class="input text">
                                    <div class="input password">
                                        <input name="password2" value="<?php echo isset($obj_profile->password)?$obj_profile->password:"";?>" class="form-control input-medium" type="password" data-match="#password" data-match-error="Whoops, these don't match" placeholder="Confirme"/>
                                    </div>             
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <span class="help-block with-errors"></span>
                                </div>
                            </div> 
                        </div>
                        <input type="submit" class="btn btn-primary" value=Enviar>
                    </div>
                </div>
            </form>
            <br>
            
            
        </section>
    </div>
</article>
<script src="<?php echo site_url();?>static/backoffice/js/profile.js"></script>
