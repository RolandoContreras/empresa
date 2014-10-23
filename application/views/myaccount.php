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
<h1 class="title-header">Login</h1>
 
<ul class="breadcrumb breadcrumb__t"><li><a href="<?php echo site_url().'home';?>">Home</a></li>
    <li class="divider"></li><li class="active">Login</li></ul>  
</section>  </div>
</div>
<div class="row">
    <div class="span9 right right" id="content" data-motopress-type="loop" data-motopress-loop-file="loop/loop-page.php">
        <div id="post-1917" class="post-1917 page type-page status-publish hentry page">
            <div class="woocommerce">
            <h2>Login</h2>
            <form method="post" class="login" action="<?php echo site_url().'micuenta/validar_user';?>">
                    <p class="form-row form-row-wide">
                    <label for="username">Waveline ID<span class="required">*</span></label>
                    <input type="text" class="input-text" name="username" id="username"/>
                    </p>
                    
                    <p class="form-row form-row-wide">
                    <label for="password">Password <span class="required">*</span></label>
                    <input class="input-text" type="password" name="password" id="password"/>
                    </p>
                    <p class="form-row">
                       <input type="submit" class="button" name="login" value="Login"/>
                    </p>
                <p class="lost_password">
                <a href="">¿Olvidaste tu contraseña?</a> |
                <a href="<?php echo site_url().'registro'?>">Regístrate</a>
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