<?php
/**
 * Template Name: Terms of Use (Oact)
 * Template Post Type: page
 */

use Oact\Helpers\Helpers;
use Oact\Helpers\Views;

Views::header();

?>

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
            <div class="panel-body">
              <style>
                p {
                  line-height: 25px;
                  margin-bottom: 20px;
                }
                ol {
                  margin-left: 16px;
                }
              </style>

              <h1>Terms and Conditions</h1>
              <h4>Last Updated: Sep 2023</h4>

              <p>
                The following terms (hereinafter referred to as "Terms and Conditions") - which include the <a href="<?php echo Helpers::get_page_template_url( 'page-templates/oact-privacy.php' ); ?>" rel="nofollow">Privacy Policy</a> of this website (hereinafter referred to as "Website") - are a legally binding contractual agreement between you (hereinafter referred to as "User," "you," "your") and <b>TimerWebsite</b> (hereinafter referred to as "<b>TimerWebsite</b>").
              </p>

              <p><b>TERMS AND CONDITIONS TO USE THIS WEBSITE</b></p>

              <ol>
                <li>
                  The contents of this Website can be shared, redistributed, embedded, and copied. All we ask is that you include a link back to this Website.
                </li>

                <li>
                  The contents of this Website cannot be modified or sold without the express written permission of <b>TimerWebsite</b>.
                </li>

                <li>
                  <b>TimerWebsite</b> is not responsible in any way for the contents of third party websites mentioned or advertised in this Website.
                </li>

                <li>
                  <b>TimerWebsite</b> is not liable or responsible for adverse effects resulting from the use of this Website.
                </li>

                <li>
                  <b>TimerWebsite</b> is not liable or responsible for the contents of websites that have a link to this Website, or for websites that use the contents of this Website.
                </li>

                <li>
                  By using this Website, in any way, you agree to these Terms and Conditions.
                </li>

                <li>
                  <b>TimerWebsite</b> does not warrant that this Website is or will always be free from errors, interruptions, omissions or defects, or that <b>TimerWebsite</b> will correct any errors, interruptions, omissions or defects. You assume all costs that may arise out of the use of this Website.
                </li>

                <li>
                  In no situation will <b>TimerWebsite</b> or any of its affiliates, officers, directors, employees, licensors, suppliers or distributors be liable for any direct, indirect, special, incidental, economic or consequential damages arising out of the use of this Website, even if <b>TimerWebsite</b> has been advised of the possibility of such damages. Furthermore, in no situation will liability of <b>TimerWebsite</b> or any of its affiliates, officers, directors, employees, licensors, suppliers or distributors exceed the amount paid by you, if any, to purchase products or services from <b>TimerWebsite</b>.
                </li>

                <li>
                  <b>TimerWebsite</b> reserves the right to modify these Terms and Conditions at any time, for any reason and without prior notice. In such case, the modified Terms and Conditions will take effect when they are published.
                </li>
              </ol>
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
