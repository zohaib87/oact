/**
 * # Time Js Start
 */
( function ($) {

  /**
   * # Live time and date
   */
  oactUpdateTime();
  setInterval( oactUpdateTime, 1000 );

  /**
   * # Add clock
   */
  $( '#btn-add-clock' ).on( 'click', function (e) {

    e.preventDefault();

    $( '#form-edit' ).toggleClass('in').show();

  } );

  $( '#form-edit' ).on( 'click', '.close, #btn-cancel', function (e) {

    e.preventDefault();

    $( '#form-edit' ).toggleClass('in').hide();

  } );

  /**
   * # Dropdown
   */
  $( '#row-clocks' ).on( 'click', '.dropdown-toggle', function (e) {

    e.preventDefault();

    $(this).attr( 'aria-expanded', 'true' ).parent().toggleClass('open');

  } );

  $( document ).on( 'click', function (e) {

    if ( ! $( e.target ).hasClass( 'dropdown-toggle' ) && e.which === 1 ) {

      $( '.dropdown-toggle' ).closest('.dropdown.open')
        .toggleClass('open')
        .find('.dropdown-toggle')
        .attr( 'aria-expanded', 'false' );

    }

  } );

  /**
   * # Dropdown --> Edit
   */
  $( '#row-clocks' ).on( 'click', '.pm-edit', function () {

    $( '#edit-clock' ).toggleClass('in').show();

    var currElem = $(this).closest( '.col-sm-4' );
    var title = currElem.find( '.title' ).text();
    var key = currElem.find( '.title' ).data( 'key' );
    var country = currElem.find( '.clock-body' ).data( 'country' );
    var timezoneName = currElem.find( '.clock-body' ).data( 'tz-name' );

    $( '#edit-clock #edt-country' ).val( country ).trigger( 'change' );

    $( '#edit-clock #edt-time-zone option' ).filter( function () {

      return $(this).text() === timezoneName;

    } ).prop( 'selected', true );

    $( '#edit-clock #edt-title' ).val( title );
    $( '#edit-clock #edt-title' ).data( 'key', key );

  } );

  $( '#edit-clock' ).on( 'click', '#btn-cancel, .close', function () {

    $( '#edit-clock' ).toggleClass('in').hide();

  } );

  /**
   * # Dropdown --> Save edit
   */
  $( '#edit-clock' ).on( 'click', '#btn-ok', function () {

    var key = $( '#edit-clock #edt-title' ).data( 'key' );
    var country = $( '#edit-clock #edt-country' ).val();
    var timezone = $( '#edit-clock #edt-time-zone' ).val();
    var newTitle = $( '#edit-clock #edt-title' ).val();
    var clocks = JSON.parse( localStorage.getItem( 'clocks' ) );

    if ( clocks !== null && Array.isArray( clocks ) && clocks.length > 0 ) {

      clocks[key].title = newTitle;
      clocks[key].countryCode = country;
      clocks[key].timezone = timezone;

      localStorage.setItem( 'clocks', JSON.stringify(clocks) );

    }

    var element = $( '.title[data-key="'+key+'"]' ).closest( '.col-sm-4' );
    element.replaceWith( oactAddClock( newTitle, key, country, timezone ) );

    $( '#edit-clock' ).toggleClass('in').hide();

  } );

  /**
   * # Dropdown --> Move to top
   */
  $( '#row-clocks' ).on( 'click', '.pm-move-top', function () {

    var currElem = $(this).closest( '.col-sm-4' );
    var title = currElem.find( '.title' ).text();
    var clocks = JSON.parse( localStorage.getItem( 'clocks' ) );

    if ( clocks !== null && Array.isArray( clocks ) && clocks.length > 0 ) {

      $.each( clocks, function ( index, element ) {

        if ( element && element.title == title ) {

          oactMoveObjItem( clocks, index, 0 );

        }

      } );

      localStorage.setItem( 'clocks', JSON.stringify(clocks) );

    }

    currElem.detach().prependTo( '#row-clocks' );

  } );

  /**
   * # Dropdown --> Move up
   */
  $( '#row-clocks' ).on( 'click', '.pm-move-up', function () {

    var currElem = $(this).closest( '.col-sm-4' );
    var title = currElem.find( '.title' ).text();
    var clocks = JSON.parse( localStorage.getItem( 'clocks' ) );
    var prevItem = null;

    if ( clocks !== null && Array.isArray( clocks ) && clocks.length > 0 ) {

      $.each( clocks, function ( index, element ) {

        if ( element && element.title == title ) {

          prevItem = Number(index) - 1;
          oactMoveObjItem( clocks, index, prevItem );

        }

      } );

      localStorage.setItem( 'clocks', JSON.stringify(clocks) );

    }

    oactMoveUp( currElem );

  } );

  /**
   * # Dropdown --> Move down
   */
  $( '#row-clocks' ).on( 'click', '.pm-move-down', function () {

    var currElem = $(this).closest( '.col-sm-4' );
    var title = currElem.find( '.title' ).text();
    var clocks = JSON.parse( localStorage.getItem( 'clocks' ) );
    var nextItem = null;

    if ( clocks !== null && Array.isArray( clocks ) && clocks.length > 0 ) {

      $.each( clocks, function ( index, element ) {

        if ( element && element.title == title ) {

          nextItem = Number(index) + 1;
          oactMoveObjItem( clocks, index, nextItem );

        }

      } );

      localStorage.setItem( 'clocks', JSON.stringify(clocks) );

    }

    oactMoveDown( currElem );

  } );

  /**
   * # Load clocks
   */
  $( document ).on( 'ready', function (e) {

    e.preventDefault();

    var clocks = JSON.parse( localStorage.getItem( 'clocks' ) );

    if ( clocks !== null && Array.isArray( clocks ) && clocks.length > 0 ) {

      $.each( clocks, function ( index, element ) {

        if ( element ) {

          $( '#col-add-clock' ).before( oactAddClock( element.title, index, element.countryCode, element.timezone, element.timezoneName ) );

        }

      } );

    }

  } );

  /**
   * # Delete clock
   */
  $( '#row-clocks' ).on( 'click', '.pm-delete', function () {

    var clocks = JSON.parse( localStorage.getItem( 'clocks' ) );
    var title = $(this).closest( '.col-sm-4' ).find( '.title' ).text();

    if ( clocks !== null && Array.isArray( clocks ) && clocks.length > 0 ) {

      $.each( clocks, function ( index, element ) {

        if ( element && element.title == title.trim() ) {

          oactUnsetProperty( clocks, index );

        }

      } );

      // Remove null items
      clocks = clocks.filter( function( item ) {

        if ( item === null ) {

          return false; // Remove null items

        }

        // Check if the object has null properties
        for ( var key in item ) {

          if ( item[key] === null ) {

            return false; // Remove objects with null properties

          }

        }

        return true; // Keep non-null objects

      } );

    }

    if ( clocks.length > 0 ) {

      localStorage.setItem( 'clocks', JSON.stringify(clocks) );

    } else {

      localStorage.removeItem( 'clocks' );

    }

    $(this).closest( '.col-sm-4' ).remove();

  } );

  /**
   * # Save clock
   */
  $( '#btn-ok' ).on( 'click', function (e) {

    e.preventDefault();

    var country = $( '#edt-country' ).val();
    var timezone = $( '#edt-time-zone' ).val();
    var timezoneName = $( '#edt-time-zone option:selected' ).text();
    var title = $( '#edt-title' ).val();
    var clocks = JSON.parse( localStorage.getItem( 'clocks' ) );

    if ( clocks !== null && Array.isArray( clocks ) && clocks.length > 0 ) {

      clocks.push( {
        title: title,
        countryCode: country,
        timezone: timezone,
        timezoneName: timezoneName
      } );

    } else {

      clocks = [
        {
          title: title,
          countryCode: country,
          timezone: timezone,
          timezoneName: timezoneName
        }
      ];

    }

    localStorage.setItem( 'clocks', JSON.stringify(clocks) );

    var key = Number(clocks.length) - 1;

    $( '#col-add-clock' ).before( oactAddClock( title, key, country, timezone, timezoneName ) );
    $( '#edt-title' ).val('');
    $( '#form-edit' ).toggleClass('in').hide();

  } );

  /**
   * # Live clocks
   */
  setInterval( function () {

    var timezone;
    var timeArray;
    var time;

    $( '.clock-body' ).each( function () {

      timezone = $(this).data( 'tz' );
      time = oactGetCurrentTime( timezone );
      timeArray = time.split( ', ' );
      time = timeArray[1];

      $(this).find( '.digit' ).text( time );

    } );

  }, 1000 );

  /**
   * # Populate timezones
   */
  function oactGetTimezones( country, timezoneElement ) {

    var selectedCountryCode = country;

    if ( selectedCountryCode ) {

      var timezones = moment.tz.zonesForCountry( selectedCountryCode );
      timezoneElement.html('');

      $.each( timezones, function( _, timezone ) {

        var formattedOffset = moment.tz(timezone).format('Z');
        var parts = timezone.split('/');
        var formattedTimezone = parts[parts.length - 1].replace(/[_-]/g, ' ');
        var optionText = `(UTC ${formattedOffset}) ${formattedTimezone}`;

        var hourDiff = formattedOffset.replace(/-0/, '-');
        hourDiff = hourDiff.replace(/:00$/, '');

        var option = $('<option>', {
          value: hourDiff,
          text: optionText
        });

        timezoneElement.append( option );

      } );

      timezoneElement.prop( 'disabled', false );

    } else {

      timezoneElement.prop( 'disabled', true );

    }

  }

  $( document ).on( 'ready', function (e) {

    oactGetTimezones( $( '#form-edit #edt-country' ).val(), $( '#form-edit #edt-time-zone' ) );

  } );

  $( '#form-edit, #edit-clock' ).on( 'change', '#edt-country', function () {

    oactGetTimezones( $(this).val(), $(this).closest( '.in' ).find( '#edt-time-zone' ) );

  } );

} )( jQuery );
