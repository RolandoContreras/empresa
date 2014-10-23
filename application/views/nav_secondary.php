<div class="row">
    <div class="span12 full-top-shop" data-motopress-type="static" data-motopress-static-file="static/static-shop-nav.php">
       <?php 
       if(isset($_SESSION['customer'])){?>
           <div class="cart-holder">
               <h4 class="users">Bienvenido <?php echo $_SESSION['customer']['name'];?>&nbsp;&nbsp;
                   <a href="<?php echo site_url().'logout';?>" title="Logout"><img class="image_icons"src="<?php echo site_url().'static/images/png/logout2.png';?>"></a>
            </h4>
            
        </div>
       <?php }?>
        <a href="<?php echo site_url().'checkout';?>">
        <div id="woocommerce_widget_cart-2" class="cart-holder">
            <h3>Carrito</h3>
        </div>
        </a>
         <div class="shop-nav">
             <ul id="shopnav" class="shop-menu">
                    <li title="Mi Cuenta"><a href="<?php echo site_url().'micuenta';?>">Login</a></li>
                    <li><a href="<?php echo site_url().'registro';?>" class='register-link' title="Registro">Registro</a></li>
                    <li title="Back Office"><a href="<?php echo site_url().'backoffice';?>">Back Office</a></li>
            </ul>
         </div> 
        
    </div>
</div>

    <div class="row">
    <div class="span12 full-top-nav">
    <div class="row">
    <div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-logo.php">
        <div class="logo">
            <a href="<?php echo site_url().'home';?>" class="logo_h logo_h__img"><img src="<?php echo site_url().'static/images/logo.png';?>" alt="Waveline SAC" width="271" height="105"></a>
        </div>
    </div>
    <div class="span6" data-motopress-type="static" data-motopress-static-file="static/static-nav.php">
        <!--Show the NAV-->
        <?php $this->load->view("nav");?>
 
    </div>

    <!--Search-->
    <div class="span3" data-motopress-type="static" data-motopress-static-file="static/static-search.php">
        <div class="search-form search-form__h clearfix">
            <form id="search-header" class="navbar-form pull-right" method="post" action="<?php echo site_url().'buscar';?>" accept-charset="utf-8">
            <input type="text" name="name" placeholder="Buscar" class="search-form_it">
            <input type="submit" value="Go" id="search-form_is" class="search-form_is">
            </form>
        </div>
    </div>
    <!--Search--> 
        
    </div>
    </div>
    </div>