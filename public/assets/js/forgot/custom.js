//submit Daftar
var issubmit = false;
function sbtforgot(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.forgot.value;
        var apiurl = document.getElementById('apiendpoint').value; 
        issubmit = true;
        btnloading({
            id : 'btnforgot',
            status : true
        });
        var data = {
            "email": targetform
        }
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: apiurl +"forgotpassword",
			data	: data,
			success: function(data) {
				if (data.status == 200) {
                    alert('Cek email anda untuk mengganti password')
                } else {
                    alert('Email tidak ditemukan')
                }
                location.reload();
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