$(document).scroll(function (){
    if($(window).scrollTop() > 90) {
        $('.show').css({'background':'#505f99'});
        $('.navbar-dark').css({'background':'#505f99', 'opacity':'1'})
    }else{
        $('.show').css({'background':'#7792ff2c'});
        $('.navbar-dark').css({'background':'#7792ff2c'})
    }
    if ($(window).scrollTop() > 250) {
        $('.home').removeClass("active");
        $('.clients').addClass("active");
        $('.works').removeClass("active");
    }else if ($(window).scrollTop() >= 450) {
        $('.home').removeClass("active");
        $('.clients').removeClass("active");
        $('.works').addClass("active");
    }else{
        $('.home').addClass("active");
        $('.clients').removeClass("active");
        $('.works').removeClass("active");
    }
  }),
  $('.nav-link').click(function(){
    $('.nav-link').removeClass("active");
    this.addClass("active");
  });
  // time out function
      setTimeout(function() {
        $('body').css('overflow','visible'),
        $('#splashscreen').fadeOut("slow");
    }, 1000);