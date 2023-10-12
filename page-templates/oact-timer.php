<?php
/**
 * Template Name: Timer (Oact)
 * Template Post Type: page
 */

use Oact\Helpers\Views;
use Oact\Helpers\Helpers;

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

      <!-- Timer -->
      <div class="row">
        <div class="col-md-12 text-light" id="col-main" data-timer-date="" data-timer-time="" style="">
          <style>
            @media (max-width: 768px) {
              #pnl-time {
                width: 100% !important;
                height: 83px !important;
                left: 0 !important;
              }
              #lbl-time {
                font-size: 50px !important;
              }
              #lbl-title {
                font-size: 20px !important;
                top: 146px !important;
              }
              #pnl-set-timer {
                top: 200px !important;
              }
            }
          </style>

          <div class="panel panel-default" id="pnl-main" style="height: 278px;">
            <div class="panel-tools" id="pnl-tools">
              <span class="icon ci-share" title="" data-toggle="tooltip" id="btn-tool-share" data-original-title="Share"></span>
              <!-- <span class="icon ci-less" title="" data-toggle="tooltip" id="btn-font-minus" data-original-title="Decrease Font Size"></span>
              <span class="icon ci-plus2" title="" data-toggle="tooltip" id="btn-font-plus" data-original-title="Increase Font Size"></span> -->
              <span class="icon ci-expand1" title="" data-toggle="tooltip" id="btn-full-screen" data-original-title="Full Screen"></span>
              <span class="icon ci-collapse" title="" data-toggle="tooltip" style="display: none" id="btn-full-screen-exit" data-original-title="Exit Full Screen"></span>
            </div>

            <div id="pnl-time" style="display: block; position: relative; width: 225px; height: 144px; left: 477px; top: 68px !important;">
              <span id="lbl-time" class="colored digit text-nowrap font-digit center-h" style="font-size: 128px;">00:00:00</span>
            </div>

            <h1 id="lbl-title" class="colored main-title center-h" style="position: absolute; width: 1179px; top: 98px;" data-timer=""></h1>

            <!-- <div id="lbl-date" class="colored digit-text text-center font-digit-text" style="position: absolute; width: 1179px; top: 131px !important;" data-date="">Sat - Aug 26, 2023</div> -->

            <div id="pnl-set-timer" class="text-center center-h" style="display: block; position: absolute; width: 1179px; top: 291px;">
              <button type="button" class="btn btn-space btn-classic btn-alt3" id="btn-edit">Set Timer</button>
              <button type="button" class="btn btn-space btn-classic btn-alt2" id="btn-reset" style="display: none;">Reset</button>
              <!-- <button type="button" class="btn btn-space btn-classic btn-alt3" style="" id="btn-set-timer">
                Set Timer
              </button> -->
              <button type="button" class="btn btn-space btn-classic btn-alt3" id="btn-resume" style="display: none;">Start</button>
              <button type="button" class="btn btn-space btn-classic btn-danger" id="btn-pause" style="display: none;">Stop</button>
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

      <!-- Set the timer for the specified time -->
      <div class="row" id="pnl-links">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-weight: bold;">
              Set the <span class="red">timer</span> for the specified time
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                  <table class="center table-lr">
                    <tbody><tr>
                      <td>
                        <a href="#.">1 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">2 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">3 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">4 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">5 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">6 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">7 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">8 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">9 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">10 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">11 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">12 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">13 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">14 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">15 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">16 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">17 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">18 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">19 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">20 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">21 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">22 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">23 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">24 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">25 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">26 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">27 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">28 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">29 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">30 Minute Timer</a>
                      </td>
                    </tr>

                  </tbody></table>
                </div>
                <div class="col-sm-2">
                  <table class="center table-lr">

                    <tbody><tr>
                      <td>
                        <a href="#.">31 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">32 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">33 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">34 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">35 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">36 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">37 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">38 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">39 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">40 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">41 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">42 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">43 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">44 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">45 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">46 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">47 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">48 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">49 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">50 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">51 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">52 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">53 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">54 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">55 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">56 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">57 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">58 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">59 Minute Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">60 Minute Timer</a>
                      </td>
                    </tr>

                  </tbody></table>
                </div>
                <div class="col-sm-2">
                  <table class="center table-lr">
                    <tbody><tr>
                      <td>
                        <a href="#.">1 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">2 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">3 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">4 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">5 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">6 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">7 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">8 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">9 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">10 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">11 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">12 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">13 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">14 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">15 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">16 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">17 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">18 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">19 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">20 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">21 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">22 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">23 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">24 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">25 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">26 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">27 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">28 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">29 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">30 Second Timer</a>
                      </td>
                    </tr>
                  </tbody></table>
                </div>
                <div class="col-sm-2">
                  <table class="center table-lr">

                    <tbody><tr>
                      <td>
                        <a href="#.">31 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">32 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">33 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">34 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">35 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">36 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">37 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">38 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">39 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">40 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">41 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">42 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">43 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">44 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">45 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">46 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">47 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">48 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">49 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">50 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">51 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">52 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">53 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">54 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">55 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">56 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">57 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">58 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">59 Second Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">60 Second Timer</a>
                      </td>
                    </tr>
                  </tbody></table>
                </div>
                <div class="col-sm-2">
                  <table class="center table-lr">
                    <tbody><tr>
                      <td>
                        <a href="#.">1 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">2 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">3 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">4 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">5 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">6 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">7 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">8 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">9 Hour Timer</a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="#.">10 Hour Timer</a>
                      </td>
                    </tr>
                  </tbody></table>
                </div>
                <div class="col-sm-1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Description -->
      <div class="row" id="pnl-description">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1>How to use the online timer</h1>
            </div>
            <div class="panel-body">
              <p>
                Start the online countdown timer after setting the hour, minute, and second. To count the days, hours, minutes, and seconds till (or from) the event, you can also set the date and time.
              </p>
              <p>
                When the timer goes off, an alarm will appear and the pre-selected sound will start playing. You can preview the alert and listen to the sound volume when setting the timer by selecting the "Test" option. To reset the timer to its starting point, click the "Reset" button. To stop (start) the timer, click the "Stop" ("Start") button.
              </p>
              <p>
                To your browser's Favorites, you can add links to online timers with various time settings. The timer will be set to the predetermined time upon opening such a link. Start a brand-new timer for your own event or holiday.
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

