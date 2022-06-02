//get seat available
var isshow = false;
function showseats(id) {
    if(!isshow) {
        isshow = true;
        $.ajax({
			type	: "POST",
			cache	: false,
            dataType:'json',
			url		: base_url+"/reservasi/getseatreserved",
            data    : 'id = '+id,
			success: function(response) {
                var dtseat = response.reserved;
                if (!$.isArray(dtseat) || dtseat.length > 0) {
                    const listseat = document.getElementsByClassName('item-list-seat');
                    const doneseat = [];
                    for (var i = 0; i < listseat.length; i++) {
                        for (var j = 0; j < dtseat.length; j++) {
                            var dt = listseat[i].getAttribute("data");
                            var dtreserved = dtseat[j].toLowerCase();
                            if(dt.toLowerCase() == dtreserved) {
                                if (doneseat.length > 0) {
                                    for (var k = 0; k < doneseat.length; k++) {
                                        var txtdoneseat =  doneseat.map(doneseat => doneseat.toLowerCase());
                                        if(txtdoneseat[k] != dtreserved.toLowerCase()) {
                                            listseat[i].classList.add('reserved');
                                            doneseat.push(dtreserved);
                                        }
                                    }
                                } else {
                                    listseat[i].classList.add('reserved');
                                    doneseat.push(dtreserved);
                                }
                            }
                        }
                    }
                    $('#kursibusModal').modal('toggle');
				}
                isshow = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				console.log('Error'+ thrownError);
                isshow = false;
			}
		});
        return false;
    }
}
function setbtnreserved() {
    const btnreserved = document.getElementsByClassName('btn-reserved');
    for (var i = 0; i < btnreserved.length; i++) {
        btnreserved[i].addEventListener('click',function () {
            var dt = this.getAttribute('data');
            showseats(dt);
        });
    }
}
setbtnreserved();
//end get seat available

//load more data
var page = 2, isload = false;
    
$(window).scroll(function () {
    if ($(window).scrollTop() >= $(document).height() - $(window).height() - 2000) {
        if (!isload) {
            infinteLoadMore();
            page++;
        }
    }
});

function infinteLoadMore() {
    if (!isload) {
        isload = true;
        loadingmore('listresevasi', true);
        $.ajax({
			type	: "GET",
			cache	: false,
            dataType:'html',
			url		: base_url+"/reservasi/getmoredata",
            data    : 'page='+page,
			success: function(response) {
                if (response.indexOf("error-")<0){
                    if(response != null && response != '') {
                        var target = document.getElementById('listresevasi');
                        target.innerHTML += response;
                        isload = false;
                    }
                }
                setbtnreserved();
                loadingmore('listresevasi', false);
			},
			error: function (xhr, ajaxOptions, thrownError) {
				console.log('Error'+ thrownError);
                isload = false;
                loadingmore('listresevasi', false);
			}
		});
    }
}
//end load more data

//filter data
function filterdata(e) {
    if (!isload) {
        e.preventDefault();
        var targetform = e.target.id;
        isload = true;
        btnloading({
            id : 'btn-cari',
            status : true,
            hidebtntext : true
        });
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/reservasi/getFilterData",
			data	: $('#'+targetform).serializeArray(),
			success: function(response) {
                if (response.indexOf("error-")<0){
                    if(response != null && response != '') {
                        var target = document.getElementById('listresevasi');
                        target.innerHTML = response;
                        isload = false;
                        page = 2;
                    }
                }
                setbtnreserved();
                btnloading({
                    id : 'btn-cari',
                    status : false,
                    btntext : 'Cari',
                });
			},
			error: function (xhr, ajaxOptions, thrownError) {
				console.log('Error'+ thrownError);
                btnloading({
                    id : 'btn-cari',
                    status : false,
                    btntext : 'Cari',
                });
                isload = false;
			}
		});
    }
}
document.getElementById("searchform").onsubmit = function(e) {
    filterdata(e);
};
//end filter data

$( document ).ready(function() {
    setSelect2Above();
    $('#dateto').datepicker({ 
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4',
        iconsLibrary: 'fontawesome',
        size: 'default'
    });
    $("#slcbus").select2({
        dropdownPosition: 'below',
        placeholder: "Pilih Bus / shuttel"
    });
    $("#slcpenumpang").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below'
    });
    $("#slcincity").select2({
        dropdownPosition: 'below',
        placeholder: "Masukan Nama Daerah"
    });
    $("#slcoffcity").select2({
        dropdownPosition: 'below',
        placeholder: "Masukan Nama Daerah"
    });
    $("#slckelas").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below',
        placeholder: "Pilih Kelas"
    });
    $(document).on('select2:open', () => {
        document.querySelector('.select2-search__field').focus();
    });
});