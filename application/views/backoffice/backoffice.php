<!DOCTYPE html>
<!--[if IE 7]>    <html class="ie7 ie no-js" lang="pt-br"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 ie no-js" lang="pt-br"> <![endif]-->
<!--[if IE 9]>    <html class="ie9 ie no-js" lang="pt-br"> <![endif]-->
<!--[if gt IE 10]><!--><html lang="pt-br" class="no-js"><!--<![endif]-->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>WAVELINE</title>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow" />
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/bootstrap/bootstrap.min.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/font-awesome.min.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/layout.css';?>"/>
        
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/arvore-binaria.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/main.css';?>"/>
        <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/flags.css';?>"/>
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url().'static/css/layout_messages.css';?>"/>
        
        
        <script type="text/javascript" src="<?php echo site_url().'static/js/jquery-1.10.2.min.js';?>"></script>
        <script type="text/javascript" src="<?php echo site_url().'static/js/bootstrap.min.js';?>"></script>
        <script type="text/javascript" src="<?php echo site_url().'static/js/css3-mediaqueries.min.js';?>"></script>

        <script type="text/javascript" src="/js/scripts.js"></script>
        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-45449400-1', 'wingsnetwork.com');
            ga('send', 'pageview');

        </script>
        <script type="text/javascript">
            $(function () {
                //Troca de Áreas pelo logotipo
                $(".topo .logotipo h1 > span, .topo .logotipo h1 > a").on("click", function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $(this).parent().parent().toggleClass("active");
                });

                $("body").on("click", function () {
                    $(".adjustable-menu").removeClass("open");
                    $(".topo .logotipo").removeClass("active");
                });

                    //Linguas
                    $('.topo #language').popover({
                            placement: 'bottom',
                            html: true,
                            title: false, 
                            content: function() {
                                return $('.lang-content').html()
                            }
                        });

            });

        </script>  
    </head>
    <body>
        <div class="global">
            <div class="main-areas">
                <header class="topo navbar bootstro">
                <div class="navbar-inside">
                    <div class="logotipo">
                        <h1>
                            <a href="#"><i class="icon-home"></i>&nbsp;Back Office</a>
                            <span><i class="icon-caret-down"></i></span>
                        </h1>
                     <div class="logotipos-dialog">
                            <ul class="clearfix">
                                
                                <li>
<img src="/images/logo.png" width="80" height="40">
                                </li>

                                <li>
                                    <a href="/Cloud"> 
                                        <i class="icon-cloud-upload" style="padding-right: 3px;"></i>Cloud
                                    </a>
                                </li>
                                <li>
                                    <a href="/Voip/index"> 
                                        <i class="icon-mobile-phone" style="padding-right: 3px;"></i>Communicator
                                    </a>
                                </li>
                                <li>
                                    <a href="/blog/index/1">
                                        <i class="icon-star"></i>Personal Page
                                    </a>
                                </li>
                                <li>
                                    <a href="/blog/index/2"> 
                                        <i class="icon-group"></i> Recruiter
                                    </a>
                                </li>
                                
                                <li class="active">
                                    <a href="/users/dashboard">
                                        <i class="icon-home"></i>Backoffice
                                    </a>
                                </li>
                            </ul>
                        </div> 
                        
                    </div>
                    <nav class="pull-right controls">
                        
                        <div class="fast-access-blog">
 	                            	<span>Rolando Contreras</span>

                        </div>
                        <ul class="nav">
 							<li class="sponsor_link">
                           		<a href="http://office.wingsnetwork.com/rolandocontreras"><i class="icon-edit"></i> Your Sponsor Link </a>
							</li>
							
							<li class="settings" style="border-left: 1px solid #336699; height: 47px;">
                                    <div style="margin: 10px;">
                                        <a href="http://www.facebook.com/wingsnetworkco" target="_blank"><img src="/images/social/fb.gif" style="max-width: 25px;"></a>
                                        <a href="http://www.twitter.com/wingsnetworkco" target="_blank"><img src="/images/social/twitter.gif" style="max-width: 25px;"></a>
                                        <a href="http://www.youtube.com/channel/UCFlYRitcLcxBsF7ONv9t7eg" target="_blank"><img src="/images/social/youtube.gif" style="max-width: 25px;"></a>
                                    </div>
                                </li>
