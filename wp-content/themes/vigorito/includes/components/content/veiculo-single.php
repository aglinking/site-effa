<?php if (have_rows('conteudo_sessao_sobre', $args['id_post_veiculo'])) : ?>
    <?php while (have_rows('conteudo_sessao_sobre', $args['id_post_veiculo'])) : the_row(); ?>
        <?php if (get_row_layout() == 'layout_de_4_colunas_titulo') : ?>
            <?php $repeater = get_sub_field('repetidor'); ?>
            <article class="article-model-items">
                <?php $totalItems = count($repeater); ?>
                <?php $counter = 0; ?>
                <?php foreach ($repeater as $item) : ?>
                    <div class="box">
                        <h2 class="title">
                            <?= strip_tags($item['titulo']); ?>
                        </h2>
                        <p class="txt">
                            <?= $item['descricao']; ?>
                        </p>
                    </div>
                    <?php $counter++; ?>
                    <?php if ($counter < $totalItems) : ?>
                        <span class="line"></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </article>
        <?php elseif (get_row_layout() == 'layout_2_colunas_titulo_e_texto_sem_alternancia_de_cores') : ?>
            <article class="article-padrao-titulo-e-texto">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-12 col-left">
                            <h2 class="title">
                                <?= strip_tags(get_sub_field('titulo')); ?>
                            </h2>
                        </div>
                        <div class="col-right col-lg-7 col-12">
                            <?= get_sub_field('texto'); ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php elseif (get_row_layout() == 'layout_3_cor_do_carro') : ?>
            <article class="article-select-color-and-car-image">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-12 col-left">
                            <?php $colors = get_sub_field('repetidor'); ?>
                            <h2 class="title">
                                cores
                            </h2>
                            <span class="name-color" id="name-color">
                                <?= !empty($colors) ? $colors[0]['nome_da_cor'] : ''; ?>
                            </span>
                            <div class="box-colors">
                                <?php $cont = 0;
                                foreach ($colors as $color) : $cont++; ?>
                                    <div class="border-generic-select">
                                        <div class="protect-color <?= ($cont == 1) ? 'active' : ''; ?>" style="border: 5px solid;border-color: <?= $color['cor']; ?> !important;" data-name-color="<?= $color['nome_da_cor']; ?>" data-img="<?= $color['imagem_da_cor_do_carro']; ?>">
                                            <span style="background-color:<?= $color['cor']; ?>;" class="color <?= ($cont == 1) ? 'active' : ''; ?>">

                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-right col-lg-7 col-12">
                            <img src="<?= !empty($colors) ? $colors[0]['imagem_da_cor_do_carro'] : ''; ?>" alt="Carro" id="image-color">
                        </div>
                    </div>
                </div>
                <script>
                    // Função que será chamada ao clicar em um botão
                    function handleClick(event) {

                        var buttons = document.querySelectorAll('.protect-color');
                        buttons.forEach(function(button) {
                            button.classList.remove('active');
                        });

                        event.currentTarget.classList.add('active');

                        var dataImage = event.currentTarget.getAttribute('data-img');
                        var dataNameColor = event.currentTarget.getAttribute('data-name-color');

                        var imagem = document.getElementById('image-color');
                        var nameColor = document.getElementById('name-color');
                        imagem.src = dataImage;
                        nameColor.innerText = dataNameColor;
                    }

                    // Adiciona o evento de clique a todos os botões
                    var buttons = document.querySelectorAll('.protect-color');
                    buttons.forEach(function(button) {
                        button.addEventListener('click', handleClick);
                    });
                </script>
            </article>


        <?php elseif (get_row_layout() == 'layout_8_slider_galeria') : ?>
            <article class="article-select-car-image">
                <div class="container">
                    <div class="row align-items-center line-reverse">
                        <div class="col-lg-5 col-12 col-left">
                            <?php $slider = get_sub_field('galeria'); ?>
                            <div class="box-veicle">
                                <?php $cont = 0;
                                foreach ($slider as $slide) : $cont++; ?>
                                    <div class="protect-veicle <?= ($cont == 1) ? 'active' : ''; ?>" data-name-veicle="veiculo-thumb-<?= $cont; ?>" data-img="<?= $slide; ?>">
                                        <img src="<?= $slide; ?>" alt="bg">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-right col-lg-7 col-12">
                            <img src="<?= !empty($slider) ? $slider[0] : ''; ?>" alt="Carro" id="image-veicle">
                        </div>
                    </div>
                </div>
                <script>
                    // Função que será chamada ao clicar em um botão
                    function handleClick(event) {

                        var buttons = document.querySelectorAll('.protect-veicle');
                        buttons.forEach(function(button) {
                            button.classList.remove('active');
                        });

                        event.currentTarget.classList.add('active');

                        var dataImage = event.currentTarget.getAttribute('data-img');


                        var imagem = document.getElementById('image-veicle');
                        imagem.src = dataImage;
                    }

                    // Adiciona o evento de clique a todos os botões
                    var buttons = document.querySelectorAll('.protect-veicle');
                    buttons.forEach(function(button) {
                        button.addEventListener('click', handleClick);
                    });
                </script>
            </article>
        <?php elseif (get_row_layout() == 'layout_4_conforto_e_design' && $args['show_content_galery'] != false) : ?>
            <article class="article-titulo-e-texto-variant-colors title-generics">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-12 col-left">
                            <h2 class="title">
                                <span>
                                    <?= strip_tags(get_sub_field('titulo_1')); ?>
                                </span>
                                <!-- <br> -->
                                <?= strip_tags(get_sub_field('titulo_2')); ?>
                                <!-- <br> -->
                                <span class="span-2">
                                    <?= strip_tags(get_sub_field('titulo_3')); ?>
                                </span>
                            </h2>
                        </div>
                        <div class="col-right col-lg-7 col-12">
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </article>
           <?php $galery = get_sub_field('galeria'); ?>
            <?php if (is_array($galery)): ?>
                <article class="article-galery">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 column-content">
    <?php $totalPhoto = count($galery); ?>
    <?php $cont = 0; ?>
    <?php if (!empty($galery)) : ?>
        <?php foreach ($galery as $photo) : $cont++; ?>
            <?php if ($cont == 1) : ?>
                <!-- Adiciona um ID à primeira imagem para referência -->
                <a id="first-gallery-image" href="<?= $photo; ?>" data-lightbox="galeria" data-title="Galeria" title="Galeria">
                    <img src="<?= $photo; ?>" alt="Carro">
                </a>
            <?php elseif ($cont <= 5) : ?>
                <a href="<?= $photo; ?>" data-lightbox="galeria" data-title="Galeria" title="Galeria">
                    <img src="<?= $photo; ?>" alt="Carro">
                </a>
            <?php else : ?>
                <a href="<?= $photo; ?>" data-lightbox="galeria" data-title="Galeria" style="position:absolute; visibility:hidden;" title="Galeria">
                    <img src="<?= $photo; ?>" alt="Carro">
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- Botão sem data-lightbox, com ID para JavaScript -->
        <a href="#" id="open-gallery" class="button-more-galery" title="Galeria">
            Galeria
            <span><?= $totalPhoto; ?> Fotos</span>
        </a>
    <?php endif; ?>
