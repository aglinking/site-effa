<?php
// Template Name: Ofertas 0KM
?>
<?php
$args = array(
    'page' => 'ofertas-0km',
    'class' => ''
);
?>

<?php get_template_part('header', null, $args); ?>


<section id="section-1">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title-large">
                    <span class="title-large-min">
                        As melhores
                    </span><br>
                    ofertas <span class="title-large-min"> estão aqui!</span>
                </h2>
            </div>
        </div>

        <?php
        // Configuração do fuso horário para o Brasil/São_Paulo
        date_default_timezone_set('America/Sao_Paulo');

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type'      => 'ofertas',
            'posts_per_page' => 12,
            'paged'          => $paged,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => 'data_de_inicio_da_oferta',
                    'value'   => current_time('mysql'),
                    'compare' => '<=',
                    'type'    => 'DATETIME',
                ),
                array(
                    'relation' => 'OR',
                    array(
                        'key'     => 'data_final_da_oferta',
                        'compare' => 'NOT EXISTS',
                    ),
                    array(
                        'key'     => 'data_final_da_oferta',
                        'value'   => current_time('mysql'),
                        'compare' => '>=',
                        'type'    => 'DATETIME',
                    ),
                    array(
                        'key'     => 'data_final_da_oferta',
                        'value'   => '',
                        'compare' => '=',
                    ),
                ),
            ),
        );

        $posts_query = new WP_Query($args);

        if ($posts_query->have_posts()) :
        ?>

            <div class="row justify-content-center row-cards">
                <?php $cont = 0;
                while ($posts_query->have_posts()) : $posts_query->the_post();
                    $cont++; ?>
                    <div class="col-12 col-lg-4 content-col">
                        <?php
                        $lists = ''; // Inicializa a variável $lists

                        foreach (get_field('lista') as $list) {
                            $lists .= '• ' . $list['texto'] . "<br>";
                        }

                        $args = array(
                            'title-faixa-1' => get_field('nome_oferta'),
                            'title-faixa-2' => get_field('nome_oferta_2'),
                            'image' => get_the_post_thumbnail_url(get_field('veiculo')),
                            'title-content' => get_field('titulo_card'),
                            'list' => $lists,
                            'title-desconto-1' => get_field('texto_1'),
                            'title-desconto-2' => get_field('texto_2'),
                            'link' => get_permalink(),
                            'dataIni' =>  get_field('data_de_inicio_da_oferta'),
                            'dataFim' =>  get_field('data_final_da_oferta'),
                            'id-countdown' => $cont
                        );
                        get_template_part('includes/components/cards/model-1', null, $args);
                        ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        <?php
                        echo paginate_links(array(
                            'total'     => $posts_query->max_num_pages,
                            'current'   => max(1, $paged),
                            'prev_text' => __('« Página anterior'),
                            'next_text' => __('Próxima página »'),
                        ));
                        ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>

        <?php else:

            // Se a oferta não for válida, encerra a execução do script e interrompe o carregamento da página
            exit('
                <div class="container">
                    <div class="row" >
                        <div class="col-12 card" style="padding:100px;margin-top:100px;">
                            <h1 class="title-large">Ofertas não disponíveis.</h1>
                        </div>
                    </div>
                </div>
            ');

        ?>

        <?php endif; ?>
    </div>
</section>



<?php get_template_part('includes/sections-globals/section-unidades', null, null); ?>

<?php get_template_part('footer', null, null); ?>