<article class="main-content homepage">
    <div class="breadcrumbs transition" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url()."home";?>">Home</a> | <a>Backoffice</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <div class="row">
                <div class="col-xs-12 col-md-7">
                <section class="widget widget-points">
                    <div class="row">
                        <div class="col-xs-3 .col-sm-3">
                            <div class="wg-content">
                                <h3>Cuenta:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($_SESSION['customer']['franchise_name'])?></h3>
                                <p>
                                    <img src="<?php 
                                    if($_SESSION['customer']['franchise_id'] == 1){
                                        echo site_url().'static/backoffice/images/start.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 2){
                                        echo site_url().'static/backoffice/images/golden.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 3){
                                        echo site_url().'static/backoffice/images/platinium.png';
                                    }else{
                                        echo site_url().'static/backoffice/images/diamond.png';
                                    }
                                    ?>" />
                                     <?php 
                                     if($_SESSION['customer']['status']==1){
                                         $style="red";$value="Pendiente";
                                     }elseif($_SESSION['customer']['status']==2){
                                         $style="green";$value="Pagado";
                                     }
                                     ?>   
                                     <b style="margin-left: 4%;color: <?php echo $style;?>;"><?php echo $value;?></b>
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-xs-3 .col-sm-3">
                            <div class="wg-content">
                                <h3>Cuenta:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($_SESSION['customer']['franchise_name'])?></h3>
                                <p>
                                    <img src="<?php 
                                    if($_SESSION['customer']['franchise_id'] == 1){
                                        echo site_url().'static/backoffice/images/start.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 2){
                                        echo site_url().'static/backoffice/images/golden.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 3){
                                        echo site_url().'static/backoffice/images/platinium.png';
                                    }else{
                                        echo site_url().'static/backoffice/images/diamond.png';
                                    }
                                    ?>" />
                                     <?php 
                                     if($_SESSION['customer']['status']==1){
                                         $style="red";$value="Pendiente";
                                     }elseif($_SESSION['customer']['status']==2){
                                         $style="green";$value="Pagado";
                                     }
                                     ?>   
                                     <b style="margin-left: 4%;color: <?php echo $style;?>;"><?php echo $value;?></b>
                                </p>
                            </div>
                        </div>
                        
                        
                        <div class="col-xs-3 .col-sm-3">
                            <div class="wg-content">
                                <h3>Cuenta:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($_SESSION['customer']['franchise_name'])?></h3>
                                <p>
                                    <img src="<?php 
                                    if($_SESSION['customer']['franchise_id'] == 1){
                                        echo site_url().'static/backoffice/images/start.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 2){
                                        echo site_url().'static/backoffice/images/golden.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 3){
                                        echo site_url().'static/backoffice/images/platinium.png';
                                    }else{
                                        echo site_url().'static/backoffice/images/diamond.png';
                                    }
                                    ?>" />
                                     <?php 
                                     if($_SESSION['customer']['status']==1){
                                         $style="red";$value="Pendiente";
                                     }elseif($_SESSION['customer']['status']==2){
                                         $style="green";$value="Pagado";
                                     }
                                     ?>   
                                     <b style="margin-left: 4%;color: <?php echo $style;?>;"><?php echo $value;?></b>
                                </p>
                            </div>
                        </div>
                        
                        
                        <div class="col-xs-3 .col-sm-3">
                            <div class="wg-content">
                                <h3>Cuenta:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($_SESSION['customer']['franchise_name'])?></h3>
                                <p>
                                    <img src="<?php 
                                    if($_SESSION['customer']['franchise_id'] == 1){
                                        echo site_url().'static/backoffice/images/start.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 2){
                                        echo site_url().'static/backoffice/images/golden.png';
                                    }elseif($_SESSION['customer']['franchise_id'] == 3){
                                        echo site_url().'static/backoffice/images/platinium.png';
                                    }else{
                                        echo site_url().'static/backoffice/images/diamond.png';
                                    }
                                    ?>" />
                                     <?php 
                                     if($_SESSION['customer']['status']==1){
                                         $style="red";$value="Pendiente";
                                     }elseif($_SESSION['customer']['status']==2){
                                         $style="green";$value="Pagado";
                                     }
                                     ?>   
                                     <b style="margin-left: 4%;color: <?php echo $style;?>;"><?php echo $value;?></b>
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
    </div>
</article>
