<nav class="nav nav__primary clearfix">
    <ul id="topnav" class="sf-menu">
                <li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="<?php echo site_url().'home';?>">Home</a></li>
                <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-203 current_page_item"><a href="<?php echo site_url().'acerca';?>">Acerca</a>
                <ul class="sub-menu">
                    <li id="menu-item-2001" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Testimonios</a></li>
                    <li id="menu-item-1996" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">FAQs</a></li>
                </ul>
                </li>
                
                <li class="menu-item menu-item-type-post_type menu-item-object-page "><a href="<?php echo site_url().'compras';?>">Compras</a>
                    <ul class="sub-menu">
                         <?php foreach ($category as $key => $value) {?>
                       <li id="menu-item-2018" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href=""><?php echo $value->name;?></a>
                           <ul class="sub-menu">
                           <li id="menu-item-2013" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 1</a></li>
                           <li id="menu-item-2012" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 2</a></li>
                           <li id="menu-item-2011" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 3</a></li>
                           </ul>
                       </li>
                       <?php } ?>
                    </ul>    

                        
                    
<!--                    <ul class="sub-menu">
                        <li id="menu-item-2018" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href="">Lorem ipsum</a>

                            <ul class="sub-menu">
                            <li id="menu-item-2013" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 1</a></li>
                            <li id="menu-item-2012" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 2</a></li>
                            <li id="menu-item-2011" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 3</a></li>
                            </ul>
                        </li>

                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href="">Donec vitae</a>

                            <ul class="sub-menu">
                            <li id="menu-item-2013" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 1</a></li>
                            <li id="menu-item-2012" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 2</a></li>
                            <li id="menu-item-2011" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 3</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href="">Ut eget tortor</a>

                            <ul class="sub-menu">
                            <li id="menu-item-2013" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 1</a></li>
                            <li id="menu-item-2012" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 2</a></li>
                            <li id="menu-item-2011" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 3</a></li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href="">Nam felis nulla</a>

                            <ul class="sub-menu">
                            <li id="menu-item-2013" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 1</a></li>
                            <li id="menu-item-2012" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 2</a></li>
                            <li id="menu-item-2011" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="">Category 3</a></li>
                            </ul>
                        </li>
                    </ul>-->
                </li>
                
<li id="menu-item-1995" class="menu-item menu-item-type-post_type menu-item-object-page"><a href="<?php echo site_url().'contacto';?>">Contacto</a></li>
            </ul>
</nav>  
