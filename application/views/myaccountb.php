<?php $this->load->view("header");?>
    <body class="page">
        <div id="motopress-main" class="main-holder">
            <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <!--Menu Navigacion Secundary-->
                            <?php $this->load->view("nav_secondary");?>
                                <!--------------------------->
                        </div>
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
                                        <h1 class="title-header">Login</h1>
                                        <ul class="breadcrumb breadcrumb__t">
                                            <li><a href="<?php echo site_url().'home';?>">Home</a></li>
                                            <li class="divider"></li>
                                            <li class="active">Login</li>
                                        </ul>
                                    </section>
                                </div>
                            </div>
                            <div class="row">
                                <div class="span9 right right" id="content">
                                    <div class="page">
                                        <div class="woocommerce">
                                            <h2>Login</h2>
                                            <form method="post" class="login" action="<?php echo site_url().'micuenta/validar_user_backoffice';?>">
                                                <p class="form-row">
                                                    <label for="username">Username<span class="required">*</span></label>
                                                    <input type="text" class="input-text" name="username" id="username" required="required" /> </p>
                                                <p class="form-row">
                                                    <label for="password">Password <span class="required">*</span></label>
                                                    <input class="input-text" type="password" name="password" id="password" required="required" /> </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" name="login" value="Login" /> </p>
                                                <p class="lost_password"> <a href="">¿Olvidaste tu contraseña?</a> </p>
                                            </form>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <div class="span3 sidebar" id="sidebar">
                                    <div class="visible-all-devices">
                                        <h3>Categorias</h3>
                                        <ul>
                                            <?php foreach ($category as $value) { ?>
                                                <li><a href="<?php echo site_url().convert_slug($value->name);?>"><?php echo $value->name;?></a></li>
                                                <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view("footer");?>
        </div>
        <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js?999';?>'></script>
        <script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js?999';?>'></script>
        <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js?999';?>'></script>
    </body>

    </html>