<!-- Timer settings form -->
<div id="form-timer" tabindex="-1" role="dialog" class="modal fade modal-colored-header" data-keyboard="false" style="display: none;">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
            <i class="icon ci-close"></i>
          </button>
          <h3 class="modal-title">Edit Timer</h3>
        </div>

        <div class="modal-body form">
          <div class="row hidden-sm hidden-md hidden-lg" id="group-dt-check">
            <div class="form-group col-xs-12">
              <label class="control-label xs-mr-10">Date and Time</label>
              <div class="" style="display: inline-block">
                <div class="switch-button switch-button-clear">
                  <input id="switch-dt" type="checkbox" checked="">
                  <span><label for="switch-dt"></label></span>
                </div>
              </div>
            </div>
          </div>

          <div class="row hidden-xs" id="group-dt-radio">
            <div class="form-group col-xs-12">
              <div class="am-radio inline">
                <input type="radio" name="kind" id="radio-countdown" checked>
                <label for="radio-countdown">Countdown</label>
              </div>
              <div class="am-radio inline">
                <input type="radio" name="kind" id="radio-date">
                <label for="radio-date">Count till (from) date and time</label>
              </div>
            </div>
          </div>

          <div class="row" id="group-countdown">
            <div class="form-group col-xs-4 float-left">
              <label for="edt-hour">Hours</label>
              <div class="input-group xs-mb-0 display-block-xs">
                <span class="input-group-btn hidden-xs"><button type="button" tabindex="-1" class="btn btn-mp" id="btn-hour-minus" value="-1" style="width: 45px;">
                    <span class="icon ci-arrow-left"></span></button></span>
                <select class="form-control" id="edt-hour"><option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option>60</option><option>61</option><option>62</option><option>63</option><option>64</option><option>65</option><option>66</option><option>67</option><option>68</option><option>69</option><option>70</option><option>71</option><option>72</option><option>73</option><option>74</option><option>75</option><option>76</option><option>77</option><option>78</option><option>79</option><option>80</option><option>81</option><option>82</option><option>83</option><option>84</option><option>85</option><option>86</option><option>87</option><option>88</option><option>89</option><option>90</option><option>91</option><option>92</option><option>93</option><option>94</option><option>95</option><option>96</option><option>97</option><option>98</option><option>99</option></select>
                <span class="input-group-btn hidden-xs"><button type="button" tabindex="-1" class="btn btn-mp" id="btn-hour-plus" value="1" style="width: 45px;">
                    <span class="icon ci-arrow-right"></span></button></span>
              </div>
            </div>

            <div class="form-group col-xs-4 float-left">
              <label for="edt-minute">Minutes</label>
              <div class="input-group xs-mb-0 display-block-xs">
                <span class="input-group-btn hidden-xs"><button type="button" tabindex="-1" class="btn btn-mp" id="btn-minute-minus" value="-1" style="width: 45px;">
                    <span class="icon ci-arrow-left"></span></button></span>
                <select class="form-control" id="edt-minute"><option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option></select>
                <span class="input-group-btn hidden-xs"><button type="button" tabindex="-1" class="btn btn-mp" id="btn-minute-plus" value="1" style="width: 45px;">
                    <span class="icon ci-arrow-right"></span></button></span>
              </div>
            </div>

            <div class="form-group col-xs-4 float-left">
              <label for="edt-second">Seconds</label>
              <div class="input-group xs-mb-0 display-block-xs">
                <span class="input-group-btn hidden-xs"><button type="button" tabindex="-1" class="btn btn-mp" id="btn-second-minus" value="-1" style="width: 45px;">
                    <span class="icon ci-arrow-left"></span></button></span>
                <select class="form-control" id="edt-second"><option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option></select>
                <span class="input-group-btn hidden-xs"><button type="button" tabindex="-1" class="btn btn-mp" id="btn-second-plus" value="1" style="width: 45px;">
                    <span class="icon ci-arrow-right"></span></button></span>
              </div>
            </div>
          </div>

          <div class="row" id="group-on-zero">
            <div class="form-group col-xs-12">
              <label>On zero</label>
              <div class="xs-lb-0">
                <div class="am-radio inline">
                  <input type="radio" name="on-zero" id="radio-oz-stop">
                  <label for="radio-oz-stop">Stop timer</label>
                </div>
                <div class="am-radio inline">
                  <input type="radio" name="on-zero" id="radio-oz-restart">
                  <label for="radio-oz-restart">Restart timer</label>
                </div>
                <div class="am-radio inline">
                  <input type="radio" name="on-zero" id="radio-oz-increase">
                  <label for="radio-oz-increase">Run as stopwatch</label>
                </div>
              </div>
            </div>
          </div>

          <div class="row" style="display: none" id="group-date">
            <div class="form-group col-xs-12 col-sm-6">
              <label>Date</label>
              <div class="input-group date input-datetime xs-p-0" id="edt-date" data-min-view="2" style="width: 100%;">
                <input type="date" value="" class="form-control input-mobile-ro" id="edt-date-input">
                <!-- <span class="input-group-addon btn btn-form"><i class="icon-th ci-date"></i></span> -->
              </div>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
              <label>Time</label>
              <div class="input-group time input-datetime xs-p-0" id="edt-time" data-start-view="1" style="width: 100%;">
                <input type="time" value="" class="form-control input-mobile-ro" id="edt-time-input">
                <!-- <span class="input-group-addon btn btn-form"><i class="icon-th ci-clock"></i></span> -->
              </div>
            </div>
          </div>
          <div class="row" id="group-audio">
            <div class="form-group col-xs-8 col-sm-8">
              <label for="edt-audio">Sound</label>
              <div class="input-group xs-mb-0">
                <select class="form-control" id="edt-audio">
                  <option value="classic">Classic</option>
                  <option value="birds">Birds</option>
                  <option value="childhood">Childhood</option>
                  <option value="cuckoo">Cuckoo</option>
                  <option value="flute">Flute</option>
                  <option value="glow">Glow</option>
                  <option value="guitar">Guitar</option>
                  <option value="happy">Happy</option>
                  <option value="harp">Harp</option>
                  <option value="music">Music Box</option>
                  <option value="paradise">Paradise Island</option>
                  <option value="piano">Piano</option>
                  <option value="pipe">Pipe</option>
                  <option value="pizzicato">Pizzicato</option>
                  <option value="rooster">Rooster</option>
                  <option value="savannah">Savannah</option>
                  <option value="school">School</option>
                  <option value="twinkle">Twinkle</option>
                  <option value="wind">Wind Chimes</option>
                  <option value="xylophone">Xylophone</option>
                </select>
                <span class="input-group-btn">
                  <button type="button" class="btn" id="btn-audio-play" style="width: 45px;">
                    <span class="icon ci-play-outline" id="audio-play-icon"></span>
                    <span class="icon ci-pause-outline" style="display: none" id="audio-pause-icon"></span>
                  </button>
                  <!-- <input id="local-audio-file" type="file" accept="audio/*">
                  <button type="button" class="btn xs-ml-5" id="btn-audio-file">
                    <span class="icon ci-more"></span>
                  </button> -->
                </span>
              </div>
            </div>
            <div class="form-group col-xs-4 col-sm-4 xs-pl-0 sm-pl-15">
              <div class="am-checkbox am-checkbox-form">
                <input id="chk-audio-repeat" type="checkbox">
                <label for="chk-audio-repeat" class="text-ellipsis">Repeat sound</label>
              </div>
            </div>
          </div>
          <div class="row" id="group-title">
            <div class="form-group col-xs-8 col-sm-12 xs-mb-0 sm-mb-5">
              <label for="edt-title">Title</label>
              <input class="form-control" id="edt-title" value="">
            </div>
            <!-- <div class="form-group col-xs-4 col-sm-12 xs-pl-0 sm-pl-15 xs-mb-0">
              <div class="am-checkbox am-checkbox-form sm-mt-15 sm-mb-0 sm-p-0">
                <input id="chk-show-message" type="checkbox">
                <label for="chk-show-message" class="text-ellipsis">Show message</label>
              </div>
            </div> -->
          </div>
        </div>

        <div class="modal-footer">
          <div class="row">
            <div class="text-left col-xs-4">
              <button type="button" class="btn btn-classic btn-default" id="btn-test-timer">
                Test
              </button>
            </div>

            <div class="text-right col-xs-8">
              <button type="button" data-dismiss="modal" class="btn btn-classic btn-default" id="btn-cancel">
                Cancel
              </button>
              <button type="button" data-dismiss="modal" class="btn btn-classic btn-alt3" id="btn-start-timer">
                Start
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

Views::alarm_dialog();
Views::embed_dialog();
Views::footer();
