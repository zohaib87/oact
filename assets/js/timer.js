/**
 * # Timer Js Start
 */
( function ($) {

  /**
   * # Count up timer
   */
  var countUpTimer = null;

  $( document ).on( 'ready', function () {

    // Get the timer element
    var timerElement = $( '#lbl-time' );

    // Store the start time
    var startTime = new Date();

    // Update the timer every second
    countUpTimer = setInterval( function() {

      var currentTime = new Date();
      var timeDifference = currentTime - startTime;

      // Calculate hours, minutes, and seconds
      var hours = Math.floor( timeDifference / (60 * 60 * 1000) );
      var minutes = Math.floor( (timeDifference % (60 * 60 * 1000)) / (60 * 1000) );
      var seconds = Math.floor( (timeDifference % (60 * 1000)) / 1000 );

      // Format the time as "00:00:00"
      var formattedTime =
          (hours < 10 ? "0" : "") + hours + ":" +
          (minutes < 10 ? "0" : "") + minutes + ":" +
          (seconds < 10 ? "0" : "") + seconds;

      // Update the timer element
      timerElement.text( formattedTime );

    }, 1000 ); // Update every 1000ms (1 second)

  } );

  /**
   * # Edit timer
   */
  $( '#btn-edit' ).on( 'click', function (e) {

    e.preventDefault();

    $( '#form-timer' ).toggleClass( 'in' ).show();

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

  $( '#btn-audio-play, #btn-test-timer' ).on( 'click', function () {

    if ( $(this).attr('id') === 'btn-audio-play' && $('#audio-pause-icon:visible').length > 0 ) {

      if ( audio ) {
        audio.pause();
        audio.currentTime = 0;
      }

      $( '#audio-pause-icon' ).hide();
      $( '#audio-play-icon' ).show();

      return false;

    }

    if ( $(this).attr('id') === 'btn-test-timer' ) {

      $( '#dialog-alarm' ).toggleClass( 'in' ).show();

      var countdown = localStorage.getItem( 'timerCountdown' );
      var countTill = localStorage.getItem( 'timerCountTill' );
      var alarmTitle = localStorage.getItem( 'timerAlarmTitle' );
      var alarmTime = '';

      if ( countdown == 'true' ) {

        var hour = localStorage.getItem( 'timerHour' );
        var minute = localStorage.getItem( 'timerMinute' );
        var second = localStorage.getItem( 'timerSecond' );

        alarmTime = hour + ':' + minute + ':' + second;

      } else if ( countTill == 'true' ) {

        var date = localStorage.getItem( 'timerDate' );
        var time = localStorage.getItem( 'timerTime' );

        alarmTime = oactConvertTime( time ) + ', ' + oactReorderDate( date );

      }

      $( '#lbl-dialog-alarm-title' ).text( alarmTitle );
      $( '#lbl-dialog-alarm-time' ).text( alarmTime );

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
   * Load edit timer
   */
  $( document ).on( 'ready', function() {

    var countdown = localStorage.getItem( 'timerCountdown' );
    var countTill = localStorage.getItem( 'timerCountTill' );
    var hour = localStorage.getItem( 'timerHour' );
    var minute = localStorage.getItem( 'timerMinute' );
    var second = localStorage.getItem( 'timerSecond' );
    var date = localStorage.getItem( 'timerDate' );
    var time = localStorage.getItem( 'timerTime' );
    var stopTimer = localStorage.getItem( 'timerStopTimer' );
    var restart = localStorage.getItem( 'timerRestart' );
    var increase = localStorage.getItem( 'timerIncrease' );
    var sound = localStorage.getItem( 'timerSound' );
    var soundRepeat = localStorage.getItem( 'timerSoundRepeat' );
    var alarmTitle = localStorage.getItem( 'timerAlarmTitle' );

    if ( countdown == 'true' ) {

      $( '#radio-countdown' ).prop( 'checked', true );
      $( '#group-countdown, #group-on-zero' ).show();
      $( '#group-date' ).hide();

    }

    if ( countTill == 'true' ) {

      $( '#radio-date' ).prop( 'checked', true );
      $( '#group-countdown, #group-on-zero' ).hide();
      $( '#group-date' ).show();

    }

    if ( hour !== null && hour.trim() !== '' ) {

      $( '#edt-hour option' ).filter( function () {
        return $(this).text() === hour;
      } ).prop( 'selected', true );

    } else {

      hour = '00';

    }

    if ( minute !== null && minute.trim() !== '' ) {

      $( '#edt-minute option' ).filter( function () {
        return $(this).text() === minute;
      } ).prop( 'selected', true );

    } else {

      minute = '00';

    }

    if ( second !== null && second.trim() !== '' ) {

      $( '#edt-second option' ).filter( function () {
        return $(this).text() === second;
      } ).prop( 'selected', true );

    } else {

      second = '00';

    }

    if ( date !== null && date.trim() !== '' ) {

      $( '#edt-date-input' ).val( date );

    }

    if ( time !== null && time.trim() !== '' ) {

      $( '#edt-time-input' ).val( time );

    }

    if ( stopTimer !== null && stopTimer.trim() !== '' ) {

      $( '#radio-oz-stop' ).prop( 'checked', stopTimer == 'true' ? true : false );

    } else {

      $( '#radio-oz-stop' ).prop( 'checked', true );

    }

    if ( restart !== null && restart.trim() !== '' ) {

      $( '#radio-oz-restart' ).prop( 'checked', restart == 'true' ? true : false );

    }

    if ( increase !== null && increase.trim() !== '' ) {

      $( '#radio-oz-increase' ).prop( 'checked', increase == 'true' ? true : false );

    }

    if ( sound !== null && sound.trim() !== '' ) {

      $( '#edt-audio option' ).filter( function () {
        return $(this).text() === sound;
      } ).prop( 'selected', true );

    }

    if ( soundRepeat !== null && soundRepeat.trim() !== '' ) {

      $( '#chk-audio-repeat' ).prop( 'checked', soundRepeat );

    }

    if ( alarmTitle !== null && alarmTitle.trim() !== '' ) {

      $( '#edt-title' ).val( alarmTitle );

    }

    // if ( hour != '00' || minute != '00' || second != '00' ) {

    //   if ( countdown == 'true' ) {

    //     $( '#lbl-title' ).text( 'Set timer for ' + hour + ':' + minute + ':' + second );

    //   } else if ( countTill == 'true' ) {

    //     if ( ! oactIsDateTimePast( date + ' ' + time ) ) {

    //       $( '#lbl-title' ).text( 'Set timer till ' + oactConvertTime( time ) + ', ' + oactReorderDate( date ) );

    //     }

    //   }

    // }

  } );

  /**
   * # Form group
   */
  $( '#group-dt-radio' ).on( 'change', '#radio-countdown, #radio-date', function() {

    if ( $( '#radio-countdown' ).is(':checked') ) {
      $( '#group-countdown, #group-on-zero' ).show();
      $( '#group-date' ).hide();
    }

    if ( $( '#radio-date' ).is(':checked') ) {
      $( '#group-countdown, #group-on-zero' ).hide();
      $( '#group-date' ).show();
    }

  } );

  /**
   * # Save timer
   */
  $( '#btn-start-timer' ).on( 'click', function (e) {

    e.preventDefault();

    var countdown = $( '#radio-countdown' ).prop( 'checked' );
    var countTill = $( '#radio-date' ).prop( 'checked' );
    var hour = $( '#edt-hour' ).val();
    var minute = $( '#edt-minute' ).val();
    var second = $( '#edt-second' ).val();
    var date = $( '#edt-date-input' ).val();
    var time = $( '#edt-time-input' ).val();
    var stopTimer = $( '#radio-oz-stop' ).prop( 'checked' );
    var restart = $( '#radio-oz-restart' ).prop( 'checked' );
    var increase = $( '#radio-oz-increase' ).prop( 'checked' );
    var currSound = $( '#edt-audio' ).val();
    var soundUrl = oactObj.pluginUrl+'/assets/sound/'+currSound+'.mp3';
    var soundRepeat = $( '#chk-audio-repeat' ).prop('checked');
    var alarmTitle = $( '#edt-title' ).val();

    localStorage.setItem( 'timerCountdown', countdown );
    localStorage.setItem( 'timerCountTill', countTill );
    localStorage.setItem( 'timerHour', hour );
    localStorage.setItem( 'timerMinute', minute );
    localStorage.setItem( 'timerSecond', second );
    localStorage.setItem( 'timerDate', date );
    localStorage.setItem( 'timerTime', time );
    localStorage.setItem( 'timerStopTimer', stopTimer );
    localStorage.setItem( 'timerRestart', restart );
    localStorage.setItem( 'timerIncrease', increase );
    localStorage.setItem( 'timerSound', currSound );
    localStorage.setItem( 'timerSoundUrl', soundUrl );
    localStorage.setItem( 'timerSoundRepeat', soundRepeat );
    localStorage.setItem( 'timerAlarmTitle', alarmTitle );

    localStorage.removeItem( 'timerPaused' );

    if ( countdownInterval ) {

      clearInterval( countdownInterval );
      countdownInterval = null;

    }

    $( '#btn-resume' ).trigger( 'click' );

  } );

  /**
   * # Start timer
   */
  var countdownInterval = null;
  var countTillInterval = null;
  var pausedInterval = null;

  $( '#btn-resume' ).on( 'click', function (e) {

    e.preventDefault();

    $( '#btn-edit' ).removeClass( 'btn-alt3' ).addClass( 'btn-primary' ).text( 'Edit Timer' );

    var countdown = localStorage.getItem( 'timerCountdown' );
    var countTill = localStorage.getItem( 'timerCountTill' );
    var hour = localStorage.getItem( 'timerHour' );
    var minute = localStorage.getItem( 'timerMinute' );
    var second = localStorage.getItem( 'timerSecond' );
    var date = localStorage.getItem( 'timerDate' );
    var time = localStorage.getItem( 'timerTime' );
    var soundUrl = localStorage.getItem( 'timerSoundUrl' );
    var soundRepeat = localStorage.getItem( 'timerSoundRepeat' );
    var alarmTitle = localStorage.getItem( 'timerAlarmTitle' );
    var paused = localStorage.getItem( 'timerPaused' );

    if ( countUpTimer ) {

      clearInterval( countUpTimer );
      countUpTimer = null;

    }

    /**
     * # Start timer --> resume countdown
     */
    if ( paused !== null && paused.trim() !== '' ) {

      console.log('yes');

      var parts = paused.split(":").map(Number);

      pausedInterval = setInterval( function () {

        parts[parts.length - 1]--;

        for ( var i = parts.length - 1; i > 0; i-- ) {

          if ( parts[i] < 0 ) {

            parts[i] += (i === parts.length - 1) ? 60 : 24;
            parts[i - 1]--;

          }

        }

        if ( parts[0] === 0 && parts.every( part => part === 0 ) ) {

          clearInterval( pausedInterval );

          $("#lbl-time").text( "00:00:00" );

          // Blink title
          var blink = true;

          function oactUpdateTitle() {
            var newTitle = blink ? '*** ' + paused + ' ***' : currTitle;
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

          $( '#lbl-dialog-alarm-time' ).text( paused );
          $( '#lbl-dialog-alarm-title' ).text( alarmTitle );

          return;

        }

        var formattedTime = parts.map( part => part.toString().padStart(2, '0') ).join(":");
        $( "#lbl-time" ).text( formattedTime );

      }, 1000);

    /**
     * # Start timer --> countdown
     */
    } else if ( countdown == 'true' ) {

      var totalSeconds = ( Number(hour) * 60 * 60 ) + ( Number(minute) * 60 ) + Number(second);

      countdownInterval = setInterval( function () {

        if ( totalSeconds <= 0 ) {

          clearInterval( countdownInterval );

          $( '#lbl-time' ).text( '00:00:00' );

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

        $("#lbl-time").text( formattedTime );

        totalSeconds--;

      }, 1000 );

    /**
     * # Start timer --> countdown till time, date
     */
    } else if ( countTill == 'true' ) {

      var targetDateTimeStr = date + ' ' + time;
      var targetDateTime = new Date( targetDateTimeStr );

      if ( ! oactIsDateTimePast( targetDateTimeStr ) ) {

        countTillInterval = setInterval( function () {

          var currentTime = new Date();
          var timeDifference = targetDateTime - currentTime;

          if ( timeDifference <= 0 ) {

            clearInterval( countTillInterval );

            $( "#lbl-time" ).text( "00:00:00" );

            var alarmDateTime = oactConvertTime( time ) + ', ' + oactReorderDate( date );

            // Blink title
            var blink = true;

            function oactUpdateTitle() {
              var newTitle = blink ? '*** ' + alarmDateTime + ' ***' : currTitle;
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

            $( '#lbl-dialog-alarm-time' ).text( alarmDateTime );
            $( '#lbl-dialog-alarm-title' ).text( alarmTitle );

            return;

          }

          var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
          var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

          var formattedTime =
            (days < 10 ? "0" : "") + days + ":" +
            (hours < 10 ? "0" : "") + hours + ":" +
            (minutes < 10 ? "0" : "") + minutes + ":" +
            (seconds < 10 ? "0" : "") + seconds;

          $( "#lbl-time" ).text( formattedTime );

        }, 1000 );

      } else {

        $( "#lbl-title" ).text( 'Alarm time has passed.' );

      }

    }

    $( '#btn-resume' ).hide();
    $( '#btn-reset, #btn-pause' ).show();

  } );

  /**
   * # Stop timer
   */
  $( '#btn-pause' ).on( 'click', function (e) {

    e.preventDefault();

    if ( countUpTimer ) {

      clearInterval( countUpTimer );
      countUpTimer = null;
      $( '#lbl-time' ).text( '00:00:00' );

    }

    if ( countdownInterval ) {

      clearInterval( countdownInterval );
      countdownInterval = null;

    }

    if ( countTillInterval ) {

      clearInterval( countTillInterval );
      countTillInterval = null;

    }

    if ( pausedInterval ) {

      clearInterval( pausedInterval );
      pausedInterval = null;

    }

    var paused = $( '#lbl-time' ).text();

    if ( paused != '00:00:00' || paused == '00:00:00:00' ) {

      localStorage.setItem( 'timerPaused', paused );

    } else {

      localStorage.removeItem( 'timerPaused' );

    }

    $( '#btn-pause' ).hide();
    $( '#btn-resume' ).show();

  } );

  /**
   * # Reset timer
   */
  $( '#btn-reset' ).on( 'click', function (e) {

    e.preventDefault();

    if ( countUpTimer ) {

      clearInterval( countUpTimer );
      countUpTimer = null;

    }

    if ( countdownInterval ) {

      clearInterval( countdownInterval );
      countdownInterval = null;

    }

    if ( countTillInterval ) {

      clearInterval( countTillInterval );
      countTillInterval = null;

    }

    $( '#lbl-time' ).text( '00:00:00' );
    localStorage.removeItem( 'timerPaused' );

  } );

  /**
   * # Set alarm with links
   */
  $( '#pnl-links' ).on( 'click', 'a', function (e) {

    e.preventDefault();

    var alarmTimerText = $(this).text();
    var hour = '00';
    var minute = '00';
    var second = '00';

    localStorage.setItem( 'timerHour', hour );
    localStorage.setItem( 'timerMinute', minute );
    localStorage.setItem( 'timerSecond', second );

    alarmTimer = alarmTimerText.replace( ' Timer', '' );

    // Countdown
    $( '#radio-countdown' ).prop( 'checked', true );
    $( '#group-countdown, #group-on-zero' ).show();
    $( '#group-date' ).hide();

    // Stop timer
    $( '#radio-oz-stop' ).prop( 'checked', true );

    // Second
    if ( alarmTimer.indexOf( 'Second' ) !== -1 ) {

      var second = alarmTimer.replace( ' Second', '' );
      second = ( second < 10 ? '0' : '' ) + second;
      localStorage.setItem( 'timerSecond', second );

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
      localStorage.setItem( 'timerMinute', minute );

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
      localStorage.setItem( 'timerHour', hour );

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

    if ( countUpTimer ) {

      clearInterval( countUpTimer );
      countUpTimer = null;

    }

    if ( countdownInterval ) {

      clearInterval( countdownInterval );
      countdownInterval = null;

    }

    if ( countTillInterval ) {

      clearInterval( countTillInterval );
      countTillInterval = null;

    }

    if ( pausedInterval ) {

      clearInterval( pausedInterval );
      pausedInterval = null;

    }

    $( '#lbl-title' ).data( 'timer', alarmTimer ).text( alarmTimerText );
    $( '#lbl-time' ).text( hour + ':' + minute + ':' + second );
    $( '#btn-edit' ).removeClass( 'btn-alt3' ).addClass( 'btn-primary' ).text( 'Edit Timer' );
    $( '#btn-reset, #btn-resume' ).show();

    $( 'html, body' ).animate( { scrollTop: 0 } );

  } );

  /**
   * # Close set timer dialog
   */
  $( '#form-timer' ).on( 'click', '.close, #btn-cancel, #btn-start-timer', function (e) {

    e.preventDefault();

    if ( $('#audio-pause-icon:visible').length > 0 ) {

      if ( audio ) {
        audio.pause();
        audio.currentTime = 0;
      }

      $( '#audio-pause-icon' ).hide();
      $( '#audio-play-icon' ).show();

    }

    $( '#form-timer' ).toggleClass( 'in' ).hide();

  } );

  /**
   * # Close alarm dialog
   */
  $( '#dialog-alarm' ).on( 'click', '.close, .btn', function (e) {

    var countdown = localStorage.getItem( 'timerCountdown', countdown );
    var stopTimer = localStorage.getItem( 'timerStopTimer', stopTimer );
    var restart = localStorage.getItem( 'timerRestart', restart );
    var increase = localStorage.getItem( 'timerIncrease', increase );

    $( '#dialog-alarm' ).toggleClass( 'in' ).hide();
    $( '#lbl-dialog-alarm-time' ).text('');
    $( '#lbl-dialog-alarm-title' ).text('');

    clearInterval( blinkTitle );
    document.title = currTitle;

    if ( audio ) {
      audio.pause();
      audio.currentTime = 0;
    }

    if ( countdown == 'true' && restart == 'true' ) {

      $( '#btn-resume' ).trigger( 'click' );

    } else if ( countdown == 'true' && increase == 'true' ) {

      if ( countUpTimer ) {

        clearInterval( countUpTimer );
        countUpTimer = null;

      }

      // Get the timer element
      var timerElement = $( '#lbl-time' );

      // Store the start time
      var startTime = new Date();

      // Update the timer every second
      countUpTimer = setInterval( function() {

        var currentTime = new Date();
        var timeDifference = currentTime - startTime;

        // Calculate hours, minutes, and seconds
        var hours = Math.floor( timeDifference / (60 * 60 * 1000) );
        var minutes = Math.floor( (timeDifference % (60 * 60 * 1000)) / (60 * 1000) );
        var seconds = Math.floor( (timeDifference % (60 * 1000)) / 1000 );

        // Format the time as "00:00:00"
        var formattedTime =
            (hours < 10 ? "0" : "") + hours + ":" +
            (minutes < 10 ? "0" : "") + minutes + ":" +
            (seconds < 10 ? "0" : "") + seconds;

        // Update the timer element
        timerElement.text( formattedTime );

      }, 1000 ); // Update every 1000ms (1 second)

    } else {

      $( '#btn-pause' ).trigger( 'click' );

    }


  } );

} )( jQuery );
