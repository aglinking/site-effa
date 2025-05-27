<?php
// Template Name: Quem Somos
?>
<?php
$args = array(
    'page' => 'quem-somos',
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

<?php if (have_rows('conteudo')) : ?>
    <?php while (have_rows('conteudo')) : the_row(); ?>
        <?php if (get_row_layout() == 'unidades') : ?>
            <?php the_sub_field('paragraph'); ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title-large">
                            <?php if (get_sub_field('titulo_1') != "") : ?>
                                <span class="title-large-min"><?= get_sub_field('titulo_1'); ?></span><br>
                            <?php endif; ?>
                            <?php if (get_sub_field('titulo_2') != "") : ?>
                                <?= get_sub_field('titulo_2'); ?>
                            <?php endif; ?>
                        </h2>
                    </div>
                </div>
            </div>
            <?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>
        <?php elseif (get_row_layout() == 'content_titulo_e_texto') : ?>
            <section class="section-padrao">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
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
                            <?= get_sub_field('texto'); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('footer', null, null); ?>