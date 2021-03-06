<?php
// Add Shortcode

function capabilitiesSection_shortcode($atts)
{
    $comment=get_field('capabilities_comment');
    $author=get_field('capabilities_author');
    $position=get_field('capablities_position');
    $fondo=get_field('capabilities_fondo');
    $fondo=$fondo['url'];
    $id=get_field('capabilities_id');

    // Code
    ob_start();?>
    <div class="capabilitiesContainer">
    <div class="fixedDown col-xs-12" id="<?= $id?>">
    <div class="col-md-offset-2 col-md-7 col-xs-11 text-center mensajeInicial">
            <?= $comment ?>
            <div class="autor">
                <?= $author ?>
                <br/>
                <?= $position ?>

            </div>
        </div>
        </div>
        <section id="CapabilitiesSection" class="se-container">
            <?php
            $query = new WP_Query(array(
                'post_type'   => 'capabilities',
                'post_parent' => 0,
                'meta_key'    => 'orden',
                'orderby' => 'menu_order',
                'order'       => 'ASC'
                ));
            $CapabilitiesDefinitionsIndex = 0;
            if ($query->have_posts()) {
                while ($query->have_posts()) : $query->the_post();
                $CapabilitiesDefinitionsIndex ++;
                $id = get_field('id');
                $urlBg = get_field('imagendefondo');
                $color_fondo1 = get_field('color_fondo_1');
                $opacity1 = get_field('opacity_1');
                $color_fondo2 = get_field('color_fondo_2');
                $opacity2 = get_field('opacity_2');
                $style = 'background: -webkit-linear-gradient(' . hex2rgba($color_fondo1,
                    $opacity1) . ', ' . hex2rgba($color_fondo2, $opacity2) . '), url("' . $urlBg['url'] . '") !important;
background: linear-gradient( ' . hex2rgba($color_fondo1,
    $opacity1) . ', ' . hex2rgba($color_fondo2,
    $opacity2) . ' ), url("' . $urlBg['url'] . '") !important;  background-size: cover !important;';
if ($CapabilitiesDefinitionsIndex % 2 != 0) {
    $iconoClass = 'iconoRight';
    $descriptionClass = '';
    $descriptionAlignment = 'center';

} else {
    $iconoClass = 'iconoLeft';
    $descriptionClass = 'descripcionLeft blueBocaText';
    $descriptionAlignment = 'center';
}

if (has_children()) {
    $id2 = get_the_ID();
    $id = get_field('id');
    $title = get_the_title();
    $content = get_the_content();
    $urlBg = get_field('imagendefondo');
    $color_fondo1 = get_field('color_fondo_1');
    $color_fondo2 = get_field('color_fondo_2');
    $style = 'background: -webkit-linear-gradient(' . hex2rgba($color_fondo1,
                    $opacity1) . ', ' . hex2rgba($color_fondo2, $opacity2) . '), url("' . $urlBg['url'] . '") !important;
background: linear-gradient( ' . hex2rgba($color_fondo1,
    $opacity1) . ', ' . hex2rgba($color_fondo2,
    $opacity2) . ' ), url("' . $urlBg['url'] . '") !important;  background-size: cover !important;';
    $colorIndicadores = get_field('color_de_indicadores');
    $colorBordeIndicadores = get_field('color_de_borde_indicadores');
    $colorDeFlechas = get_field('color_de_flechas');
    $cantidadDeHijos = 0;
    $childrenArgs = array(
        'post_parent' => $id2,
        'post_type'   => 'capabilities',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order'=>'ASC'
        );
    $childrens = new WP_Query($childrenArgs);



    ?>

    <div id="<?= $id ?>" class="se-slope" style='<?= $style ?>'>
        <article class="se-content">
            <div
            class="<?= $descriptionClass ?> col-xs-12 col-sm-10 col-md-8 col-sm-push-1 col-md-push-2">
            <?= showCapability(get_field('icono'), $title, $content, $descriptionAlignment) ?>
            <div class="showChildrensButton showChildrensButton2">
                Learn More +
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="hidden-slope"></div>
        <div class="hiddenChildrens">
            <?php
            if ($childrens->have_posts()) {
                $CapabilitiesDefinitionsIndexChild == 0;
                while ($childrens->have_posts()) : $childrens->the_post();
                $id = get_field('id');
                $CapabilitiesDefinitionsIndexChild ++;
                $urlBg = get_field('imagendefondo');
                $color_fondo1 = get_field('color_fondo_1');
                $opacity1 = get_field('opacity_1');
                $color_fondo2 = get_field('color_fondo_2');
                $opacity2 = get_field('opacity_2');
                $style = 'background: -webkit-linear-gradient(' . hex2rgba($color_fondo1,
                    $opacity1) . ', ' . hex2rgba($color_fondo2,
                    $opacity2) . '), url("' . $urlBg['url'] . '") !important;
background: linear-gradient( ' . hex2rgba($color_fondo1,
    $opacity1) . ', ' . hex2rgba($color_fondo2,
    $opacity2) . ' ), url("' . $urlBg['url'] . '") !important;  background-size: cover !important;';
if ($CapabilitiesDefinitionsIndexChild % 2 != 0) {
    $iconoClass = 'iconoRight';
    $descriptionClass = '';
    $descriptionAlignment = 'center';

} else {
    $iconoClass = 'iconoLeft';
    $descriptionClass = 'descripcionLeft';
    $descriptionAlignment = 'center';
}

?>
<!--                            <div id="--><?//= $id ?><!--" class="se-slope" style='--><?//= $style ?><!--'>-->
<!--                                <article class="se-content">-->
<div
class="<?= $descriptionClass ?> col-xs-12 col-sm-10 col-md-8 col-sm-push-1 col-md-push-2">
<?= showCapability(get_field('icono'), get_the_title(), get_the_content(),
$descriptionAlignment) ?>
<!--                                    </div>-->
<div class="clearfix"></div>
<!--                                </article>-->
</div>
<div class="separador"></div>
<?php
endwhile;
}
?>
<div class="clearfix"></div>
</article>

</div>
<?php
} else {
    ?>

    <div id="<?= $id ?>" class="se-slope" style='<?= $style ?>'>
        <article class="se-content">
            <div
            class="<?= $descriptionClass ?> col-xs-12 col-sm-10 col-md-8 col-sm-push-1 col-md-push-2">
            <?= showCapability(get_field('icono'), get_the_title(), get_the_content(),
            $descriptionAlignment) ?>
        </div>
        <div class="clearfix"></div>
    </article>
</div>

<?php
}
endwhile;
}

?>

</section>
</div>
<?php

$myvariable = ob_get_clean();

return $myvariable;
}

add_shortcode('capabilitiesSection', 'capabilitiesSection_shortcode');