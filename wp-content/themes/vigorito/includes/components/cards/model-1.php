<a href="<?= $args['link']; ?>" title="Eu Quero">
    <div class="model-card-1">
        <div class="faixa-promo <?= ($args['dataIni'] != ""  && $args['dataFim']  !=  "") ? 'with-count-down' : ''; ?>">
            <span class="title">
                <span> <?= $args['title-faixa-1']; ?></span>
                <?= $args['title-faixa-2']; ?>
            </span>
            <?php
            if (
                $args['dataIni'] != ""
                && $args['dataFim']  != ""
            ) {
                $args2 = array(
                    'id' => $args['id-countdown'],
                    'data_ini' => $args['dataIni'],
                    'data_fim' => $args['dataFim']
                );
                //get_template_part('includes/components/countdown', null, $args2);
            }
            ?>
        </div>
        <img src="<?= $args['image']; ?>" alt="<?= strip_tags($args['title-content']); ?>">
        <div class="content">
            <h2 class="title">
                <?= $args['title-content']; ?>
            </h2>
            <p class="list">
                <?= $args['list']; ?>
            </p>
        </div>
        <div class="desconto">
            <span class="line-one">
                <?= $args['title-desconto-1']; ?>
            </span><br>
            <?= $args['title-desconto-2']; ?>
        </div>
        <a href="<?= $args['link']; ?>" title="Eu quero" class="button button-3">
            EU QUERO
        </a>
    </div>
</a>