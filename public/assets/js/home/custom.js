var pp = document.getElementById("pulangpergi");
var pu = document.getElementById("pulang");
pp.addEventListener('click',function(){
    if (this.checked) {
        setpulang();
    } else {
        pu.classList.add("d-none");
        $('#pulang').html('');
    }
},false);

function setpulang() {
    var phtml = '<div class="d-flex align-items-center"><span class="icon"><i class="fal fa-map-marker-alt"></i></span><div id="date-pulang" class="form-group ml-3 mb-0 w-100"><label>Pulang</label><input name="pulang" class="form-control" placeholder="mm/dd/yyyy" readonly></div></div>';
    $('#pulang').append(phtml);
    pu.classList.remove("d-none");
    $('#date-pulang input').datepicker({ format: 'dd/mm/yyyy' });
}

$( document ).ready(function() {
    $('#date-pergi input.datepicker').datepicker({ format: 'dd/mm/yyyy' });
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
});