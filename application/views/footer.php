<footer class="footer_bottom">
        <div class="container">
        <div class="row">
            <div class="span12">
                        <div class="span8">
                            <nav class="nav footer-nav">
                            <ul class="menu">
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
                                            $home = "current-menu-item-2";
                                            break;
                                        case "acerca":
                                            $about = "current-menu-item-2";
                                            break;
                                        case "compras":
                                            $shop = "current-menu-item-2";
                                            break;
                                        case "contacto":
                                            $contact = "current-menu-item-2";
                                            break;
                                        case "checkout":
                                             $shop = "current-menu-item-2";
                                            break;  
                                        case "micuenta":
                                             $home = "current-menu-item-2";
                                            break;
                                        case "registro":
                                             $shop = "current-menu-item-2";
                                            break;
                                        case "":
                                             $home = "current-menu-item-2";
                                            break;
                                      default:
                                            $shop = "current-menu-item-2";
                                            break;
                                    }
                                    ?>
                                
                                <li class="<?php echo $home;?>"><a href="<?php echo site_url().'home';?>">Home</a></li>
                                <li class="<?php echo $about;?>"><a href="<?php echo site_url().'acerca';?>">Acerca</a></li>
                                <li class="<?php echo $shop;?>"><a href="<?php echo site_url().'compras';?>">Compras</a></li>
                                <li class="<?php echo $contact;?>"><a href="<?php echo site_url().'contacto';?>">Contacto</a></li>
                            </ul> 
                            </nav>
                            
                            <div class="footer-text">
                                <b>WaveLine S.A.C.</b> Urb. Los Nogales 230 Urb. Santa Rosa de Quives - Santa Anita, Lima- Peru<br/>
                                <b>Horario de Atención:</b> Lunes a Viernes: 9:00 am a 6:00pm.<br/>
                                <b>Escríbenos:</b> servicioalcliente@wavelinetwork.com.<br/>
                                <br/>
                            </div>
                        </div>
                        
                        <div class="span4 pull-right">
                            <div class="visible-all-devices">
                                <ul class="social social__row">
                                    <li class="social_li">
                                        <a class="social_link social_link__facebook" href="https://www.facebook.com/Wavelinetwork" target="_blank">
                                            <span class="social_ico">
                                                <img style="display:none;" src="<?php echo site_url().'static/images/icons/facebook.png?1';?>" alt="facebook"/>
                                            </span>
                                        </a>
                                    </li>

                                    <li class="social_li">
                                        <a class="social_link social_link__twitter" href="https://twitter.com/Wavelinetwork" target="_blank">
                                            <span class="social_ico">
                                                <img style="display:none;" src="<?php echo site_url().'static/images/icons/twitter.png?1';?>" alt="twitter"/>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div> 
                        </div>
            </div>
        </div>
    </div>
</footer>