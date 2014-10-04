<nav class="nav nav__primary clearfix">
    <ul id="topnav" class="sf-menu">
                <li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="<?php echo site_url().'home';?>">Home</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-203 current_page_item"><a href="<?php echo site_url().'acerca';?>">Acerca</a>
                <ul class="sub-menu">
                    <li id="menu-item-2001" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Testimonios</a></li>
                        <ul class="sub-menu">
                        <li id="menu-item-2001" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Testimonios</a></li>
                        <li id="menu-item-1996" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">FAQs</a></li>
                    </ul>
                            
                    <li id="menu-item-1996" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">FAQs</a></li>
                </ul>
                </li>
                
                <li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="<?php echo site_url().'compras';?>">Compras</a>
                    <ul class="sub-menu">
                       <?php foreach ($menu as $key => $value) {?>
                        
                            <li id="menu-item-2018" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href=""><?php echo $value->name;?></a>
                                <ul class="sub-menu">
                                     <?php foreach ($submenu[$key] as $key2 =>$value):?>                                                
                                            <li id="menu-item-2013" class="menu-item menu-item-type-post_type menu-item-object-page"><a href=""><?php echo $value->category_name;?></a>
                                                <ul class="sub-menu">
                                                    <?php foreach ($submenutwo[$key2] as $key3 => $value) { ?>
                                                         <li id="menu-item-2018" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href=""><?php echo $value->name;?></a></li>
                                                     <?php } ?>
                                                 </ul>
                                            </li>
                                     <?php endforeach;?>
                                </ul>
                            </li>
                       <?php } ?>
                    </ul>    
                </li>
                
<li id="menu-item-1995" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo site_url().'contacto';?>">Contacto</a></li>
            </ul>
</nav>  
