// refrensi 
// https://makitweb.com/how-to-add-custom-filter-in-datatable-ajax-and-php/ 
const slider = document.querySelector('.navtabs');
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
    console.log(walk);
});
$(document).ready(function () {
    var oTable, vPropinsi = "";
	oTable = $('#tablelist').DataTable({
		'processing': true,
        'serverSide': true,
        'serverMethod': 'post',
        'ajax': {
            'url':base_url+"/agen/getdata",
            'data': function(data){
                // Read values
                var kota = $('#customsearch').val();
                var propinsi = vPropinsi;

                // Append to data
                data.searchByKota = kota;
                data.searchByPropinsi = propinsi;
            }
        },
		"columns": [
			{ data: 'kota',
				render: function(data,type,row){
					return data;
				}	 
			},
			{ data: 'namaAgen',
				render: function(data){
                    return data;
				}
			},
			{ data: 'alamat',
                render: function(data){
                    return data;
                }
            },
			{ data: 'telepon',
                render: function(data){
                    return data;
                }
            }
		],
		"bSort": false,
        "searching": false,
        "lengthChange": false,
        "drawCallback": function( settings ) {
            $("#tablelist").wrap( "<div class='table-responsive'></div>" );
        },
        "bAutoWidth": false
	});
    
	$('button#refresh-btn').click(function(){oTable.fnStandingRedraw();});
    $('#btnsrch').click(function () {
        oTable.draw();    
    });
    $('.nav-tabs').click(function () {
        vPropinsi = $(this).data('target');
        oTable.draw();    
    });

    
    $('.navtabs').mousewheel(function(e, delta) {
        this.scrollLeft -= (delta * 60);
    });
});