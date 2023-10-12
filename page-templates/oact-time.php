<?php
/**
 * Template Name: Time (Oact)
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

      <!-- Time Now -->
      <div class="row">
        <div class="col-md-12 text-light" id="col-main" data-alarm-time="">
          <style>
            #pnl-main {
              height: 321px !important;
            }
            @media (max-width: 768px) {
              #pnl-main {
                height: 279px !important;
              }
              #pnl-time {
                width: 100%;
                position: absolute !important;
                top: 82px !important;
                left: 50%;
                -webkit-transform: translate(-50%);
                -moz-transform: translate(-50%);
                -ms-transform: translate(-50%);
                transform: translate(-50%);
              }
              #lbl-noon {
                font-size: 68px;
              }
              #lbl-date {
                width: 100%;
                top: 181px;
                font-size: 28px;
              }
            }
          </style>

          <div class="panel panel-default" id="pnl-main" data-utc="1689251579">
            <div class="panel-tools" id="pnl-tools">
              <span class="icon ci-share" title="Share" data-toggle="tooltip" id="btn-tool-share"></span>
              <!-- <span class="icon ci-less" title="Decrease Font Size" data-toggle="tooltip" id="btn-font-minus"></span>
              <span class="icon ci-plus2" title="Increase Font Size" data-toggle="tooltip" id="btn-font-plus"></span> -->
              <span class="icon ci-expand1" title="Full Screen" data-toggle="tooltip" id="btn-full-screen"></span>
              <span class="icon ci-collapse" title="Exit Full Screen" data-toggle="tooltip" style="display: none"
                id="btn-full-screen-exit"></span>
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

            <h1 id="lbl-title" class="colored main-title center-h" style="display: block; position: absolute" data-alarm="">Time Now</h1>

            <div id="lbl-date" class="colored digit-text text-center center-h" style="display: block; position: absolute"><?php echo esc_html( $current_date ); ?></div>
          </div>
        </div>
      </div>

      <!-- Clocks -->
      <div class="row" id="row-clocks">
        <?php Views::add_clock(); ?>
      </div>

      <!-- Description -->
      <div class="row" id="pnl-description">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1>How to use the online time</h1>
            </div>
            <div class="panel-body">
              <p>
                Any country and city in the world's current time and date can be found on this website. The time difference between your location and another city can also be seen. Along with a list of pre-installed clocks for significant cities, the main page features a clock that shows the precise time in your location.
              </p>
              <p>
                You can change this list however you like. The font color, type, and size settings for the clock can be changed, and once saved, they will be applied the next time you open your web browser.
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

<!-- Clock settings form -->
<div id="form-edit" tabindex="-1" role="dialog" class="modal fade modal-colored-header" style="display: none;">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
            <i class="icon ci-close"></i>
          </button>
          <h3 class="modal-title">
            <span id="lbl-add-clock" style="display: inline;">Add</span><span id="lbl-edit-clock" style="display: none;">Edit</span>
          </h3>
        </div>
        <div class="modal-body form">
          <div class="form-group sm-mb-5">
            <label for="edt-country">Country</label>
            <select class="form-control" id="edt-country">
              <option value="US">United States</option>
              <option value="CA">Canada</option>
              <option value="GB">United Kingdom</option>
              <option value="IE">Ireland</option>
              <option value="AU">Australia</option>
              <option value="PH">Philippines</option>
              <option value="NZ">New Zealand</option>
              <option value="SG">Singapore</option>
              <option value="DE">Germany</option>
              <option value="FR">France</option>
              <option value="DK">Denmark</option>
              <option value="IT">Italy</option>
              <option value="ES">Spain</option>
              <option value="SE">Sweden</option>
              <option value="PT">Portugal</option>
              <option value="RU">Russia</option>
              <option value="FI">Finland</option>
              <option value="GR">Greece</option>
              <option value="TR">Turkey</option>
              <option value="UA">Ukraine</option>
              <option value="PL">Poland</option>
              <option value="JP">Japan</option>
              <option value="KR">Korea</option>
              <option value="CN">China</option>
              <option value="TW">Taiwan</option>
              <option value="IL">Israel</option>
              <option value="IN">India</option>
              <option value="BR">Brazil</option>
              <option value="MX">Mexico</option>
              <option value="AR">Argentina</option>
              <option value="AD">Andorra</option>
              <option value="AE">United Arab Emirates</option>
              <option value="AF">Afghanistan</option>
              <option value="AG">Antigua &amp; Barbuda</option>
              <option value="AI">Anguilla</option>
              <option value="AL">Albania</option>
              <option value="AM">Armenia</option>
              <option value="AO">Angola</option>
              <option value="AQ">Antarctica</option>
              <option value="AR">Argentina</option>
              <option value="AS">Samoa (American)</option>
              <option value="AT">Austria</option>
              <option value="AU">Australia</option>
              <option value="AW">Aruba</option>
              <option value="AX">Åland Islands</option>
              <option value="AZ">Azerbaijan</option>
              <option value="BA">Bosnia &amp; Herzegovina</option>
              <option value="BB">Barbados</option>
              <option value="BD">Bangladesh</option>
              <option value="BE">Belgium</option>
              <option value="BF">Burkina Faso</option>
              <option value="BG">Bulgaria</option>
              <option value="BH">Bahrain</option>
              <option value="BI">Burundi</option>
              <option value="BJ">Benin</option>
              <option value="BL">St Barthelemy</option>
              <option value="BM">Bermuda</option>
              <option value="BN">Brunei</option>
              <option value="BO">Bolivia</option>
              <option value="BQ">Caribbean NL</option>
              <option value="BR">Brazil</option>
              <option value="BS">Bahamas</option>
              <option value="BT">Bhutan</option>
              <option value="BW">Botswana</option>
              <option value="BY">Belarus</option>
              <option value="BZ">Belize</option>
              <option value="CA">Canada</option>
              <option value="CC">Cocos (Keeling) Islands</option>
              <option value="CD">Congo (Dem. Rep.)</option>
              <option value="CF">Central African Rep.</option>
              <option value="CG">Congo (Rep.)</option>
              <option value="CH">Switzerland</option>
              <option value="CI">Côte d'Ivoire</option>
              <option value="CK">Cook Islands</option>
              <option value="CL">Chile</option>
              <option value="CM">Cameroon</option>
              <option value="CN">China</option>
              <option value="CO">Colombia</option>
              <option value="CR">Costa Rica</option>
              <option value="CU">Cuba</option>
              <option value="CV">Cape Verde</option>
              <option value="CW">Curacao</option>
              <option value="CX">Christmas Island</option>
              <option value="CY">Cyprus</option>
              <option value="CZ">Czech Republic</option>
              <option value="DE">Germany</option>
              <option value="DJ">Djibouti</option>
              <option value="DK">Denmark</option>
              <option value="DM">Dominica</option>
              <option value="DO">Dominican Republic</option>
              <option value="DZ">Algeria</option>
              <option value="EC">Ecuador</option>
              <option value="EE">Estonia</option>
              <option value="EG">Egypt</option>
              <option value="EH">Western Sahara</option>
              <option value="ER">Eritrea</option>
              <option value="ES">Spain</option>
              <option value="ET">Ethiopia</option>
              <option value="FI">Finland</option>
              <option value="FJ">Fiji</option>
              <option value="FK">Falkland Islands</option>
              <option value="FM">Micronesia</option>
              <option value="FO">Faroe Islands</option>
              <option value="FR">France</option>
              <option value="GA">Gabon</option>
              <option value="GB">Britain (UK)</option>
              <option value="GD">Grenada</option>
              <option value="GE">Georgia</option>
              <option value="GF">French Guiana</option>
              <option value="GG">Guernsey</option>
              <option value="GH">Ghana</option>
              <option value="GI">Gibraltar</option>
              <option value="GL">Greenland</option>
              <option value="GM">Gambia</option>
              <option value="GN">Guinea</option>
              <option value="GP">Guadeloupe</option>
              <option value="GQ">Equatorial Guinea</option>
              <option value="GR">Greece</option>
              <option value="GS">South Georgia &amp; the South Sandwich Islands</option>
              <option value="GT">Guatemala</option>
              <option value="GU">Guam</option>
              <option value="GW">Guinea-Bissau</option>
              <option value="GY">Guyana</option>
              <option value="HK">Hong Kong</option>
              <option value="HN">Honduras</option>
              <option value="HR">Croatia</option>
              <option value="HT">Haiti</option>
              <option value="HU">Hungary</option>
              <option value="ID">Indonesia</option>
              <option value="IE">Ireland</option>
              <option value="IL">Israel</option>
              <option value="IM">Isle of Man</option>
              <option value="IN">India</option>
              <option value="IO">British Indian Ocean Territory</option>
              <option value="IQ">Iraq</option>
              <option value="IR">Iran</option>
              <option value="IS">Iceland</option>
              <option value="IT">Italy</option>
              <option value="JE">Jersey</option>
              <option value="JM">Jamaica</option>
              <option value="JO">Jordan</option>
              <option value="JP">Japan</option>
              <option value="KE">Kenya</option>
              <option value="KG">Kyrgyzstan</option>
              <option value="KH">Cambodia</option>
              <option value="KI">Kiribati</option>
              <option value="KM">Comoros</option>
              <option value="KN">St Kitts &amp; Nevis</option>
              <option value="KP">Korea (North)</option>
              <option value="KR">Korea (South)</option>
              <option value="KW">Kuwait</option>
              <option value="KY">Cayman Islands</option>
              <option value="KZ">Kazakhstan</option>
              <option value="LA">Laos</option>
              <option value="LB">Lebanon</option>
              <option value="LC">St Lucia</option>
              <option value="LI">Liechtenstein</option>
              <option value="LK">Sri Lanka</option>
              <option value="LR">Liberia</option>
              <option value="LS">Lesotho</option>
              <option value="LT">Lithuania</option>
              <option value="LU">Luxembourg</option>
              <option value="LV">Latvia</option>
              <option value="LY">Libya</option>
              <option value="MA">Morocco</option>
              <option value="MC">Monaco</option>
              <option value="MD">Moldova</option>
              <option value="ME">Montenegro</option>
              <option value="MF">St Martin (French)</option>
              <option value="MG">Madagascar</option>
              <option value="MH">Marshall Islands</option>
              <option value="MK">Macedonia</option>
              <option value="ML">Mali</option>
              <option value="MM">Myanmar (Burma)</option>
              <option value="MN">Mongolia</option>
              <option value="MO">Macau</option>
              <option value="MP">Northern Mariana Islands</option>
              <option value="MQ">Martinique</option>
              <option value="MR">Mauritania</option>
              <option value="MS">Montserrat</option>
              <option value="MT">Malta</option>
              <option value="MU">Mauritius</option>
              <option value="MV">Maldives</option>
              <option value="MW">Malawi</option>
              <option value="MX">Mexico</option>
              <option value="MY">Malaysia</option>
              <option value="MZ">Mozambique</option>
              <option value="NA">Namibia</option>
              <option value="NC">New Caledonia</option>
              <option value="NE">Niger</option>
              <option value="NF">Norfolk Island</option>
              <option value="NG">Nigeria</option>
              <option value="NI">Nicaragua</option>
              <option value="NL">Netherlands</option>
              <option value="NO">Norway</option>
              <option value="NP">Nepal</option>
              <option value="NR">Nauru</option>
              <option value="NU">Niue</option>
              <option value="NZ">New Zealand</option>
              <option value="OM">Oman</option>
              <option value="PA">Panama</option>
              <option value="PE">Peru</option>
              <option value="PF">French Polynesia</option>
              <option value="PG">Papua New Guinea</option>
              <option value="PH">Philippines</option>
              <option value="PK">Pakistan</option>
              <option value="PL">Poland</option>
              <option value="PM">St Pierre &amp; Miquelon</option>
              <option value="PN">Pitcairn</option>
              <option value="PR">Puerto Rico</option>
              <option value="PS">Palestine</option>
              <option value="PT">Portugal</option>
              <option value="PW">Palau</option>
              <option value="PY">Paraguay</option>
              <option value="QA">Qatar</option>
              <option value="RE">Réunion</option>
              <option value="RO">Romania</option>
              <option value="RS">Serbia</option>
              <option value="RU">Russia</option>
              <option value="RW">Rwanda</option>
              <option value="SA">Saudi Arabia</option>
              <option value="SB">Solomon Islands</option>
              <option value="SC">Seychelles</option>
              <option value="SD">Sudan</option>
              <option value="SE">Sweden</option>
              <option value="SG">Singapore</option>
              <option value="SH">St Helena</option>
              <option value="SI">Slovenia</option>
              <option value="SJ">Svalbard &amp; Jan Mayen</option>
              <option value="SK">Slovakia</option>
              <option value="SL">Sierra Leone</option>
              <option value="SM">San Marino</option>
              <option value="SN">Senegal</option>
              <option value="SO">Somalia</option>
              <option value="SR">Suriname</option>
              <option value="SS">South Sudan</option>
              <option value="ST">Sao Tome &amp; Principe</option>
              <option value="SV">El Salvador</option>
              <option value="SX">St Maarten (Dutch)</option>
              <option value="SY">Syria</option>
              <option value="SZ">Swaziland</option>
              <option value="TC">Turks &amp; Caicos Is</option>
              <option value="TD">Chad</option>
              <option value="TF">French Southern &amp; Antarctic Lands</option>
              <option value="TG">Togo</option>
              <option value="TH">Thailand</option>
              <option value="TJ">Tajikistan</option>
              <option value="TK">Tokelau</option>
              <option value="TL">East Timor</option>
              <option value="TM">Turkmenistan</option>
              <option value="TN">Tunisia</option>
              <option value="TO">Tonga</option>
              <option value="TR">Turkey</option>
              <option value="TT">Trinidad &amp; Tobago</option>
              <option value="TV">Tuvalu</option>
              <option value="TW">Taiwan</option>
              <option value="TZ">Tanzania</option>
              <option value="UA">Ukraine</option>
              <option value="UG">Uganda</option>
              <option value="UM">US minor outlying islands</option>
              <option value="US">United States</option>
              <option value="UY">Uruguay</option>
              <option value="UZ">Uzbekistan</option>
              <option value="VA">Vatican City</option>
              <option value="VC">St Vincent</option>
              <option value="VE">Venezuela</option>
              <option value="VG">Virgin Islands (UK)</option>
              <option value="VI">Virgin Islands (US)</option>
              <option value="VN">Vietnam</option>
              <option value="VU">Vanuatu</option>
              <option value="WF">Wallis &amp; Futuna</option>
              <option value="WS">Samoa (western)</option>
              <option value="YE">Yemen</option>
              <option value="YT">Mayotte</option>
              <option value="ZA">South Africa</option>
              <option value="ZM">Zambia</option>
              <option value="ZW">Zimbabwe</option>
            </select>
          </div>

          <div class="form-group sm-mb-5">
            <label for="edt-time-zone">Time zone</label>
            <select class="form-control" id="edt-time-zone">
              <?php // data will be added dynamically. ?>
            </select>
          </div>
          <div class="form-group sm-mb-5">
            <label for="edt-title">Title</label>
            <input class="form-control" id="edt-title" value="">
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="text-right col-xs-12">
              <button type="button" data-dismiss="modal" class="btn btn-classic btn-default" id="btn-cancel">
                Cancel
              </button>
              <button type="button" data-dismiss="modal" class="btn btn-classic btn-alt3" id="btn-ok">
                OK
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Edit clock form -->
<div id="edit-clock" tabindex="-1" role="dialog" class="modal fade modal-colored-header" style="display: none;">
  <div class="vertical-alignment-helper">
    <div class="modal-dialog vertical-align-center">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
            <i class="icon ci-close"></i>
          </button>
          <h3 class="modal-title">
            <span id="lbl-edit-clock" style="display: inline;">Edit</span>
          </h3>
        </div>
        <div class="modal-body form">
          <div class="form-group sm-mb-5">
            <label for="edt-country">Country</label>
            <select class="form-control" id="edt-country">
              <option value="US">United States</option>
              <option value="CA">Canada</option>
              <option value="GB">United Kingdom</option>
              <option value="IE">Ireland</option>
              <option value="AU">Australia</option>
              <option value="PH">Philippines</option>
              <option value="NZ">New Zealand</option>
              <option value="SG">Singapore</option>
              <option value="DE">Germany</option>
              <option value="FR">France</option>
              <option value="DK">Denmark</option>
              <option value="IT">Italy</option>
              <option value="ES">Spain</option>
              <option value="SE">Sweden</option>
              <option value="PT">Portugal</option>
              <option value="RU">Russia</option>
              <option value="FI">Finland</option>
              <option value="GR">Greece</option>
              <option value="TR">Turkey</option>
              <option value="UA">Ukraine</option>
              <option value="PL">Poland</option>
              <option value="JP">Japan</option>
              <option value="KR">Korea</option>
              <option value="CN">China</option>
              <option value="TW">Taiwan</option>
              <option value="IL">Israel</option>
              <option value="IN">India</option>
              <option value="BR">Brazil</option>
              <option value="MX">Mexico</option>
              <option value="AR">Argentina</option>
              <option value="AD">Andorra</option>
              <option value="AE">United Arab Emirates</option>
              <option value="AF">Afghanistan</option>
              <option value="AG">Antigua &amp; Barbuda</option>
              <option value="AI">Anguilla</option>
              <option value="AL">Albania</option>
              <option value="AM">Armenia</option>
              <option value="AO">Angola</option>
              <option value="AQ">Antarctica</option>
              <option value="AR">Argentina</option>
              <option value="AS">Samoa (American)</option>
              <option value="AT">Austria</option>
              <option value="AU">Australia</option>
              <option value="AW">Aruba</option>
              <option value="AX">Åland Islands</option>
              <option value="AZ">Azerbaijan</option>
              <option value="BA">Bosnia &amp; Herzegovina</option>
              <option value="BB">Barbados</option>
              <option value="BD">Bangladesh</option>
              <option value="BE">Belgium</option>
              <option value="BF">Burkina Faso</option>
              <option value="BG">Bulgaria</option>
              <option value="BH">Bahrain</option>
              <option value="BI">Burundi</option>
              <option value="BJ">Benin</option>
              <option value="BL">St Barthelemy</option>
              <option value="BM">Bermuda</option>
              <option value="BN">Brunei</option>
              <option value="BO">Bolivia</option>
              <option value="BQ">Caribbean NL</option>
              <option value="BR">Brazil</option>
              <option value="BS">Bahamas</option>
              <option value="BT">Bhutan</option>
              <option value="BW">Botswana</option>
              <option value="BY">Belarus</option>
              <option value="BZ">Belize</option>
              <option value="CA">Canada</option>
              <option value="CC">Cocos (Keeling) Islands</option>
              <option value="CD">Congo (Dem. Rep.)</option>
              <option value="CF">Central African Rep.</option>
              <option value="CG">Congo (Rep.)</option>
              <option value="CH">Switzerland</option>
              <option value="CI">Côte d'Ivoire</option>
              <option value="CK">Cook Islands</option>
              <option value="CL">Chile</option>
              <option value="CM">Cameroon</option>
              <option value="CN">China</option>
              <option value="CO">Colombia</option>
              <option value="CR">Costa Rica</option>
              <option value="CU">Cuba</option>
              <option value="CV">Cape Verde</option>
              <option value="CW">Curacao</option>
              <option value="CX">Christmas Island</option>
              <option value="CY">Cyprus</option>
              <option value="CZ">Czech Republic</option>
              <option value="DE">Germany</option>
              <option value="DJ">Djibouti</option>
              <option value="DK">Denmark</option>
              <option value="DM">Dominica</option>
              <option value="DO">Dominican Republic</option>
              <option value="DZ">Algeria</option>
              <option value="EC">Ecuador</option>
              <option value="EE">Estonia</option>
              <option value="EG">Egypt</option>
              <option value="EH">Western Sahara</option>
              <option value="ER">Eritrea</option>
              <option value="ES">Spain</option>
              <option value="ET">Ethiopia</option>
              <option value="FI">Finland</option>
              <option value="FJ">Fiji</option>
              <option value="FK">Falkland Islands</option>
              <option value="FM">Micronesia</option>
              <option value="FO">Faroe Islands</option>
              <option value="FR">France</option>
              <option value="GA">Gabon</option>
              <option value="GB">Britain (UK)</option>
              <option value="GD">Grenada</option>
              <option value="GE">Georgia</option>
              <option value="GF">French Guiana</option>
              <option value="GG">Guernsey</option>
              <option value="GH">Ghana</option>
              <option value="GI">Gibraltar</option>
              <option value="GL">Greenland</option>
              <option value="GM">Gambia</option>
              <option value="GN">Guinea</option>
              <option value="GP">Guadeloupe</option>
              <option value="GQ">Equatorial Guinea</option>
              <option value="GR">Greece</option>
              <option value="GS">South Georgia &amp; the South Sandwich Islands</option>
              <option value="GT">Guatemala</option>
              <option value="GU">Guam</option>
              <option value="GW">Guinea-Bissau</option>
              <option value="GY">Guyana</option>
              <option value="HK">Hong Kong</option>
              <option value="HN">Honduras</option>
              <option value="HR">Croatia</option>
              <option value="HT">Haiti</option>
              <option value="HU">Hungary</option>
              <option value="ID">Indonesia</option>
              <option value="IE">Ireland</option>
              <option value="IL">Israel</option>
              <option value="IM">Isle of Man</option>
              <option value="IN">India</option>
              <option value="IO">British Indian Ocean Territory</option>
              <option value="IQ">Iraq</option>
              <option value="IR">Iran</option>
              <option value="IS">Iceland</option>
              <option value="IT">Italy</option>
              <option value="JE">Jersey</option>
              <option value="JM">Jamaica</option>
              <option value="JO">Jordan</option>
              <option value="JP">Japan</option>
              <option value="KE">Kenya</option>
              <option value="KG">Kyrgyzstan</option>
              <option value="KH">Cambodia</option>
              <option value="KI">Kiribati</option>
              <option value="KM">Comoros</option>
              <option value="KN">St Kitts &amp; Nevis</option>
              <option value="KP">Korea (North)</option>
              <option value="KR">Korea (South)</option>
              <option value="KW">Kuwait</option>
              <option value="KY">Cayman Islands</option>
              <option value="KZ">Kazakhstan</option>
              <option value="LA">Laos</option>
              <option value="LB">Lebanon</option>
              <option value="LC">St Lucia</option>
              <option value="LI">Liechtenstein</option>
              <option value="LK">Sri Lanka</option>
              <option value="LR">Liberia</option>
              <option value="LS">Lesotho</option>
              <option value="LT">Lithuania</option>
              <option value="LU">Luxembourg</option>
              <option value="LV">Latvia</option>
              <option value="LY">Libya</option>
              <option value="MA">Morocco</option>
              <option value="MC">Monaco</option>
              <option value="MD">Moldova</option>
              <option value="ME">Montenegro</option>
              <option value="MF">St Martin (French)</option>
              <option value="MG">Madagascar</option>
              <option value="MH">Marshall Islands</option>
              <option value="MK">Macedonia</option>
              <option value="ML">Mali</option>
              <option value="MM">Myanmar (Burma)</option>
              <option value="MN">Mongolia</option>
              <option value="MO">Macau</option>
              <option value="MP">Northern Mariana Islands</option>
              <option value="MQ">Martinique</option>
              <option value="MR">Mauritania</option>
              <option value="MS">Montserrat</option>
              <option value="MT">Malta</option>
              <option value="MU">Mauritius</option>
              <option value="MV">Maldives</option>
              <option value="MW">Malawi</option>
              <option value="MX">Mexico</option>
              <option value="MY">Malaysia</option>
              <option value="MZ">Mozambique</option>
              <option value="NA">Namibia</option>
              <option value="NC">New Caledonia</option>
              <option value="NE">Niger</option>
              <option value="NF">Norfolk Island</option>
              <option value="NG">Nigeria</option>
              <option value="NI">Nicaragua</option>
              <option value="NL">Netherlands</option>
              <option value="NO">Norway</option>
              <option value="NP">Nepal</option>
              <option value="NR">Nauru</option>
              <option value="NU">Niue</option>
              <option value="NZ">New Zealand</option>
              <option value="OM">Oman</option>
              <option value="PA">Panama</option>
              <option value="PE">Peru</option>
              <option value="PF">French Polynesia</option>
              <option value="PG">Papua New Guinea</option>
              <option value="PH">Philippines</option>
              <option value="PK">Pakistan</option>
              <option value="PL">Poland</option>
              <option value="PM">St Pierre &amp; Miquelon</option>
              <option value="PN">Pitcairn</option>
              <option value="PR">Puerto Rico</option>
              <option value="PS">Palestine</option>
              <option value="PT">Portugal</option>
              <option value="PW">Palau</option>
              <option value="PY">Paraguay</option>
              <option value="QA">Qatar</option>
              <option value="RE">Réunion</option>
              <option value="RO">Romania</option>
              <option value="RS">Serbia</option>
              <option value="RU">Russia</option>
              <option value="RW">Rwanda</option>
              <option value="SA">Saudi Arabia</option>
              <option value="SB">Solomon Islands</option>
              <option value="SC">Seychelles</option>
              <option value="SD">Sudan</option>
              <option value="SE">Sweden</option>
              <option value="SG">Singapore</option>
              <option value="SH">St Helena</option>
              <option value="SI">Slovenia</option>
              <option value="SJ">Svalbard &amp; Jan Mayen</option>
              <option value="SK">Slovakia</option>
              <option value="SL">Sierra Leone</option>
              <option value="SM">San Marino</option>
              <option value="SN">Senegal</option>
              <option value="SO">Somalia</option>
              <option value="SR">Suriname</option>
              <option value="SS">South Sudan</option>
              <option value="ST">Sao Tome &amp; Principe</option>
              <option value="SV">El Salvador</option>
              <option value="SX">St Maarten (Dutch)</option>
              <option value="SY">Syria</option>
              <option value="SZ">Swaziland</option>
              <option value="TC">Turks &amp; Caicos Is</option>
              <option value="TD">Chad</option>
              <option value="TF">French Southern &amp; Antarctic Lands</option>
              <option value="TG">Togo</option>
              <option value="TH">Thailand</option>
              <option value="TJ">Tajikistan</option>
              <option value="TK">Tokelau</option>
              <option value="TL">East Timor</option>
              <option value="TM">Turkmenistan</option>
              <option value="TN">Tunisia</option>
              <option value="TO">Tonga</option>
              <option value="TR">Turkey</option>
              <option value="TT">Trinidad &amp; Tobago</option>
              <option value="TV">Tuvalu</option>
              <option value="TW">Taiwan</option>
              <option value="TZ">Tanzania</option>
              <option value="UA">Ukraine</option>
              <option value="UG">Uganda</option>
              <option value="UM">US minor outlying islands</option>
              <option value="US">United States</option>
              <option value="UY">Uruguay</option>
              <option value="UZ">Uzbekistan</option>
              <option value="VA">Vatican City</option>
              <option value="VC">St Vincent</option>
              <option value="VE">Venezuela</option>
              <option value="VG">Virgin Islands (UK)</option>
              <option value="VI">Virgin Islands (US)</option>
              <option value="VN">Vietnam</option>
              <option value="VU">Vanuatu</option>
              <option value="WF">Wallis &amp; Futuna</option>
              <option value="WS">Samoa (western)</option>
              <option value="YE">Yemen</option>
              <option value="YT">Mayotte</option>
              <option value="ZA">South Africa</option>
              <option value="ZM">Zambia</option>
              <option value="ZW">Zimbabwe</option>
            </select>
          </div>

          <div class="form-group sm-mb-5">
            <label for="edt-time-zone">Time zone</label>
            <select class="form-control" id="edt-time-zone">
              <?php // data will be added dynamically. ?>
            </select>
          </div>

          <div class="form-group sm-mb-5">
            <label for="edt-title">Title</label>
            <input class="form-control" id="edt-title" data-key="" value="">
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="text-right col-xs-12">
              <button type="button" data-dismiss="modal" class="btn btn-classic btn-default" id="btn-cancel">
                Cancel
              </button>
              <button type="button" data-dismiss="modal" class="btn btn-classic btn-alt3" id="btn-ok">
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

Views::embed_dialog();
Views::footer();
