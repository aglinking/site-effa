<?php
// Template Name: Template padrão Corrido
?>
<?php
$args = array(
    'page' => 'padrao-corrido',
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
        <?php if (get_row_layout() == 'texto') : ?>
            <section class="section-padrao">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>

                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'texto_copiar') :    ?>
            <section class="section-padrao">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
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
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif (get_row_layout() == 'accordion') :    ?>
            <section class="section-padrao">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="accordion accordion-info" id="accordionExample">
                                <?php $cont = 0;
                                foreach (get_sub_field('accordion') as $item) : $cont++; ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading-<?= $cont; ?>">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?=  $cont; ?>" aria-expanded="true" aria-controls="collapse-<?=  $cont; ?>">
                                                <?= $item['titulo']; ?> <i class="fa fa-chevron-down"></i>
                                            </button>
                                        </h2>
                                        <div id="collapse-<?=  $cont; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $cont; ?>" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <?= $item['texto']; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('footer', null, null); ?>