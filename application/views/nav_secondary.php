 <div class="row">
    <div class="span12 full-top-shop" data-motopress-type="static" data-motopress-static-file="static/static-shop-nav.php">
        <div id="woocommerce_widget_cart-2" class="cart-holder">
            <h3>Carrito</h3>
            <div class="widget_shopping_cart_content"></div><!--Mensaje de carrito no hay productos-->
        </div>
         <div class="shop-nav">
             <ul id="shopnav" class="shop-menu">
                    <li><a href="" class='register-link' title="Registro">Registro</a></li>
                    <li id="menu-item-2020" title=""><a href="Delivery">Delivery</a></li>
                    <li id="menu-item-2021" title="Mi Cuenta"><a href="">Mi Cuenta</a></li>
            </ul>
         </div> 
    </div>
    </div>

    <div class="row">
    <div class="span12 full-top-nav">
    <div class="row">
    <div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
        <div class="logo pull-left">
            <a href="<?php echo site_url().'home';?>" class="logo_h logo_h__img"><img src="<?php echo site_url().'static/images/logo.png';?>" alt="TradeE&C" title="Logo"></a>
        </div>
    </div>
    <div class="span6" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
        <!--Show the NAV-->
        <?php $this->load->view("nav");?>
        <!---------------->
    </div>

    <!----Search---->
    <div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-search.php">
        <div class="search-form search-form__h clearfix">
            <form id="search-header" class="navbar-form pull-right" method="get" action="" accept-charset="utf-8">
            <input type="text" name="s" placeholder="Buscar" class="search-form_it">
            <input type="submit" value="Go" id="search-form_is" class="search-form_is">
            </form>
        </div>
    </div>
    <!----Search----> 
        
    </div>
    </div>
    </div>