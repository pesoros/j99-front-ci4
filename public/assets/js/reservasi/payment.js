var issubmit = false;

// countdown
function setcountdown() {
    var timeLeft = 30;
    var elem = document.getElementById('countdown');
    var timerId = setInterval(countdown, 1000);
    function countdown() {
        if (timeLeft == -1) {
            clearTimeout(timerId);
            elem.innerHTML = 'Retry Again';
            fcnotp();
            document.getElementById("sendemail").style.display = 'block';
            fcnotpemail();
        } else {
            elem.innerHTML = timeLeft +  " secs";
            timeLeft--;
        }
    }
}
// end countdown

// submit payment
function submitpayment(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.id;
        issubmit = true;
        btnloading({
            id : 'btn-payment',
            status : true
        });
        document.getElementById("sendemail").style.display = 'none';
        let paymentMethod = $( "#slcpaymenmethod" ).val();
        let txtnohp = $( "#txtnohp" ).val();
        let email = $( "#email" ).text();
        var sendData = {
            "paymentMethod": paymentMethod,
            "phone": txtnohp,
            "email": email,
            "sendBy": 'wa',
        }; 
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/reservasi/addpayment",
			data	: sendData,
			success: function(data) {
				if (data.indexOf("error-")<0){
                    $('#otpModal').modal('toggle');
                    formopt();
				} else {
					alertform('alert-payment', data, 'Error');
				}
                btnloading({
                    id : 'btn-payment',
                    status : false,
                    btntext : 'Proses Pembayaran',
                });
                setcountdown();
                issubmit = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-pesanan', thrownError, 'Error');
                btnloading({
                    id : 'btn-payment',
                    status : false,
                    btntext : 'Proses Pembayaran',
                });
                issubmit = false;
			}
		});
        return false;
    }
}
document.getElementById("paymenform").onsubmit = function(e) {
    submitpayment(e);
};
// end submit payment

// sen opt from email
function fcnotpemail() {
    function sntotpemail(e) {
        if(!issubmit) {
            e.preventDefault();
            issubmit = true;
            document.getElementById("sendemail").style.display = 'none';
            let paymentMethod = $( "#slcpaymenmethod" ).val();
            let txtnohp = $( "#txtnohp" ).val();
            let email = $( "#email" ).text();
            var sendData = {
                "paymentMethod": paymentMethod,
                "phone": txtnohp,
                "email": email,
                "sendBy": 'email',
            }; 
            $.ajax({
                type	: "POST",
                cache	: false,
                url		: base_url+"/reservasi/addpayment",
                data	: sendData,
                success: function(data) {
                    if (data.indexOf("error-")<0){
                        setcountdown();
                    }
                    issubmit = false;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    issubmit = false;
                }
            });
            return false;
        }
    }
    
    document.getElementById("sendemail").addEventListener('click',function(e) {
        sntotpemail(e);
    });
}

// submit opt
function formopt() {
    function sbtotp(e) {
        if(!issubmit) {
            e.preventDefault();
            var targetform = e.target.id;
            issubmit = true;
            btnloading({
                id : 'btnpilih',
                status : true
            });
            let otpNumber = $( "#otpcode" ).val();
            let txtnohp = $( "#txtnohp" ).val();
            let email = $( "#email" ).text();
            var sendData = {
                "otpNumber": otpNumber,
                "phone": txtnohp,
                "email": email,
            }; 

            $.ajax({
                type	: "POST",
                cache	: false,
                contentType: 'application/x-www-form-urlencoded',
                url		: base_url+"/reservasi/confirmotp",
                data	: sendData,
                success: function(data) {
                    if (data.indexOf("error-")<0){
                        var json = $.parseJSON(data);
                        var status = json.status;
                        if (status !== 200) {
                            alertform('alert-otp', 'OTP Salah', 'Error');
                            btnloading({
                                id : 'btnpilih',
                                status : false,
                                btntext : 'Lanjutkan',
                            });
                        } else {
                            window.location.href = "/reservasi/invoice";
                        }
                    } else {
                        alertform('alert-otp', 'OTP Salah', 'Error');
                        btnloading({
                            id : 'btnpilih',
                            status : false,
                            btntext : 'Lanjutkan',
                        });
                    }
                    issubmit = false;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alertform('alert-otp', 'OTP Salah', 'Error');
                    btnloading({
                        id : 'btnpilih',
                        status : false,
                        btntext : 'Lanjutkan',
                    });
                    issubmit = false;
                }
            });
            return false;
        }
    }
    document.getElementById("otpcodeform").onsubmit = function(e) {
        sbtotp(e);
    };
}
// end submit opt

// sen opt
function fcnotp() {
    function sntotp(e) {
        if(!issubmit) {
            e.preventDefault();
            issubmit = true;
            $.ajax({
                type	: "POST",
                cache	: false,
                url		: base_url+"/reservasi/sentotp",
                success: function(data) {
                    if (data.indexOf("error-")<0){
                        setcountdown();
                    }
                    issubmit = false;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    issubmit = false;
                }
            });
            return false;
        }
    }
    
    document.getElementById("countdown").addEventListener('click',function(e) {
        sntotp(e);
    });
}
// end sent opt

// end sent opt

function formatState (opt) {
    if (!opt.id) {
        return opt.text.toUpperCase();
    } 

    var optimage = $(opt.element).attr('data-image'); 
    console.log(optimage)
    if(!optimage){
        return opt.text.toUpperCase();
    } else {                    
        var $opt = $(
            '<span><img src="' + optimage + '" width="25px" style="margin-top: -5px;"/> ' + opt.text.toUpperCase() + '</span>'
        );
        return $opt;
    }
};

$( document ).ready(function() {
    setSelect2Above();
    $("#slcpaymenmethod").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below',
        placeholder: "Pilih Metode pembayaran",
        templateResult: formatState,
        templateSelection: formatState
    });
    
});