<li class="messages">
                                    <a href="/messages" id="messages" data-toggle="popover" role="button">
                                        <i class="icon-inbox"></i>
                                        <span class="message_count">3</span>                                    </a></li> 
 							
                            <li class="language">
                                <a href="#" id="language" data-toggle="popover" role="button">
                                    <i class="icon-globe"></i>
                                    EN                                </a>
                                <div class="lang-content" style="display:none;">
                                    <ul class="langs">
                                        <li><a href="?language=en"><b class="flag flag-us"></b>English</a></li>
                                        <li><a href="?language=es"><b class="flag flag-es"></b>Español</a></li>
                                        <li><a href="?language=pt"><b class="flag flag-pt"></b>Português</a></li>
                                        <li><a href="?language=it"><b class="flag flag-it"></b>Italiano</a></li>
                                        <li><a href="?language=ru"><b class="flag flag-ru"></b>Русский</a></li>
                                        <li><a href="?language=de"><b class="flag flag-de"></b>Deutsch</a></li>
                                        <li><a href="?language=fr"><b class="flag flag-fr"></b>Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="settings">
                                <a href="/users/profile" title="Settings" >
                                    <i class="icon-cog"></i>
                                </a>
                            </li>
                            <li class="logout">
                                <a href="/users/logout" title="Logout">
                                    <i class="icon-signout"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>

                <div class="fixed-area">
                    <!-- Logo do MMN. Link volta pra homepage -->

                    <!-- Menu principal das páginas -->
                    
                    <nav class="main-menu">
                        <ul>
                            <li class='active' style='margin-top:1px;'><a href=/users/dashboard><i class=icon-dashboard></i><span>Dashboard</span></a></li><li><a href=/users/profile><i class=icon-user></i><span>My Account</span></a></li><li><a href=/balances/><i class=icon-reorder></i><span>Balance</span></a></li><li><a href=/users/myposition><i class=icon-bookmark-empty></i><span>My Position</span></a></li><li><a href=/users/unilevel><i class=icon-sitemap></i><span>Unilevel</span></a></li><li><a href=/users/binary><i class=icon-group></i><span>Binary</span></a></li><li><a href=/users/register_new_user/rolandocontreras><i class=icon-plus-sign></i><span>New Member</span></a></li><li><a href=/users/pending><i class=icon-exclamation-sign></i><span>Pending</span></a></li><li><a href=/upgrades/><i class= icon-chevron-up></i><span>Upgrade</span></a></li><li><a href=/identity><i class=icon-exclamation></i><span>Identity</span></a></li><li><a href=/users/faq><i class=icon-question-sign></i><span>FAQ</span></a></li>
                        </ul>
                    </nav>


                    <nav class="main-menu"> 
                    </nav>
<br>

					<div style="text-align:center;font-size:14px; color: #FFFFFF;"><a href="mailto:support@wingsnetwork.com" style="color: #FFFFFF;">- Support Team -</a></div>

					<div style="text-align:center;font-size:11px; color: #FFFFFF;">v2.0</div>

                </div><!-- .fixed-area -->
                <div class="fluid-area">
                    <!-- Área principal da página. Todo o conteúdo dela vem aqui. Também vai uma class para identificar a área que está, caso necessite algum estilo diferente. -->
                    <script>
if (window!=window.top) { 
        /* I'm in a frame! */ 
        window.top.location = '/';
}
jQuery(document).ready(function(){
    $('#myModal').modal('show');
});
</script>

