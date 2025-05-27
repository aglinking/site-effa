<?php

// Verifica se está na página de um único post
if (is_single()) {
    $current_post_id = get_the_ID(); // Obtém o ID do post atual

    $query = array(
        'post_type'      => 'promocao-de-servico',
        'posts_per_page' => 6,
        'orderby'        => 'rand',
        'post__not_in'   => array($current_post_id), // Exclui o post atual da consulta
    );

    $posts = get_posts($query);
} else {
    // Consulta padrão sem exclusão para outras páginas
    $query = array(
        'post_type'      => 'promocao-de-servico',
        'posts_per_page' => 6,
        'orderby'        => 'rand',
    );

    $posts = get_posts($query);
}


if ($posts) :
?>


    <section id="section-ofertas-oficina">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-large">
                        <span class="title-large-min">Veja as incríveis</span><br>
                        promoções <span class="title-large-min"> da semana</span>
                    </h2>
                </div>
            </div>
            <div class="row row-items">
                <?php
                foreach ($posts as $post) :  setup_postdata($post);
                ?>
                    <div class="col-12 col-lg-4">
                        <div class="card-item">
                            <a href="<?= get_permalink(); ?>" title="Promoção">
                                <img src="<?= get_field('imagem_card'); ?>" alt="Promoção">
                                <div class="content">
                                    <p>
                                        <?= get_field('texto_card'); ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </section>
<?php wp_reset_postdata();
endif; ?>