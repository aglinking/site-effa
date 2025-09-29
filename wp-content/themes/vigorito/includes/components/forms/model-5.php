<form method="post" class="formulario">
    <input type="hidden" name="Formulário" value="model-5">
    <input type="text" name="Nome" placeholder="Nome" class="form-control" required>
    <input type="hidden" name="Pagina" value="<?= get_page_link(); ?>">
        <input type="hidden" name="utm_medium" value="" >
        <input type="hidden" name="utm_source" value="" >
        <input type="hidden" name="utm_campaign" value="">
         <?php if(isset($_GET['homolog'])): ?>
            <input type="hidden" name="homolog" value="homolog">
        <?php endif; ?>
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
                <option value="<?= $unidade->post_title; ?>"> <?= $unidade->post_title; ?></option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>
    <input type="text" name="Servico" class="form-control" value="<?= strtoupper(get_the_title()); ?>" readonly required>
    <textarea name="Mensagem" placeholder="Mensagem" required class="form-control"></textarea>
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
            agendar
        </button>
    </div>
</form>