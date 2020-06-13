


jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
                .parent()
                .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });



    //login-error-div
    $("#close-error").click(function() {
        $(".login-error").addClass("hidden-error-div");
    });
    setTimeout(function() {
        $('.login-error').fadeOut('fast');
    }, 2000);
    //done-success-div
    $("#close-done-success").click(function() {
        $(".done-success").addClass("hidden-done-div");
    });
    setTimeout(function() {
        $('.done-success').fadeOut('fast');
    }, 4000);


});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#imgInp").change(function() {
    readURL(this);
});


//login-error-div
$("#close-error").click(function() {
    $(".login-error").addClass("hidden-error-div");
});
setTimeout(function() {
    $('.login-error').fadeOut('fast');
}, 2000);
//done-success-div
$("#close-done-success").click(function() {
    $(".done-success").addClass("hidden-done-div");
});
setTimeout(function() {
    $('.done-success').fadeOut('fast');
}, 4000);
