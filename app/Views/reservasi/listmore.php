<?php foreach($listBus as $key => $value) { ?>
                    <div class="col-12 col-sm-6 col-lg-4 mb-4">
                        <div class="card p-2 border-radius-12">
                            <div class="embed-responsive embed-responsive-13by9">
                                <img class="embed-responsive-item border-radius-12" src="<?= $value['image'] ?>" alt="Card image cap">
                            </div>
                            <div class="card-body px-0 py-2">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="card-item-one-top-left">
                                        <p><?= $value['class'] ?></p>
                                        <span>
                                            <span class="mr-1"><i class="fas fa-plug"></i></span>
                                            <span  class="mr-1"><i class="fas fa-smoking"></i></span>
                                            <span  class="mr-1"><i class="fas fa-restroom"></i></span>
                                            <span  class="mr-1"><i class="fas fa-coffee"></i></span>
                                        </span>
                                    </div>
                                    <div class="card-item-one-top-right">
                                        <span>Harga</span>
                                        <p class="harga">Rp <?= $value['price'] ?> <span> / orang</span></p>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="card-item-one-bottom-left d-flex align-items-center">
                                        <div class="item-bottom-left">
                                            <span><?= $value['start']  ?></span>
                                            <p><?= $berangkat?> </p>
                                            <span><?= $value['pickup_trip_location'] ?></span>
                                        </div>
                                        <div class="item-bottom-left d-flex justify-content-center align-items-center">
                                            <span class="dots"></span>
                                            <span class="dot-dashed"><span>12 j 10 m</span></span>
                                            <span class="dots"></span>
                                        </div>
                                        <div class="item-bottom-left">
                                            <span><?= $value['end']  ?></span>
                                            <p><?= $tujuan ?> </p>
                                            <span><?= $value['drop_trip_location'] ?></span>
                                        </div>
                                    </div>
                                    <div class="card-item-one-bottom-right d-flex">
                                        <p><span>Sisa Kursi</span> <?= $value['seatAvail']  ?> Kursi</p>
                                        <button type="button" class="btn btn-black btn-reserved" data="<?= $tanggal.'_'.$value['trip_id_no'].'_'.$value['trip_route_id'].'_'.$value['fleet_registration_id'].'_'.$value['type'] ?>"><i class="fas fa-loveseat"></i></button>
                                        <a href="<?= base_url('reservasi/pick/'.$value['trip_id_no'].'/'.$value['trip_route_id'].'/'.$value['price'].'/'.$value['type'].'/'.$value['resto_id'].'/'.$value['pickup_trip_location'].'/'.$value['drop_trip_location'])?>" class="btn btn-submit">Pesan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>