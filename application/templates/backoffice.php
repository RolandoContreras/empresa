<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 ie no-js" lang="pt-br"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie no-js" lang="pt-br"> <![endif]-->
<!--[if IE 9]>    <html class="ie9 ie no-js" lang="pt-br"> <![endif]-->
<!--[if gt IE 10]><!--><html lang="pt-br" class="no-js"><!--<![endif]-->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>WaveLine | Backoffice</title>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/bootstrap/bootstrap.min.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/font-awesome.min.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/layout.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/style/style.css';?>"/>
         
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/arvore-binaria.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/main.css';?>"/>
        <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/flags.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/layout_messages.css';?>"/>
        
        
        <script type="text/javascript" src="<?php echo site_url().'static/js/jquery-1.10.2.min.js';?>"></script>
        <script type="text/javascript" src="<?php echo site_url().'static/js/bootstrap.min.js';?>"></script>
        <script type="text/javascript" src="<?php echo site_url().'static/js/css3-mediaqueries.min.js';?>"></script>

        <script type="text/javascript" src="<?php echo site_url().'static/js/scripts.js';?>"></script>
        
        <script type="text/javascript">
            var site = '<?php echo site_url();?>';
        </script>
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-45449400-1', 'wingsnetwork.com');
            ga('send', 'pageview');

        </script>
        <script type="text/javascript">
            $(function () {
                //Troca de Áreas pelo logotipo
                $(".topo .logotipo h1 > span, .topo .logotipo h1 > a").on("click", function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $(this).parent().parent().toggleClass("active");
                });

                $("body").on("click", function () {
                    $(".adjustable-menu").removeClass("open");
                    $(".topo .logotipo").removeClass("active");
                });

                    //Linguas
                    $('.topo #language').popover({
                            placement: 'bottom',
                            html: true,
                            title: false, 
                            content: function() {
                                return $('.lang-content').html()
                            }
                        });

            });

        </script>  
    </head>
    <body>
        <div class="global">
            <div class="main-areas">
                <header class="topo navbar bootstro">
                <div class="navbar-inside">
                    <div class="logotipo">
                        <h1>
                            <img src="<?php echo site_url();?>static/images/logo.png" width="80" height="40"> 
                            Back Office
                        </h1>
                    </div>
                    <nav class="pull-right controls">
                        
                        <div class="fast-access-blog">
 	                            	<span>Rolando Contreras</span>

                        </div>
                        <ul class="nav">
				<li class="settings" style="border-left: 1px solid #336699; height: 47px;">
                                    <div style="margin: 10px;">
                                        <a href="https://www.facebook.com/Azulsporturban?fref=ts" target="_blank"><img src="<?php echo site_url();?>static/images/social/fb.gif" style="max-width: 25px;"></a>
                                        <a href="#" target="_blank"><img src="<?php echo site_url();?>static/images/social/twitter.gif" style="max-width: 25px;"></a>
                                    </div>
                                </li>
 			<li class="settings">
                            <a href="<?php echo site_url().'micuenta';?>" title="Settings" >
                                    <img class="image_icons_b" src="<?php echo site_url().'static/images/png/settings38.png';?>">
                                </a>
                            </li>
                            <li class="logout">
                                <a href="<?php echo site_url().'backoffice/logout';?>" title="Logout">
                                    <img class="image_icons_b" src="<?php echo site_url().'static/images/png/door9.png';?>">
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

                <div class="fixed-area">
                    <!-- Logo do MMN. Link volta pra homepage -->

                    <!-- Menu principal das páginas -->
                    
                    <nav class="main-menu">
                        <ul>
                            <li>
                                <a href="<?php echo site_url().'backoffice';?>">
                                    <span> <img class="image_icons_b" src="<?php echo site_url().'static/images/png/menu48.png';?>">&nbsp;&nbsp;Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url().'backoffice/micuenta';?>">
                                    <span><img class="image_icons_b" src="<?php echo site_url().'static/images/png/user91.png';?>">&nbsp;&nbsp;My Account</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url().'backoffice/comisiones';?>">
                                    <span><img class="image_icons_b" src="<?php echo site_url().'static/images/png/data45.png';?>">&nbsp;&nbsp;Comisiones</span>
                                </a>
                            </li>
<!--                            <li>
                                <a href="<?php echo site_url().'backoffice/arbol';?>">
                                    <span><img class="image_icons_b" src="<?php echo site_url().'static/images/png/cloud189.png';?>">&nbsp;&nbsp;Arbol</span>
                                </a>
                            </li>-->
                            <li>
                                <a href="<?php echo site_url().'backoffice/nuevomiembro';?>">
                                    <span><img class="image_icons_b" src="<?php echo site_url().'static/images/png/add133.png';?>">&nbsp;&nbsp;Nuevo Miembro</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url().'backoffice/faq';?>">
                                    <span><img class="image_icons_b" src="<?php echo site_url().'static/images/png/male172.png';?>">&nbsp;&nbsp;FAQ</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


                    <nav class="main-menu"></nav>
                <br>
                </div><!-- .fixed-area -->
        <div class="fluid-area">
                    <!-- Área principal da página. Todo o conteúdo dela vem aqui. Também vai uma class para identificar a área que está, caso necessite algum estilo diferente. -->
                    <script>
                    if (window!=window.top) { 
                            /* I'm in a frame! */ 
                            window.top.location = '/';
                    }
                    jQuery(document).ready(function(){
                        $('#myModal').modal('show');
                    });
                    </script>
                   <?php echo $body;?> 

        </div> <!-- /.modal -->
<script type="text/javascript">
    function change_debt_auto(value) {
        $.ajax({
            type: 'POST',
            url: '/users/change_debt_auto',
            data: {mensalidade: value},
            cache: false,
            dataType: 'html',
            beforeSend: function() {
            },
            success: function(value) {
                obj = JSON.parse(value);
                var mensalidade = obj.mensalidade;
                console.log(mensalidade);
                document.getElementById('mensalidade').value = mensalidade;
            }
        });
    }
</script>
                </div><!-- .fluid-area -->
            </div><!-- .main-areas -->
        </div><!-- .global -->
    </body>    
</html>