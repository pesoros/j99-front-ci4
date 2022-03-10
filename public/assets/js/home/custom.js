var issubmit = false;
//show hide input pulang
var pp = document.getElementById("pulangpergi");
var pu = document.getElementById("pulang");
var crtd = '', slcd = '';
var crtt = '', slct = false;
pp.addEventListener('click',function(){
    if (this.checked) {
        setpulang();
    } else {
        pu.classList.add("d-none");
        $('#pulang').html('');
    }
},false);
function setpulang() {
    var phtml = '<div class="d-flex align-items-center"><span class="icon"><i class="fal fa-calendar"></i></span><div id="date-pulang" class="form-group ml-3 mb-0 w-100"><label>Pulang</label><input name="pulang" class="form-control" placeholder="mm/dd/yyyy" readonly></div></div>';
    $('#pulang').append(phtml);
    pu.classList.remove("d-none");
    $('#date-pulang input').datepicker({ 
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        size: 'default'
    });
}
//end sho hide input pulang

//submit cari tiket
function sbttiket(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.id;
        issubmit = true;
        btnloading({
            id : 'btn-cari-tiket',
            status : true
        });
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/home/searchtiket",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
					window.location.href = base_url+"/reservasi";
				} else {
					alertform('alert-tiket', data, 'Error');
                    btnloading({
                        id : 'btn-cari-tiket',
                        status : false,
                        btntext : 'Cari Tiket',
                    });
				}
                issubmit = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-tiket', thrownError, 'Error');
                btnloading({
                    id : 'btn-cari-tiket',
                    status : false,
                    btntext : 'Cari Tiket',
                });
                issubmit = false;
			}
		});
    }
}
document.getElementById("formcaritiket").onsubmit = function(e) {
    sbttiket(e);
};
// end submit cari tiket

//submit kelas armada
function sbtarmada(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.id;
        issubmit = true;
        btnloading({
            id : 'btn-kelas-armada',
            status : true
        });
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/home/requestarmada",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
					alertform('alert-pesan-armada', data, 'Success');
                    var resetform = document.getElementById(targetform);
                    resetform.reset();
				} else {
					alertform('alert-pesan-armada', data, 'Error');
				}
                btnloading({
                    id : 'btn-kelas-armada',
                    status : false,
                    btntext : 'Pesan',
                });
                issubmit = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-pesan-armada', thrownError, 'Error');
                btnloading({
                    id : 'btn-kelas-armada',
                    status : false,
                    btntext : 'Pesan',
                });
                issubmit = false;
			}
		});
    }
}
document.getElementById("pesanarmada").onsubmit = function(e) {
    sbtarmada(e);
};
// end submit kelas armada

$( document ).ready(function() {
    setSelect2Above();
    navTabs('navbar-tiket');
    $('#date-pergi input.datepicker').datepicker({ 
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        size: 'default'
    });
    $('.list-main').slick({
        dots: mdots,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,            
        autoplay: true
    });
    $('.list-info').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: false,            
        autoplay: false,
        responsive: [ 
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2.5,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1.5,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
    $('.list-ulasan').slick({
        dots: udots,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,            
        autoplay: true
    });
    $('.list-gallery').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,            
        prevArrow: "#prevGallery",
        nextArrow: "#nextGallery",         
        autoplay: true
    });
    
    $("#slcdari").select2({
        dropdownPosition: 'below',
        placeholder: "Masukan Nama Daerah"
    });
    $("#slctujuan").select2({
        dropdownPosition: 'below',
        placeholder: "Masukan Nama Daerah"
    });
    $("#slckelas").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below',
        placeholder: "Pilih Kelas"
    });
    $("#slcpenumpang").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below'
    });
    
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});