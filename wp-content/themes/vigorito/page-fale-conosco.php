<?php
// Template Name: Fale Conosco
?>
<?php
$args = array(
    'page' => 'fale-conosco',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>

<?php
$args = array(
    'img-desk' => get_field('banner_desktop'),
    'img-mob' =>  get_field('banner_mobile')
);
get_template_part('includes/sections-globals/section-banner-intro-int', null, $args);
?>

<?php $data = get_field('conteudo'); ?>
<section id="section-1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="title-large">
                    <span class="title-large-min"><?= $data['titulo_1']; ?></span><br>
                    <?= $data['titulo_2']; ?>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="flex-coluna">
                    <div class="col-txt">
                        <?= $data['texto']; ?>
                    </div>
                    <?php get_template_part('includes/components/forms/model-7', null, null); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-ofertas-0k', null, null); ?>

<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('footer', null, null); ?>