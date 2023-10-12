<?php
/**
 * Template Name: Stopwatch (Oact)
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

      <!-- Stopwatch -->
      <div class="row">
        <div class="col-md-12 text-light" id="col-main" style="">
          <style>
            #pnl-time {
              top: -29px !important;
            }
            @media (max-width: 768px) {
              #pnl-time {
                width: 100%;
                text-align: center;
                position: absolute !important;
                top: 91px !important;
                left: 50% !important;
                -webkit-transform: translate(-50%);
                -moz-transform: translate(-50%);
                -ms-transform: translate(-50%);
                transform: translate(-50%);
              }
              #lbl-time {
                font-size: 70px !important;
              }
              #lbl-msec {
                font-size: 40px !important;
              }
              #pnl-set-timer {
                top: 214px !important;
              }
            }
          </style>

          <div class="panel panel-default" id="pnl-main" style="height: 311px;">
            <div class="panel-tools" id="pnl-tools" style="margin: 50px;">
              <span class="icon ci-share" title="" data-toggle="tooltip" id="btn-tool-share" data-original-title="Share"></span>
              <!-- <span class="icon ci-less" title="" data-toggle="tooltip" id="btn-font-minus" data-original-title="Decrease Font Size"></span>
              <span class="icon ci-plus2" title="" data-toggle="tooltip" id="btn-font-plus" data-original-title="Increase Font Size"></span> -->
              <span class="icon ci-expand1" title="" data-toggle="tooltip" id="btn-full-screen" data-original-title="Full Screen"></span>
              <span class="icon ci-collapse" title="" data-toggle="tooltip" style="display: none" id="btn-full-screen-exit" data-original-title="Exit Full Screen"></span>
            </div>

            <div id="pnl-time" style="display: block; position: relative; height: 144px; left: 0;">
              <span id="lbl-time" class="colored digit text-nowrap font-digit" style="font-size: 128px;">00:00</span>
              <span id="lbl-msec" class="colored digit text-nowrap font-digit" style="font-size: 51px; position: relative; top: -4%; margin-left: 7px;">00</span>
            </div>

            <h1 id="lbl-title" class="colored main-title" style="display: block; position: absolute; width: 1179px; top: 74px;"></h1>

            <div id="pnl-set-timer" class="text-center center-h" style="display: block; position: absolute; width: 1179px; top: 267px;">
              <button type="button" class="btn btn-space btn-classic btn-danger" id="btn-reset">Reset</button>

              <button type="button" class="btn btn-space btn-classic btn-alt3" id="btn-start">Start</button>

              <style>
                .btn-primary {
                  background-color: orange;
                  border-color: orange;
                }
                #btn-lap:focus,
                #btn-lap:visited,
                #btn-lap:hover,
                #btn-lap:active {
                  background-color: #ffb631 !important;
                  border-color: orange !important;
                }
              </style>
              <button type="button" class="btn btn-space btn-classic btn-primary" id="btn-lap" style="display: none;">Lap</button>

              <button type="button" class="btn btn-space btn-classic btn-purple" id="btn-stop" style="display: none;">Stop</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Laps -->
      <div class="row" id="row-laps" style="display: none;">
        <div class="col-md-12 text-light">
          <div class="panel panel-default" id="pnl-laps">
            <div class="colored panel-body text-center text-ellipsis">
              <table id="tbl-laps" class="center table-laps" style="font-size: 21px;">
                <thead>
                  <tr class="digit-text font-digit-text">
                    <th>Lap</th>
                    <th>Time</th>
                    <th>Total time</th>
                  </tr>
                </thead>
                <tbody>
                  <?php // Data will be added using JavaScript ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Description -->
      <div class="row" id="pnl-description">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1>How to use the online stopwatch</h1>
            </div>
            <div class="panel-body">
              <p>
                When you click the "Start" button, the online stopwatch starts counting down the seconds to the nearest millisecond. You are able to add laps. The value and laps are automatically saved when the stopwatch is closed. If the time frame is long enough, the number of days will also be shown.
              </p>
              <p>
                In the stopwatch settings, you can set the precision for showing fractions of a second. To start or stop the stopwatch, click the "Start" or "Stop" buttons. To add a lap and the current stopwatch value to the list of laps, use the "Lap" button.
              </p>
              <p>
                Click the "Reset" button (which displays when the stopwatch is stopped) to restart laps and the stopwatch value. When you customize the stopwatch's appearance (text color, type, and size), your selections are saved and applied the next time you open your web browser.
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
