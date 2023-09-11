      jQuery(document).ready(function() {
          const tooltipTriggerList = $('[data-bs-toggle="tooltip"]');
          const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        // container scroll animination
        wow = new WOW({
          boxClass: 'wow',
          animateClass: 'animated',
          offset: 50,
          mobile: true,
          live: true
        });
        wow.init();

        $(window).scroll(function() {
          if ($(this).scrollTop() > 150) {
            $('#back-to-top').fadeIn();
          } else {
            $('#back-to-top').fadeOut();
          }
        });

        $('#back-to-top').click(function(e) {
          e.preventDefault();
          $('html, body').animate({ scrollTop: 0 }, 'slow');
        });

        // clipboard for link
        $('#copyLinkButton').on('click', () => {
            let tempInput = $('<input>');
            $('body').append(tempInput);
            tempInput.val(window.location.href).select();
            document.execCommand('copy');
            tempInput.remove();

            $('.copytext').text('Copied');
            $('.copyIcon').addClass('hideIcon');
            $('.checkIcon').removeClass('hideIcon');
            
            setTimeout(function() {
              $('.copytext').text('Copy Link');
              $('.copyIcon').removeClass('hideIcon');
              $('.checkIcon').addClass('hideIcon');
            }, 2000); 
          });


      });