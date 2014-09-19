<!DOCTYPE html>
<html lang="en">	
<!-- Mirrored from wbpreview.com/previews/WB0LX21H9/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 Sep 2012 04:37:29 GMT -->
    <head>
        <meta charset="utf-8">
        <title>WaveLine CMS Admin</title>
        <base href="<?php echo site_url();?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link href="static/cms/css/core/bootstrap.css" rel="stylesheet">	
        <link href="static/cms/css/core/combine_fonts.css" rel="stylesheet">	
        <link href="static/cms/css/core/buttons.css" rel="stylesheet">
        <link href="static/cms/css/core/cms.css" rel="stylesheet">
        <link href="static/cms/css/style.css" rel="stylesheet">
        
        <!-- color style -->
        <link href="static/cms/css/core/dark.css" rel="stylesheet">
        <link href="static/cms/css/core/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="plugins/html5.js"></script>
        <![endif]-->
        <script src="static/cms/js/core/jquery.js"></script>        
        <script src="static/cms/plugins/wysiwyg/wysihtml5-0.3.0_rc3.min.js"></script>
        <script src="static/cms/js/core/bootstrap.js"></script>	                    

        <script src="static/cms/plugins/datepicker/js/bootstrap-datepicker.js"></script>
        <script src="static/cms/plugins/wysiwyg/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="static/cms/js/browserplus-min.js"></script>

        <script src="static/cms/js/core/jquery.validate.min.js"></script>
        <script src="static/cms/js/core/bootstrap-alert.js"></script>
        <script src="static/cms/js/core/functions.js"></script>
        
        <script src="static/cms/js/core/jquery.validate.min.js"></script>
        <script type="text/javascript">
            var site = '<?php echo site_url();?>';
        </script>
    </head>
<body>
<!-- top fixed navbar -->
    <div id="header" class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?php echo site_url();?>dashboard/panel">WaveLine</a> 
                <div class="btn-toolbar pull-right">                        
                <!-- /btn-group -->
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="icon-user-1"></i> Hola Navigator
                                <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu megamenu col2 ud">
                            <li class="sub">
                                <div class="img_round img_c_margin"><img width="70" height="70" src="static/cms/images/avatar-sample-05.jpg" /></div>
                            </li>
                            <li class="sub">
                                <ul>
                                    <li><a href="#"><i class="icon-large icon-cog-2"></i> Profile</a></li>
                                    <li><a href="#"><i class="icon-large icon-key"></i> Privacy Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="dashboard"><i class="icon-large icon-logout-1"></i> Cerrar Session</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- top fixed navbar -->
    <div class="container-fluid">
        <div class="row-fluid">
                <!-- sidebar -->
            <div id="sidebar" class="span2">			
                    <div class="accordion custom-acc" id="accordionSB">
                            <div class="accordion-group fs">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#dashboardsb">
                                        Mantenimientos  
                                        </a>
                                    </div>
                                    <div id="dashboardsb" class="accordion-body collapse in">
                                      <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                         <li class="active"><a href="<?php echo site_url()."dashboard/productos";?>"><i class="icon-large icon-th"></i>Productos</a></li>
                                         <li><a href="<?php echo site_url()."dashboard/banners";?>"><i class="icon-large icon-th"></i>Categorias</a></li>
                                         <li><a href="<?php echo site_url()."dashboard/visitors";?>"><i class="icon-large icon-th"></i>Clientes</a></li>
                                         <li><a href="<?php echo site_url()."dashboard/categories";?>"><i class="icon-large icon-th"></i>Usuarios</a></li>
                                         <li class="active"><a href="<?php echo site_url()."dashboard/panel";?>"><i class="icon-large icon-th"></i>Panel</a></li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                 
                            
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#recursos">
                                    Recursos
                                    </a>
                                </div>
                                <div id="recursos" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/people";?>"><i class="icon-large icon-th"></i>Personas</a>
                                            </li>
                                            <li>                                        
                                                <a href="<?php echo site_url()."dashboard/roles";?>"><i class="icon-large icon-th"></i>Roles</a>
                                            </li>
                                        </ul>                                     
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
            <!-- sidebar 

            <!-- main content -->
            <div id="main_content" class="span10">
                <div class="widget_container">
                    <div class="well nomargin">
                        <ul class="breadcrumbs-custom in-well">
                            <li><a href="<?php echo $link_modulo?>"><?php echo $modulos?></a></li>                            
                            <li class="active"><?php echo $seccion;?></li>
                        </ul>
                    </div>
                </div>                
                <?php echo $body; ?>	
            </div>
            <!-- main content -->
        </div>
    </div>

</body>
<!-- Mirrored from wbpreview.com/previews/WB0LX21H9/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 Sep 2012 04:37:36 GMT -->
</html>