</div>

<!-- JavaScript para abrir o lightbox na primeira imagem -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const openGalleryButton = document.getElementById('open-gallery');
    const firstImageLink = document.getElementById('first-gallery-image');

    if (openGalleryButton && firstImageLink) {
        openGalleryButton.addEventListener('click', function(event) {
            event.preventDefault(); // Impede o comportamento padrão do link

            // Simula o clique na primeira imagem para abrir o lightbox
            firstImageLink.click();
        });
    }
});
</script>
                        </div>
                    </div>
                </article>
            <?php endif; ?>
        <?php elseif (get_row_layout() == 'layout_5_seguranca') : ?>
            <article class="article-image-min-text-and-title title-generics">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if (!wp_is_mobile()) : ?>
                            <div class="col-left col-lg-7 col-12">
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-comp" alt="imagem">
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-5 col-12  col-right">
                            <h2 class="title">
                                <span>
                                    <?= strip_tags(get_sub_field('titulo_1')); ?>
                                </span>
                                <!-- <br> -->
                                <?= strip_tags(get_sub_field('titulo_2')); ?>
                                <span class="span-2">
                                    <?= strip_tags(get_sub_field('titulo_3')); ?>
                                </span>
                            </h2>
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>
                        </div>
                        <?php if (wp_is_mobile()) : ?>
                            <div class="col-left col-lg-7 col-12">
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-comp" alt="imagem">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php elseif (get_row_layout() == 'layout__6_performance') : ?>

            <article class="article-image-right-large-text-and-title title-generics">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12  col-left">
                            <h2 class="title">
                                <span>
                                    <?= strip_tags(get_sub_field('titulo_1')); ?>
                                </span>
                                <!-- <br> -->
                                <?= strip_tags(get_sub_field('titulo_2')); ?>
                                <!-- <br> -->
                                <span class="span-2">
                                    <?= strip_tags(get_sub_field('titulo_3')); ?>
                                </span>
                                <span><?= strip_tags(get_sub_field('titulo_4')); ?></span>
                                <span><?= strip_tags(get_sub_field('titulo_5')); ?></span>
                            </h2>
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>
                        </div>
                        <div class="col-right col-lg-8 col-12">
                            <img src="<?= get_sub_field('imagem'); ?>" class="img-comp" alt="Imagem">
                        </div>
                    </div>
                </div>
            </article>
            
        <?php elseif (get_row_layout() == 'layout_8_video') : ?>
            <article class="article-image-left-large-text-and-title title-generics row-video">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="title">
                                <span>
                                    <?= strip_tags(get_sub_field('titulo')); ?>
                                </span>
                            </h2>
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>
                        </div>
                        <div class=" col-lg-12 col-12 text-center">
                            <?= get_sub_field('iframe_video_youtube'); ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php elseif (get_row_layout() == 'layout_7_conectividade') : ?>
            <article class="article-image-left-large-text-and-title title-generics">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if (!wp_is_mobile()) : ?>
                            <div class="col-left col-lg-8 col-12">
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-comp" alt="Imagem">
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-4 col-12  col-right">
                            <h2 class="title">
                                <span>
                                    <?= strip_tags(get_sub_field('titulo_1')); ?>
                                </span>
                                <!-- <br> -->
                                <?= strip_tags(get_sub_field('titulo_2')); ?>
                                <!-- <br> -->
                                <span class="span-2">
                                    <?= strip_tags(get_sub_field('titulo_3')); ?>
                                </span>
                            </h2>
                            <p>
                                <?= get_sub_field('texto'); ?>
                            </p>
                        </div>
                        <?php if (wp_is_mobile()) : ?>
                            <div class="col-left col-lg-8 col-12">
                                <img src="<?= get_sub_field('imagem'); ?>" class="img-comp" alt="Imagem">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>