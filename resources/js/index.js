require('./maps.js')

$(document).ready( function($) {
  $('.slides').each( function() {
    $(this).flickity({
      cellAlign: 'left',
      contain: true,
      prevNextButtons: false,
      pageDots: false,
      imagesLoaded: true
    })
  })

  $('.slides-caption').each( function() {
    const self = $(this)
    $(this).flickity({
      cellAlign: 'left',
      prevNextButtons: false,
      imagesLoaded: true,
      asNavFor: '.' + self.data('nav-for'),
      contain: true,
      pageDots: false,
      fade: true
    })
  })

  $('.slider-wrapper .slider-next').on( 'click', function() {
    $('.' + $(this).data('nav-for')).flickity('next')
  })

  $('.slides').on( 'change.flickity', function( event, index ) {
    const el = '#slides-wrapper-' + event.target.id
    $(el + ' .dot.active').removeClass('active')
    $(el + ' .dot[data-slide="' + index + '"]').addClass('active')
  })

  $('.slider-wrapper .dot, .testimonial .dot').on( 'click', function() {
    $('.' + $(this).data('nav-for')).flickity('select', $(this).data('slide'))
  })

  $('.accordion .toggle').click( function() {
    $(this).parent().toggleClass('accordion--active')
  })

  $('.select-wrapper .current, .select-wrapper .list-item').click( function() {
    $(this).closest('.select-wrapper').toggleClass('select-wrapper--active')
    if($(this).hasClass('.list-item')) {
      $(this).closest('.current span').text($(this).innerHTML())
    }
  })

  $('.select-wrapper.js-filter .list-item').click( function() {
    const currentDepartment = $(this).data('id').toString()

    $('.employee').each( function() {
      const employeeDepartments = $(this).data('departments').toString()

      if(employeeDepartments.includes(currentDepartment) || currentDepartment === 'all') {
        $(this).show()
      } else {
        $(this).hide()
      }
    })

    $(this).parent().siblings('.current span').text($(this).text())
  })

  $('.select-wrapper .current .tag').click( function(e) {
    e.stopPropagation()
  })

  $('.svg-to-top').click( function() {
    $('html, body').animate({ scrollTop: 0 }, 800);
  })

  $(window).on('resize load', function() {
    const distance = $('footer').height() - $('footer .author').height()
    if($('.single-post').length > 0) {
      $('.component').removeClass('is-last')
      return
    }

    if($('.component-has-bg.is-last').length > 0 && $('.single-post').length === 0) {
      if($( window ).width() > 991) {
        $('.is-last').css({
          'margin-bottom': `-${distance}px`,
          'padding-bottom': `${distance + 200}px`
        })
      } else {
        $('.is-last').css({
          'margin-bottom': '0',
          'padding-bottom': '200px'
        })      
      }
    }

    if($('.tiles.is-last').length > 0) {
      if($( window ).width() > 991) {
        $('.tiles.is-last').css({
          'margin-bottom': `-${distance}px`,
          'padding-bottom': `0px`
        })
      
        $('.tiles.is-last .tile:last-of-type .image').css({
          'height': `calc(50vw * .665 + ${distance}px)`
        })
      
        $('.tiles.is-last .tile:last-of-type .icon').css({
          'top': `calc(50% - ${ distance / 2 }px)`
        })
      
        $('.tiles.is-last .tile:last-of-type .body > div').css({
          'transform': `translateY(-${ distance / 2 }px)`
        })
      } else {
        $('.tiles.is-last .tile:last-of-type .image').css({
          'height': `calc(50vw * .665)`
        })
      
        $('.tiles.is-last .tile:last-of-type .icon').css({
          'top': `50%`
        })

        $('.tiles.is-last').css({
          'margin-bottom': '0',
          'padding-bottom': '0'
        })      
      }
    } else {
      $('.is-last').css({
        'margin-bottom': `-${distance}px`,
        'padding-bottom': `${distance + 200}px`
      })
    }
  })
  
  if($('.archive-modules').length > 0) {
    const urlParams = new URLSearchParams(window.location.search);
    if(urlParams.get('type') || urlParams.get('tags')) {
      $('html, body').animate({
        scrollTop: $("#archive-modules").offset().top
    }, 0);
    }
  }

  $('.inquiry-toggle').click( function(e) {
    e.preventDefault()
    $('.inquiry-modal').toggleClass('d-none d-flex')
  })

  $('.presentation-toggle').click( function(e) {
    e.preventDefault()
    $('.presentation-modal').toggleClass('d-none d-flex')
  })

  $('.mobile-nav-toggle').click( function() {
    $('.mobile-nav').toggleClass('d-none d-block')
  })

  var image = document.getElementsByClassName('hero-img');
  new simpleParallax(image);
})
