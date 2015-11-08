<?php $this->load->view("header");?>
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
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <!--Menu Navigacion Secundary-->
                        <?php $this->load->view("nav_secondary");?> </div>
                </div>
            </div>
        </header>
        <script src="<?php echo site_url().'static/cms/js/core/jquery.js?999';?>"></script>
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
                                            <h2>Upline</h2>
                                            <hr>
                                            <p class="form-row form-row-wide">
                                                <label for="username">Username</label>
                                                <input onblur="consul_upline(this.value);" type="text" class="input-text" id="upline" name="upline"/></p>
                                           <div id="mensaje"></div>
                                        </form>
                                        
                                        <form method="post" class="login" id="register-form" name="register-form" action="<?php echo site_url().'registro/paso_2';?>">
                                            <h2>Información Personal</h2>
                                            <hr>
                                            <p class="form-row form-row-wide">
                                                <label for="username">Username<span class="required">*</span> </label>
                                                <input type="text" class="input-text" name="username" id="username" required="username" /> 
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label for="username">Nombre<span class="required">*</span> </label>
                                                <input type="text" class="input-text" name="first_name" id="first_name" required="required" /> 
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label for="password">Apellidos<span class="required">*</span> </label>
                                                <input name="last_name" id="last_name" class="input-text" required="required" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="username">DNI<span class="required">*</span> </label>
                                                <input type="number" class="input-text" name="dni" id="dni" required="required" /></p>
                                            <label for="fecha de nacimiento">Fecha de Nacimiento<span class="required">*</span> </label>
                                            <div class="false">
                                                <div class="controls">
                                                    <select name="date" id="date" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" required="required">
                                                        <?php for ($i=1 ; $i <=31; $i++) { ?>
                                                        <option value="<?php echo $i;?>">
                                                            <?php echo $i?> </option>
                                                        <?php } ?> </select>
                                                    <select name="month" id="month" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" required="required">
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
                                                    <select name="year" id="year" class="form-control" style="max-width: 120px; float: left; margin-right: 5px;" required="required">
                                                        <?php $year=date( "Y");?>
                                                        <?php for ($i=1924; $i <=$year; $i++) { ?>
                                                        <option value="<?php echo $i;?>">
                                                            <?php echo $i;?> </option>
                                                        <?php } ?> </select>
                                                </div>
                                            </div>
                                            <p class="form-row form-row-wide">
                                                <label for="Teléfono">Teléfono</label>
                                                <input type="text" class="input-text" name="phone" id="phone"/> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="Celular">Celular</label>
                                                <input type="text" class="input-text" name="mobile" id="mobile" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="Dirección">Dirección<span class="required">*</span> </label>
                                                <input type="text" class="input-text" name="address" id="address" required="required" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="Referencia">Referencia<span class="required">*</span> </label>
                                                <input type="text" class="input-text" name="references" id="references" required="required"/> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="Ciudad">Ciudad<span class="required">*</span> </label>
                                                <input type="text" class="input-text" name="city" id="city" required="required" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="Departamento">Departamento<span class="required">*</span> </label>
                                                <input type="text" class="input-text" name="department" id="department" value="Lima" required="required" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="País">País<span class="required">*</span> </label>
                                                <input type="text" class="input-text" name="country" value="Perú" id="country" required="required" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="E-mail">E-mail<span class="required">*</span> </label>
                                                <input class="input-text" type="email" name="email" id="email" required="required" /> 
                                            </p>
                                            <hr>
                                            <p class="form-row form-row-wide">
                                                <label for="Contraseña">Contraseña<span class="required">*</span> </label>
                                                <input class="input-text" type="password" class="input-text" name="password" id="password" required="required" />
                                            </p>
                                            <hr>
                                            <h2>Selección de Paquetes</h2>
                                            <hr>
                                            <p class="form-row form-row-wide">
                                                <input type="radio" name="kit" required="required" value="1"/> Golden <img style="padding-right:9%;" src="<?php echo site_url().'static/backoffice/images/golden.png';?>" />
                                                <input type="radio" name="kit" required="required" value="2"/> Platinium <img style="padding-right:9%;" src="<?php echo site_url().'static/backoffice/images/platinium.png';?>" /> 
                                                <input type="radio" name="kit" required="required" checked="checked" value="3"/> Diamond <img src="<?php echo site_url().'static/backoffice/images/diamante.png';?>" />
                                            </p>
                                            <hr>
                                            
                                            <h2 class="blue">Información Adicional</h2>
                                            <hr>
                                            <p class="form-row form-row-wide">
                                                <label for="E-mail">Razón Social</label>
                                                <input class="input-text" type="text" name="razon_social" id="razon_social" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="Contraseña">RUC</label>
                                                <input class="input-text" type="text" class="input-text" name="ruc" id="ruc" /> </p>
                                            <p class="form-row form-row-wide">
                                                <label for="Contraseña">Dirección</label>
                                                <input class="input-text" type="text" class="input-text" name="address2" id="address2" /> </p>
                                            
                                            <hr>
<!--                                            <p class="form-row">
                                            <input type="checkbox" name="partnet" id="partnet" required="required"/> &nbsp;&nbsp;&nbsp;S/. 49.00 Gastos de Partner 
                                            </p>-->
                                            <p class="form-row">
                                            <input type="checkbox" name="contract" id="contract" required="required"/> &nbsp;&nbsp;&nbsp;Acepto los <a href="<?php echo site_url().'static/document/contract/Contrato_waveline.pdf';?>" target="_blank">Terminos y Condiciones</a> y las políticas de waveline</input>
                                            </p>
                                            <hr>
                                            <p class="form-row"><input type="submit" class="button" value="Siguiente" /><hr></form>
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
        <script type="text/javascript" src='<?php echo site_url().'static/js/superfish.js?999';?>'></script>
        <script type='text/javascript' src='<?php echo site_url().'static/js/login.js?999';?>'></script>
        <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js?999';?>'></script>
</body>

</html>