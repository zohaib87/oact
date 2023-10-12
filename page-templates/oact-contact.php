<?php
/**
 * Template Name: Contact (Oact)
 * Template Post Type: page
 */

use Oact\Helpers\Views;

Views::header();

?>

<!-- <div id="pnl-full-screen" style="display: none"></div> -->

<div class="am-wrapper am-fixed-sidebar">
  <?php
    Views::navbar();
    Views::left_sidebar();
  ?>

  <div class="am-content">
    <div class="main-content">

      <noscript>
        <div class="row" id="pnl-noscript">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <p>
                  For full functionality of this site it is necessary to
                  enable JavaScript.
                </p>
                <a href="//www.enable-javascript.com/en/" target="_blank" rel="nofollow">Learn how to enable
                  JavaScript</a>
              </div>
            </div>
          </div>
        </div>
      </noscript>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3><?php the_title(); ?></h3>
            </div>
            <div class="panel-body">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php Views::right_sidebar(); ?>
</div>

<?php

Views::footer();