<article class="main-content homepage">
    <div class="breadcrumbs transition" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Dashboard</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="content">
        <div class="row">
            
                <div class="col-xs-12 col-md-7">

                <section class="widget">
                                        <div class="box-user supervisor">
                        <header class="title-widget">
                            <div style="width:90%;">
                                <img src=/images/profile/82273_1398035183_9537.jpg class = 'moldura consultant'><div style='padding-left: 95px;''> <h1 style='padding-top:15px;font-size:22px;text-align:left;'>Rolando Contreras</h1> <span class = 'title consultant'>Consultant</span></div>                            </div>
                            <div style="clear:both;"></div>
                        </header>

                    </div>

                </section>
                    <div class='alert alert-warning'>Please validate the following fields in your profile: <br><li>Facebook<br><li>Skype</div><div class='alert alert-success'>Your Token Validation System is completed! You are now able to make transfers.</div>
                <section class="widget widget-points">

                    <div class="row">

                        <div class="col-xs-4 .col-sm-4">

                            <div class="wg-content">
                                <h3>
                                    <i class="icon-circle-arrow-left"></i>
                                    Left Leg                                </h3>
                                <p> 
                                    1.000                                </p>
                            </div>
                        </div>

                        <div class="col-xs-4 .col-sm-4">
                            <div class="wg-content">
                                <h3>
                                    <i class="icon-circle-arrow-right"></i>
                                    Right Leg                                </h3>
                                <p> 
                                    0                                </p>
                            </div>
                        </div>

                        <div class="col-xs-4 .col-sm-4">
                            <div class="wg-content">
                                <h3>
                                    <i class="icon-money"></i>
                                    Balance                                </h3>
                                <p>$266.00</p>
                            </div>
                        </div>

                    </div>
                </section>



                <!-- Start My Unilevel -->
                <section class="widget" style="margin-top:15px;">
                    <header class="title-widget" style="margin-bottom:10px;">
                        <h1>Unilevel Team</h1>
                    </header>
                    <div class="wg-content">
                        <table class="table table-hover table-striped table-bordered tabela my-unilevel" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th><center>Name</center></th>
                                    <th><center>Line</center></th>
                                    <th><center>Sponsor</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>Pedro Perez ( pedroperezpalma )</td>
                                    <td>1st Level</td>
                                    <td>Rolando Contreras ( rolandocontreras )</td>
                                </tr>
                                
                                <tr>
                                    <td>Roxana Lopez ( roxanacabana )</td>
                                    <td>1st Level</td>
                                    <td>Rolando Contreras ( rolandocontreras )</td>
                                </tr>
                                
                                <tr>
                                    <td>Rosario Perez ( pedroperezpalma2 )</td>
                                    <td>2nd Level</td>
                                    <td>Pedro Perez ( pedroperezpalma )</td>
                                </tr>
                                
                                <tr>
                                    <td>Mayra Romero ( pedroperezpalma3 )</td>
                                    <td>2nd Level</td>
                                    <td>Pedro Perez ( pedroperezpalma )</td>
                                </tr>
                                
                                <tr>
                                    <td>Veronica Javier ( roxanacabana3 )</td>
                                    <td>2nd Level</td>
                                    <td>Roxana Lopez ( roxanacabana )</td>
                                </tr>
                                
                                <tr>
                                    <td>Sandra Cabana ( roxanacabana2 )</td>
                                    <td>2nd Level</td>
                                    <td>Roxana Lopez ( roxanacabana )</td>
                                </tr>
                                
                                <tr>
                                    <td>Henrry Delgado ( henrryny1 )</td>
                                    <td>3rd Level</td>
                                    <td>Sandra Cabana ( roxanacabana2 )</td>
                                </tr>
                                
                                <tr>
                                    <td>Mariella Delgado ( henrryny2 )</td>
                                    <td>4th Level</td>
                                    <td>Henrry Delgado ( henrryny1 )</td>
                                </tr>
                                                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- End My Unilevel -->

            </div>
            <div class="col-xs-12 col-md-5">
                <!-- Start Points Report -->
                <section class="widget">
                    <header class="title-widget" style="margin-bottom:10px;">
                        <h1>Binary Points Report</h1>
                    </header>
                    <div class="wg-content">
                        <table class="table table-hover table-striped table-bordered tabela" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Left</th>
                                    <th style="text-align: center;">Right</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Comission</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr><td>1.500</td><td>1.000</td><td>2014-04-24</td><td>$500</td></tr><tr><td>1.500</td><td>500</td><td>2014-04-18</td><td>$250</td></tr>                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- End Points Report -->

                <!-- Start Carrer Plan -->
                <section class="widget" style="margin-top:32px;">
                    <div class="wg-content carrer-plan-box" style="height:265px;">
                        <h3><strong>Next Position: </strong><span class="rank supervisor">Supervisor</span><br>
                            <span style='font-size:16px;'>
                                <strong>Points: </strong>
                                20.000                        
                            

                        <br><strong>Consultants:</strong>2 (on each side)                        </span>
                        </h3>
                        
                        <hr>
                        <h4 class="callout callout-danger">Required Points: 16.000</h4>
                        <h4 class='callout callout-danger'>Required Consultants:1<i class='icon-circle-arrow-left'></i>&#09;&#09;<i class='icon-circle-arrow-right'></i>1</h4>                    </div>
                </section>
                <!-- End Carrer Plan -->
                <section class="widget" style="margin-top:32px;">
                    <div class="wg-content carrer-plan-box">
                        <form>
                            <div class="input-slider-bool">
                                <span class="label-slider">Charge monthly service fee at my account</span>
                                <label class="input-slider" for="mensalidade" id="teste">
                                    <input type="checkbox" value="0" id="mensalidade" onClick="change_debt_auto(this.value)">
                                    <span class="selected">No</span>
                                    <span class="desactived-no" >No</span>
                                    <span class="desactived-yes">Yes</span>
                                </label>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</article>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">COMUNICADO</h4>
                    </div>
                    <!-- Linguas -->
                    <div class="pull-left" style="margin-left: 45%">
                        <a href="?lang=pt"><img src="/images/bandeiras/pt.png"></a>
                        <a href="?lang=es"><img src="/images/bandeiras/es.png"></a>
                        <a href="?lang=en"><img src="/images/bandeiras/gb.png"></a>
                    </div>
                    <div class="modal-body" style="margin-top: 15px;">
