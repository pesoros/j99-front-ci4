
const eye = document.getElementsByClassName('toggle-password');
for (var i = 0; i < eye.length; i++) {
    eye[i].addEventListener('click',function (evt) {
        const x = document.getElementById('newpassword');
        const y = document.getElementById('toggle-password');
        if (x.getAttribute("type") === "password") {
            x.setAttribute("type", "text");
            y.innerHTML = '<i class="fal fa-eye-slash"></i>';
        } else {
            x.setAttribute("type", "password");
            y.innerHTML = '<i class="fal fa-eye"></i>';
        }
    });
}

const eyeconf = document.getElementsByClassName('toggle-passwordconf');
for (var i = 0; i < eyeconf.length; i++) {
    eyeconf[i].addEventListener('click',function (evt) {
        const x = document.getElementById('confnewpassword');
        const y = document.getElementById('toggle-passwordconf');
        if (x.getAttribute("type") === "password") {
            x.setAttribute("type", "text");
            y.innerHTML = '<i class="fal fa-eye-slash"></i>';
        } else {
            x.setAttribute("type", "password");
            y.innerHTML = '<i class="fal fa-eye"></i>';
        }
    });
}

//submit profile
var issubmitprofile=false, isprofile = false;
const firstname = document.getElementById('profilefirstname');
const lastname = document.getElementById('profilelastname');
const email = document.getElementById('profileemail');
const btnprofile = document.getElementById('btnprofile');
function sbtprofile(e) {
    if(!issubmitprofile && isprofile) {
        e.preventDefault();
        var targetform = e.target.id;
        btnloading({
            id : 'btnprofile',
            status : true
        });
        issubmitprofile = false;
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/profile/update",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
					alertform('alert-profile', data, 'Success');
                    var resetform = document.getElementById(targetform);
                    resetform.reset();
				} else {
					alertform('alert-profile', data, 'Error');
				}
                btnloading({
                    id : 'btnprofile',
                    status : false,
                    btntext : 'Save',
                });
                issubmitprofile = false;
                btnprofile.disabled = true;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-profile', thrownError, 'Error');
                btnloading({
                    id : 'btnprofile',
                    status : false,
                    btntext : 'Save',
                });
                issubmitprofile = false;
                btnprofile.disabled = true;
			}
		});
        return false;
    }
}
document.getElementById("formyourprofile").onsubmit = function(e) {
    // sbtprofile(e);
};
// end submit profile

document.getElementById("formchangepassword").onsubmit = function(e) {
    // sbtchangepass(e);
};
// end submit  change password

$( document ).ready(function() {
    $(".nav-item-scroolto").click(function(e) {
        e.preventDefault();
        $('.nav-item-scroolto').removeClass("active");
        $(this).addClass("active");
        var position = $('#'+$(this).attr("data-target")).offset().top;

        $("body, html").animate({
            scrollTop: position
        }, 1000 );
    });
    $(window).scroll(function() {
        var scrollDistance = $(window).scrollTop() + 100;

        // Assign active class to nav links while scolling
        $('.has-anchor').each(function(i) {
            if ($(this).position().top <= scrollDistance) {
                $('.nav-item-scroolto').removeClass('active');
                $('.nav-item-scroolto:not(".inactive")').eq(i).addClass('active');
            }
        });
    });
});