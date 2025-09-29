<div class="model-side-form-1">
    <span class="title">
        <span> garanta online uma</span><br>
        condição exclusiva
    </span>
    <form method="post" class="formulario">
        <input type="hidden" name="Formulário" value="model-6">
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
        <input type="text" name="Unidade" readonly value="<?= get_the_title(); ?>" class="form-control">
        <textarea name="Mensagem" placeholder="Mensagem" class="form-control"></textarea>

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