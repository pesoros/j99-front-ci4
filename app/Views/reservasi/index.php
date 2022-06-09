<?= $this->extend('layouts/master') ?>

<?= $this->section('library') ?>	
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/reservasi/custom.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="header2">
    <div class="content-ads">

    </div>
    <div class="content-header">
        <div class="wizard d-flex justify-content-center align-items-center">
            <ul class="nav nav-tabs" role="tablist">
                <li role="one" class="active d-flex align-items-center">
                    <span></span>
                </li>
                <li role="two" class="d-flex align-items-center">
                    <span></span>
                    <span></span>
                </li>
                <li role="three" class="d-flex align-items-center">
                    <span></span>
                    <span></span>
                </li>
            </ul>
        </div>
    </div>
</div>
<section>
	<div class="container">
        <div class="content-reservasi">
            <h2>Tiket <?= ucwords(session('nowat')) ?> <?= session('reqData')['berangkat'] ?> - <?= session('reqData')['tujuan'] ?></h2>
            <div class="reservasi-header">
                <form class="search-form" id="searchform" name="formsearch" method="POST">
                    <div class="row align-items-center">
                        <!-- <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Bus / shuttel</label>
                                <select class="form-control" name="bus" id="slcbus">
                                    <option value=""></option>
                                    <option value="1">Bus 1</option>
                                    <option value="2">Bus 2</option>
                                    <option value="3">Bus 3</option>
                                    <option value="4">Bus 4</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Tanggal Keberangkatan</label>
                                <input type="text" name="pergi" id="dateto" class="form-control datepicker" placeholder="yyyy-mm-dd" readonly>
                            </div>
                        </div> -->
                        <!-- <div class="col-6 col-sm-3 col-lg-1">
                            <div class="form-group" >
                                <label>Penumpang</label>
                                <select class="form-control" name="penumpang" id="slcpenumpang">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Kota Keberangkatan</label>
                                <select class="form-control" name="berangkat" id="slcincity">
                                    <option value=""></option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="madura">Madura</option>
                                    <option value="jayapura">Jayapura</option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Kota Tujuan</label>
                                <select class="form-control" name="tujuan" id="slcoffcity">
                                    <option value=""></option>
                                    <option value="jakarta">Jakarta</option>
                                    <option value="surabaya">Surabaya</option>
                                    <option value="madura">Madura</option>
                                    <option value="jayapura">Jayapura</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-6 col-sm-3 col-lg-2">
                            <div class="form-group" >
                                <label>Kelas Armada</label>
                                <select class="form-control" name="kelas" id="slckelas">
                                    <option value=""></option>
                                    <?php foreach ($dataKelas as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['kelas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 col-sm-3 col-lg-1">
                            <div class="form-group" >
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn-submit"  id="btn-cari">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="reservasi-body">
                <div class="row align-items-center mt-5" id="listresevasi">
                    <?= $listBus ?>
                </div>
            </div>
        </div>
	</div>
</section>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
	<?= $footer; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script><script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
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
    </script>
    <div class="modal fade bd-example-modal-sm" id="kursibusModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body seatlay">
                
            </div>
            
            <div class="modal-footer">
                <div class="w-100 d-flex flex-row justify-content-center align-items-center info-status">
                    <div class="d-block">
                        <span><span></span> Available</span>
                        <span><span></span> Reserved</span>
                    </div>
                </div>
                <button type="button" class="btn btn-submit" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 