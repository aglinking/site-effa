<?php

$query = array(
    'post_type'      => 'unidades',
    'posts_per_page' => -1,
);

$posts = get_posts($query);

if ($posts) :
?>

    <section id="section-nossas-unidades">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-large">
                        <span class="title-large-min">Nossas</span><br>
                        UNIDADES<span class="title-large-min"> estão prontas para atender você</span>
                    </h2>
                </div>
            </div>
            <div class="row row-unidades">
                <div class="col-12 content">
                    <?php
                    $cont = 0;
                    foreach ($posts as $post) :  setup_postdata($post);
                        $cont++;
                    ?>
                        <div class="box-unidade " data-bs-toggle="collapse" data-bs-target="#collapseunidades-<?= $cont; ?>" >
                            <button class="button-unidades collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseunidades-<?= $cont; ?>" aria-expanded="false" aria-controls="collapseunidades-<?= $cont; ?>">
                                <i class="fa fa-map-marker" aria-hidden="true"></i> <?= get_field('nome_unidade'); ?> <i class="fa fa-chevron-down"></i>
                            </button>
                            <div class="collapse" id="collapseunidades-<?= $cont; ?>">
                                <div class="card card-body">

                                    <address><?= get_field('endereco'); ?></address>

                                    <?php if (get_field('showroom') != "") : ?>
                                        <strong>  <!--Showroom<br -->Horário de Atendimento:</strong>
                                        <?= get_field('showroom'); ?>
                                    <?php endif; ?>

                                    <div class="links-maps">
                                        <?php if (get_field('telefone_loja') != "") : ?>
                                            <a href="tel:<?= formatNumber(get_field('telefone_loja')); ?>" title="Telefone" class="link-telefone">
                                                <i class="fa fa-phone" aria-hidden="true"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (get_field('link_') != "") : ?>
                                            <a href="<?= get_field('link_'); ?>" title="Google Maps">
                                                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icon-maps.png" alt="Google Maps">
                                            </a>
                                        <?php endif; ?>
                                        <?php if (get_field('link_waze') != "") : ?>
                                            <a href="<?= get_field('link_waze'); ?>" title="Waze">
                                                <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icon-waze.png" alt="Waze">
                                            </a>
                                        <?php endif; ?>




                                    </div>
                                    <!-- <div>
                                        <?php if (get_field('oficina') != "") : ?>
                                            <strong><br>Oficina<br>Horário de Atendimento:</strong>
                                            <?= get_field('oficina'); ?>
                                        <?php endif; ?>
                                        <div class="links-maps">
                                            <?php if (get_field('telefone_oficina') != "") : ?>
                                                <a href="tel:<?= formatNumber(get_field('telefone_oficina')); ?>" title="Telefone" class="link-telefone">
                                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>

                                            <?php if (get_field('link_') != "") : ?>
                                                <a href="<?= get_field('link_'); ?>" title="Google Maps">
                                                    <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icon-maps.png" alt="Google Maps">
                                                </a>
                                            <?php endif; ?>
                                            <?php if (get_field('link_waze') != "") : ?>
                                                <a href="<?= get_field('link_waze'); ?>" title="Waze">
                                                    <img src="<?= get_template_directory_uri(); ?>/dist/imgs/icon-waze.png" alt="Waze">
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php wp_reset_postdata();
endif; ?>