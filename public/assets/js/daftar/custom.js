const passeye = document.getElementById('daftar-password');
if(passeye){
    passeye.addEventListener("click", function() {
        const x = document.getElementById('daftarpassword');
        if (x.getAttribute("type") === "password") {
            x.setAttribute("type", "text");
            this.innerHTML = '<i class="fal fa-eye-slash"></i>';
        } else {
            x.setAttribute("type", "password");
            this.innerHTML = '<i class="fal fa-eye"></i>';
        }
    });
}

//submit Daftar
var issubmit = false;
function sbtdaftar(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.id;
        issubmit = true;
        btnloading({
            id : 'btndaftar',
            status : true
        });
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/daftar/addmember",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
                    res = JSON.parse(data)
                    if (res.error) {
                        alert(res.error)
                        btnloading({
                            id : 'btndaftar',
                            status : false,
                            btntext : 'Submit',
                        });
                    } else if(res.email) {
                        alert('email sudah terdaftar')
                        btnloading({
                            id : 'btndaftar',
                            status : false,
                            btntext : 'Submit',
                        });
                    } else {
                        alert('Registrasi Sukses silahkan login')
                        btnloading({
                            id : 'btndaftar',
                            status : false,
                            btntext : 'Submit',
                        });
                        window.location.href = "/";
                    }
				} else {
                        alert('Registrasi Sukses')
                        alertform('alert-daftar', data, 'Error');
                    btnloading({
                        id : 'btndaftar',
                        status : false,
                        btntext : 'Submit',
                    });
				}
                issubmit = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-daftar', thrownError, 'Error');
                btnloading({
                    id : 'btndaftar',
                    status : false,
                    btntext : 'Submit',
                });
                issubmit = false;
			}
		});
    }
}
document.getElementById("formdaftar").onsubmit = function(e) {
    sbtdaftar(e);
};
// end submit Daftar