Caro Membro Wings,
<br><br>
Muito se tem dito e escrito sobre o passado, o presente e o futuro da Wings.
<br><br>
Queremos deixar bem claro que não existe ainda definição dos processos investigatórios pendentes. As nossas contas bancárias continuam bloqueadas, impedindo que possamos cumprir com obrigações financeiras, quer de devoluções para quem pediu o reembolso nos termos do contrato, quer para pagamentos de bónus.
<br><br>
Continuamos a afirmar que tudo faremos para defender os interesses dos nossos Membros, qualquer que seja o desfecho dos processos em curso.
<br><br>
Trabalhamos todos os dias para encontrar alternativas que possam assegurar os direitos de todos, independentemente do tempo que demore para a finalização dos processos.
<br><br>
Até breve.
<br><br>
Carlos Barbosa
</br>
CEO Wings Network

					</div>
                </div>
            </div>
        </div>
        </div> <!-- /.modal -->

        
<script type="text/javascript">
    function change_debt_auto(value) {
        $.ajax({
            type: 'POST',
            url: '/users/change_debt_auto',
            data: {mensalidade: value},
            cache: false,
            dataType: 'html',
            beforeSend: function() {
            },
            success: function(value) {
                obj = JSON.parse(value);
                var mensalidade = obj.mensalidade;
                console.log(mensalidade);
                document.getElementById('mensalidade').value = mensalidade;
            }
        });
    }
</script>
                </div><!-- .fluid-area -->
            </div><!-- .main-areas -->
        </div><!-- .global -->
    </body>    
</html>