<?php $this->load->view("header");?>
<body class="page page-id-14 page-template page-template-page-fullwidth-php has_woocommerce has_shop">
<div id="motopress-main" class="main-holder">
 
<header class="motopress-wrapper header">
<div class="container">
    <div class="row">
        <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="5407b24358537">
            <?php $this->load->view("nav_secondary");?>
        </div>
    </div>
    </div>
</header>
    
<div class="motopress-wrapper content-holder clearfix">
<div class="container">
<div class="row">
<div class="span12" data-motopress-wrapper-file="page-fullwidth.php" data-motopress-wrapper-type="content">
    <div class="row">
        <div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
            <section class="title-section">
            <h1 class="title-header">Contacto</h1>
            <ul class="breadcrumb breadcrumb__t">
                <li><a href="<?php echo site_url()."home"?>">Home</a>
                </li><li class="divider"></li><li class="active">Contacto</li>
            </ul>  
            </section>  
        </div>
    </div>
<div id="content" class="row">
    <div class="span12" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
        <div id="post-14" class="post-14 page type-page status-publish hentry page">
            <div class="row ">
            <div class="span12 ">
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3901.823315165096!2d-76.98059770739201!3d-12.055674704832857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2spe!4v1410448667742" width="100%" height="300" frameborder="0"></iframe>
                </div>
            </div>
            <div class="span4 ">
                <h2>Información de Contacto</h2><br/>
                <p><strong>Centro de Negocio</strong><br/>
                   Jr. Los Nogales 230 Urb. Santa Rosa de Quives - Santa Anita.
                </p>
                <p><b>Horario de Atención: </b></p>
                <p>De Lunes a Viernes: 9:00 am a 8:00pm
                    <br/>Sábados: 9:00am a 1:00 pm
                    <br/>Call Center : (51)1 362-72779</p>
                <address>
                    <p><strong>WaveLine S.A.C.</strong></p>
                    Jr. Los Nogales 230 Urb. Santa Rosa de Quives<br/>
                    Santa Anita, Lima - Perú<br/>
                    <b>RUC:</b> 20565781023<br/>
                    Tel: (51)1 362-72779<br/>
                    Correo: servioalcliente@wavelinetwork.com<br/>
                </address> 
            </div>
            <div class="span8 "><h2>Formulario de Contacto</h2><br/>
            <div class="wpcf7" id="wpcf7-f208-p14-o1">
                <form method="post" class="wpcf7-form" novalidate="novalidate">
                    <div class="row-fluid">
                    <p class="span6 field">
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="text" name="name" id="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Nombres:"/>
                        </span> 
                    </p>
                    <p class="span6 field">
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="email" id="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Correo:"/>
                        </span> 
                    </p>
                   </div>
                    
                   <div class="row-fluid">
                    <p class="span12 field">
                        <span class="wpcf7-form-control-wrap your-phone">
                            <input type="text" name="asunto" id="asunto" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Asunto:"/>
                        </span> 
                    </p>
                   </div> 

                    <p class="field">
                        <span class="wpcf7-form-control-wrap your-message">
                            <textarea name="message" id="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Mensaje:"></textarea>
                        </span> 
                    </p>
                    <p class="submit-wrap">
                        <input type="reset" value="Limpiar" class="btn btn-primary"/>
                        <input type="button" onclick="send_email();" value="Enviar" class="botom btn btn-primary"/>
                    </p>
                </form>
            </div>
            </div>
            </div> 
        <div class="clear"></div>
        </div> 
    </div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->load->view("footer"); ?>    
</div>
<script type='text/javascript' src='<?php echo site_url().'static/js/contact.js';?>'></script>        
<script src="<?php echo site_url().'static/cms/js/core/jquery.js';?>"></script>  
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.form.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery-cookie.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/device.min.js';?>'></script>
</body>
</html>