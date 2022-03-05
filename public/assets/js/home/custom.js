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
    $('#date-pulang input').datepicker({ format: 'dd/mm/yyyy' });
}

function navTabs($id) {
    const tabs = document.getElementById($id);
    tabs.addEventListener('click',function(e) {
        e = e || window.event;
        if (document.querySelector('#'+$id+' li.active') !== null) {
            document.querySelector('#'+$id+' li.active').classList.remove('active');
        }
        e.target.className += " active";
        var dt = e.target.getAttribute('data-target');
        if (dt !== null) {
            var target = document.getElementById(dt);
            var parent = target.parentNode.id;
            if (document.querySelector('#'+ parent +' .active') !== null) {
                document.querySelector('#'+ parent +' .active').classList.remove('active');
            }
            target.classList.add('active');
        }
    });
}

const ein = document.getElementsByClassName('input-number');
for (var i = 0; i < ein.length; i++) {
    ein[i].addEventListener('keypress',function (evt) {
        this.value = this.value.replace(/[^+0-9]/, '');
    });
}

$( document ).ready(function() {
    navTabs('navbar-tiket');
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
    var datalokasi = [
        {
            "searchFormLabel": "Jakarta",
            "searchResultDefaultLabel": "Jakarta",
            "label": "Jakarta",
            "subLabel": "All terminals / boarding points in Jakarta",
            "additionalInfo": null,
            "code": "a102813",
            "type": "CITY_GEO"
        },
        {
            "searchFormLabel": "Bandung",
            "searchResultDefaultLabel": "Bandung",
            "label": "Bandung",
            "subLabel": "All terminals / boarding points in Bandung",
            "additionalInfo": null,
            "code": "a103859",
            "type": "CITY_GEO"
        },
        {
            "searchFormLabel": "Surabaya",
            "searchResultDefaultLabel": "Surabaya",
            "label": "Surabaya",
            "subLabel": "All terminals / boarding points in Surabaya",
            "additionalInfo": null,
            "code": "a103570",
            "type": "CITY_GEO"
        },
        {
            "searchFormLabel": "Yogyakarta",
            "searchResultDefaultLabel": "Yogyakarta",
            "label": "Yogyakarta",
            "subLabel": "All terminals / boarding points in Yogyakarta",
            "additionalInfo": null,
            "code": "a107442",
            "type": "CITY_GEO"
        },
        {
            "searchFormLabel": "Semarang",
            "searchResultDefaultLabel": "Semarang",
            "label": "Semarang",
            "subLabel": "All terminals / boarding points in Semarang",
            "additionalInfo": null,
            "code": "a106587",
            "type": "CITY_GEO"
        }
    ];
    var dck = document.getElementById('dck');
    dck.addEventListener('click',function() {
        this.readOnly = false;
    });
    dck.addEventListener('change',function() {
        if(!slct) { this.value = crtd;} else {slct = false;}
        this.readOnly = false;
    });
    $("#dck").autocomplete({
        // source: "url('datalokasi/lokasi')",
        source: datalokasi,
        select: function( event, ui ) {
            $( "#dck" ).val( ui.item.label );
            crtd = ui.item.label;
            slcd = true;
            dck.readOnly = false;
        },
        change: function( event, ui ) {
            if (!slcd) {
                dck.value = crtd;
            } else {
                slcd = false;
            }
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div class="d-flex flex-column item-auto"><h5>' + item.label + '</h5><p>' + item.subLabel + '</p></div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
    var tck = document.getElementById('tck');
    tck.addEventListener('click',function() {
        this.readOnly = false;
    });
    tck.addEventListener('change',function() {
        if(!slct) { this.value = crtt;} else {slct = false;}
        this.readOnly = false;
    });
    $("#tck").autocomplete({
        // source: "url('datalokasi/lokasi')",
        source: datalokasi,
        select: function( event, ui ) {
            $( "#tck" ).val( ui.item.label );
            crtt = ui.item.label;
            slct = true;
            tck.readOnly = false;
        },
        change: function( event, ui ) {
            if (!slct) {
                tck.value = crtt;
            } else {
                slct = false;
            }
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div class="d-flex flex-column item-auto"><h5>' + item.label + '</h5><p>' + item.subLabel + '</p></div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
    
    $("#slckelas").select2({
        minimumResultsForSearch: -1
    });
    $("#slcpenumpang").select2({
        minimumResultsForSearch: -1
    });
});