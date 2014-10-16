<link rel="stylesheet" href="<?php echo site_url().'static/css/layout_FAQ.css';?>">
<article class="main-content homepage">
    <div class="content">
        <section class="widget">
            <header class="title-widget">
                <h1>WAVELINE NETWORK</h1>
            </header>
            <div class="wg-content">
                <!-- COMEÇO FAQ -->
                <div class="faq">
                    <div>
                                <p><?php echo $obj_customer->first_name;?> <?php echo $obj_customer->last_name;?>&nbsp;, Le damos la más cordial bienvenida al equipo Waveline Network</p>
                                <p><b>Usuario:</b> <?php echo $obj_customer->email;?></p>
                                <p><b>Contraseña:</b> <?php echo $obj_customer->password;?></p>
                                <p>El pedido sera entragado en 2 dias habiles a la dirección registrada.</p>
                                <p>Actualmente su cuenta esta inactiva hasta realizar el pago.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</article>