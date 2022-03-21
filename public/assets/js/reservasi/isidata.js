//get seat available
var isshow = false, issubmit = false;  dtargetseat = "";
const slctseatpergiset=[];
const slctseatpulangset=[];
var conditionseat = 0;
function showseat(id) {
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
                    const doneslct=[];
                    for (var i = 0; i < listseat.length; i++) {
                        for (var j = 0; j < dtseat.length; j++) {
                            var dt = listseat[i].getAttribute("data");
                            var dtreserved = dtseat[j].toLowerCase();
                            if(dt.toLowerCase() == dtreserved) {
                                if (doneslct.length > 0) {
                                    for (var k = 0; k < doneslct.length; k++) {
                                        var txtdoneseat =  doneslct.map(doneslct => doneslct.toLowerCase());
                                        if(txtdoneseat[k] != dtreserved.toLowerCase()) {
                                            listseat[i].classList.add('reserved');
                                            doneslct.push(dtreserved);
                                        }
                                    }
                                } else {
                                    listseat[i].classList.add('reserved');
                                    doneslct.push(dtreserved);
                                }
                            }
                        }
                        if (conditionseat == 1) {
                            console.log('conditionseatpl: '+conditionseat);
                            if(slctseatpulangset.length > 0 ) {
                                for (var l = 0; l < slctseatpulangset.length; l++) {
                                    var dt = listseat[i].getAttribute("data");
                                    var txtslctseatset =  slctseatpulangset.map(slctseatpulangset => slctseatpulangset.toLowerCase());
                                    if(txtslctseatset[l] == dt.toLowerCase()) {
                                        listseat[i].classList.add('reserved');
                                    }
                                }        
                            }
                        } else {
                            if(slctseatpergiset.length > 0 ) {
                                console.log('conditionseatpr: '+conditionseat);
                                for (var l = 0; l < slctseatpergiset.length; l++) {
                                    var dt = listseat[i].getAttribute("data");
                                    var txtslctseatset =  slctseatpergiset.map(slctseatpergiset => slctseatpergiset.toLowerCase());
                                    if(txtslctseatset[l] == dt.toLowerCase()) {
                                        listseat[i].classList.add('reserved');
                                    }
                                }        
                            }
                        }
                    }
                    slctseat();
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
    const btnreserved = document.getElementsByClassName('btn-choose-seat');
    for (var i = 0; i < btnreserved.length; i++) {
        btnreserved[i].addEventListener('click',function () {
            var did = this.getAttribute('data-id');
            dtargetseat = this.getAttribute('data-target');
            conditionseat = this.getAttribute('data-type');
            showseat(did);
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
var stp = document.getElementById("thispassenger");
stp.addEventListener('click',function(){
    if (this.checked) {
        setpassenger(true);
    } else {
        setpassenger(false);
    }
},false);
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
document.getElementById("passengerform").onsubmit = function(e) {
    sbtpassenger(e);
};
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