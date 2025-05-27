<?php $data = get_field('depoimentos', $args['id']); ?>

<?php if ($data != null && $data != "" && !empty($data)) : ?>
    <section id="section-depoimentos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title-large">
                        <span class="title-large-min">O que</span><br>
                        falaM de nós
                    </h2>
                </div>
            </div>
            <div class="row row-depoiments">
                <div class="col-12 model-splide-cards-1">
                    <div class="splide splide-cards-depoiments">
                        <div class="splide__track">
                            <div class="splide__list">
                                <?php foreach ($data['itens'] as $depoimento) : ?>
                                    <div class="splide__slide">
                                        <div class="model-card-depoiment">
                                            <div class="box-row-1">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44px" height="61px">
                                                        <path fill-rule="evenodd" opacity="0.502" fill="rgb(197, 203, 208)" d="M26.565,0.30 C26.565,0.30 0.727,-1.868 0.727,23.742 C0.727,55.901 26.565,61.4 26.565,61.4 C26.565,61.4 7.13,46.443 14.507,28.823 C14.507,28.823 18.343,33.904 26.565,33.904 C34.787,33.904 43.790,28.751 43.790,16.967 C43.790,5.183 34.508,0.713 26.565,0.30 Z" />
                                                    </svg>
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44px" height="61px">
                                                        <path fill-rule="evenodd" opacity="0.502" fill="rgb(197, 203, 208)" d="M26.565,0.30 C26.565,0.30 0.727,-1.868 0.727,23.742 C0.727,55.901 26.565,61.4 26.565,61.4 C26.565,61.4 7.13,46.443 14.507,28.823 C14.507,28.823 18.343,33.904 26.565,33.904 C34.787,33.904 43.790,28.751 43.790,16.967 C43.790,5.183 34.508,0.713 26.565,0.30 Z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="avaliacao">
                                                        <div>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                        <span class="txt-q">
                                                            5 de 5
                                                        </span>
                                                    </div>
                                                    <span class="name">
                                                        <?= $depoimento['nome']; ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="title">
                                                <?= $depoimento['titulo']; ?>
                                            </span>
                                            <p>
                                            <?= $depoimento['texto']; ?>
                                            </p>
                                            <div class="aspas-bottom">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44px" height="61px">
                                                    <path fill-rule="evenodd" opacity="0.502" fill="rgb(197, 203, 208)" d="M17.967,60.975 C17.967,60.975 43.806,62.873 43.806,37.263 C43.806,5.104 17.967,0.1 17.967,0.1 C17.967,0.1 37.519,14.562 30.25,32.182 C30.25,32.182 26.189,27.101 17.967,27.101 C9.745,27.101 0.742,32.253 0.742,44.38 C0.742,55.822 10.24,60.291 17.967,60.975 Z" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44px" height="61px">
                                                    <path fill-rule="evenodd" opacity="0.502" fill="rgb(197, 203, 208)" d="M17.967,60.975 C17.967,60.975 43.806,62.873 43.806,37.263 C43.806,5.104 17.967,0.1 17.967,0.1 C17.967,0.1 37.519,14.562 30.25,32.182 C30.25,32.182 26.189,27.101 17.967,27.101 C9.745,27.101 0.742,32.253 0.742,44.38 C0.742,55.822 10.24,60.291 17.967,60.975 Z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var splideModelDepoiment = new Splide('.splide-cards-depoiments', {
            perPage: 4,
            pagination: false,
            arrows: true,
            autoplay: true,
            type: 'loop',
            perMove: 1,
            breakpoints: {
                1023: {
                    padding: 0,
                    perPage: 1,
                    arrows: false,
                    pagination: true,
                },
            }

        });
        splideModelDepoiment.mount();
    </script>
<?php endif; ?>