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
                                <h3>Balance</h3>
                                <p><?php echo format_number($total->total);?></p>
                            </div>
                            
                            <div class="wg-content">
                                <h3>Estado</h3>
                                <p><?php echo "Inactivo";?></p>
                            </div>
                            <div class="alert alert-info" style="margin-bottom:0;">
                                <strong>Nota:</strong> Su cuenta esta inactiva para las comisiones
                            </div>
                        </div>
                    </div>
                </section>
                <section class="widget" style="margin-top:15px;">
                    <header class="title-widget" style="margin-bottom:10px;">
                        <h1>Equipo Unilevel</h1>
                    </header>
                    <div class="wg-content">
                        <table class="table table-hover table-striped table-bordered tabela my-unilevel" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th><center>Name</center></th>
                                    <th><center>Sponsor</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(count($obj_profile)>0){
                                    foreach ($obj_profile as $value) { ?>
                                     <tr>
                                        <td><?php echo $value->first_name;?> ( <?php echo $value->email;?> )</td>
                                        <td><?php echo $_SESSION['customer']['name'];?> ( <?php echo $_SESSION['customer']['email'];?> )</td>
                                     </tr> 
                                     
                                <?php  }
                                
                                }else{ ?>
                                    <tr>
                                        <td colspan="2">Usted No tiene referidos</td>
                                     </tr>   
                               <?php } ?>
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</article>
