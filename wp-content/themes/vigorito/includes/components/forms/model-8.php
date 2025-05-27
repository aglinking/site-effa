<div class="model-side-form-1">
    <span class="title">
        <span>garanta online uma</span><br>
        condição exclusiva
    </span>
    <form method="post" class="formulario">

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
        <?php

        $queryVeiculos = array(
            'post_type'      => 'veiculos',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'title',     // Ordena os posts pelo título
            'order'          => 'ASC',       // Define a ordem: 'ASC' para crescente, 'DESC' para decrescente
        );

        $veiculos = get_posts($queryVeiculos);
        ?>
        <?php if ($veiculos) : ?>
            <select class="form-select" name="modelo" required>
                <option value="">Modelo do Carro</option>

                <?php
                foreach ($veiculos as $veiculo) :  setup_postdata($veiculo);
                ?>
                    <option value="<?= $veiculo->post_title; ?>"> <?= $veiculo->post_title; ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        <input type="hidden" name="Pagina" value="<?= get_page_link(); ?>">
        <input type="hidden" name="Formulário" value="model-8">
        <input type="text" name="Nome" placeholder="Nome" class="form-control" required>
          <input type="hidden" name="utm_medium" value="" >
        <input type="hidden" name="utm_source" value="" >
        <input type="hidden" name="utm_campaign" value="">
        <input type="email" name="Email" placeholder="E-mail" class="form-control" required>
        <input type="text" name="Telefone/WhatsApp" class="phone-mask form-control" placeholder="Telefone/Whatsapp" required>

        <!-- <textarea name="Mensagem" placeholder="Mensagem" class="form-control"></textarea> -->
        <div class="box-check">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="poli-privaci" required>
                <label class="form-check-label" for="poli-privaci">
                    Li e aceito a <a href="#" title="Política de Privacidade">Política de Privacidade</a>.
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