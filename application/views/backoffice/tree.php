<link rel="stylesheet" type="text/css" href="<?php echo site_url().'static/css/tooltipster.css';?>" />
<script type="text/javascript" src="<?php echo site_url().'static/js/jquery.tooltipster.min.js';?>"></script>
<script>
    $(document).ready(function() {
        $('.member_tooltip').tooltipster({
            theme: '.tooltipster_member'
        });
        $('.elite_tooltip').tooltipster({
            theme: '.tooltipster_elite'
        });
        $('.platinum_tooltip').tooltipster({
            theme: '.tooltipster_platinium'
        });
        $('.premier_tooltip').tooltipster({
            theme: '.tooltipster_premier'
        });
        $('.constructor_tooltip').tooltipster({
            theme: '.tooltipster_constructor'
        });
        $('.consultant_tooltip').tooltipster({
            theme: '.tooltipster_consultant'
        });
        $('.supervisor_tooltip').tooltipster({
            theme: '.tooltipster_supervisor'
        });
        $('.supervisor-senior_tooltip').tooltipster({
            theme: '.tooltipster_supervisor_senior'
        });
        $('.manager_tooltip').tooltipster({
            theme: '.tooltipster_manager'
        });
        $('.senior-manager_tooltip').tooltipster({
            theme: '.tooltipster_senior_manager'
        });
        $('.director_tooltip').tooltipster({
            theme: '.tooltipster_director'
        });
        $('.executive-director_tooltip').tooltipster({
            theme: '.tooltipster_executive_director'
        });
    });
</script>
<article class="main-content homepage">
    <div class="breadcrumbs transition" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo site_url().'home';?>">Home</a> | <a>Arbol</a>
            </li>
        </ul>
    </div>
        <div style="clear:both;"></div>

    <div class="content">
        <section class="widget widget-binario">
            <header class="title-widget clearfix" style="margin-bottom:0px;">
                <h1 class="pull-left" style="color:#428bca;">
                    <?php echo $obj_profile->first_name." ".$obj_profile->last_name;?> (<?php echo $obj_profile->code;?>)
                </h1>
                <br>
                <?php if(count($obj_upline) > 0){ ?>
                     <p>Patrocinador: <?php echo $obj_upline->first_name." ".$obj_upline->last_name;?>(<?php echo $obj_upline->code;?>)</p>
                <?php } ?>
            </header>

            <div class="wg-content">
                <div style="float:left;margin:10px;width:190px;">
                    FECHA DE REGISTRO: <span style="color:#428bca; font-weight:bold;"><?php echo formato_fecha_barras($obj_profile->created_at);?></span><br>
                </div>
