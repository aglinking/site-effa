<form method="post" class="formulario">
    <input type="text" name="veiculo" value="<?= get_the_title(); ?>" class="form-control" readonly required>
    <input type="hidden" name="Formulário" value="model-3">
    <input type="hidden" name="Pagina" value="<?= get_page_link(); ?>">
        <input type="hidden" name="utm_medium" value="" >
        <input type="hidden" name="utm_source" value="" >
        <input type="hidden" name="utm_campaign" value="">
    <input type="text" name="Nome" class="form-control" placeholder="Nome" required>
    <input type="email" name="Email" class="form-control" placeholder="E-mail" required>
    <input type="text" name="Telefone/Whatsapp" class="form-control phone-mask" placeholder="Telefone/WhatsApp" required>
    <textarea name="Mensagem" class="form-control" placeholder="Mensagem" required></textarea>
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
        <button type="submit" class="button button-1">Quero negociar!</button>
    </div>
</form>