<?php
// Add Shortcode
function intro_shortcode()
{
    $comment=get_field('intro_message');
    $icono=get_field('us_icono');
    $id=get_field('us_id');
    $tittle=get_field('us_tittle');
    ob_start(); ?>
    <nav class="menuPrincipal">


        <ul class="menuItems">
            <li>
                <span class="glyphicon glyphicon-menu-hamburger dropMenu pull-right iconoMenu"
                aria-hidden="true"></span>
            </li>
            <li class="clearfix"></li>
            <div class="hiddenMenuElements">
                <li class="clickable" data-target="#<?= $id ?>"><?= $tittle ?><span class="bigbocaicon icon-<?= $icono ?>" aria-hidden="true"></span></li>
                    <?php
                    $query = new WP_Query(array(
                        'post_type' => array('us'),
                        'meta_key'  => 'orden_en_menu',
                        'orderby'   => 'meta_value_num',
                        'order'     => 'ASC'
                        ));
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post();
                        $Index ++;

                        ?>

                        <li class="clickable" data-target="#<?= get_field('id') ?>"><?php the_title() ?><span
                            class="bigbocaicon icon-<?= get_field('icono') ?> iconoMenu"
                            aria-hidden="true"></span></li>
                            <?php
                            endwhile;
                        }
                        wp_reset_query();
                        $id=get_field('capabilities_id');
                        $name=get_field('capabilities_menu');
                        $icono=get_field('capabilities_icon');
                        ?>
                        <li class="clickable" data-target="#<?= $id ?>"><?= $name ?><span class="bigbocaicon icon-<?= $icono ?>" aria-hidden="true"></span></li>
                        <?php
                    $query = new WP_Query(array(
                        'post_type' => array('capabilities'),
                        'post_parent' => 0,
                        'meta_key'    => 'orden',
                        'orderby' => 'menu_order',
                        'order'       => 'ASC'
                        ));
                    if ($query->have_posts()) {
                        while ($query->have_posts()) : $query->the_post();
                        $Index ++;

                        ?>

                        <li class="clickable" data-target="#<?= get_field('id') ?>"><?php the_title() ?><span
                            class="bigbocaicon icon-<?= get_field('icono') ?> iconoMenu"
                            aria-hidden="true"></span></li>
                            <?php
                            endwhile;
                        }
                        wp_reset_query();
                        $id=get_field('capabilities_id');
                        $name=get_field('capabilities_menu');
                        $name=get_field('capabilities_icon');
                        ?>
                    </div>

                </ul>
                <img src="<?php header_image(); ?>" class="imagenMenu" alt="menuLogo">

            </nav>
            <div class="hiddenContentOnLoad">
                <div class="spinnerLoad text-center">
                      <img src="<?= get_template_directory_uri()?>/img/717.GIF" alt="Loader">
                </div>
          </div>
          <section class="intro text-center fullheight container-fluid" id="primerPanel">
            <div class="logoContainer">
                <img src="<?php header_image(); ?>" class="logoImg" alt="Logo">
                <div class="col-xs-12 brandText"><span class="logoText"><?= get_theme_mod( 'bigboca_tittle' )?></span></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-centered col-md-7 col-lg-6 col-xs-11 text-center mensajeInicial mensajeInicio">
                <?= $comment ?>
            </div>
            <div class="clearfix"></div>
            

        </section>
        <div id="trigger1"></div>

        <?php

        $myvariable = ob_get_clean();

        return $myvariable;
    }

    add_shortcode('intro', 'intro_shortcode');