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
                        <div class="col-xs-4 .col-sm-4">
                            <div class="wg-content">
                                <h3>Contrato</h3>
                                <p><a href="<?php echo site_url().'static/document/contract/Contrato_waveline.pdf';?>" target="_blank">Link de descarga</a></p>
                            </div>
                            <div class="alert alert-info" style="margin-bottom:0;">
                                <strong>Nota:</strong> &nbsp;Descargue el contrato, firmarlo y enviarlo a customer@waveline.com con una copia de su DNI, Password o Carnet de Extranjeria y el vocuher de pago del pedido.
                            </div>
                        </div>
                        
                        
                        <div class="col-xs-4 .col-sm-4">
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
                                        $value="Pendiente";$style="red";
                                    }elseif($_SESSION['customer']['status']==2){
                                        $value="Pagado";$style="green";
                                    }
                                    ?>
                                         <b style="margin-left: 4%;color: <?php echo $style;?>;"><?php echo $value;?></b>
                                </p>
                            </div>
                            <div class="alert alert-info" style="margin-bottom:0;">
                                <strong>Nota:</strong> &nbsp;Debe realizar un pedido.
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</article>
