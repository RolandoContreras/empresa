<?php $this->load->view("header");?>
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
                                        <div id="mensaje">
                                            <div class="alert alert-success">
                                            <p>Cliente registrado con Éxito</p>
                                            </div>
                                        </div>
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
    <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js?999';?>'></script>
    <script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js?999';?>'></script>
    <script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js?999';?>'></script>
</body>

</html>