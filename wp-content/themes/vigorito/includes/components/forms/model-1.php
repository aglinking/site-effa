<div class="model-side-form-1">
    <span class="title">
        <span>garanta online uma</span><br>
        condição exclusiva
    </span>
    <form method="post" class="formulario">
        <input type="hidden" name="Pagina" value="<?= get_page_link(); ?>">
        <input type="hidden" name="Formulário" value="model-1">
        <input type="hidden" name="utm_medium" value="" >
        <input type="hidden" name="utm_source" value="" >
        <input type="hidden" name="utm_campaign" value="">
        <input type="text" name="Nome" placeholder="Nome" class="form-control" required>
        <input type="email" name="Email" placeholder="E-mail" class="form-control" required>
        <input type="text" name="Telefone/WhatsApp" class="phone-mask form-control" placeholder="Telefone/Whatsapp" required>

        <?php

        $queryUnidades = array(
            'post_type'      => 'unidades',
            'posts_per_page' => -1,
        );

        $unidades = get_posts($queryUnidades);
        ?>
        <?php if ($unidades) : ?>
            <select class="form-select" name="Unidade" required>
                <option value="">Selecione uma unidade</option>

                <?php
                foreach ($unidades as $unidade) :  setup_postdata($unidade);
                ?>
                    <option value="<?= get_field('cnpj', $unidade->ID); ?>"> <?= $unidade->post_title; ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <?php if (isset($args['name']) && $args['name'] != ""): ?>
            <input type="text" name="modelo" readonly value="<?= $args['name']; ?>" class="form-control">
        <?php endif; ?>
        <textarea name="Mensagem" placeholder="Mensagem" class="form-control"></textarea>
        <div class="box-check">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="poli-privaci" required>
                <label class="form-check-label" for="poli-privaci">
                    Li e aceito a <a href="<?= get_home_url(); ?>/politica-de-privacidade/" target="_blank" title="Política de Privacidade">Política de Privacidade</a>.
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="act-contact" required>
                <label class="form-check-label" for="act-contact">
                    Aceito contato do Grupo Vigorito para fins comerciais/publicitários.
                </label>
            </div>
            <button type="submit" class="button button-3">
                solicitar uma proposta
            </button>
        </div>
    </form>
</div>