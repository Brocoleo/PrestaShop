<?php
/* Smarty version 3.1.39, created on 2021-05-13 01:08:34
  from 'module:psimagesliderviewstemplat' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_609cb452ad63f4_58647281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c2108a17c7103b6e203f4f0621d4645b56b0114' => 
    array (
      0 => 'module:psimagesliderviewstemplat',
      1 => 1619601862,
      2 => 'module',
    ),
  ),
  'cache_lifetime' => 31536000,
),true)) {
function content_609cb452ad63f4_58647281 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <div id="carousel" data-ride="carousel" class="carousel slide" data-interval="5000" data-wrap="true" data-pause="hover" data-touch="true">
    <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
          </ol>
    <ul class="carousel-inner" role="listbox">
              <li class="carousel-item active" role="option" aria-hidden="false">
          <a href="http://localhost:8080/7-interior">
            <figure>
              <img src="http://localhost:8080/modules/ps_imageslider/images/b80cb974cd36235a0140711cf7c833ecbfa05180_banner2 (1).jpg" alt="sample-1">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase">Plantas de Interior</h2>
                  <div class="caption-description"><h3>EXCEPTEUR OCCAECAT</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique in tortor et dignissim. Quisque non tempor leo. Maecenas egestas sem elit</p></div>
                </figcaption>
                          </figure>
          </a>
        </li>
              <li class="carousel-item " role="option" aria-hidden="true">
          <a href="http://localhost:8080/8-exterior">
            <figure>
              <img src="http://localhost:8080/modules/ps_imageslider/images/91d827e3e8cd4f93bbcfc8cf82cd709e234b6c15_banner3 (1).jpg" alt="sample-2">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase">Plantas de Exterior</h2>
                  <div class="caption-description"><h3>EXCEPTEUR OCCAECAT</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique in tortor et dignissim. Quisque non tempor leo. Maecenas egestas sem elit</p></div>
                </figcaption>
                          </figure>
          </a>
        </li>
              <li class="carousel-item " role="option" aria-hidden="true">
          <a href="http://localhost:8080/9-macetas">
            <figure>
              <img src="http://localhost:8080/modules/ps_imageslider/images/0d508679a613c2a962e6f6327cae93df8016c15d_banner4.png" alt="sample-3">
                              <figcaption class="caption">
                  <h2 class="display-1 text-uppercase">Macetas</h2>
                  <div class="caption-description"><h3>EXCEPTEUR OCCAECAT</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique in tortor et dignissim. Quisque non tempor leo. Maecenas egestas sem elit</p></div>
                </figcaption>
                          </figure>
          </a>
        </li>
          </ul>
    <div class="direction" aria-label="Botones del carrusel">
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev" aria-label="Anterior">
        <span class="icon-prev hidden-xs" aria-hidden="true">
          <i class="material-icons">&#xE5CB;</i>
        </span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next" aria-label="Siguiente">
        <span class="icon-next" aria-hidden="true">
          <i class="material-icons">&#xE5CC;</i>
        </span>
      </a>
    </div>
  </div>
<?php }
}