<!--                <div style="float:left;margin:10px;width:190px;">
                    LEFT: <span style="color:#428bca; font-weight:bold;">1.000</span><br>
                    RIGHT:<span style="color:#428bca; font-weight:bold;">0</span><br>
                </div>-->
                
                <div style="float:left;margin:10px;width:190px;">
                   DIRECTOS IZQUIERDA: <span style="color:#428bca; font-weight:bold;"><?php echo $count_left;?></span><br>
                   DIRECTOS DERECHA: <span style="color:#428bca; font-weight:bold;"><?php echo $count_right;?></span><br>
                </div>
                <div style="clear:both;"></div>
            </div> 

            <div class="wg-content">
                <div class="arvore">
                    <div class="buttons clearfix">
                        <a href="<?php echo site_url().'backoffice/arbol';?>" class="button button-icon-left button-up pull-left">
                             Volver Arriba<span class="angle-up"></span>                
                        </a>
                    </div>
                    <div class="network-view">
                        <div class="niveis">
                            <div class="nivel n1">
                                <a class = "posicao posicao-n5 consultant"> 
                                     <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                            title = "<center><?php echo $n1[0];?><br><?php echo $n1[1];?><center>
                                            <br><br><hr>(<?php echo $n1[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                            </center>" class = "tooltip_class consultant_tooltip">
                                    
                                </a>
                                
                                <canvas id="myCanvas1" width="300" height="60" style="margin-top:-19%; margin-left: 40%;"></canvas>
                                
                                <!--<canvas id="myCanvas2" width="300" height="60" style="margin-top:-19%; margin-left: 40%;"></canvas>-->
                                        <script type="text/javascript">     
                                           var c=document.getElementById("myCanvas1");
                                           var cxt=c.getContext("2d");

                                           cxt.lineWidth = 10;
                                           cxt.strokeStyle = "black"; 
                                           cxt.moveTo(10, 60);

                                           cxt.bezierCurveTo(150, 10, 300, 10, 300, 200);
                                           cxt.stroke();
                                        </script>
                                        
                                
                                
                                <?php $class = count($n2_iz) > 1?"consultant":"";?>
                                <div class="nivel n2 esquerda">
                                    <a href = "<?php echo site_url()."backoffice/arbol/$n2_iz[2]";?>" class = "posicao posicao-n5 <?php echo $class;?>">
                                        <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                          <?php if(count($n2_iz) > 1){ ?>
                                                    title = "<center><?php echo $n2_iz[0];?><br><?php echo $n2_iz[1];?><center>
                                            <br><br><hr>(<?php echo $n2_iz[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                            </center>" class = "tooltip_class consultant_tooltip">
                                          <?php }else{echo "/>";} ?>   
                                            
                                    </a>
                                    <?php $class = count($n3_iz) > 1?"consultant":"";?>
                                    <div class="nivel n3 esquerda">
                                        <a href = "<?php echo site_url()."backoffice/arbol/$n3_iz[2]";?>" class = "posicao posicao-n5 <?php echo $class;?>">
                                        <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                          <?php if(count($n3_iz) > 1){ ?>
                                                    title = "<center><?php echo $n3_iz[0];?><br><?php echo $n3_iz[1];?><center>
                                            <br><br><hr>(<?php echo $n3_iz[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                            </center>" class = "tooltip_class consultant_tooltip">
                                          <?php }else{echo "/>";} ?>   
                                            
                                        </a>
                                        
                                        <?php $class = count($n4_iz) > 1?"consultant":"";?>    
                                        <div class="nivel n4 esquerda">
                                            <a href = "<?php echo site_url()."backoffice/arbol/$n4_iz[2]";?>" class = "posicao posicao-n5 <?php echo $class;?>">
                                                <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                  <?php if(count($n4_iz) > 1){ ?>
                                                            title = "<center><?php echo $n4_iz[0];?><br><?php echo $n4_iz[1];?><center>
                                                    <br><br><hr>(<?php echo $n4_iz[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                    </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?>   
                                            </a>
                                        </div>

                                       <div class="nivel n4 direita">
                                           <?php $class = count($n4_2_iz) > 1?"consultant":"";?>    
                                            <a href = "<?php echo site_url()."backoffice/arbol/$n4_2_iz[2]";?>" class = "posicao posicao-n5 <?php echo $class;?>">
                                                <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                  <?php if(count($n4_2_iz) > 1){ ?>
                                                            title = "<center><?php echo $n4_2_iz[0];?><br><?php echo $n4_2_iz[1];?><center>
                                                    <br><br><hr>(<?php echo $n4_2_iz[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                    </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?>  
                                            </a>                                        
                                        </div>
                                    </div>

                                    <div class="nivel n3 direita">
                                        <?php $class = count($n3_2_iz) > 1?"consultant":"";?> 
                                        <a href = "<?php echo site_url()."backoffice/arbol/$n3_2_iz[2]-$n2_iz[4]";?>" class = "posicao posicao-n5 <?php echo $class;?>">
                                            <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                  <?php if(count($n3_2_iz) > 1){ ?>
                                                            title = "<center><?php echo $n3_2_iz[0];?><br><?php echo $n3_2_iz[1];?><center>
                                                    <br><br><hr>(<?php echo $n3_2_iz[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                    </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?>   
                                        </a>
                                        <div class="nivel n4 esquerda">
                                            <?php $class = count($n4_3_iz) > 1?"consultant":"";?> 
                                            <a href = "<?php echo site_url()."backoffice/arbol/$n4_3_iz[2]";?>" class = "posicao posicao-n5 <?php echo $class;?>">
                                               <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                  <?php if(count($n4_3_iz) > 1){ ?>
                                                            title = "<center><?php echo $n4_3_iz[0];?><br><?php echo $n4_3_iz[1];?><center>
                                                    <br><br><hr>(<?php echo $n4_3_iz[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                    </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?>  
                                            </a>
                                        </div>

                                        <div class="nivel n4 direita">
                                            <?php $class = count($n4_4_iz) > 1?"consultant":"";?> 
                                            <a href = "<?php echo site_url()."backoffice/arbol/$n4_4_iz[2]";?>" class = "posicao posicao-n5 <?php echo $class;?>">
                                                <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                  <?php if(count($n4_4_iz) > 1){ ?>
                                                            title = "<center><?php echo $n4_4_iz[0];?><br><?php echo $n4_4_iz[1];?><center>
                                                    <br><br><hr>(<?php echo $n4_4_iz[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                    </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?>   
                                            </a>                                        
                                        </div>
                                    </div>
                            </div>

                            <div class="nivel n2 direita">
                                <?php $class = count($n2_de) > 1?"consultant":"";?>
                                <a href = "<?php echo site_url()."backoffice/arbol/$n2_de[2]";?>" class = "posicao posicao-n5 <?php echo $class?>">
                                    <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                          <?php if(count($n2_de) > 1){ ?>
                                                    title = "<center><?php echo $n2_de[0];?><br><?php echo $n2_de[1];?><center>
                                            <br><br><hr>(<?php echo $n2_de[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                            </center>" class = "tooltip_class consultant_tooltip">
                                          <?php }else{echo "/>";} ?> 
                                </a>
                                <div class="nivel n3 esquerda">
                                    <?php $class = count($n3_2_de) > 1?"consultant":"";?>
                                    <a href = "<?php echo site_url()."backoffice/arbol/$n3_2_de[2]";?>" class = "posicao posicao-n5 <?php echo $class?>">
                                        <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                          <?php if(count($n3_2_de) > 1){ ?>
                                                    title = "<center><?php echo $n3_2_de[0];?><br><?php echo $n3_2_de[1];?><center>
                                            <br><br><hr>(<?php echo $n3_2_de[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                            </center>" class = "tooltip_class consultant_tooltip">
                                          <?php }else{echo "/>";} ?> 
                                    </a>
                                    <div class="nivel n4 esquerda">
                                        <?php $class = count($n4_4_de) > 1?"consultant":"";?>
                                        <a href = "<?php echo site_url()."backoffice/arbol/$n4_4_de[2]";?>" class = "posicao posicao-n5 <?php echo $class?>">
                                            <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                <?php if(count($n4_4_de) > 1){ ?>
                                                          title = "<center><?php echo $n4_4_de[0];?><br><?php echo $n4_4_de[1];?><center>
                                                  <br><br><hr>(<?php echo $n4_4_de[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                  </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?> 
                                        </a>                                        
                                    </div>

                                    <div class="nivel n4 direita">
                                        <?php $class = count($n4_3_de) > 1?"consultant":"";?>
                                        <a href = "<?php echo site_url()."backoffice/arbol/$n4_3_de[2]";?>" class = "posicao posicao-n5 <?php echo $class?>">
                                             <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                <?php if(count($n4_3_de) > 1){ ?>
                                                          title = "<center><?php echo $n4_3_de[0];?><br><?php echo $n4_3_de[1];?><center>
                                                  <br><br><hr>(<?php echo $n4_3_de[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                  </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?> 
                                        </a>                                        
                                    </div>
                                </div>

                                <div class="nivel n3 direita">
                                    <?php $class = count($n3_de) > 1?"consultant":"";?>
                                    <a href = "<?php echo site_url()."backoffice/arbol/$n3_de[2]";?>" class = "posicao posicao-n5 <?php echo $class?>">
                                        <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                          <?php if(count($n3_de) > 1){ ?>
                                                    title = "<center><?php echo $n3_de[0];?><br><?php echo $n3_de[1];?><center>
                                            <br><br><hr>(<?php echo $n3_de[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                            </center>" class = "tooltip_class consultant_tooltip">
                                          <?php }else{echo "/>";} ?> 
                                        
                                    </a>
                                    <div class="nivel n4 esquerda">
                                        <?php $class = count($n4_2_de) > 1?"consultant":"";?>
                                        <a href = "<?php echo site_url()."backoffice/arbol/$n4_2_de[2]";?>" class = "posicao posicao-n5 <?php echo $class?>">
                                            <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                <?php if(count($n4_2_de) > 1){ ?>
                                                          title = "<center><?php echo $n4_2_de[0];?><br><?php echo $n4_2_de[1];?><center>
                                                  <br><br><hr>(<?php echo $n4_2_de[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                  </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?> 
                                        </a>
                                    </div>

                                    <div class="nivel n4 direita">
                                        <?php $class = count($n4_de) > 1?"consultant":"";?>
                                        <a href = "<?php echo site_url()."backoffice/arbol/$n4_de[2]";?>" class = "posicao posicao-n5 <?php echo $class?>">
                                                <img src="<?php echo site_url();?>static/images/empty.jpg" 
                                                <?php if(count($n4_de) > 1){ ?>
                                                title = "<center><?php echo $n4_de[0];?><br><?php echo $n4_de[1];?><center>
                                                  <br><br><hr>(<?php echo $n4_de[5];?>)<br>1000 <i class=icon-circle-arrow-left></i> <i class=icon-circle-arrow-right></i> 0
                                                  </center>" class = "tooltip_class consultant_tooltip">
                                                <?php }else{echo "/>";} ?> 
                                        </a>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttons clearfix">
                    <a href="<?php 
                    if($n4_iz != ""){
                        echo site_url()."backoffice/arbol/$n4_iz[2]";
                    }elseif($n3_iz){
                        echo site_url()."backoffice/arbol/$n3_iz[2]";
                    }else{
                        echo site_url()."backoffice/arbol/$n2_iz[2]";
                    }
                    ?>" class="button button-icon-left button-left pull-left">
                        <span class="arrow-sign-left-down"></span>
                        Bajar Izquierda                   
                    </a>
                    <a href="<?php 
                    if($n4_de != ""){
                        echo site_url()."backoffice/arbol/$n4_de[2]";
                    }elseif($n3_de){
                        echo site_url()."backoffice/arbol/$n3_de[2]";
                    }else{
                        echo site_url()."backoffice/arbol/$n2_de[2]";
                    }
                    ?>" class="button button-icon-right button-right pull-right">
                        Bajar Derecha<span class="arrow-sign-right-down"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>  
<a name="perna"></a>
<section class="widget widget-perna-preferencial" style="margin-top:10px;">
    <header class="title-widget" style="margin-bottom:10px;">
        <h1>Pierna por Defecto</h1>
    </header>
    <div class="wg-content" style="height:80px;">

        <form action="<?php echo site_url().'backoffice/position';?>" id="UserBinaryForm" method="post" accept-charset="utf-8">
            <div style="display:none;">
                <input type="hidden" name="_method" value="POST"/>
            </div>  
            <input type="hidden" name="customer_id" value="<?php echo $_SESSION['customer']['customer_id']; ?>"/>
            <input type="hidden" name="izq" value="<?php echo $count_left;?>"/>
            <input type="hidden" name="der" value="<?php echo $count_right;?>"/>
            <label for="esquerda">
                <input type="radio" id="esquerda" value="left" name="left" <?php echo $_SESSION['customer']['position_temporal']==1?"checked":"";?>> 
                <span>Izquierda</span>
            </label>
            <label for="direita">
                <input type="radio" id="direita" value="right" name="left" <?php echo $_SESSION['customer']['position_temporal']==2?"checked":"";?>>
                <span>Derecha</span>
            </label>
            <label for="menor">
                <input type="radio" id="menor" value="iqual" name="left">
                <span>Balanceado</span>
            </label> 
            <div class="submit">
                <input  class="btn btn-sm btn-primary" type="submit" value="Guardar"/>
            </div>    
        </form>
    </div>
</section>
<div style="clear:both;"></div>
</div>
</article>