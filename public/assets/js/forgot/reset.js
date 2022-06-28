//submit Daftar
var issubmit = false;
function sbtreset(e) {
    if(!issubmit) {
        e.preventDefault();
        var token = e.target.token.value;
        var password = e.target.password.value;
        var password_second = e.target.password_second.value;
        var apiurl = document.getElementById('apiendpoint').value; 
        issubmit = true;
        btnloading({
            id : 'btnforgot',
            status : true
        });
        var data = {
            "token": token,
            "password": password,
            "password_second": password_second
        }
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: apiurl +"passwordreset",
			data	: data,
			success: function(data) {
				if (data.status == 200) {
                    alert('Password berhasil di ubah, silahkan login')
                    window.location.origin
                } else if (data.status == 400) {
                    alert('password dengan konfirmasi password tidak sama')
                } else if (data.status == 404) {
                    alert('token tidak valid')
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
document.getElementById("formreset").onsubmit = function(e) {
    sbtreset(e);
};
// end submit Daftar

const passeye1 = document.getElementById('daftar-password1');
if(passeye1){
    passeye1.addEventListener("click", function() {
        const x = document.getElementById('password');
        if (x.getAttribute("type") === "password") {
            x.setAttribute("type", "text");
            this.innerHTML = '<i class="fal fa-eye-slash"></i>';
        } else {
            x.setAttribute("type", "password");
            this.innerHTML = '<i class="fal fa-eye"></i>';
        }
    });
}

const passeye2 = document.getElementById('daftar-password2');
if(passeye2){
    passeye2.addEventListener("click", function() {
        const x = document.getElementById('password_second');
        if (x.getAttribute("type") === "password") {
            x.setAttribute("type", "text");
            this.innerHTML = '<i class="fal fa-eye-slash"></i>';
        } else {
            x.setAttribute("type", "password");
            this.innerHTML = '<i class="fal fa-eye"></i>';
        }
    });
}