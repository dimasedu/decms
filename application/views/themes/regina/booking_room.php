<section id="portfolio" style="margin-top:90px;">
    <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; text-align:left; margin-bottom:-5px;">Reservasi</h2>
                <p class="wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">Silahkan Isi Form dibawah</p>
            </div>
        </div>
  
        <div class="container">
            <div class="container contact-info">
                <div class="row">
                  <div class="col-sm-4 col-md-4">
                        <div class="contact-form">
                            <h3>Contact Info</h3>

                            <address>
                              <strong>R-gina</strong> Hotel Pemalang<br>
                              Jalan Raya Pantura No. 10 Petarukan, Pemalang<br> Central Java, Indonesia<br>
                              <abbr title="Phone">P </abbr>: (0284) 322 111<br>
                              <abbr title="Fax">F </abbr> : (0284) 324 556
                            </address>
                    </div></div>
                    <div class="col-sm-8 col-md-8">
                        <div class="contact-form">
                       
                            <form id="main-contact-form" name="contact-form" method="post" action="<?php echo site_url('modreservasi/roombooked');?>">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label>Alamat Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label>No. Identitas (KTP/SIM/PASPOR)</label>
                                    <input type="text" name="noid" class="form-control" placeholder="No. Identitas" required="">
                                </div>
                                
                                <div class="form-group">
                                    <label>HP / Telp</label>
                                    <input type="telp" name="telp" class="form-control" placeholder="Telp/HP" required="">
                                </div>
                                <hr>


                                <div class="form-group">
                                    <label>Check In</label>
                                    <input type="text" name="cekin" class="form-control" value="<?php echo $cekin;?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Check Out</label>
                                    <input type="text" name="cekout" class="form-control" value="<?php echo $cekout;?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tipe Kamar</label>
                                    <select name="kamar" class="form-control">
                                        <?php
                                            foreach($rooms as $room):
                                                echo '<option>'.$room->nama_kamar.'</option>';
                                            endforeach;
                                        ?>
                                    </select>
                                </div>
                                

                                <button type="submit" class="btn btn-primary">Pesan Sekarang!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
</section>