<?php
/**
 * Template Name: Alarm Clock (Oact)
 * Template Post Type: page
 */

use Oact\Helpers\Views;

Views::header();

?>

<div id="pnl-full-screen" style="display: none"></div>

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

      <!-- Alarm Clock -->
      <div class="row">
        <div class="col-md-12 text-light" id="col-main" data-alarm-time="">
          <style>
            @media (max-width: 768px) {
              #pnl-main {
                height: 340px;
              }
              #pnl-time {
                width: 100%;
                position: absolute !important;
                top: 90px;
                left: 50%;
                -webkit-transform: translate(-50%);
                -moz-transform: translate(-50%);
                -ms-transform: translate(-50%);
                transform: translate(-50%);
              }
              #lbl-time, #lbl-noon {
                font-size: 50px !important;
              }
              #lbl-date {
                width: 100%;
                top: 165px;
                font-size: 23px;
              }
              #pnl-set-alarm {
                top: 233px;
                width: 100%;
              }
            }
          </style>

          <div class="panel panel-default" id="pnl-main" data-utc="1689251579">
            <div class="panel-tools" id="pnl-tools">
              <span class="icon ci-share" title="Share" data-toggle="tooltip" id="btn-tool-share"></span>
              <!-- <span class="icon ci-less" title="Decrease Font Size" data-toggle="tooltip" id="btn-font-minus"></span>
              <span class="icon ci-plus2" title="Increase Font Size" data-toggle="tooltip" id="btn-font-plus"></span> -->
              <span class="icon ci-expand1" title="Full Screen" data-toggle="tooltip" id="btn-full-screen"></span>
              <span class="icon ci-collapse" title="Exit Full Screen" data-toggle="tooltip" style="display: none" id="btn-full-screen-exit"></span>
            </div>

            <noscript>
              <div id="pnl-ns-time" style="
                    display: block;
                    position: relative;
                    text-align: center;
                    padding: 10px;
                  ">
                <span id="lbl-ns-title" style="font-size: 24px"></span>
              </div>
            </noscript>

            <?php
              $timestamp = current_time( 'timestamp' );
              $current_time = date( 'g:i:s', $timestamp );
              $am_pm = date( 'A', $timestamp );
              $current_date = date( 'D - M j, Y', $timestamp );
            ?>
            <div id="pnl-time" style="display: block; position: relative; text-align: center">
              <span id="lbl-time" class="colored digit text-nowrap font-digit" style="font-size: 70px"><?php echo esc_html( $current_time ); ?></span>
              &nbsp;<span id="lbl-noon" class="colored digit text-nowrap font-digit"><?php echo esc_html( $am_pm ); ?></span>
            </div>

            <h1 id="lbl-title" class="colored main-title center-h" style="display: block; position: absolute;" data-alarm=""></h1>

            <div id="lbl-date" class="colored digit-text text-center center-h" style="display: block; position: absolute"><?php echo esc_html( $current_date ); ?></div>

            <div id="pnl-set-alarm" class="text-center center-h" style="display: block; position: absolute">
              <button type="button" class="btn btn-space btn-classic btn-default" id="btn-test-spec-alarm" style="display: none;">Test</button>

              <button type="button" class="btn btn-space btn-classic btn-alt3" id="btn-edit-spec-alarm">Set Alarm</button>

              <button type="button" class="btn btn-space btn-classic btn-alt3" id="btn-set-alarm" style="display: none;">Set Alarm</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Active Alarm -->
      <div class="row" style="display: none" id="row-alarm">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="colored panel-body text-center">
              <div style="padding-bottom: 15px">
                <h1 id="lbl-alarm-title" class="main-title">Alarm</h1>
                <div style="padding: 5px" id="pnl-alarm-time">
                  <span class="icon ci-alarm"></span>
                  <span id="lbl-alarm-time" class="digit"></span>
                </div>
                <div id="pnl-alarm-timer">
                  <span class="icon ci-timer"></span>
                  <span id="lbl-alarm-timer" class="digit">--:--:--</span>
                </div>
              </div>
              <button type="button" class="btn btn-space btn-danger" style="display: none" id="btn-stop-alarm">Stop Alarm</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Set the alarm for the specified time -->
      <style>
        .btn-primary {
          border-color: orange;
          background-color: orange;
          border-color: orange;
        }
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary:hover {
          background-color: #f9a100 !important;
          border-color: #f9a100 !important;
        }
      </style>
      <div class="row" id="pnl-links">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-weight: bold;">
              Set the <span class="red">alarm</span> for the specified time
            </div>
            <div class="panel-body">
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 4 AM">4:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 4:30 AM">4:30 AM</a>
              <br>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 5 AM">5:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 5:15 AM">5:15 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 5:30 AM">5:30 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 5:45 AM">5:45 AM</a>
              <br>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 6 AM">6:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 6:15 AM">6:15 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 6:30 AM">6:30 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 6:45 AM">6:45 AM</a>
              <br>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 7 AM">7:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 7:15 AM">7:15 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 7:30 AM">7:30 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 7:45 AM">7:45 AM</a>
              <br>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 8 AM">8:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 8:15 AM">8:15 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 8:30 AM">8:30 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 8:45 AM">8:45 AM</a>
              <br>
              <a href="#." class="btn btn-space btn-classic btn-primary"
              title="Set Alarm for 9 AM">9:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
              title="Set Alarm for 10 AM">10:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
              title="Set Alarm for 11 AM">11:00 AM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
              title="Set Alarm for 12 PM">12:00 PM</a>
              <br>
              <a href="#." class="btn btn-space btn-classic btn-primary"
              title="Set Alarm for 1 PM">1:00 PM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
              title="Set Alarm for 2 PM">2:00 PM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 5:00 PM">5:00 PM</a>
              <a href="#." class="btn btn-space btn-classic btn-primary"
                title="Set Alarm for 6:00 AM">6:00 PM</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Description -->
      <div class="row" id="pnl-description">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1>How to use the online alarm clock</h1>
            </div>
            <div class="panel-body">
              <p>
                Set the online alarm clock's hour and minute. At the predetermined time, the alert message and the predetermined sound will play. You can preview the alert and test the sound volume when setting the alarm by selecting the "Test" option.
              </p>
              <p>
                When you customize the alarm clock's appearance (text color, type, and size), your selections are saved and applied the next time you open your web browser. The online alarm clock can functiwon't function if you close your browser or turn off your computer.
              </p>
            </div>
          </div>
        </div>
      </div>

      <?php Views::social_share(); ?>

    </div>
  </div>

  <?php Views::right_sidebar(); ?>
</div>

<?php

Views::alarm_form();
Views::alarm_dialog();
Views::embed_dialog();
Views::footer();
