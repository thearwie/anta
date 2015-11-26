<!DOCTYPE html>
<!--
/*******************************************************************************************************/
/*                                                                                                     */
/*  Fichier....................:  collections.php                                                      */
/*  Type.......................:  Document PHP                                                         */
/*  Titre......................:  Bijouterie Anta950                                                   */
/*  Auteurs....................:  ©Michaël Bilodeau, 2015                                			         */
/*  Date de création...........:  2015-11-19                                                           */
/*  Date de mise en production.:                                                                       */
/*                                                                                                     */
/*******************************************************************************************************/
/*                                                                                                     */
/*  - Page principale du site                                                                          */
/*                                                                                                     */
/*******************************************************************************************************/
-->
<!-- CONTROLLER -->
<?php

  $page = 'collections';
?>

<!-- VIEW -->

<?php include('/inc/header.php');?>
<div class='page'>

    <div class = "ism-slider" data-play_type="loop" data-interval="8000">
      <ol>
          <li>
            <img src="img/banner/banner1.jpg">
          </li>
          <li>
            <img src="img/banner/banner2.jpg">
          </li>
          <li>
            <img src="img/banner/banner1.jpg">
          </li>
      </ol>
    </div>
	
	<div class="collection">
      <!-- Projects Row -->
      <div class="row">
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
      </div>
      <!-- /.row -->

      <!-- Projects Row -->
      <div class="row">
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
      </div>

      <!-- Projects Row -->
      <div class="row">
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
          <div class="col-md-4 portfolio-item">
              <a href="#">
                  <img class="img-responsive" src="http://placehold.it/700x400" alt="">
              </a>
              <h3>
                  <a href="#">Project Name</a>
              </h3>
          </div>
      </div>
      <!-- /.row -->

      <hr/>

      <!-- Pagination -->
      <div class="row text-center">
          <div class="col-lg-12">
              <ul class="pagination">
                  <li>
                      <a href="#">&laquo;</a>
                  </li>
                  <li class="active">
                      <a href="#">1</a>
                  </li>
                  <li>
                      <a href="#">2</a>
                  </li>
                  <li>
                      <a href="#">3</a>
                  </li>
                  <li>
                      <a href="#">4</a>
                  </li>
                  <li>
                      <a href="#">5</a>
                  </li>
                  <li>
                      <a href="#">&raquo;</a>
                  </li>
              </ul>
          </div>
      </div>
      <!-- /.row -->
    </div>
</div>
<?php include('/inc/footer.php')?>