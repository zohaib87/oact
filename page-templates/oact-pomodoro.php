<?php
/**
 * Template Name: Pomodoro (Oact)
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

      <!-- Pomodoro -->
      <div class="row">
        <div class="col-md-12 text-light" id="col-main" data-alarm-time="">
          <style>
            #pnl-main {
              height: auto !important;
              padding-top: 5px;
            }
            @media (max-width: 768px) {
              #pnl-main {
                height: 380px;
              }
              #pnl-time {
                width: 100% !important;
                height: 200px !important;
                top: 58px !important;
                left: 0 !important;
              }
              #pomodoro-timer {
                margin: 0 auto;
              }
            }
          </style>

          <div class="panel panel-default" id="pnl-main" data-utc="1689251579">
            <!-- <div class="panel-tools" id="pnl-tools">
              <span class="icon ci-share" title="Share" data-toggle="tooltip" id="btn-tool-share"></span>
              <span class="icon ci-less" title="Decrease Font Size" data-toggle="tooltip" id="btn-font-minus"></span>
              <span class="icon ci-plus2" title="Increase Font Size" data-toggle="tooltip" id="btn-font-plus"></span>
              <span class="icon ci-expand1" title="Full Screen" data-toggle="tooltip" id="btn-full-screen"></span>
              <span class="icon ci-collapse" title="Exit Full Screen" data-toggle="tooltip" style="display: none" id="btn-full-screen-exit"></span>
            </div> -->

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

            <div class="clock">
              <div class="outer-clock-face">
                <div class="marking marking-one"></div>
                <div class="marking marking-two"></div>
                <div class="marking marking-three"></div>
                <div class="marking marking-four"></div>
                <div class="inner-clock-face">
                  <div style="width:100%;height:100%;position:relative;">
                    <div id="time-elapsed" style="color:#000000;font-size:40px;width:100%;height:100%;text-align:center;padding-top:calc(50% - 31px);position:absolute;top:0px;left:0px;z-index:99999;font-weight:bold;-webkit-text-stroke: 1px #ffffff;">00:00:00</div>

                    <div id="pomodoro-timer" style="position:absolute;z-index:9999;top:-3px;left:-3px;"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div id="pnl-time" style="display: block; position: relative; width: 296px; height: 144px; left: 477px; top: 20px;">
              <div id="pomodoro-timer" style="width: 200px; height: 200px;"></div>
            </div> -->

            <!-- <h1 id="lbl-title" class="colored main-title" style="display: block; position: absolute; width: 1179px; top: 140px; left: 3px;">00:00:00</h1> -->

            <div class="ott_btn_box" style="text-align: center; margin-top: 50px;">
              <button id="btn-start" alt="start"><i class="fas fa-play"></i></button>
              <button id="btn-pause" alt="pause"><i class="fas fa-pause"></i></button>
              <button id="btn-stop" alt="stop"><i class="fas fa-stop"></i></button>
              <button id="btn-settings" alt="Settings"><i class="fas fa-cog"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- Set the pomodoro for the specified time -->
      <div class="row" id="pnl-links">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="font-weight: bold;">Set the <span class="red">pomodoro</span> for the specified time</div>

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
              <h1 class="text-left">How to use the online pomodoro</h1>
            </div>
            <div class="panel-body">
              <p>
                Visualized pormodoro for increased concentration, displaying past time in white and remaining time in black.
              </p>
              <p>
                This is a time management technique to improve concentration. If you use pomodoro to concentrate on a task for 25 minutes, take a 5 minute break, do 4 sets of 2 hours, take a 30 minute break, and continue with the next set, you can improve your concentration to a high level.
              </p>
              <p>
                Therefore, if you are a student, athlete, or in any other field that requires concentration and time management, you can use pomodoro to improve your concentration and time management.
              </p>
            </div>
          </div>
        </div>
      </div>

      <?php Views::social_share(); ?>

    </div>
  </div>

  <?php // Views::right_sidebar(); ?>
</div>

<!-- Pomodoro Settings Form -->
<!-- <div id="form-alarm" class="setbox" style="display: none;">
  <div class="setbox_title">Settings</div>
  <div class="set_time">
    <div class="set_tt">time</div>
      <div class="set_pn">
        <select id="sel_hour">
          <option value="0">00</option>
          <option value="1">01</option>
          <option value="2">02</option>
          <option value="3">03</option>
          <option value="4">04</option>
          <option value="5">05</option>
          <option value="6">06</option>
          <option value="7">07</option>
          <option value="8">08</option>
          <option value="9">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
        </select>
        :
        <select id="sel_minute">
          <option value="0">00</option>
          <option value="1">01</option>
          <option value="2">02</option>
          <option value="3">03</option>
          <option value="4">04</option>
          <option value="5">05</option>
          <option value="6">06</option>
          <option value="7">07</option>
          <option value="8">08</option>
          <option value="9">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
          <option value="34">34</option>
          <option value="35">35</option>
          <option value="36">36</option>
          <option value="37">37</option>
          <option value="38">38</option>
          <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
          <option value="45">45</option>
          <option value="46">46</option>
          <option value="47">47</option>
          <option value="48">48</option>
          <option value="49">49</option>
          <option value="50">50</option>
          <option value="51">51</option>
          <option value="52">52</option>
          <option value="53">53</option>
          <option value="54">54</option>
          <option value="55">55</option>
          <option value="56">56</option>
          <option value="57">57</option>
          <option value="58">58</option>
          <option value="59">59</option>
        </select>
        :
        <select id="sel_second">
          <option value="0">00</option>
          <option value="1">01</option>
          <option value="2">02</option>
          <option value="3">03</option>
          <option value="4">04</option>
          <option value="5">05</option>
          <option value="6">06</option>
          <option value="7">07</option>
          <option value="8">08</option>
          <option value="9">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
          <option value="34">34</option>
          <option value="35">35</option>
          <option value="36">36</option>
          <option value="37">37</option>
          <option value="38">38</option>
          <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
          <option value="45">45</option>
          <option value="46">46</option>
          <option value="47">47</option>
          <option value="48">48</option>
          <option value="49">49</option>
          <option value="50">50</option>
          <option value="51">51</option>
          <option value="52">52</option>
          <option value="53">53</option>
          <option value="54">54</option>
          <option value="55">55</option>
          <option value="56">56</option>
          <option value="57">57</option>
          <option value="58">58</option>
          <option value="59">59</option>
        </select>
      </div>
      <div class="clear"></div>
  </div>

  <div class="set_sound">
    <div class="set_tt">sound</div>
    <div class="set_pn">
      <select id="set_sound_select">
        <option value="0">alarm 1</option>
        <option value="1">alarm 2</option>
        <option value="2">alarm 3</option>
        <option value="3">alarm 4</option>
        <option value="4">alarm 5</option>
        <option value="5">alarm 6</option>
        <option value="6">alarm 7</option>
        <option value="7">alarm 8</option>
        <option value="8">alarm 9</option>
        <option value="9">alarm 10</option>

        <option value="10">music 1</option>
        <option value="11">music 2</option>
        <option value="12">music 3</option>
        <option value="13">music 4</option>
        <option value="14">music 5</option>
        <option value="15">music 6</option>
        <option value="16">music 7</option>
        <option value="17">music 8</option>
        <option value="18">music 9</option>
        <option value="19">music 10</option>
      </select>
      <span id="set_sound_play_btn" data="0"><i class="fas fa-play"></i></span>
    </div>
    <div class="clear"></div>
  </div>

  <div class="set_loop">
    <div class="set_tt">repeat</div>
    <div class="set_pn">
      <div class="onoffswitch">
        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="is_loop_sw" tabindex="0" checked="">
        <label class="onoffswitch-label" for="is_loop_sw"></label>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="set_button" data="ok">OK</div>
</div> -->

<?php

Views::pomodoro_settings();
Views::alarm_dialog();
Views::embed_dialog();
Views::footer();
