<?php
require_once('header.php');
require_once 'config.php';
require_once('funciones.php');
$FuncionesClass = new funciones();
$Tabla = $FuncionesClass->ObtenerImagenesBanner();
?>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">Principal</h3>
      </div>
    </div>
    <div class="content-body">
      <?php if (sizeof ($Tabla) > 0 ) : ?>
      <section>
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-transparent">
              <div class="card-body" style="border-radius: 25px ; padding : 0 ">
                <div class="row">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="#divFondo">
                    <center>
                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                  
                        <div class="carousel-inner" role="listbox">

                          <?php $i = 0 ; 
                          foreach($Tabla as $row): ?>
                            <?php if ($i == 0) : ?>
                              <div class="carousel-item active">
                                <img src="<?php echo $row['URL']?>" alt="First slide"  width = "90%">
                              </div>
                            <?php else : ?>
                              <div class="carousel-item">
                               <img src="<?php echo $row['URL']?>" alt="First slide"  width = "90%">
                              </div>
                            <?php endif;
                            $i++; ?>
                          <?php 
                          endforeach;
                          ?>
                           
                        </div>
                        <a class="carousel-control-prev" 
                          href="#carousel-example-generic" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" 
                          href="#carousel-example-generic" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Siguiente</span>
                        </a>
                      </div>
                    </center>                          
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php else : ?>


      <?php endif; ?>
    </div>
  </div>
</div>

<?php
require_once('footer.php');
?>

<script>
  $("#liPrincipal").addClass('active');
</script>