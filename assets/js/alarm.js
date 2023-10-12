/**
 * # Alarm Js Start
 */
( function ($) {

  /**
   * # Edit alarm
   */
  $( '#btn-edit-spec-alarm' ).on( 'click', function(e) {

    e.preventDefault();

    if ( document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement ) {

      var element = $( '#row-alarm' ).detach();
      $( '#col-main' ).closest('.row').after( element );

      if ( document.exitFullscreen ) {

        document.exitFullscreen();

      } else if ( document.mozCancelFullScreen ) { // Firefox

        document.mozCancelFullScreen();

      } else if ( document.webkitExitFullscreen ) { // Chrome, Safari and Opera

        document.webkitExitFullscreen();

      } else if ( document.msExitFullscreen ) { // IE/Edge

        document.msExitFullscreen();

      }

      $( '#col-main' ).css( {
        'background-color': 'inherit',
        'width': '100%',
        'height': 'inherit'
      } );

    }

    $( '#form-alarm' ).toggleClass('in').show();

  } );

  /**
   * # Close modal
   */
  $( '#form-alarm' ).on( 'click', '.close, #btn-cancel', function(e) {

    e.preventDefault();

    if ( $('#audio-pause-icon:visible').length > 0 ) {

      if ( audio ) {
        audio.pause();
        audio.currentTime = 0;
      }

      $( '#audio-pause-icon' ).hide();
      $( '#audio-play-icon' ).show();

    }

    $( '#form-alarm' ).toggleClass('in').hide();

  } );

  /**
   * # Plus hour
   */
  $( '#btn-hour-plus' ).on( 'click', function () {

    var selectElem = $( '#edt-hour' );
    var currentIndex = selectElem.prop( 'selectedIndex' );
    var nextIndex = ( currentIndex + 1 ) % selectElem.children().length;
    selectElem.prop( 'selectedIndex', nextIndex );

  } );

  /**
   * # Minus hour
   */
  $( '#btn-hour-minus' ).on( 'click', function () {

    var selectElem = $( '#edt-hour' );
    var currentIndex = selectElem.prop( 'selectedIndex' );
    var prevIndex = ( currentIndex - 1 + selectElem.children().length ) % selectElem.children().length;
    selectElem.prop( 'selectedIndex', prevIndex );

  } );

  /**
   * # Plus minutes
   */
  $( '#btn-minute-plus' ).on( 'click', function () {

    var selectElem = $( '#edt-minute' );
    var currentIndex = selectElem.prop( 'selectedIndex' );
    var nextIndex = ( currentIndex + 1 ) % selectElem.children().length;
    selectElem.prop( 'selectedIndex', nextIndex );

  } );

  /**
   * # Minus minutes
   */
  $( '#btn-minute-minus' ).on( 'click', function () {

    var selectElem = $( '#edt-minute' );
    var currentIndex = selectElem.prop( 'selectedIndex' );
    var prevIndex = ( currentIndex - 1 + selectElem.children().length ) % selectElem.children().length;
    selectElem.prop( 'selectedIndex', prevIndex );

  } );

  /**
   * # Play audio / Test alarm
   */
  var audio;
  var blinkTitle = null;
  var titleRetrieved = false;

  if ( ! titleRetrieved ) {
    var currTitle = document.title;
    titleRetrieved = true;
  }

  $( '#btn-audio-play, #btn-test-spec-alarm, #btn-test-alarm' ).on( 'click', function () {

    if ( $(this).attr('id') === 'btn-audio-play' && $('#audio-pause-icon:visible').length > 0 ) {

      if ( audio ) {
        audio.pause();
        audio.currentTime = 0;
      }

      $( '#audio-pause-icon' ).hide();
      $( '#audio-play-icon' ).show();

      return false;

    }

    if ( $(this).attr('id') === 'btn-test-spec-alarm' || $(this).attr('id') === 'btn-test-alarm' ) {

      $( '#dialog-alarm' ).toggleClass( 'in' ).show();

      var alarmTime = localStorage.getItem( 'alarmTime' );
      var alarmTitle = localStorage.getItem( 'alarmTitle' );

      $( '#lbl-dialog-alarm-time' ).text( alarmTime );
      $( '#lbl-dialog-alarm-title' ).text( alarmTitle );

      // Blink title
      var blink = true;

      function oactUpdateTitle() {
        var newTitle = blink ? '*** ' + alarmTime + ' ***' : currTitle;
        document.title = newTitle;
        blink = ! blink;
      }

      blinkTitle = setInterval( oactUpdateTitle, 1000 );

    }

    // Play sound
    if ( audio ) {
      audio.pause();
      audio.currentTime = 0;
    }

    var currSound = $( '#edt-audio' ).val();
    var soundRepeat = $( '#chk-audio-repeat' ).prop('checked');
    var soundUrl = oactObj.pluginUrl+'/assets/sound/'+currSound+'.mp3';
    audio = new Audio( soundUrl );
    audio.loop = ( soundRepeat == true ) ? true : false;
    audio.play();

    if ( $(this).attr('id') === 'btn-audio-play' ) {

      $( '#audio-play-icon' ).hide();
      $( '#audio-pause-icon' ).show();

      $(audio).on( 'ended', function () {

        $( '#audio-pause-icon' ).hide();
        $( '#audio-play-icon' ).show();

      } );

    }

  } );

  /**
   * # Close alarm dialog
   */
  $( '#dialog-alarm' ).on( 'click', '.close, .btn', function (e) {

    $( '#dialog-alarm' ).toggleClass( 'in' ).hide();
    $( '#lbl-dialog-alarm-time' ).text('');
    $( '#lbl-dialog-alarm-title' ).text('');

    clearInterval( blinkTitle );
    document.title = currTitle;

    if ( audio ) {
      audio.pause();
      audio.currentTime = 0;
    }

    $( '#btn-stop-alarm' ).trigger( 'click' );
    $( '#btn-edit-spec-alarm' ).show();

  } );

  /**
   * # Live time and date
   */
  oactUpdateTime();
  setInterval( oactUpdateTime, 1000 );

  /**
   * # Set alarm with links
   */
  $( '#pnl-links' ).on( 'click', 'a', function (e) {

    e.preventDefault();

    var alarmTime = $(this).text().trim();

    $( '#lbl-title' ).data( 'alarm', alarmTime ).text( 'Set alarm for ' + alarmTime );
    $( '#btn-edit-spec-alarm' ).removeClass( 'btn-alt3' ).addClass( 'btn-primary' ).text( 'Edit' );
    $( '#btn-test-spec-alarm, #btn-set-alarm' ).show();

    $( 'html, body' ).animate( { scrollTop: 0 } );

  } );

  /**
   * # Get alarm date
   *
   * @param {string}  alarmTime  Time for which the date is needed
   *
   * @returns {string}  date with alarm time
   */
  function oactGetAlarmDate( alarmTime ) {

    var now = new Date();

    var alarmParts = alarmTime.split(':');
    var alarmHour = parseInt( alarmParts[0] );
    var alarmMinute = parseInt( alarmParts[1].split(' ')[0] );
    var alarmPeriod = alarmParts[1].split(' ')[1];

    if ( alarmPeriod === 'PM' && alarmHour !== 12 ) {

      alarmHour += 12;

    }

    var alarmDate = new Date( now.getFullYear(), now.getMonth(), now.getDate(), alarmHour, alarmMinute );

    if ( now > alarmDate ) {

      alarmDate.setDate( alarmDate.getDate() + 1 );

    }

    var formattedDate = alarmDate.toLocaleDateString( 'en-US', {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    } );

    return alarmTime + ', ' + formattedDate;

  }

  /**
   * # Check if alarm is set
   */
  $( document ).ready( function () {

    var hour = localStorage.getItem( 'hour' );
    var minute = localStorage.getItem( 'minute' );
    var alarmTime = localStorage.getItem( 'alarmTime' );
    var sound = localStorage.getItem( 'sound' );
    var soundRepeat = localStorage.getItem( 'soundRepeat' );
    var alarmTitle = localStorage.getItem( 'alarmTitle' );

    if ( alarmTime !== null && alarmTime.trim() !== '' ) {

      // $( '#lbl-title' ).data( 'alarm', alarmTime ).text( 'Set alarm for ' + alarmTime );
      $( '#lbl-title' ).data( 'alarm', alarmTime );

    }

    var edtHour = $( '#edt-hour option' ).filter( function () {
      return $(this).text() === hour;
    } );

    var edtMinute = $( '#edt-minute option' ).filter( function () {
      return $(this).text() === minute;
    } );

    var edtAudio = $( '#edt-audio option' ).filter( function () {
      return $(this).text() === sound;
    } );

    if ( edtHour.length > 0 ) edtHour.prop( 'selected', true );
    if ( edtMinute.length > 0 ) edtMinute.prop( 'selected', true );
    if ( edtAudio.length > 0 ) edtAudio.prop( 'selected', true );

    $( '#chk-audio-repeat' ).prop( 'checked', soundRepeat == 'true' ? true : false );
    $( '#edt-title' ).val( alarmTitle );
    $( '#lbl-alarm-title' ).text( alarmTitle );

  } );

  /**
   * # Start alarm
   */
  var countdownInterval = null;

  $( '#btn-set-alarm' ).on( 'click', function (e) {

    e.preventDefault();

    var alarmTime = $( '#lbl-title' ).data( 'alarm' );
    var alarmTimeDate = oactGetAlarmDate( alarmTime );
    var currSound = $( '#edt-audio' ).val();
    var soundUrl = oactObj.pluginUrl+'/assets/sound/'+currSound+'.mp3';

    if ( alarmTime == '' ) return false;

    localStorage.setItem( 'alarmTime', alarmTime );
    localStorage.setItem( 'alarmTimeDate', alarmTimeDate );
    localStorage.setItem( 'soundUrl', soundUrl );

    $( '#lbl-alarm-time' ).text( alarmTime );

    /**
     * # Count down to alarm
     */
    function oactAlarmCountdown() {

      var now = new Date();
      var alarmDate = new Date( alarmTimeDate );

      var timeDifference = alarmDate - now;

      if ( timeDifference <= 0 ) {

        clearInterval( countdownInterval );

        // Blink title
        var blink = true;

        function oactUpdateTitle() {
          var newTitle = blink ? '*** ' + alarmTime + ' ***' : currTitle;
          document.title = newTitle;
          blink = ! blink;
        }

        blinkTitle = setInterval( oactUpdateTitle, 1000 );

        // Play sound
        if ( audio ) {
          audio.pause();
          audio.currentTime = 0;
        }

        var soundRepeat = localStorage.getItem( 'soundRepeat' );

        audio = new Audio( soundUrl );
        audio.loop = ( soundRepeat == 'true' ) ? true : false;
        audio.play();

        // Show dialog
        $( '#dialog-alarm' ).toggleClass( 'in' ).show();

        var alarmTime = localStorage.getItem( 'alarmTime' );
        var alarmTitle = localStorage.getItem( 'alarmTitle' );

        $( '#lbl-dialog-alarm-time' ).text( alarmTime );
        $( '#lbl-dialog-alarm-title' ).text( alarmTitle );

        return;

      }

      // var days = Math.floor( timeDifference / (1000 * 60 * 60 * 24) );
      var hours = Math.floor( (timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60) );
      var minutes = Math.floor( (timeDifference % (1000 * 60 * 60)) / (1000 * 60) );
      var seconds = Math.floor( (timeDifference % (1000 * 60)) / 1000);

      // var countdownText = days + "d " + hours + "h " + minutes + "m " + seconds + "s";
      var countdownText = hours + ':' + minutes + ':' + seconds;

      $( '#lbl-alarm-timer' ).text( countdownText );

    }

    countdownInterval = setInterval( oactAlarmCountdown, 1000 );

    $( '#btn-test-spec-alarm, #btn-edit-spec-alarm, #btn-set-alarm' ).hide();
    $( '#row-alarm, #btn-stop-alarm' ).show();

  } );

  /**
   * # Save alarm
   */
  $( '#btn-start-alarm' ).on( 'click', function (e) {

    e.preventDefault();

    var hour = $( '#edt-hour' ).val();
    var minute = $( '#edt-minute' ).val();
    var alarmTime = '';
    var ampm = '';
    var currSound = $( '#edt-audio' ).val();
    var soundUrl = oactObj.pluginUrl+'/assets/sound/'+currSound+'.mp3';
    var soundRepeat = $( '#chk-audio-repeat' ).prop('checked');
    var alarmTitle = $( '#edt-title' ).val();

    if ( hour.indexOf('AM') !== -1 ) {

      alarmTime = hour.replace( ' AM', ':' );
      ampm = ' AM';

    } else if ( hour.indexOf('PM') !== -1 ) {

      alarmTime = hour.replace( ' PM', ':' );
      ampm = ' PM';

    }

    alarmTime += minute + ampm;

    localStorage.setItem( 'hour', hour );
    localStorage.setItem( 'minute', minute );
    localStorage.setItem( 'alarmTime', alarmTime );
    localStorage.setItem( 'sound', currSound );
    localStorage.setItem( 'soundUrl', soundUrl );
    localStorage.setItem( 'soundRepeat', soundRepeat );
    localStorage.setItem( 'alarmTitle', alarmTitle );

    $( '#lbl-title' ).data( 'alarm', alarmTime ).text('');
    $( '#lbl-alarm-title' ).text( alarmTitle );
    $( '#form-alarm' ).toggleClass('in').hide();
    $( '#btn-set-alarm').trigger( 'click' );

  } );

  /**
   * # Stop alarm
   */
  $( '#btn-stop-alarm' ).on( 'click', function (e) {

    e.preventDefault();

    localStorage.setItem( 'alarmTime', '' );
    localStorage.setItem( 'alarmTimeDate', '' );

    // $( '#lbl-alarm-time, #lbl-title' ).text('');
    $( '#lbl-alarm-time' ).text('');
    $( '#lbl-alarm-timer' ).text( ' --:--:--' );
    $( '#row-alarm, #btn-stop-alarm' ).hide();

    if ( $( '#lbl-title' ).text().trim() != '' ) {

      $( '#btn-edit-spec-alarm' ).removeClass( 'btn-alt3' ).addClass( 'btn-primary' ).text( 'Edit' );
      $( '#btn-test-spec-alarm, #btn-set-alarm' ).show();

    } else {

      $( '#btn-edit-spec-alarm' ).removeClass( 'btn-primary' ).addClass( 'btn-alt3' ).text( 'Set Alarm' );

    }

    $( '#btn-edit-spec-alarm' ).show();

    if ( countdownInterval ) {

      clearInterval( countdownInterval );
      countdownInterval = null;

    }

    clearInterval( blinkTitle );

  } );

} )( jQuery );
