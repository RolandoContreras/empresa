<footer class="motopress-wrapper footer">
        <div class="container">
        <div class="row">
            <div class="span12" data-motopress-wrapper-file="wrapper/wrapper-footer.php" data-motopress-wrapper-type="footer">
                    <div class="row copyright">
                        <div class="span8 pull-left" data-motopress-type="static" data-motopress-static-file="static/static-footer-nav.php">
                            <nav class="nav footer-nav">
                            <ul id="menu-footer-menu" class="menu">
                                
                                <!--current-menu-item-->
                                <?php 

                                    $ruta = explode("/",uri_string()); 
                                    $nav = $ruta[0];

                                    $home    = '';
                                    $contact = '';
                                    $about   = '';
                                    $shop    = '';

                                    switch ($nav) {
                                       case "home":
                                            $home = "current-menu-item";
                                            break;
                                        case "acerca":
                                            $about = "current-menu-item";
                                            break;
                                        case "compras":
                                            $shop = "current-menu-item";
                                            break;
                                        case "contacto":
                                            $contact = "current-menu-item";
                                            break;
                                        case "checkout":
                                             $shop = "current-menu-item";
                                            break;  
                                        case "micuenta":
                                             $home = "current-menu-item";
                                            break;
                                        case "registro":
                                             $shop = "current-menu-item";
                                            break;
                                        case "":
                                             $home = "current-menu-item";
                                            break;
                                      default:
                                            $shop = "current-menu-item";
                                            break;
                                    }
                                    ?>
                                
                                <li class="<?php echo $home;?>"><a href="<?php echo site_url().'home';?>">Home</a></li>
                                <li class="<?php echo $about;?>"><a href="<?php echo site_url().'acerca';?>">Acerca</a></li>
                                <li class="<?php echo $shop;?>"><a href="<?php echo site_url().'compras';?>">Compras</a></li>
                                <li class="<?php echo $contact;?>"><a href="<?php echo site_url().'contacto';?>">Contacto</a></li>
                            </ul> 
                            </nav>
                            
                            <div id="footer-text" class="footer-text">
                                <a title="direccion" class="site-name"><b>WaveLine S.A.C.</b> Urb. Los Nogales 230 Urb. Santa Rosa de Quives - Santa Anita, Lima- Peru</a><br/>
                                <a title="Horario de Atencion" class="site-name"><b>Horario de Atención:</b> Lunes a Viernes: 9:00 am a 6:00pm.</a><br/>
                                <a title="Contacto" class="site-name"><b>Escríbenos:</b> servicioalcliente@wavelinetwork.com.</a><br/>
                                <br/>
                            </div>
                        </div>
                        
                        <div class="span4 pull-right" data-motopress-type="dynamic-sidebar" data-motopress-sidebar-id="footer-sidebar-3">
                        <div id="social_networks-2" class="visible-all-devices ">

                        <ul class="social social__row clearfix unstyled">
                        <li class="social_li">
                        <a class="social_link social_link__facebook" rel="tooltip" data-original-title="facebook" href="https://www.facebook.com/Azulsporturban?fref=ts" target="_blank">
                        <span class="social_ico"><img src="<?php echo site_url().'static/images/icons/facebook.png';?>" alt=""></span>
                        </a>
                        </li>
                        <li class="social_li">
                        <a class="social_link social_link__twitter" rel="tooltip" data-original-title="twitter" href="#" target="_blank">
                        <span class="social_ico"><img src="<?php echo site_url().'static/images/icons/twitter.png';?>" alt=""></span>
                        </a>
                        </li>
                        </ul>
                        </div> 
                        </div>
                    </div> 
            </div>
        </div>
    </div>
</footer>