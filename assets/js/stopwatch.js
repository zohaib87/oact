/**
 * # Stopwatch Js Start
 */
( function ($) {

  var stopwatch = null; // Variable to store the setInterval reference
  var milisec = '00'; // Initial value for milliseconds
  var startTime = 0;

  // Function to update the stopwatch display
  function updateStopwatch() {

    var currentTime = new Date().getTime() - startTime;
    var minutes = Math.floor( currentTime / 60000 );
    var seconds = Math.floor( (currentTime % 60000 ) / 1000);
    var milliseconds = currentTime % 1000;

    // milisec = $( '#select-format-time' ).val();

    // Format the time values with leading zeros
    var displayTime = ( '0' + minutes ).slice(-2) + ':' + ('0' + seconds).slice(-2);

    // Check if milisec is '000', '00', '0', or null and update the display accordingly
    if ( milisec == '000' ) {

      $( '#lbl-msec' ).text( milliseconds );

    } else if ( milisec == '00' ) {

      $( '#lbl-msec' ).text( milliseconds.toString().slice(-2) );

    } else if ( milisec == '0' ) {

      $( '#lbl-msec' ).text( milliseconds.toString().slice( 0, -2) );

    } else {

      $( '#lbl-msec' ).text('');

    }

    $( '#lbl-time' ).text( displayTime );

  }

  /**
   * # Start
   */
  var running = false;

  $( '#btn-start' ).on( 'click', function (e) {

    e.preventDefault();

    if ( ! running ) {

      startTime = new Date().getTime() - ( parseInt($('#lbl-time').text().split(':')[0]) * 60000 + parseInt($('#lbl-time').text().split(':')[1]) * 1000 );

      stopwatch = setInterval( updateStopwatch, 10 ); // Update every 10 milliseconds
      running = true;

    }

    $( '#btn-reset, #btn-start' ).hide();
    $( '#btn-lap, #btn-stop' ).show();

  } );

  /**
   * # Reset
   */
  $( '#btn-reset' ).on( 'click', function (e) {

    e.preventDefault();

    if ( stopwatch ) {

      clearInterval( stopwatch );
      stopwatch = null;
      running = false;
      startTime = 0;

    }

    $( '#lbl-time' ).text( '00:00' );
    $( '#lbl-msec' ).text( '00' );
    $( '#tbl-laps tbody' ).html( '' );
    $( '#row-laps' ).hide();

  } );

  /**
   * # Lap
   */
  var srNo = 1;

  $( '#btn-lap' ).on( 'click', function (e) {

    e.preventDefault();

    var time = $( '#lbl-time' ).text();
    var msec = $( '#lbl-msec' ).text();
    var rowCount = $( '#tbl-laps tbody tr' ).length;
    srNo = Number(rowCount) + 1

    if ( time == '00:00' && ( msec == '000' || msec == '00' || msec == '0' || msec == '' ) ) return false;
    if ( msec == '' ) msec = '000';

    var time1 = time + ':' + msec;
    var timeDiff = 0;

    if ( rowCount == 0 ) {

      timeDiff = time1;

    } else {

      var time2 = $( '#tbl-laps tbody tr:first-child .time-diff' ).text();
      timeDiff = oactTimeDiff( time1, time2 );

    }

    $( '#tbl-laps tbody' ).prepend( '<tr class="digit font-digit">'+
      '<td>'+srNo+'</td>'+
      '<td class="time-diff">'+timeDiff+'</td>'+
      '<td>'+time1+'</td>'+
    '</tr>' );

    $( '#row-laps' ).show();

  } );

  /**
   * # Stop
   */
  $( '#btn-stop' ).on( 'click', function (e) {

    e.preventDefault();

    if ( stopwatch ) {

      clearInterval( stopwatch );
      stopwatch = null;
      running = false;

    }

    // clearInterval(stopwatch);
    // running = false;

    $( '#btn-lap, #btn-stop' ).hide();
    $( '#btn-reset, #btn-start' ).show();

  } );

} )( jQuery );
