//submit Daftar
var issubmit = false;
function sbtforgot(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.id;
        issubmit = true;
        btnloading({
            id : 'btnforgot',
            status : true
        });
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/forgot-password/sentpass",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
					alertform('alert-forgot', data, 'Succes');
				} else {
					alertform('alert-forgot', data, 'Error');
                    btnloading({
                        id : 'btnforgot',
                        status : false,
                        btntext : 'Submit',
                    });
				}
                issubmit = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-forgot', thrownError, 'Error');
                btnloading({
                    id : 'btnforgot',
                    status : false,
                    btntext : 'Submit',
                });
                issubmit = false;
			}
		});
    }
}
document.getElementById("formforgot").onsubmit = function(e) {
    sbtforgot(e);
};
// end submit Daftar