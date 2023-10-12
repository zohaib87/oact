<?php
/**
 * Functions of reusable sections.
 *
 * @package Oact
 */

namespace Oact\Helpers;

use Oact\Helpers\Helpers;

class Views {

  /**
   * # Tabs for Plugin Options
   */
  public static function plugin_option_tabs($tabs) {

    foreach ($tabs as $tab) {

      $title = $tab[0];
      $param = $tab[1];
      $active_tab = $tab[2];

      ?>
        <a href="?page=<?php echo $_GET['page']; ?>&tab=<?php echo esc_attr($param); ?>" class="nav-tab <?php echo ($active_tab == $param) ? 'nav-tab-active' : ''; ?>"><?php echo esc_html($title); ?></a>
      <?php

    }

  }

  /**
   * # Header
   */
  public static function header() {

    ?>
      <!DOCTYPE html>
      <html <?php language_attributes(); ?> dir="ltr" class="">

      <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head(); ?>

        <style id="color-style"></style>

        <noscript>
          <style>
            #pnl-main {
              height: auto;
            }

            #pnl-tools {
              display: none;
            }
          </style>
        </noscript>

        <!--[if lt IE 9
        //     ]><style>
        //       #pnl-tools,
        //       .sb-content,
        //       .container-fluid,
        //       .am-logo {
        //         display: none;
        //       }
        //       .dropdown-menu-right {
        //         left: 0;
        //         right: auto;
        //       }
        //       td {
        //         padding: 0 12px;
        //       }
        //     </style><!
        //   [endif]-->
      </head>

      <?php
        $current_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
        $pomodoro = 'page-templates/oact-pomodoro.php';
      ?>

      <body class="am-animate" style="height: auto;">
    <?php

  }

  /**
   * # Navbar
   */
  public static function navbar() {

    ?>
      <nav class="navbar navbar-default navbar-fixed-top am-top-header">
        <div class="container-fluid">
          <style>
            .is-mobile {
              display: none !important;
            }
            @media (max-width: 767px) {
              .am-top-header .navbar-header .am-toggle-left-sidebar,
              .am-top-header .am-toggle-right-sidebar {
                margin-top: 8px;
              }
              .is-mobile {
                display: inline-block !important;
              }
              .is-pc {
                display: none !important;
              }
            }
          </style>

          <div class="navbar-header">

            <a href="<?php echo Helpers::get_page_template_url( 'page-templates/oact-alarm.php' ); ?>" class="navbar-brand is-mobile" style="width: 100%; margin: 0;">
              <img src="<?php echo oact_directory_uri(); ?>/assets/img/logo.png" style="text-align: center; margin: 12px auto 0;" alt="">
            </a>

            <div class="page-title is-pc">
              <span>Online Alarm Clock - TimerWebsite</span>
            </div>

            <a href="javascript:;" class="am-toggle-left-sidebar navbar-toggle collapsed"><span class="icon-bar"><span></span><span></span><span></span></span></a>

            <a href="<?php echo Helpers::get_page_template_url( 'page-templates/oact-alarm.php' ); ?>" class="navbar-brand is-pc">
              <img src="<?php echo oact_directory_uri(); ?>/assets/img/logo.png" alt="">
            </a>
          </div>

          <?php
            $current_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
            $pomodoro = 'page-templates/oact-pomodoro.php';
          ?>

          <?php if ( $current_template != $pomodoro ) { ?>
            <a href="javascript:;" class="am-toggle-right-sidebar" title="Settings" data-toggle="tooltip"
            data-placement="bottom"><span class="icon ci-config"></span></a>
          <?php } ?>

          <!-- <a href="javascript:;" data-toggle="collapse" data-target="#am-navbar-collapse" class="am-toggle-top-header-menu collapsed"><span class="icon ci-angle-down"></span></a> -->
          <div id="am-navbar-collapse" class="collapse navbar-collapse">
            <!-- <div id="google_element"></div> -->
            <ul class="nav navbar-nav navbar-right am-icons-nav">
              <!-- <li class="dropdown">
                <a href="javascript:;" role="button" title="Night Mode" data-toggle="tooltip" data-placement="bottom"
                  id="btn-night-mode"><span class="icon ci-contrast" id="icon-night-mode"></span></a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
    <?php

  }

  /**
   * # Left sidebar
   */
  public static function left_sidebar() {

    $current_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    $alarm = 'page-templates/oact-alarm.php';
    $timer = 'page-templates/oact-timer.php';
    $stopwatch = 'page-templates/oact-stopwatch.php';
    $time = 'page-templates/oact-time.php';
    $pomodoro = 'page-templates/oact-pomodoro.php';

    ?>
      <div class="am-left-sidebar">
        <div class="am-scroller nano">
          <div class="content nano-content">
            <div class="am-logo">
            </div>
            <ul class="sidebar-elements">
              <li class="<?php echo ( $current_template == $alarm ) ? 'active' : 'parent'; ?>">
                <a href="<?php echo Helpers::get_page_template_url( $alarm ); ?>" id="link-alarm">
                  <!-- <i class="icon ci-alarm"></i><span>Alarm&nbsp;Clock</span> -->
                  <img src="<?php echo oact_directory_uri(); ?>/assets/img/alarm-snooze.png" class="icon" alt="Alarm"><span>Alarm&nbsp;Clock</span>
                </a>
              </li>

              <li class="<?php echo ( $current_template == $timer ) ? 'active' : 'parent'; ?>">
                <a href="<?php echo Helpers::get_page_template_url( $timer ); ?>" id="link-timer"><img src="<?php echo oact_directory_uri(); ?>/assets/img/time.png" class="icon" alt="Timer"><span>Timer</span></a>
              </li>

              <li class="<?php echo ( $current_template == $stopwatch ) ? 'active' : 'parent'; ?>">
                <a href="<?php echo Helpers::get_page_template_url( $stopwatch ); ?>"><img src="<?php echo oact_directory_uri(); ?>/assets/img/timer.png" class="icon" alt="Stopwatch"><span>Stopwatch</span></a>
              </li>

              <li class="<?php echo ( $current_template == $time ) ? 'active' : 'parent'; ?>">
                <a href="<?php echo Helpers::get_page_template_url( $time ); ?>"><img src="<?php echo oact_directory_uri(); ?>/assets/img/business-time.png" class="icon" alt="Time"><span>Time</span></a>
              </li>

              <li class="<?php echo ( $current_template == $pomodoro ) ? 'active' : 'parent'; ?>">
                <a href="<?php echo Helpers::get_page_template_url( $pomodoro ); ?>"><img src="<?php echo oact_directory_uri(); ?>/assets/img/25.png" class="icon" alt="Pomodoro"><span>Pomodoro</span></a>
              </li>
            </ul>
            <!--Sidebar bottom content-->
          </div>

          <!-- <div class="nano-pane" style="display: block;">
            <div class="nano-slider" style="height: 221px; transform: translate(0px, 0px);"></div>
          </div> -->
        </div>
      </div>
    <?php

  }

  /**
   * # Right sidebar
   */
  public static function right_sidebar() {

    $current_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    $alarm = 'page-templates/oact-alarm.php';
    $timer = 'page-templates/oact-timer.php';
    $stopwatch = 'page-templates/oact-stopwatch.php';
    $time = 'page-templates/oact-time.php';
    $pomodoro = 'page-templates/oact-pomodoro.php';

    ?>
      <nav class="am-right-sidebar">
        <div class="sb-content">
          <div class="tab-panel">
            <div class="tab-content">
              <div class="tab-pane ticket active" id="tab0" role="tabpanel">
                <div class="ticket-container">
                  <div class="ticket-wrapper am-scroller nano">
                    <div class="am-scroller-ticket nano-content">
                      <div class="content ticket-content">
                        <h2 style="font-size: 24px; font-weight: 800;">Settings</h2>
                        <form>
                          <div class="form-group options" style="font-size: 24px; font-weight: 800;">
                            <?php if ( $current_template != $pomodoro ) { ?>
                              <div class="field">
                                <label>Digital Font</label>
                                <div class="pull-right">
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" id="switch-digital" />
                                    <span><label for="switch-digital"></label></span>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <?php if ( $current_template == $alarm || $current_template == $time ) { ?>
                              <div class="field">
                                <label>12 hours (am/pm)</label>
                                <div class="pull-right">
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" id="switch-12hour" />
                                    <span><label for="switch-12hour"></label></span>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <?php if ( $current_template == $alarm || $current_template == $time ) { ?>
                              <div class="field">
                                <label>Show Date</label>
                                <div class="pull-right">
                                  <div class="switch-button switch-button-sm">
                                    <input type="checkbox" checked="" id="switch-date" />
                                    <span><label for="switch-date"></label></span>
                                  </div>
                                </div>
                              </div>
                            <?php } ?>

                            <?php if ( $current_template == $stopwatch ) { ?>
                              <div class="form-group" style="display: none;">
                                <label>Time Format</label>
                                <select class="form-control" size="4" id="select-format-time">
                                  <!-- <option value="000">00:00.000</option> -->
                                  <option value="00" selected>00:00.00</option>
                                  <!-- <option value="0">00:00.0</option> -->
                                  <!-- <option value="">00:00</option> -->
                                </select>
                              </div>
                            <?php } ?>

                            <!-- <div class="field">
                              <label>Night Mode</label>
                              <div class="pull-right">
                                <div class="switch-button switch-button-sm">
                                  <input type="checkbox" checked="" id="switch-night-mode" />
                                  <span><label for="switch-night-mode"></label></span>
                                </div>
                              </div>
                            </div> -->

                            <label>Colors</label>
                            <div class="panel-colors" id="pnl-colors">
                              <span class="btn-digit-color icon ci-checkmark-outline" style="color: #f43f36" data-color="#f43f36" id="digit-color-0"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #fcbf0e" data-color="#fcbf0e" id="digit-color-1"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #555" data-color="#555" id="digit-color-2"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #4caf55" data-color="#4caf55" id="digit-color-3"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #1e93f0" data-color="#1e93f0" id="digit-color-4"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #3e51b0" data-color="#3e51b0" id="digit-color-5"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #952daa" data-color="#952daa" id="digit-color-6"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #ea6793" data-color="#ea6793" id="digit-color-7"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #05bbd3" data-color="#05bbd3" id="digit-color-8"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #ff8866" data-color="#ff8866" id="digit-color-9"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #d1dc40" data-color="#d1dc40" id="digit-color-10"></span>
                              <span class="btn-digit-color icon ci-circle" style="color: #7a5545" data-color="#7a5545" id="digit-color-11"></span>
                            </div>
                          </div>

                          <style>
                            #btn-options-close,
                            #btn-options-close:focus,
                            #btn-options-close:visited,
                            #btn-options-close:hover,
                            #btn-options-close:active {
                              background-color: #00d2ff!important;
                              border-color: #00d2ff!important;
                            }
                          </style>
                          <button type="button" class="btn btn-primary" id="btn-options-close">Ok</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    <?php

  }

  /**
   * # Add clock
   */
  public static function add_clock() {

    ?>
      <div class="col-sm-4 col-md-3" id="col-add-clock">
        <div class="panel panel-default panel-heading-fullwidth" style="position: relative; height: 173px;" id="pnl-add-clock">
          <div class="text-center" style="
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                width: 50%;
                height: 20%;
                margin: auto;
              " id="pnl-add-clock-center">
            <button type="button" class="btn btn-space btn-classic btn-alt3" id="btn-add-clock">
              Add
            </button>
            <div id="pnl-clock-tools" style="display: none">
              <div class="tools">
                <a href="#" class="colored ext-link"><span class="icon ci-monitor" id="btn-open-clock"></span></a>
                <span class="dropdown">
                  <span data-toggle="dropdown" class="icon ci-menu3 dropdown-toggle"></span>
                  <ul role="menu" class="dropdown-menu dropdown-menu-right dropdown-colored">
                    <li>
                      <a href="javascript:;" class="pm-edit">Edit</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="javascript:;" class="pm-move-top">Move to Top</a>
                    </li>
                    <li>
                      <a href="javascript:;" class="pm-move-up">Move Up</a>
                    </li>
                    <li>
                      <a href="javascript:;" class="pm-move-down">Move Down</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="javascript:;" class="pm-delete">Delete</a>
                    </li>
                  </ul>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php

  }

  /**
   * # Alarm setting form
   */
  public static function alarm_form() {

    ?>
      <!-- Alarm Settings Form -->
      <div id="form-alarm" tabindex="-1" role="dialog" class="modal fade modal-colored-header">
        <div class="vertical-alignment-helper">
          <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                  <i class="icon ci-close"></i>
                </button>
                <h3 class="modal-title">Edit Alarm</h3>
              </div>

              <div class="modal-body form">
                <div class="row">
                  <div class="form-group col-xs-6 float-left">
                    <label for="edt-hour"><?php echo esc_html__( 'Hour', 'oact' ); ?></label>
                    <div class="input-group xs-mb-0">
                      <span class="input-group-btn">
                        <button type="button" tabindex="-1" class="btn btn-mp" id="btn-hour-minus" value="-1"><span class="icon ci-arrow-left"></span></button>
                      </span>

                      <select class="form-control" id="edt-hour">
                        <option>12 AM</option>
                        <option>1 AM</option>
                        <option>2 AM</option>
                        <option>3 AM</option>
                        <option>4 AM</option>
                        <option>5 AM</option>
                        <option>6 AM</option>
                        <option>7 AM</option>
                        <option>8 AM</option>
                        <option>9 AM</option>
                        <option>10 AM</option>
                        <option>11 AM</option>
                        <option>12 PM</option>
                        <option>1 PM</option>
                        <option>2 PM</option>
                        <option>3 PM</option>
                        <option>4 PM</option>
                        <option>5 PM</option>
                        <option>6 PM</option>
                        <option>7 PM</option>
                        <option>8 PM</option>
                        <option>9 PM</option>
                        <option>10 PM</option>
                        <option>11 PM</option>
                      </select>

                      <span class="input-group-btn">
                        <button type="button" tabindex="-1" class="btn btn-mp" id="btn-hour-plus" value="1"><span class="icon ci-arrow-right"></span></button>
                      </span>
                    </div>
                  </div>

                  <div class="form-group col-xs-6 float-left">
                    <label for="edt-minute"><?php echo esc_html__( 'Minutes', 'oact' ); ?></label>
                    <div class="input-group xs-mb-0">
                      <span class="input-group-btn"><button type="button" tabindex="-1" class="btn btn-mp"
                          id="btn-minute-minus" value="-1">
                          <span class="icon ci-arrow-left"></span></button></span>

                          <select class="form-control" id="edt-minute">
                            <option>00</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                            <option>32</option>
                            <option>33</option>
                            <option>34</option>
                            <option>35</option>
                            <option>36</option>
                            <option>37</option>
                            <option>38</option>
                            <option>39</option>
                            <option>40</option>
                            <option>41</option>
                            <option>42</option>
                            <option>43</option>
                            <option>44</option>
                            <option>45</option>
                            <option>46</option>
                            <option>47</option>
                            <option>48</option>
                            <option>49</option>
                            <option>50</option>
                            <option>51</option>
                            <option>52</option>
                            <option>53</option>
                            <option>54</option>
                            <option>55</option>
                            <option>56</option>
                            <option>57</option>
                            <option>58</option>
                            <option>59</option>
                          </select>

                      <span class="input-group-btn"><button type="button" tabindex="-1" class="btn btn-mp"
                          id="btn-minute-plus" value="1">
                          <span class="icon ci-arrow-right"></span></button></span>
                    </div>
                  </div>
                </div>

                <div class="row" id="group-audio">
                  <div class="form-group col-xs-8 col-sm-7">
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
                        <button type="button" class="btn" id="btn-audio-play">
                          <span class="icon ci-play-outline" id="audio-play-icon"></span>
                          <span class="icon ci-pause-outline" style="display: none" id="audio-pause-icon"></span>
                        </button>

                        <!-- <input id="local-audio-file" type="file" accept="audio/*" /> -->
                        <!-- <button type="button" class="btn xs-ml-5" id="btn-audio-file">
                          <span class="icon ci-more"></span>
                        </button> -->
                      </span>
                    </div>
                  </div>

                  <div class="form-group col-xs-4 col-sm-5 xs-pl-0 sm-pl-15">
                    <div class="am-checkbox am-checkbox-form">
                      <input id="chk-audio-repeat" type="checkbox" />
                      <label for="chk-audio-repeat" class="text-ellipsis">Repeat sound</label>
                    </div>
                  </div>
                </div>

                <div class="form-group xs-mb-0 sm-mb-5">
                  <label for="edt-title">Title</label>
                  <input class="form-control" id="edt-title" value="Alarm" />
                </div>
              </div>

              <div class="modal-footer">
                <div class="row">
                  <div class="text-left col-xs-4">
                    <button type="button" class="btn btn-classic btn-default" id="btn-test-alarm">
                      Test
                    </button>
                  </div>

                  <div class="text-right col-xs-8">
                    <button type="button" data-dismiss="modal" class="btn btn-classic btn-default" id="btn-cancel">
                      Cancel
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-classic btn-alt3" id="btn-start-alarm">
                      Start Alarm
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php

  }

  /**
   * # Pomodoro setting form
   */
  public static function pomodoro_settings() {

    ?>
      <!-- Pomodoro Settings Form -->
      <div id="form-alarm" tabindex="-1" role="dialog" class="modal fade modal-colored-header">
        <div class="vertical-alignment-helper">
          <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                  <i class="icon ci-close"></i>
                </button>
                <h3 class="modal-title">Edit Alarm</h3>
              </div>

              <div class="modal-body form">
                <div class="row">
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

                <div class="row" id="group-audio">
                  <div class="form-group col-xs-8 col-sm-7">
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
                        <button type="button" class="btn" id="btn-audio-play">
                          <span class="icon ci-play-outline" id="audio-play-icon"></span>
                          <span class="icon ci-pause-outline" style="display: none" id="audio-pause-icon"></span>
                        </button>

                        <!-- <input id="local-audio-file" type="file" accept="audio/*" /> -->
                        <!-- <button type="button" class="btn xs-ml-5" id="btn-audio-file">
                          <span class="icon ci-more"></span>
                        </button> -->
                      </span>
                    </div>
                  </div>

                  <div class="form-group col-xs-4 col-sm-5 xs-pl-0 sm-pl-15">
                    <div class="am-checkbox am-checkbox-form">
                      <input id="chk-audio-repeat" type="checkbox" />
                      <label for="chk-audio-repeat" class="text-ellipsis">Repeat sound</label>
                    </div>
                  </div>
                </div>

                <div class="form-group xs-mb-0 sm-mb-5">
                  <label for="edt-title">Title</label>
                  <input class="form-control" id="edt-title" value="Alarm" />
                </div>
              </div>

              <div class="modal-footer">
                <div class="row">
                  <div class="text-left col-xs-4">
                    <button type="button" class="btn btn-classic btn-default" id="btn-test-alarm">
                      Test
                    </button>
                  </div>

                  <div class="text-right col-xs-8">
                    <button type="button" data-dismiss="modal" class="btn btn-classic btn-default" id="btn-cancel">
                      Cancel
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-classic btn-alt3" id="btn-start-alarm">
                      Save
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php

  }

  /**
   * # Alarm dialog
   */
  public static function alarm_dialog() {

    ?>
      <!-- Alarm Modal Dialog -->
      <div id="dialog-alarm" tabindex="-1" role="dialog" class="modal fade modal-colored-header modal-colored-header-danger">
        <div class="vertical-alignment-helper">
          <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                  <i class="icon ci-close"></i>
                </button>
                <h3 class="modal-title">Alarm</h3>
              </div>
              <div class="modal-body">
                <div class="text-center">
                  <div class="i-circle text-danger">
                    <span class="icon ci-alarm"></span>
                  </div>
                  <h3 id="lbl-dialog-alarm-title"></h3>
                  <h3 id="lbl-dialog-alarm-time"></h3>
                  <p id="lbl-overdue"></p>
                </div>
              </div>
              <div class="modal-footer">
                <div class="text-center">
                  <button type="button" data-dismiss="modal" class="btn btn-classic btn-danger">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php

  }

  /**
   * # Embed dialog
   */
  public static function embed_dialog() {

    ?>
      <!-- Embed Modal Dialog -->
      <div id="form-embed" tabindex="-1" role="dialog" class="modal fade modal-colored-header">
        <div class="vertical-alignment-helper">
          <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                  <i class="icon ci-close"></i>
                </button>
                <h3 class="modal-title">Embed</h3>
              </div>
              <div class="modal-body form bkg-lightgrey">
                <div class="form-group" id="group-show-buttons">
                  <div class="am-checkbox xs-p-0">
                    <input id="chk-show-buttons" type="checkbox" />
                    <label for="chk-show-buttons">Show Buttons</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="edt-size">Size</label>
                  <select class="form-control" id="edt-size">
                    <option>Custom</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="edt-embed">HTML Code</label>
                  <textarea rows="4" class="form-control" spellcheck="false" dir="ltr" id="edt-embed"></textarea>
                </div>
                <div class="form-group hidden-xs xs-mb-0">
                  <label>Preview</label>
                  <div class="embed-preview"></div>
                </div>
              </div>
              <div class="modal-footer bkg-lightgrey">
                <div class="text-center">
                  <button type="button" data-dismiss="modal" class="btn btn-classic btn-default">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php

  }

  /**
   * # Footer
   */
  public static function footer() {

    $contact = 'page-templates/oact-contact.php';
    $terms = 'page-templates/oact-terms.php';
    $privacy = 'page-templates/oact-privacy.php';

    ?>
      <div class="am-footer">
        <a href="<?php echo Helpers::get_page_template_url( $contact ); ?>" rel="nofollow">Contacts</a>
        | <a href="<?php echo Helpers::get_page_template_url( $terms ); ?>" rel="nofollow">Terms of use</a> |
        <a href="<?php echo Helpers::get_page_template_url( $privacy ); ?>" rel="nofollow">Privacy</a> |
        <span class="text-nowrap">&copy; 2023 timerwebsite.com</span>
      </div>

      <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
      <script>
        function loadGoogleTranslate() {

          new google.translate.TranslateElement( {
            pageLanguage: 'en', // Set the default language
            includedLanguages: 'en,ko,fr,de,es,it,ur,hi,ja',
            autoDisplay: false
          }, 'google_element' );

        }
      </script>

      <?php wp_footer(); ?>

      <!-- <script>
        ( function ($) {

          vAlarm.init();
          App.init();

        } )( jQuery );
      </script> -->

      </body>
      </html>
    <?php

  }

  /**
   * # Social share
   */
  public static function social_share() {

    ?>
      <!-- Social Share -->
      <div class="row" id="pnl-share">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body panel-share">
              <ul>
                <li>
                  <button id="facebook" title="Share to Facebook. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-facebook"></span>
                  </button>
                </li>
                <li>
                  <button id="twitter" title="Share to Twitter. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-twitter"></span>
                  </button>
                </li>
                <li>
                  <button id="whatsapp" title="Share to WhatsApp. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-whatsapp"></span>
                  </button>
                </li>
                <li>
                  <button id="blogger" title="Share to Blogger. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-blogger"></span>
                  </button>
                </li>
                <li>
                  <button id="reddit" title="Share to reddit. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-reddit"></span>
                  </button>
                </li>
                <li>
                  <button id="tumblr" title="Share to Tumblr. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-tumblr"></span>
                  </button>
                </li>
                <li>
                  <button id="pinterest" title="Share to Pinterest. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-pinterest"></span>
                  </button>
                </li>
                <li>
                  <button id="linkedin" title="Share to LinkedIn. Opens in a new window."
                    class="btn-share">
                    <span class="share-icon share-icon-linkedin"></span>
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <?php

  }

}
