
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

//submit profile
var issubmitprofile=false, isprofile = false;
const firstname = document.getElementById('profilefirstname');
const lastname = document.getElementById('profilelastname');
const email = document.getElementById('profileemail');
const btnprofile = document.getElementById('btnprofile');
firstname.addEventListener('keyup',function (evt) {
    if (email.value != '' && this.value != '') {
        isprofile = true;
        btnprofile.disabled = false;
    } else {
        isprofile = false;
        btnprofile.disabled = true;
    }
});
lastname.addEventListener('keyup',function (evt) {
    if (email.value != '' && this.value != '') {
        isprofile = true;
        btnprofile.disabled = false;
    } else {
        isprofile = false;
        btnprofile.disabled = true;
    }
});
email.addEventListener('keyup',function (evt) {
    if (fullname.value != '' && this.value != '') {
        isprofile = true;
        btnprofile.disabled = false;
    } else {
        isprofile = false;
        btnprofile.disabled = true;
    }
});
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
    sbtprofile(e);
};
// end submit profile


//submit mobile phone
var issubmitphone=false, isphone = false;
const phonenumber = document.getElementById('phonenumber');
const btnphone = document.getElementById('btnphone');
phonenumber.addEventListener('keyup',function (evt) {
    if (this.value != '') {
        isphone = true;
        btnphone.disabled = false;
    } else {
        isphone = false;
        btnphone.disabled = true;
    }
});
function sbtphone(e) {
    if(!issubmitphone && isphone) {
        e.preventDefault();
        var targetform = e.target.id;
        btnloading({
            id : 'btnphone',
            status : true
        });
        issubmitphone = false;
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/profile/updatephone",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
					alertform('alert-phone', data, 'Success');
                    var resetform = document.getElementById(targetform);
                    resetform.reset();
				} else {
					alertform('alert-phone', data, 'Error');
				}
                btnloading({
                    id : 'btnphone',
                    status : false,
                    btntext : 'Save',
                });
                issubmitphone = false;
                btnphone.disabled = true;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-phone', thrownError, 'Error');
                btnloading({
                    id : 'btnphone',
                    status : false,
                    btntext : 'Save',
                });
                issubmitphone = false;
                btnphone.disabled = true;
			}
		});
        return false;
    }
}
document.getElementById("formmobilephone").onsubmit = function(e) {
    sbtphone(e);
};
// end mobile phone


//submit change password
var issubmitchangepass=false, ischangepass = false;
const currentpassword = document.getElementById('currentpassword');
const newpassword = document.getElementById('newpassword');
const btnchangepass = document.getElementById('btnchangepass');
currentpassword.addEventListener('keyup',function (evt) {
    if (btnchangepass.value != '' && this.value != '') {
        ischangepass = true;
        btnchangepass.disabled = false;
    } else {
        ischangepass = false;
        btnchangepass.disabled = true;
    }
});
newpassword.addEventListener('keyup',function (evt) {
    if (currentpassword.value != '' && this.value != '') {
        ischangepass = true;
        btnchangepass.disabled = false;
    } else {
        ischangepass = false;
        btnchangepass.disabled = true;
    }
});
function sbtchangepass(e) {
    if(!issubmitchangepass && ischangepass) {
        e.preventDefault();
        var targetform = e.target.id;
        btnloading({
            id : 'btnchangepass',
            status : true
        });
        issubmitchangepass = false;
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/profile/updatepass",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
					alertform('alert-change-password', data, 'Success');
                    var resetform = document.getElementById(targetform);
                    resetform.reset();
				} else {
					alertform('alert-change-password', data, 'Error');
				}
                btnloading({
                    id : 'btnchangepass',
                    status : false,
                    btntext : 'Save',
                });
                issubmitchangepass = false;
                btnchangepass.disabled = true;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-change-password', thrownError, 'Error');
                btnloading({
                    id : 'btnchangepass',
                    status : false,
                    btntext : 'Save',
                });
                issubmitchangepass = false;
                btnchangepass.disabled = true;
			}
		});
        return false;
    }
}
document.getElementById("formchangepassword").onsubmit = function(e) {
    sbtchangepass(e);
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