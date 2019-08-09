$(document).ready(function() {
        // Transition effect for navbar
        $(window).scroll(function() {
          // checks if window is scrolled more than 500px, adds/removes solid class
          if($(this).scrollTop() > 300) {
              $('#miNavBar').addClass('solid');
              $('#navHome').addClass('linkSolid');
              $('#navbarDropdown').addClass('linkSolid');
              $('#navLogin').addClass('linkSolid');
              $('#navRegister').addClass('linkSolid');
              $('#navCarrito').addClass('linkSolid');
              $('#navbarDropdownUser').addClass('linkSolid')
          } else {
              $('#miNavBar').removeClass('solid');
              $('#navHome').removeClass('linkSolid');
              $('#navbarDropdown').removeClass('linkSolid');
              $('#navLogin').removeClass('linkSolid');
              $('#navRegister').removeClass('linkSolid');
              $('#navCarrito').removeClass('linkSolid');
              $('#navbarDropdownUser').removeClass('linkSolid')
          }
        });
});
