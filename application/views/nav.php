<nav class="nav nav__primary clearfix">
    <ul id="topnav" class="sf-menu">
        <?php 
        
        $ruta = explode("/",uri_string()); 
        $nav = $ruta[0];
        
        $home    = '';
        $contact = '';
        $about   = '';
        $shop    = '';
        
        switch ($nav) {
           case "home":
                $home = "current_page_item";
                break;
            case "acerca":
                $about = "current_page_item";
                break;
            case "compras":
                $shop = "current_page_item";
                break;
            case "contacto":
                $contact = "current_page_item";
                break;
            case "checkout":
                 $shop = "current_page_item";
                break;  
            case "micuenta":
                 $home = "current_page_item";
                break;
            case "registro":
                 $shop = "current_page_item";
                break;
            case "":
                 $home = "current_page_item";
                break;
          default:
                $shop = "current_page_item";
                break;
        }
        ?>
                <li class="<?php echo $home;?>">
                    <a href="<?php echo site_url().'home';?>">Home</a>
                </li>
                <li class="<?php echo $about;?>">
                    <a href="<?php echo site_url().'acerca';?>">Acerca</a>
                </li>
                <li class="<?php echo $shop;?>">
                    <a href="<?php echo site_url().'compras';?>">Compras</a>
                    <ul class="sub-menu">
                       <?php foreach ($menu as $key => $value_menu) {?>
                                <li id="menu-item-2018" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat">
                                    <a href="<?php echo site_url().convert_slug($value_menu->name);?>"><?php echo $value_menu->name;?></a>
                                        <ul class="sub-menu">
                                             <?php foreach ($submenu[$key] as $key2 =>$value_submenu):?>                                                
                                                    <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                                        <a href="<?php echo site_url().convert_slug($value_submenu->category_name.'/'.$value_menu->name);?>"><?php echo $value_submenu->category_name;?></a>
                                                    </li>
                                             <?php endforeach;?>
                                        </ul>
                                </li>
                       <?php } ?>
                    </ul>    
                </li>
                <li class="<?php echo $contact;?>">
                    <a href="<?php echo site_url().'contacto';?>">Contacto</a>
                </li>
    </ul>
</nav>  
