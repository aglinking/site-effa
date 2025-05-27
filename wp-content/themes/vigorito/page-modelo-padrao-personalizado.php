<?php
// Template Name: Modelo Padrão Personalizado
?>
<?php
$args = array(
    'page' => 'page-modelo-padrao-personalizado',
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

<section id="section-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9 col-left">
                <?php if (have_rows('conteudo')) : ?>
                    <?php while (have_rows('conteudo')) : the_row(); ?>
                        <?php if (get_row_layout() == 'texto') : ?>
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>
                        <?php elseif (get_row_layout() == 'titulo_e_texto') :    ?>
                            <?php if (get_sub_field('titulo_1') != "" || get_sub_field('titulo_2') != "" || get_sub_field('titulo_3') != "") : ?>
                                <h2 class="title-large">
                                    <?php if (get_sub_field('titulo_1') != "") : ?>
                                        <span class="title-large-min"><?= get_sub_field('titulo_1'); ?></span><br>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('titulo_2') != "") : ?>
                                        <?= get_sub_field('titulo_2'); ?>
                                    <?php endif; ?>
                                    <?php if (get_sub_field('titulo_3') != "") : ?>
                                        <span class="title-large-min"><?= get_sub_field('titulo_3'); ?></span>
                                    <?php endif; ?>
                                </h2>
                            <?php endif; ?>
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-3 col-right">
                <?php get_template_part('includes/components/forms/model-1', null, null); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/sections-globals/section-ofertas-0k', null, null); ?>

<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('footer', null, null); ?>