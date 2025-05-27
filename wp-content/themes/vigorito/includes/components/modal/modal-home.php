 <?php
    if (get_field('ativo_popup_home', 'option')) :
        if (valida_oferta(
            get_field('data_inicial_popup_home', 'option'),
            (get_field('data_final_popup_home', 'option') != '') ? get_field('data_final_popup_home', 'option') : null
        )) :

    ?>
         <div id="myModalHome" class="modal" style="z-index: 9999999999999999999999;">
             <div class="modal-content">
                 <span class="close" id="closeModal">&times;</span>
                 <a href="<?= get_field('link_popup_home', 'option'); ?>">
                     <img src="<?= get_field('imagem_popup_home', 'option'); ?>" alt="Modal">
                 </a>
             </div>
         </div>


         <script>
             // Função para mostrar o modal quando o usuário entra no site
             function showModalOnLoad() {


                 var modal = document.getElementById('myModalHome');
                 var closeModal = document.getElementById('closeModal');

                 modal.style.display = 'flex';

                 // Fecha o modal quando o usuário clica no botão de fechar
                 closeModal.onclick = function() {
                     modal.style.display = 'none';
                 }

                 // Fecha o modal quando o usuário clica fora do modal
                 window.onclick = function(event) {
                     if (event.target == modal) {
                         modal.style.display = 'none';
                     }
                 }

             }

             // Chama a função para mostrar o modal quando a página carrega
             showModalOnLoad();
         </script>
     <?php endif; ?>
 <?php endif; ?>