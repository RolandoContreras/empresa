<?php $this->load->view("header");?>
<body class="blog has_woocommerce has_shop cat-1-id">
	<div id="motopress-main" class="main-holder">
		<!--Begin #motopress-main-->
		<header class="motopress-wrapper header">
			<div class="container">
				<div class="row">
					<div class="span12" data-motopress-wrapper-file="wrapper/wrapper-header.php" data-motopress-wrapper-type="header" data-motopress-id="5409da83b1564">
                                            <!--Menu Navigacion Secundary-->
                                            <?php $this->load->view("nav_secondary");?>
                                            <!--------------------------->
                                        </div>
				</div>
			</div>
		</header>
		
<div class="motopress-wrapper content-holder clearfix">
	<div class="container">
		<div class="row">
			<div class="span12" data-motopress-wrapper-file="index.php" data-motopress-wrapper-type="content">
				<div class="row">
                                    <div class="span12" data-motopress-type="static" data-motopress-static-file="static/static-title.php">
                                        <section class="title-section">
                                            <h1 class="title-header">Blog</h1>
                                                <ul class="breadcrumb breadcrumb__t">
                                                    <li><a href="<?php echo site_url().'home';?>">Home</a></li>
                                                    <li class="divider"></li><li class="active">Blog</li></ul>
                                        </section>					
                                    </div>
				</div>
		<div class="row">
                    <div class="span9 right" id="content" data-motopress-type="loop" data-motopress-loop-file="loop/loop-blog.php">
                       <!-------PRODUCTS TO SEARCH-------->
                        <div class="post_wrapper">
                            <article id="post-1910" class="post-1910 post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-elit tag-ipsum-dolor tag-lorem post__holder cat-1-id">
                                <header class="post-header">
                                        <h2 class="post-title">
                                        <a href="http://livedemo00.template-help.com/woocommerce_51107/uncategorized/aliquam-erat-volutpat/" title="Aliquam erat volutpat">Aliquam erat volutpat</a>
                                        </h2>
                                </header>
                                
                                <figure class="featured-thumbnail thumbnail large" >
                                    <a href="" title="" >
                                        <img src="" alt="Aliquam erat volutpat" >
                                    </a>
                                </figure>
                                    <!-- Post Content -->
                                <div class="post_content">
                                    <div class="excerpt">
                                        <h3>Aliquam dapibus tincidunt metus. Praesent justo dolor, lobortis quis, lobortis dignissim, pulvinar ac, lorem.</h3>
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc... 				
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </article>
                         </div>
                       <!-------PRODUCTS TO SEARCH-------->
                        
                        <div class="pagination pagination__posts">
                            <ul>
                                <li class="active"><a href='#'>1</a></li>
                                <li><a href='http://livedemo00.template-help.com/woocommerce_51107/page/2/?s' class="inactive">2</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-------------CATEGORIAS-------------------------->
                        <div class="sidebar span3" id="sidebar" data-motopress-type="static-sidebar" data-motopress-sidebar-file="sidebar.php">
                            <div id="categories-3" class="visible-all-devices widget">
                                <h3>Categorías</h3> 
                                <ul>
                                    <?php foreach ($category as $value) { ?>
                                    <li class="cat-item cat-item-13"><a href="<?php echo site_url().  convert_slug($value->name);?>"><?php echo $value->name;?></a></li>
                                     <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <!-------------------------------------------------->
		</div>
            </div>
	</div>
    </div>
</div>

<!------call footer----->    
<?php $this->load->view("footer");?>
<!------call footer----->

        </div>
	<script type='text/javascript' src='<?php echo site_url().'static/js/add_car.js';?>'></script>    
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.js';?>'></script>    
<script type="text/javascript" src='<?php echo site_url().'static/js/jquery.form.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery-cookie.min.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/superfish.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/jquery.mobilemenu.js';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/js/device.min.js';?>'></script>
<!----Script perzonalizado de Mensaje del precio ------>
<script type='text/javascript' src='<?php echo site_url().'static/js/custom-script.js';?>'></script>
<!----------------------------------------------------->
<script type='text/javascript' src='<?php echo site_url().'static/js/parallaxSlider.js';?>'></script>
</body>
</html>