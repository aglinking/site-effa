<?php 
    $args = array(
    'page' => '404',
    'class' => ''
    ); 
?>

<style>
  #page-404{
    background-color: #1e2331;
    padding-top: 100px; 
    padding-bottom: 500px;
  } 
  .title{
    color: white; 
    font-weight: bold; 
    font-size: 200px;
  } 
  #page-404 p {
    color: white;
  }  
  .button-green{
    margin: 0 auto;
    background: #1a1818;
  }
/* Small only */
@media screen and (max-width: 39.9375em) {

  .title{
    font-size: 160px;
  } 
  #page-404{
    padding-bottom: 259px;
  }
}
</style>

<?php get_template_part('header', null, $args); ?>

<section id="page-404">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="title">404</h1>
          <p>
            Desculpe, mas a página solicitada não foi encontrada em nosso servidor.<br> Ela pode ter sido removida ou o endereço foi digitado incorretamente.
          </p>
          <a href="<?= get_home_url(); ?>/" class="button button-green" title="Voltar ao Início">
            Voltar ao Início
          </a>
        </div>
      </div>
    </div>
</section>

 <?php get_template_part('footer', null, 1); ?> 


