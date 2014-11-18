<div class="row-fluid">
    <div class="span6">
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Quick View</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CMS</th>
                                                    <th>Discuciones</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                <td><a href="<?php echo site_url().'dashboard/productos';?>"><b><?php echo $obj_products;?></b> <i class="icon-edit"></i> Productos
                                                    </a></td>
                                                    <td><a href="<?php echo site_url().'dashboard/comentarios';?>"><b class="cmd"><?php echo $obj_comments;?></b> <i class="icon-edit"></i> Comentarios</a></td>
                                            </tr>
                                            <tr>
                                                     <td><a href="<?php echo site_url().'dashboard/tags';?>"><b><?php echo $obj_tags;?></b> <i class="icon-edit"></i> Tags</a></td>
                                                    <td><a class="approved"><b class="cmd"><?php echo $active;?></b> <i class="icon-edit"></i> Aprobados</a></td>
                                            </tr>
                                            <tr>
                                                    <td><a href="#"><b>0</b> <i class="icon-edit"></i> Reportes</a></td>
                                                    <td><a class="pending"><b class="cmd"><?php echo $inactive;?></b> <i class="icon-edit"></i> Pendientes</a></td>
                                            </tr>
                                            <tr>
                                                    <td><a href="<?php echo site_url().'dashboard/clientes';?>"><b><?php echo $obj_customer?></b> <i class="icon-edit"></i> Clientes</a></td>
                                                    <td></td>
                                            </tr>
                                           
                                    </tbody>
                            </table>
                    </div>
            </div>

            <div id="quick_post" class="widget_container">
                    <div class="well">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Quick Post</a>
                                            </div>
                                    </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons-radio" style="margin-bottom:20px;">
                                    <button class="btn btn-duadua active">Article</button>
                                    <button class="btn btn-duadua">Page</button>
                                    <button class="btn btn-duadua">Report</button>
                                    <button class="btn btn-duadua">Event</button>
                            </div>

                            <form>
                            <fieldset>
                            <div class="control-group">
                            <div class="controls">
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-edit"></i></span><input class="input-large" size="16" type="text" id="input01" style="width:88%;" placeholder="Title" />
                            </div>
                            </div>
                            </div>

                            <div class="control-group">
                            <div class="controls">
                            <textarea class="input-large" id="textarea_normal" rows="5" style="width:97%;height:180px;" placeholder="Content"></textarea>
                            </div>
                            </div>

                            <button type="submit" class="btn btn-info">Save as draft</button>
                            <button type="submit" class="btn btn-primary">Publish</button>
                            <button class="btn btn-warning">Reset</button>

                            </fieldset>
                            </form>
                    </div>
            </div>
    </div>

        <div class="span6">
                <div id="quick_comment_view" class="widget_container">
                        <div class="well">							
                                <div class="navbar navbar-static navbar_as_heading">
                                        <div class="navbar-inner">
                                                <div class="container" style="width: auto;">
                                                        <a class="brand">Ultimo Comentario</a>
                                                </div>
                                        </div>
                                </div>
                            <?php 
                            if(count($obj_last_comment) > 0){ ?>
                                <div class="row-fluid">
                                        <div class="comment_container span12" style="margin-left:auto;">
                                            <div class="img_round"><img width="70" src="<?php echo SERVER2.$obj_last_comment->big_image;?>" /></div>
                                                <div class="comment_content">
                                                    <p class="meta"><span class="comment_date"><?php echo formato_fecha($obj_last_comment->date_comment);?></span> | <a href="#"><?php echo $obj_last_comment->tittle;?></a></p>
                                                        <p><a href="#" class="comment_author"><?php echo $obj_last_comment->name;?></a> : <?php echo $obj_last_comment->comment;?></p>
                                                        <p>
                                                                <a class="btn btn-mini btn-primary" href="#">Reply</a> <a class="btn btn-mini btn-danger" href="#">Delete</a> <a class="btn btn-mini btn-warning" href="#">Mark as Spam</a> 
                                                        </p>
                                                </div>
                                        </div>
                                        <a href="#" class="btn btn-duadua">View More</a>
                                </div>
                            <?php }  ?>
                        </div>
                </div>

                <div id="popular_posts" class="widget_container">
                        <div class="well">
                                <div class="navbar navbar-static navbar_as_heading">
                                        <div class="navbar-inner">
                                                <div class="container" style="width: auto;">
                                                        <a class="brand">Popular Posts</a>
                                                </div>
                                        </div>
                                </div>

                                <table class="table">
                                        <tbody>
                                                <tr>
                                                        <td>1</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">25 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>2</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">20 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>3</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">15 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>4</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">10 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>5</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">5 Comments</a></td>
                                                </tr>
                                        </tbody>
                                </table>
                                <a href="#" class="btn btn-duadua">View More</a>
                        </div>
                </div>
               

        </div>

</div>