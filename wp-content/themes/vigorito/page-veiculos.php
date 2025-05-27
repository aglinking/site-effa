<?php
// Template Name: Veiculos
?>
<?php
$args = array(
    'page' => 'veiculos',
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


<section id="section-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title-large">
                    <span class="title-large-min">Conheça os</span><br>
                    MODELOS 0KM <span class="title-large-min">disponíveis pra você!</span>
                </h2>
            </div>
        </div>
    </div>
    <div class="bg-menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab-modelos" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Todos
                            </button>
                        </li>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'tipo-de-carro',
                            'meta_key' => 'n_de_ordem', // Nome do campo ACF
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                        ));
                        ?>

                        <?php
                        if ($terms && !is_wp_error($terms)) :
                            $cont = 0;
                            foreach ($terms as $term) :
                                $cont++;
                        ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="home-tab-<?= $term->slug; ?>" data-bs-toggle="tab" data-bs-target="#home-tab-pane-<?= $term->slug; ?>" type="button" role="tab" aria-controls="home-tab-pane-<?= $term->slug; ?>" aria-selected="true">
                                        <?= $term->name; ?>
                                    </button>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row line-car">
            <div class="col-12 content">
                <div>
                    <div class="tab-content" id="myTabContentModelSelect">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <?php
                            $args = array(
                                'post_type'      => 'veiculos', // Substitua 'seu_custom_post_type' pelo nome do seu custom post type
                                'posts_per_page' => -1, // Número de posts que você deseja recuperar
                                'orderby'        => 'title', // order by title
                                'order'          => 'ASC', // ascending order, use 'DESC' for descending
                            );
                            $posts = get_posts($args);


                            if ($posts) :
                            ?>
                                <div class="cars">
                                    <?php
                                    foreach ($posts as $post) :  setup_postdata($post);
                                        $data = get_field('sessao_banner'); ?>
                                        <a href="<?= get_permalink(); ?>" title="<?= strip_tags($data['nome_carro']); ?>">
                                            <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= strip_tags($data['nome_carro']); ?>">
                                            <h3 class="title">
                                                <?= $data['nome_carro']; ?>
                                            </h3>
                                        </a>

                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'tipo-de-carro',
                            'meta_key' => 'n_de_ordem', // Nome do campo ACF
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                        ));
                        ?>
                        <?php
                        if ($terms && !is_wp_error($terms)) :
                            $cont = 0;
                            foreach ($terms as $term) :
                                $cont++;
                        ?>
                                <div class="tab-pane fade  " id="home-tab-pane-<?= $term->slug; ?>" role="tabpanel" aria-labelledby="home-tab-<?= $term->slug; ?>" tabindex="0">

                                    <?php
                                    $args = array(
                                        'post_type'      => 'veiculos', // Substitua 'seu_custom_post_type' pelo nome do seu custom post type
                                        'posts_per_page' => 6, // Número de posts que você deseja recuperar
                                        'orderby'        => 'title', // order by title
                                        'order'          => 'ASC', // ascending order, use 'DESC' for descending
                                        'tax_query'      => array(
                                            array(
                                                'taxonomy' => 'tipo-de-carro', // Substitua 'sua_taxonomia' pelo nome da sua taxonomia
                                                'field'    => 'slug', // Pode ser 'id', 'slug' ou 'name'
                                                'terms'    => $term->slug, // Substitua 'sua_categoria' pelo slug, ID ou nome da sua categoria
                                            ),
                                        ),
                                    );
                                    $posts = get_posts($args);


                                    if ($posts) :
                                    ?>
                                        <div class="cars">
                                            <?php
                                            foreach ($posts as $post) :  setup_postdata($post);
                                                $data = get_field('sessao_banner'); ?>
                                                <a href="<?= get_permalink(); ?>" title="<?= strip_tags($data['nome_carro']); ?>">
                                                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= strip_tags($data['nome_carro']); ?>">
                                                    <h3 class="title">
                                                        <?= $data['nome_carro']; ?>
                                                    </h3>
                                                </a>

                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php get_template_part('includes/components/forms/model-1', null, null); ?>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('footer', null, null); ?>