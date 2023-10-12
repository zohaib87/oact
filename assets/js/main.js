/**
 * # Main Js Start
 */
( function ($) {

  /**
   * # Convert time from 12 to 24 hours
   *
   * @param {string}  timeString  Time in 12 hour format
   *
   * @return {string}   time in 24 hours format
   */
  window.convertTimeTo24 = function ( timeString ) {

    // Create a Date object with the input time
    var date = new Date( "January 1, 1970 " + timeString );

    // Format the time in 24-hour format
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();

    // Ensure the hours, minutes, and seconds have two digits
    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    seconds = (seconds < 10) ? "0" + seconds : seconds;

    // The resulting 24-hour time
    return hours + ":" + minutes + ":" + seconds;

  };

  /**
   * # Live time and date for alarm and live time pages
   */
  window.oactUpdateTime = function () {

    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var ampm = hours >= 12 ? 'PM' : 'AM';

    var timeFormat = $( '#switch-12hour' ).prop( 'checked' );

    var timeString24 = hours + ':' + ( minutes < 10 ? '0' + minutes : minutes ) + ':' + ( seconds < 10 ? '0' + seconds : seconds );

    hours = hours % 12;
    hours = hours ? hours : 12; // Handle midnight (0 hours)

    var timeString = hours + ':' + ( minutes < 10 ? '0' + minutes : minutes ) + ':' + ( seconds < 10 ? '0' + seconds : seconds );

    $( '#lbl-time' ).text( ( timeFormat == true ) ? timeString : timeString24 );
    $( '#lbl-noon' ).text( ( timeFormat == true ) ? ampm : '' );

    var daysOfWeek = [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' ];
    var monthsOfYear = [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ];

    var dateString = daysOfWeek[ now.getDay() ] + ' - ' + monthsOfYear[ now.getMonth() ] + ' ' + now.getDate() + ', ' + now.getFullYear();

    $( '#lbl-date' ).text( dateString );

  };

  /**
   * # Convert time from 24 hours to 12 hours
   *
   * @param {string}  time  24 hour time
   *
   * @return {string}  12 hours time
   */
  window.oactConvertTime = function ( time ) {

    var timeArray = time.split(":");
    var hours = parseInt(timeArray[0]);
    var minutes = parseInt(timeArray[1]);
    var period = hours >= 12 ? "PM" : "AM";

    if ( hours > 12 ) {
      hours -= 12;
    }

    var convertedTime =
      (hours < 10 ? "0" : "") + hours + ":" +
      (minutes < 10 ? "0" : "") + minutes + " " + period;

    return convertedTime;

  };

  /**
   * # Reorder date
   *
   * @param {string}  date  Date that needs to be reordered e.g: 2023-08-01
   *
   * @returns {string}  Reordered date e.g: 01-08-2023
   */
  window.oactReorderDate = function ( date ) {

    if ( date != '' ) {

      date = date.split('-');
      date = date[2]+'-'+date[1]+'-'+date[0];

    }

    return date;

  };

  /**
   * # Check if date time is past
   *
   * @param {string}  targetDateTime  Date time in 'YYYY-MM-DD HH:mm' format
   *
   * @returns {bool}  true or false
   */
  window.oactIsDateTimePast = function ( targetDateTime ) {

    var currentDateTime = new Date();
    var targetDate = new Date( targetDateTime );

    return targetDate < currentDateTime;

  }

  /**
   * # Get date time by timezone
   *
   * @param {string}  timezone  Timezone from UTC e.g: -4
   *
   * @returns {string} Date time in '8/28/2023, 7:29:03 AM' format
   *
   * @link https://www.dhairyashah.dev/posts/how-to-get-the-current-date-time-of-other-countries-in-javascript/
   */
  window.oactGetCurrentTime = function ( timezone ) {

    var date = new Date();

    // Get local time and offset
    var localTime = date.getTime();
    var localOffset = date.getTimezoneOffset() * 60000;

    // Calculate UTC time
    var utc = localTime + localOffset;

    // Calculate the time for country
    var country = utc + ( 3600000 * timezone );

    // Get the current date and time
    var currentTime = new Date( country ).toLocaleString();

    return currentTime;

  }

  /**
   * # Check time difference
   *
   * @param {string}  dateTimeStr   Date time in '8/28/2023, 7:29:03 AM' format
   *
   * @return {string}   Time difference in 'Today, -9 H' format
   */
  window.oactDateTimeDiff = function ( dateTimeStr ) {

    var inputDateTime = new Date( dateTimeStr );

    var currentDate = new Date();
    var timeDifference = ( inputDateTime - currentDate ) / (1000 * 60 * 60); // Convert to hours

    var formattedTimeDifference = Math.trunc(timeDifference) + "H";

    if ( formattedTimeDifference.indexOf('-') === -1 ) {
      formattedTimeDifference = '+' + formattedTimeDifference;
    }

    var dayRelation = "";

    if ( inputDateTime.toDateString() === currentDate.toDateString() ) {

      dayRelation = "Today";

    } else if ( inputDateTime.toDateString() === new Date( currentDate.setDate(currentDate.getDate() - 1) ).toDateString() ) {

      dayRelation = "Yesterday";

    } else if ( inputDateTime.toDateString() === new Date( currentDate.setDate(currentDate.getDate() + 1) ).toDateString() ) {

      dayRelation = "Tomorrow";

    }

    return dayRelation + ' ' + formattedTimeDifference;

  }

  /**
   * # Add clock
   *
   * @param {string}  title     Title for the clock
   * @param {string}  key       Key of the item in object
   * @param {string}  country   Country code
   * @param {int}     timezone  Timezone from to UTC
   *
   * @returns {html}  Content of the clock element
   */
  window.oactAddClock = function ( title, key, country, timezone, timezoneName ) {

    var time = oactGetCurrentTime( timezone );
    var timeDiff = oactDateTimeDiff( time );

    var timeArray = time.split(', ');
    var date = timeArray[0];
    time = timeArray[1];

    title = ( title != '' ) ? title : '&nbsp;'; // add empty space if title is empty

    return '<div class="col-sm-4 col-md-3">'+
      '<div class="panel panel-default panel-heading-fullwidth">'+
        '<div class="panel-heading colored">'+
          '<div class="tools">'+
            '<span class="dropdown">'+
              '<span data-toggle="dropdown" class="icon ci-menu3 dropdown-toggle"></span>'+
              '<ul role="menu" class="dropdown-menu dropdown-menu-right dropdown-colored">'+
                '<li>'+
                  '<a href="javascript:;" class="pm-edit">Edit</a>'+
                '</li>'+
                '<li class="divider"></li>'+
                '<li>'+
                  '<a href="javascript:;" class="pm-move-top">Move to Top</a>'+
                '</li>'+
                '<li>'+
                  '<a href="javascript:;" class="pm-move-up">Move Up</a>'+
                '</li>'+
                '<li>'+
                  '<a href="javascript:;" class="pm-move-down">Move Down</a>'+
                '</li>'+
                '<li class="divider"></li>'+
                '<li>'+
                  '<a href="javascript:;" class="pm-delete">Delete</a>'+
                '</li>'+
              '</ul>'+
            '</span>'+
          '</div>'+
          '<a href="#." class="colored ext-link"><span class="title text-ellipsis" data-key="'+key+'">'+title+'</span></a>'+
        '</div>'+
        '<div class="panel-body clock-body" data-country="'+country+'" data-tz="'+timezone+'" data-tz-name="'+timezoneName+'">'+
          '<div class="colored digit text-nowrap text-center font-digit" style="font-size: 30px">'+time+'</div>'+
          '<div class="colored text-center" style="font-size: 16px">'+timeDiff+'</div>'+
        '</div>'+
      '</div>'+
    '</div>';

  }

  /**
   * # Calculate time difference
   *
   * @param {string}  time1   First time in mm:ss:ms format
   * @param {string}  time2   Second time in mm:ss:ms format
   *
   * @return {string} Time difference in mm:ss:ms format
   */
  window.oactTimeDiff = function ( time1, time2 ) {

    // Split the time strings into minutes, seconds, and milliseconds
    const [min1, sec1, ms1] = time1.split(':').map(Number);
    const [min2, sec2, ms2] = time2.split(':').map(Number);

    // Calculate the total milliseconds for each time
    const time1Millis = min1 * 60000 + sec1 * 1000 + ms1;
    const time2Millis = min2 * 60000 + sec2 * 1000 + ms2;

    // Calculate the difference in milliseconds
    const differenceMillis = time1Millis - time2Millis;

    // Convert the difference back to formatted time (mm:ss:ms)
    const minutes = Math.floor(differenceMillis / 60000);
    const seconds = Math.floor((differenceMillis % 60000) / 1000);
    const milliseconds = differenceMillis % 1000;

    return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}:${milliseconds.toString().padStart(3, '0')}`;

  }

  /**
   * # Unset object property
   *
   * @param {object}  obj       Object in the property is needed to be unset
   * @param {string}  property  Property of the object that needed to be unset
   */
  window.oactUnsetProperty = function( obj, property ) {

    if ( obj.hasOwnProperty(property) ) {

      delete obj[property];

    }

  }

  /**
   * # Move element up
   */
  window.oactMoveUp = function ( item ) {

    before = item.prev();
    item.insertBefore(before);

  }

  /**
   * # Move element down
   */
  window.oactMoveDown = function ( item ) {

    after = item.next();
    item.insertAfter(after);

  }

  /**
   * # Move item in object
   */
  window.oactMoveObjItem = function ( data, from, to ) {

    // remove `from` item and store it
    var f = data.splice(from, 1)[0];

    // insert stored item into position `to`
    data.splice( to, 0, f );

  }

	/**
   * # Toggle right sidebar
   */
  $( '.am-toggle-right-sidebar, #btn-options-close' ).on( 'click', function() {

    $( 'body' ).toggleClass( 'open-right-sidebar' );

  } );

  $( document ).on( 'click', function (e) {

    if ( $( e.target ).hasClass( 'am-toggle-right-sidebar' ) || $( e.target ).parent().hasClass( 'am-toggle-right-sidebar' ) || $( e.target ).closest('.am-right-sidebar').length > 0 ) {

      // do nothing...

    } else if ( e.which === 1 ) {

      $( 'body' ).removeClass( 'open-right-sidebar' );

    }

  } );

  /**
   * # Colors panel
   */
  $( '.panel-colors' ).on( 'click', '.btn-digit-color', function() {

    $( '.ci-checkmark-outline' ).toggleClass( 'ci-circle ci-checkmark-outline');

    if ( $(this).hasClass('ci-circle') ) {

      $(this).toggleClass( 'ci-circle ci-checkmark-outline');

    }

  } );

  /**
   * # Load settings
   */
  $( document ).on( 'ready', function () {

    var digitalFonts = localStorage.getItem( 'optDigitalFonts' );
    var twelveHour = localStorage.getItem( 'optTwelveHour' );
    var date = localStorage.getItem( 'optDate' );
    var color = localStorage.getItem( 'optColor' );
    var msec = localStorage.getItem( 'optMsec' );

    // Digital fonts
    if ( digitalFonts !== null && digitalFonts.trim() !== '' && digitalFonts == 'true' ) {

      $( '.digit' ).addClass( 'font-digit' );
      $( '#switch-digital' ).prop( 'checked', true );

    }

    // 12 or 24 time
    if ( twelveHour !== null && twelveHour.trim() !== '' && twelveHour == 'true' ) {

      $( '#switch-12hour' ).prop( 'checked', true );

    }

    // Show or hide date
    if ( date !== null && date.trim() !== '' && date == 'true' ) {

      $( '#lbl-date' ).show();
      $( '#switch-date' ).prop( 'checked', true );

    }

    // Color
    if ( color !== null && color.trim() !== '' ) {

      $( '.colored' ).css( 'color', color );

    }


    // Milliseconds
    if ( msec !== null && msec.trim() !== '' ) {

      $( '#lbl-msec' ).text( msec );
      // $( '#select-format-time' ).val( msec ).trigger( 'change' );
      $( '#select-format-time option[value="'+msec+'"]' ).prop( 'selected', true );

    }

  } );

  /**
   * # Check settings modification
   */
  $( '#tab0 .options' ).on( 'change click', function () {

    var digitalFonts = $( '#switch-digital' ).prop( 'checked' );
    var twelveHour = $( '#switch-12hour' ).prop( 'checked' );
    var date = $( '#switch-date' ).prop( 'checked' );
    var color = $( '.ci-checkmark-outline' ).data( 'color' );
    var msec = $( '#select-format-time' ).val();

    localStorage.setItem( 'optDigitalFonts', digitalFonts );
    localStorage.setItem( 'optTwelveHour', twelveHour );
    localStorage.setItem( 'optDate', date );
    localStorage.setItem( 'optColor', color );
    localStorage.setItem( 'optMsec', msec );

    // Digital fonts
    if ( digitalFonts == true ) {

      $( '.digit' ).addClass( 'font-digit' );

    } else {

      $( '.digit' ).removeClass( 'font-digit' );

    }

    // Show or hide date
    if ( date == true ) {

      $( '#lbl-date' ).show();

    } else {

      $( '#lbl-date' ).hide();

    }

    // Color
    $( '.colored' ).css( 'color', color );

    // Milliseconds
    $( '#lbl-msec' ).text( msec );

  } );

  /**
   * # Share button at top
   */
  $( '#btn-tool-share' ).on( 'click', function(e) {

    e.preventDefault();

    var targetElement = $( '#pnl-share' );

    // Set the hash fragment in the URL to the target element's ID
    if ( targetElement.length > 0 ) {

      window.location.hash = targetElement.attr('id');
      history.replaceState( '', document.title, window.location.pathname );

    }


  } );

  /**
   * # Fullscreen
   */
  $( '#btn-full-screen' ).on( 'click', function() {

    var fullscreenDiv = $( '#col-main' )[0]; // Get the raw DOM element
    var elements = $( '#row-alarm, #row-laps' ).detach();

    if ( document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement ) {

      $( '#col-main' ).closest('.row').after( elements );

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

  } else {

    $( '#col-main' ).append( elements );

    if ( fullscreenDiv.requestFullscreen ) {

      fullscreenDiv.requestFullscreen();

    } else if ( fullscreenDiv.mozRequestFullScreen ) { // Firefox

      fullscreenDiv.mozRequestFullScreen();

    } else if ( fullscreenDiv.webkitRequestFullscreen ) { // Chrome, Safari and Opera

      fullscreenDiv.webkitRequestFullscreen();

    } else if ( fullscreenDiv.msRequestFullscreen ) { // IE/Edge

      fullscreenDiv.msRequestFullscreen();

    }

    $( '#col-main' ).css( {
      'background-color': 'rgb(255, 255, 255)',
      'width': '100%',
      'height': '100%'
    } );

  }

  } );

  /**
   * # Left sidebar on mobile
   */
  $( '.am-toggle-left-sidebar' ).on( 'click', function (e) {

    e.preventDefault();

    $( 'body' ).toggleClass( 'open-left-sidebar' );

  } );

  /**
   * # Social share
   */
  $( '#facebook' ).on( 'click', function (e) {

    e.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Construct the Facebook share URL
    var facebookShareUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + currentUrl;

    // Open the Facebook share link in a popup window
    window.open(facebookShareUrl, 'Share on Facebook', 'width=600,height=400');

  });

  $('#twitter').on('click', function(event) {
    event.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Construct the Twitter share URL
    var twitterShareUrl = 'https://twitter.com/intent/tweet?url=' + currentUrl;

    // Open the Twitter share link in a popup window
    window.open(twitterShareUrl, 'Share on Twitter', 'width=600,height=400');
  });

  $('#whatsapp').on('click', function(event) {
    event.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Construct the WhatsApp share URL
    var whatsappShareUrl = 'https://api.whatsapp.com/send?text=' + currentUrl;

    // Open the WhatsApp share link in a popup window
    window.open(whatsappShareUrl, 'Share on WhatsApp', 'width=600,height=400');
  });

  $('#blogger').on('click', function(event) {
    event.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Construct the Blogger share URL
    var bloggerShareUrl = 'https://www.blogger.com/blog-this.g?u=' + currentUrl;

    // Open the Blogger share link in a popup window
    window.open(bloggerShareUrl, 'Share on Blogger', 'width=600,height=400');
  });

  $('#reddit').on('click', function(event) {
    event.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Construct the Reddit share URL
    var redditShareUrl = 'https://www.reddit.com/submit?url=' + currentUrl;

    // Open the Reddit share link in a popup window
    window.open(redditShareUrl, 'Share on Reddit', 'width=600,height=400');
  });

  $('#tumblr').on('click', function(event) {
    event.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Get the page title
    var pageTitle = encodeURIComponent(document.title);

    // Construct the Tumblr share URL
    var tumblrShareUrl = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=' + currentUrl + '&title=' + pageTitle;

    // Open the Tumblr share link in a popup window
    window.open(tumblrShareUrl, 'Share on Tumblr', 'width=600,height=400');
  });

  $('#pinterest').on('click', function(event) {
    event.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Get the page title
    var pageTitle = encodeURIComponent(document.title);

    // Construct the Pinterest share URL
    var pinterestShareUrl = 'https://www.pinterest.com/pin/create/button/?url=' + currentUrl + '&description=' + pageTitle;

    // Open the Pinterest share link in a popup window
    window.open(pinterestShareUrl, 'Share on Pinterest', 'width=600,height=400');
  });

  $('#linkedin').on('click', function(event) {
    event.preventDefault();

    // Get the current page URL
    var currentUrl = encodeURIComponent(window.location.href);

    // Get the page title
    var pageTitle = encodeURIComponent(document.title);

    // Construct the LinkedIn share URL
    var linkedinShareUrl = 'https://www.linkedin.com/shareArticle?mini=true&url=' + currentUrl + '&title=' + pageTitle;

    // Open the LinkedIn share link in a popup window
    window.open(linkedinShareUrl, 'Share on LinkedIn', 'width=600,height=400');
  });

} )( jQuery );
