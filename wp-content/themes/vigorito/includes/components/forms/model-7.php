<form method="post" class="formulario">
    <div class="row">
        <div class="col-12 col-lg-6">
            <input type="hidden" name="Formulário" value="model-7">
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
            <select class="form-select" name="Contato-por" required>
                <option value="">Entrar em contato por</option>
                <option value="E-mail">E-mail</option>
                <option value="Telefone">Telefone</option>
                <option value="WhatsApp">WhatsApp</option>
            </select>
            <?php if (!wp_is_mobile()) : ?>
                <div class="box-check">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="poli-privaci" required>
                        <label class="form-check-label" for="poli-privaci">
                            Li e aceito a <a href="<?= get_home_url(); ?>/politica-de-privacidade/" target="_blank" title="Política de Privacidade">Política de Privacidade</a>.
                        </label>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-12 col-lg-6">
            <input type="text" name="Assunto" placeholder="Assunto" class="form-control" required>
            <textarea name="Mensagem" placeholder="Mensagem" class="form-control" required></textarea>
            <?php if (wp_is_mobile()) : ?>
                <div class="box-check">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="poli-privaci" required>
                        <label class="form-check-label" for="poli-privaci">
                            Li e aceito a <a href="<?= get_home_url(); ?>/politica-de-privacidade/" target="_blank" title="Política de Privacidade">Política de Privacidade</a>.
                        </label>
                    </div>
                </div>
            <?php endif; ?>
            <button type="submit" class="button button-3">
                enviar
            </button>
        </div>
    </div>
</form>