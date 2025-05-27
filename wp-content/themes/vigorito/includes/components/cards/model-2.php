<a href="<?= $args['link']; ?>" title="Eu Quero">
    <div class="model-card-2">
        <div class="content">
            <h2 class="name-veiculo">
                <?= $args['title-1']; ?>
            </h2>
            <p>
                <?= $args['text']; ?>
            </p>
        </div>
        <img src="<?= $args['image']; ?>" alt="<?= strip_tags($args['title-1']); ?>" class="img-car">
        <div class="faixa-preco">
            <span class="rs">R$</span> <?=  $args['preco_formatado']; ?>
        </div>
        <a href="<?= $args['link']; ?>" title="Eu Quero" class="button-5">
            Eu quero
        </a>
    </div>
</a>