<div id="overlay-forms">
  <div class="spinner"></div>
  <p>Enviando...</p>
</div>

<script>
  const phoneMask = ['(99) 9999-99999', '(99) 99999-9999']
  const phones = document.querySelectorAll('.phone-mask')
  const inputHandler = (masks, max, event) => {
    const c = event.target;
    const v = c.value.replace(/\D/g, '');
    const m = c.value.length > max ? 1 : 0;
    VMasker(c).unMask();
    VMasker(c).maskPattern(masks[m]);
    c.value = VMasker.toPattern(v, masks[m]);
  }
  if (phones) {
    phones.forEach(tel => {
      VMasker(tel).maskPattern(phoneMask[0]);
      tel.addEventListener('input', inputHandler.bind(undefined, phoneMask, 14), false);
    })
  }
</script>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function(form) {
        form.addEventListener('submit', function(event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          } else {
            document.getElementById("loading").style.display = "flex";
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
</script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
            function getUTMParams() {
                const urlParams = new URLSearchParams(window.location.search);
                let utmMedium = urlParams.get('utm_medium');
                let utmSource = urlParams.get('utm_source');
                let utmCampaign = urlParams.get('utm_campaign');

                if (utmMedium && utmSource && utmCampaign) {
                    localStorage.setItem('stored_utm_medium', utmMedium);
                    localStorage.setItem('stored_utm_source', utmSource);
                    localStorage.setItem('stored_utm_campaign', utmCampaign);
                    console.log('UTM salvo no localStorage:', {
                        medium: utmMedium,
                        source: utmSource,
                        campaign: utmCampaign
                    });
                }
            }

            if (window.location.search) {
                getUTMParams();
            }


            const storedMedium = localStorage.getItem('stored_utm_medium') || '';
            const storedSource = localStorage.getItem('stored_utm_source') || '';
            const storedCampaign = localStorage.getItem('stored_utm_campaign') || '';

            const mediumInputs = document.querySelectorAll('input[name="utm_medium"]');
            const sourceInputs = document.querySelectorAll('input[name="utm_source"]');
            const campaignInputs = document.querySelectorAll('input[name="utm_campaign"]');
            
            if (storedMedium && storedSource && storedCampaign) {

                const links = document.querySelectorAll('.add-localstorage');
                links.forEach(link => {
                    const url = new URL(link.href);
                    url.searchParams.set('utm_medium', storedMedium);
                    url.searchParams.set('utm_source', storedSource);
                    url.searchParams.set('utm_campaign', storedCampaign);
    
                    link.href = url.toString();
                });
            }
            if (storedMedium) {
                
              
                
                mediumInputs.forEach(function(input) {
                    input.value = storedMedium;
                });
            }
            if (storedSource) {
                sourceInputs.forEach(function(input) {
                    input.value = storedSource;
                });
            }
            if (storedCampaign) {
                campaignInputs.forEach(function(input) {
                    input.value = storedCampaign;
                });
            }
        });
</script>


<a href="https://vigorito100anos.com.br/" target="_blank" class="button-fixed-milhao" title="Regulamento">
  <img src="<?= get_template_directory_uri(); ?>/dist/imgs/logo_botao_3.png" alt="logo">
</a>
<a id="robbu-whatsapp-button" target="_blank" href="https://api.whatsapp.com/send?phone=55<?= get_field('whatsapp_global', 'option'); ?>&amp;text=Olá!%20Quero%20saber%20mais%20sobre%20Effa">
  <div class="rwb-tooltip" bis_skin_checked="1">Fale conosco pelo WhatsApp!</div>
  <img src="<?= get_template_directory_uri(); ?>/dist/imgs/whatsapp-icon.svg" alt="wpp">
</a>





<!-- verifica se existe submit -->
<?php
if (isset($_POST['Formulário'])) {
?>
  <?php
  $formData = $_POST;

  echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" class="no-defer"></script>';

  ?>
  <script>
    window.onload = function() {
      window.dataLayer = window.dataLayer || [];
      window.dataLayer.push({
        'event': 'generate_lead',
        'email': '<?= $_POST['Email'] ?>',
        'pagePath': window.location.pathname,
        <?php if (isset($_POST['modelo'])): ?> 'vehicleModel': '<?= $_POST['modelo']; ?>'
        <?php endif; ?>
        <?php if (isset($_POST['veiculo'])): ?> 'vehicleModel': '<?= $_POST['veiculo']; ?>'
        <?php endif; ?>
      });
    }
  </script>
  <script class="no-defer">
    document.addEventListener("DOMContentLoaded", function() {
      Swal.fire({
        title: "Enviado com Sucesso!",
        icon: "success"
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      var formData = new FormData();
      <?php foreach ($formData as $key => $value) :  ?>
        formData.append('<?php echo $key; ?>', '<?php echo $value; ?>');
      <?php endforeach; ?>

      var wpVars = JSON.parse(hoist);

      var url = wpVars.admin_url; // Substitua pelo seu URL

      formData.append('action', 'autenticarSalesforce');

      fetch(url, {
          method: 'POST',
          body: formData,
        })
        .then(response => response.json())
        .then(data => {
          // console.log('Resposta do servidor:', data);
          console.log('send');
        })
        .catch(error => {
          console.error('Erro na requisição:', error);
        });
    });
  </script>
<?php

}
?>