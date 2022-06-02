//get seat available
var isshow = false;
function showseats(id) {
    if(!isshow) {
        isshow = true;
        var sendData = {
            "data": id,
        }; 
        $.ajax({
			type	: "POST",
            cache	: false,
            contentType: 'application/x-www-form-urlencoded',
			url		: base_url+"/reservasi/getseatreserved",
            data    : sendData,
			success: function(response) {
                response = JSON.parse(response)
                let theSeats = response.seats
                let seatInfo = response.seatsInfo
                let htmlModal = '';
                $('.seatlay').empty();
                let counter = 0;
                console.log(theSeats)
                theSeats.forEach(element => {
                        if (counter == 0) {
                            htmlModal += '<div class="d-flex justify-content-between align-items-center"><table><tr>';
                        }
                        
                        counter+=1;
                        if (element.name == '-') { 
                            htmlModal += '<td class="item-list-seat reserved" data=""></td>';
                        } else {
                            if (element.isAvailable == true) {
                                htmlModal += '<td class="item-list-seat" data="'+element.name+'">'+element.name+'</td>';
                            } else {
                                htmlModal += '<td class="item-list-seat reserved" data="'+element.name+'">'+element.name+'</td>';
                            }
                        }

                        if (counter == 5) {
                            htmlModal += '</tr></table></div>';
                            counter = 0;
                        }
                });
                setTimeout(function() { 
                    $('.seatlay').append(htmlModal);
                    $('#kursibusModal').modal('toggle');
                    isshow = false;
                }, 900);
            
                
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
    
// $(window).scroll(function () {
//     if ($(window).scrollTop() >= $(document).height() - $(window).height() - 2000) {
//         if (!isload) {
//             infinteLoadMore();
//             page++;
//         }
//     }
// });

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