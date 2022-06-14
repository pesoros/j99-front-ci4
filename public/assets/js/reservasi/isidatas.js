//get seat available
var isshow = false, issubmit = false;  dtargetseat = "";
const slctseatpergiset=[];
const slctseatpulangset=[];
var conditionseat = 0;
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
			url		: base_url+"/reservasi/getseatreservedpforpick",
            data    : sendData,
			success: function(response) {
                response = JSON.parse(response)
                let theSeats = response.seats
                let seatInfo = response.seatsInfo
                let htmlModal = '';
                $('.seatlay').empty();
                let counter = 0;
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
                    slctseat();
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
    const btnreserved = document.getElementsByClassName('btn-choose-seat');
    for (var i = 0; i < btnreserved.length; i++) {
        btnreserved[i].addEventListener('click',function () {
            var did = this.getAttribute('data-id');
            dtargetseat = this.getAttribute('data-target');
            conditionseat = this.getAttribute('data-type');
            showseats(did);
        });
    }
}
setbtnreserved();
//end get seat available

//select seat 
function slctseat() {
    const target = document.getElementsByClassName('item-list-seat');
    for (var i = 0; i < target.length; i++) {
        target[i].addEventListener('click',function (e) {
            const noset =  e.target.classList.contains('reserved');
            if (!noset) {
                if (document.querySelector('#kursibusModal td.selected') !== null) {
                    document.querySelector('#kursibusModal td.selected').classList.remove('selected');
                }
                e.target.classList.add('selected')
                var setval = document.getElementById('inputtseat');
                setval.value = e.target.getAttribute('data');
                setseat();
                console.log('conditionseatpilih: '+conditionseat);
            }
        });
    }
    return false;
}
function setseat() {
    console.log('setseat: '+conditionseat);
    if(dtargetseat != '' || dtargetseat != null) {
        const target = document.getElementById('btnpilih');
        target.addEventListener('click',function(){
            var getval = document.getElementById('inputtseat').value;
            const setval = document.getElementById(dtargetseat);
            if(getval != null && getval != '') {
                setval.value = getval;
                $('#kursibusModal').modal('toggle');
                if(conditionseat == 1) {
                    slctseatpulangset.push(getval);
                    console.log('conditionseat2: '+conditionseat);
                } else {
                    slctseatpergiset.push(getval);
                    console.log('conditionseat3: '+conditionseat);
                }
                if (document.querySelector('#kursibusModal td.selected') !== null) {
                    document.querySelector('#kursibusModal td.selected').classList.remove('selected');
                }
                if (document.querySelector('#kursibusModal td.reserved') !== null) {
                    document.querySelector('#kursibusModal td.reserved').classList.remove('reserved');
                }
                
            }
        },false);
    }
    
}
//end select seat 

//set as passenger
$('#thispassenger').click(function() {
    console.log('ss')
    if (this.checked) {
        setpassenger(true);
    } else {
        setpassenger(false);
    }
});
function setpassenger(status) {
    var name = document.getElementById('txtnama').value; 
    var nohp = document.getElementById('txtnohp').value; 
    var targetname = document.getElementsByClassName("txtpnama");
    var targetnohp = document.getElementsByClassName("txtnohp");
    if (status) {
        targetname[0].value = name;
        targetnohp[0].value = nohp;
    } else {
        targetname[0].value = '';
        targetnohp[0].value = '';
    }
}
//end set as passenger

//submit passenger
function sbtpassenger(e) {
    if(!issubmit) {
        e.preventDefault();
        var targetform = e.target.id;
        issubmit = true;
        btnloading({
            id : 'btn-pesanan',
            status : true
        });
        $.ajax({
			type	: "POST",
			cache	: false,
			url		: base_url+"/reservasi/addbooking",
			data	: $('#'+targetform).serializeArray(),
			success: function(data) {
				if (data.indexOf("error-")<0){
					window.location.href = base_url+"/reservasi/payment";
				} else {
					alertform('alert-pesanan', data, 'Error');
                    btnloading({
                        id : 'btn-pesanan',
                        status : false,
                        btntext : 'Konfirmasi Pesanan',
                    });
				}
                issubmit = false;
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alertform('alert-pesanan', thrownError, 'Error');
                btnloading({
                    id : 'btn-pesanan',
                    status : false,
                    btntext : 'Konfirmasi Pesanan',
                });
                issubmit = false;
			}
		});
    }
}
// document.getElementById("passengerform").onsubmit = function(e) {
//     sbtpassenger(e);
// };
// end submit passenger

$( document ).ready(function() {
    setSelect2Above();
    $("#slcmenumakanan").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below',
        placeholder: ""
    });
    $("#slcbagasi").select2({
        minimumResultsForSearch: -1,
        dropdownPosition: 'below',
        placeholder: ""
    });
});