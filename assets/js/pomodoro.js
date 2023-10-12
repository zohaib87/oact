/**
 * # Pomodoro Js Start
 */
( function ($) {

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
    var soundUrl = oactObj.pluginUrl+'/assets/sound/'+currSound+'.mp3';
    audio = new Audio( soundUrl );
    audio.play();

  } );

  /**
   * # Load circle and settings
   */
  $( document ).on( 'ready', function () {

    $( '#pomodoro-timer' ).circletimer( {} );

    var hour = localStorage.getItem( 'pomodoroHour' );
    var minute = localStorage.getItem( 'pomodoroMinute' );
    var second = localStorage.getItem( 'pomodoroSecond' );
    var sound = localStorage.getItem( 'pomodoroSound' );
    var soundRepeat = localStorage.getItem( 'pomodoroSoundRepeat' );
    var alarmTitle = localStorage.getItem( 'pomodoroAlarmTitle' );
    var hourMinuteSecond = null;

    if ( hour !== null && hour.trim() !== '' ) {

      $( '#edt-hour option' ).filter( function () {
        return $(this).text() === hour;
      } ).prop( 'selected', true );

      hourMinuteSecond = true;

    }

    if ( minute !== null && minute.trim() !== '' ) {

      $( '#edt-minute option' ).filter( function () {
        return $(this).text() === minute;
      } ).prop( 'selected', true );

      hourMinuteSecond = true;

    }

    if ( second !== null && second.trim() !== '' ) {

      $( '#edt-second option' ).filter( function () {
        return $(this).text() === second;
      } ).prop( 'selected', true );

      hourMinuteSecond = true;

    }

    if ( sound !== null && sound.trim() !== '' ) {

      $( '#edt-audio option' ).filter( function () {
        return $(this).text() === sound;
      } ).prop( 'selected', true );

    }

    if ( soundRepeat !== null && soundRepeat.trim() !== '' ) {

      $( '#chk-audio-repeat' ).prop( 'checked', soundRepeat == 'true' ? true : false );

    }

    if ( alarmTitle !== null && alarmTitle.trim() !== '' ) {

      $( '#edt-title' ).val( alarmTitle );

    }

    if ( hourMinuteSecond && ( hour != '00' || minute != '00' || second != '00' ) ) {

      $( '#time-elapsed' ).html( hour + ':' + minute + ':' + second );

    }

  } );

  /**
   * # Start
   *
   * @link https://github.com/abejfehr/circletimer
   * @link https://www.abefehr.com/circletimer/
   */
  var countdownInterval = null;

  $( '#btn-start' ).on( 'click', function (e) {

    e.preventDefault();

    var hour = localStorage.getItem( 'pomodoroHour' );
    var minute = localStorage.getItem( 'pomodoroMinute' );
    var second = localStorage.getItem( 'pomodoroSecond' );
    var soundUrl = localStorage.getItem( 'pomodoroSoundUrl' );
    var soundRepeat = localStorage.getItem( 'pomodoroSoundRepeat' );
    var alarmTitle = localStorage.getItem( 'pomodoroAlarmTitle' );
    var hourMinuteSecond = null;

    if ( hour !== null && hour.trim() !== '' ) {

      hourMinuteSecond = true;

    } else {

      hour = '00';

    }

    if ( minute !== null && minute.trim() !== '' ) {

      hourMinuteSecond = true;

    } else {

      minute = '00';

    }

    if ( second !== null && second.trim() !== '' ) {

      hourMinuteSecond = true;

    } else {

      second = '00';

    }

    if ( ! hourMinuteSecond ) return false;

    $( '#time-elapsed' ).text( hour + ':' + minute + ':' + second );
    var milliseconds = ( (Number(hour) * 60 * 60) + (Number(minute) * 60) + Number(second) ) * 1000;

    $( '#pomodoro-timer' ).circletimer( {

      onComplete: function() {

        $( '#ct-circle-container circle' ).css( 'stroke-dashoffset', '0' );

      },

      onUpdate: function( elapsed ) {

        // $( '#time-elapsed' ).html( Math.round(elapsed) );

      },

      timeout: milliseconds,

    } );

    $( '#pomodoro-timer' ).circletimer( 'start' );

    var totalSeconds = ( Number(hour) * 60 * 60 ) + ( Number(minute) * 60 ) + Number(second);

    countdownInterval = setInterval( function () {

      if ( totalSeconds <= 0 ) {

        clearInterval( countdownInterval );

        $( '#time-elapsed' ).text( '00:00:00' );

        var alarmTime = hour + ':' + minute + ':' + second;

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

        audio = new Audio( soundUrl );
        audio.loop = ( soundRepeat == 'true' ) ? true : false;
        audio.play();

        // Show dialog
        $( '#dialog-alarm' ).toggleClass( 'in' ).show();

        $( '#lbl-dialog-alarm-time' ).text( alarmTime );
        $( '#lbl-dialog-alarm-title' ).text( alarmTitle );

        return;

      }

      var hoursLeft = Math.floor( Number(totalSeconds) / 3600 );
      var minutesLeft = Math.floor( (Number(totalSeconds) % 3600) / 60 );
      var secondsLeft = Number(totalSeconds) % 60;

      var formattedTime =
        ( hoursLeft < 10 ? "0" : "" ) + hoursLeft + ":" +
        ( minutesLeft < 10 ? "0" : "" ) + minutesLeft + ":" +
        ( secondsLeft < 10 ? "0" : "" ) + secondsLeft;

      $("#time-elapsed").text( formattedTime );

      totalSeconds--;

    }, 1000 );

  } );

  /**
   * # Pause
   */
  $( '#btn-pause' ).on( 'click', function (e) {

    e.preventDefault();

    if ( countdownInterval ) {

      clearInterval( countdownInterval );

    }

    $( '#pomodoro-timer' ).circletimer( 'pause' );

  } );

  /**
   * # Stop
   */
  $( '#btn-stop' ).on( 'click', function (e) {

    e.preventDefault();

    var hour = localStorage.getItem( 'pomodoroHour' );
    var minute = localStorage.getItem( 'pomodoroMinute' );
    var second = localStorage.getItem( 'pomodoroSecond' );

    if ( countdownInterval ) {

      clearInterval( countdownInterval );
      countdownInterval = null;

      if ( hour != '00' || minute != '00' || second != '00' ) {

        $( '#time-elapsed' ).html( hour + ':' + minute + ':' + second );

      }

    }

    $( '#pomodoro-timer' ).circletimer( 'stop' );
    $( '#ct-circle-container circle' ).css( 'stroke-dashoffset', '0' );

  } );

  /**
   * # Open Settings
   */
  $( '#btn-settings' ).on( 'click', function (e) {

    e.preventDefault();

    $( '#form-alarm' ).toggleClass( 'in' ).show();

  } );

  /**
   * # Save Settings
   */
  $( '#btn-start-alarm' ).on( 'click', function (e) {

    e.preventDefault();

    var hour = $( '#edt-hour' ).val();
    var minute = $( '#edt-minute' ).val();
    var second = $( '#edt-second' ).val();
    var currSound = $( '#edt-audio' ).val();
    var soundUrl = oactObj.pluginUrl+'/assets/sound/'+currSound+'.mp3';
    var soundRepeat = $( '#chk-audio-repeat' ).prop('checked');
    var alarmTitle = $( '#edt-title' ).val();

    localStorage.setItem( 'pomodoroHour', hour );
    localStorage.setItem( 'pomodoroMinute', minute );
    localStorage.setItem( 'pomodoroSecond', second );
    localStorage.setItem( 'pomodoroSound', currSound );
    localStorage.setItem( 'pomodoroSoundUrl', soundUrl );
    localStorage.setItem( 'pomodoroSoundRepeat', soundRepeat );
    localStorage.setItem( 'pomodoroAlarmTitle', alarmTitle );

    $( '#time-elapsed' ).text( hour + ':' + minute + ':' + second );
    $( '#form-alarm' ).removeClass( 'in' ).hide();

  } );

  /**
   * # Set alarm with links
   */
  $( '#pnl-links' ).on( 'click', 'a', function (e) {

    e.preventDefault();

    var alarmTimer = $(this).text();
    alarmTimer = alarmTimer.replace( ' Timer', '' );

    // Second
    if ( alarmTimer.indexOf( 'Second' ) !== -1 ) {

      var second = alarmTimer.replace( ' Second', '' );
      second = ( second < 10 ? '0' : '' ) + second;
      // localStorage.setItem( 'pomodoroSecond', second );

      $( '#edt-hour option' ).filter( function () {
        return $(this).text() === '00';
      } ).prop( 'selected', true );

      $( '#edt-minute option' ).filter( function () {
        return $(this).text() === '00';
      } ).prop( 'selected', true );

      $( '#edt-second option' ).filter( function () {
        return $(this).text() === second;
      } ).prop( 'selected', true );

    // Minute
    } else if ( alarmTimer.indexOf( 'Minute' ) !== -1 ) {

      var minute = alarmTimer.replace( ' Minute', '' );
      minute = ( minute < 10 ? '0' : '' ) + minute;
      // localStorage.setItem( 'minute', minute );

      $( '#edt-hour option' ).filter( function () {
        return $(this).text() === '00';
      } ).prop( 'selected', true );

      $( '#edt-minute option' ).filter( function () {
        return $(this).text() === minute;
      } ).prop( 'selected', true );

      $( '#edt-second option' ).filter( function () {
        return $(this).text() === '00';
      } ).prop( 'selected', true );

    // Hour
    } else if ( alarmTimer.indexOf( 'Hour' ) !== -1 ) {

      var hour = alarmTimer.replace( ' Hour', '' );
      hour = ( hour < 10 ? '0' : '' ) + hour;
      // localStorage.setItem( 'hour', hour );

      $( '#edt-hour option' ).filter( function () {
        return $(this).text() === hour;
      } ).prop( 'selected', true );

      $( '#edt-minute option' ).filter( function () {
        return $(this).text() === '00';
      } ).prop( 'selected', true );

      $( '#edt-second option' ).filter( function () {
        return $(this).text() === '00';
      } ).prop( 'selected', true );

    }

    $( '#btn-start-alarm' ).trigger('click');

  } );

  /**
   * # Close modal
   */
  $( '#form-alarm' ).on( 'click', '.close, #btn-cancel', function(e) {

    e.preventDefault();

    $( '#form-alarm' ).toggleClass('in').hide();

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

    $( '#btn-stop' ).trigger( 'click' );

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
   * # Plus seconds
   */
  $( '#btn-second-plus' ).on( 'click', function () {

    var selectElem = $( '#edt-second' );
    var currentIndex = selectElem.prop( 'selectedIndex' );
    var nextIndex = ( currentIndex + 1 ) % selectElem.children().length;
    selectElem.prop( 'selectedIndex', nextIndex );

  } );

  /**
   * # Minus seconds
   */
  $( '#btn-second-minus' ).on( 'click', function () {

    var selectElem = $( '#edt-second' );
    var currentIndex = selectElem.prop( 'selectedIndex' );
    var prevIndex = ( currentIndex - 1 + selectElem.children().length ) % selectElem.children().length;
    selectElem.prop( 'selectedIndex', prevIndex );

  } );

} )( jQuery );