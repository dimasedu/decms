<style type="text/css">
    .demo-2 .bg-img-1 {
        background-image: url('<?php echo base_url();?>uploads/<?php echo $slide->slide1;?>');
    }
    .demo-2 .bg-img-2 {
        background-image: url('<?php echo base_url();?>uploads/<?php echo $slide->slide2;?>');
    }
    .demo-2 .bg-img-3 {
        background-image: url('<?php echo base_url();?>uploads/<?php echo $slide->slide3;?>');
    }

    .demo-2 .bg-img-4 {
        background-image: url('<?php echo base_url();?>uploads/<?php echo $slide->slide4;?>');
    }

    .item img{
        width: 100%;
    height: 800px;
    overflow: hidden;
    position: relative;
    }
</style>
<script type="text/javascript">
    $('.carousel').carousel({
      interval: 500
    });
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=824950634249119";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>


<section class="banner">
<div id="slidebanner" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
    <li data-target="#slidebanner" data-slide-to="0" class="active"></li>
    <li data-target="#slidebanner" data-slide-to="1"></li>
    <li data-target="#slidebanner" data-slide-to="2"></li>
    <li data-target="#slidebanner" data-slide-to="3"></li>
    <li data-target="#slidebanner" data-slide-to="4"></li>
  </ol>
 
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo base_url();?>uploads/<?php echo $slide->slide1;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption"> <!—description -->
        <h3><?php echo $slide->text1;?></h3>
      </div>
    </div>
    <div class="item">
      <img class="" src="<?php echo base_url();?>uploads/<?php echo $slide->slide2;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption">  <!—description -->
        <h3><?php echo $slide->text2;?></h3>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo base_url();?>uploads/<?php echo $slide->slide3;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption"> <!—description -->
        <h3><?php echo $slide->text3;?></h3>
      </div>
    </div>

     <div class="item">
      <img src="<?php echo base_url();?>uploads/<?php echo $slide->slide4;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption"> <!—description -->
        <h3><?php echo $slide->text4;?></h3>
      </div>
    </div>

     <div class="item">
      <img src="<?php echo base_url();?>uploads/<?php echo $slide->slide5;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption"> <!—description -->
        <h3><?php echo $slide->text5;?></h3>
      </div>
    </div>
     
    
  </div>
 
  <!-- Controls, Ini adalah Panah Kanan dan Kiri. item ini dapat dihapus jika tidak diperlukan-->
  <a class="left carousel-control" href="#slidebanner" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#slidebanner" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  </div>
</section>

<!--/#home_body-->
<section id="features">
    <div class="container">
        <div class="row">
            <?php echo form_open('modreservasi/roombooking');?>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    &nbsp;
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <span class="label label-info">Check In</span>
                    <div class="input-group input-group-sm">
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" name="checkin" value="" requried>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                <span class="label label-danger">Check Out</span>
                    <div class="input-group input-group-sm">
                        <div class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" name="checkout" value="" required>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                <br>
                   <button class="btn btn-success">
                       <i class="glyphicon glyphicon-pushpin"></i> Pesan Sekarang!
                   </button>

                </div>

            <?php echo form_close();?>
        </div>
    </div>
</section>


<section id="our-team">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="section-header">
                    <h4 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">R-gina Hotel Pemalang</h4>
                    <p class="wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"><?php echo $set->front_text;?></p>
                    </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <iframe class="gallery" frameborder="0" height="150" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2780.904474784608!2d109.43983891599754!3d-6.893734515591501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRegina+Hotel+Pemalang%2C+Pemalang%2C+Central+Java%2C+Indonesia!5e1!3m2!1sen!2s!4v1399451276002" style="border:0" width="300"></iframe>
                
                <p><i class="glyphicon glyphicon-home"></i> <?php echo $set->address;?></p>
                <p><i class="glyphicon glyphicon-phone-alt"></i> <?php echo $set->callnumber;?></p>
            </div>
        </div>
    </div>
</section>

<section id="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown; text-align:left; margin-bottom:-5px;">Fasilitas Hotel</h2>
                <p class="wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">R-gina Hotel siap untuk melaksanakan segala jenis event untuk anda.</p>
            </div>

            <div class="portfolio-items isotope" style="position: relative; overflow: hidden; height: 400px;">
                
            <?php echo $this->reginalib->show_services();?>
                              
            </div>

            
        </div><!--/.container-->
    </section><!--/#portfolio-->

    <section id="portfolio" style="padding-top:20px;">
        <div class="row">
            <div class="container">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    
                    <div id="TA_selfserveprop596" class="TA_selfserveprop">
<ul id="arDpe6" class="TA_links HhzBlAf">
<li id="45fOXdWprt90" class="QYjRQ0QvVlb8">
<a target="_blank" href="http://www.tripadvisor.co.id/"><img src="http://www.tripadvisor.co.id/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
</li>
</ul>
</div>
<script src="http://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=596&amp;locationId=3804200&amp;lang=in&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=false&amp;display_version=2"></script>
                
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="fb-page" data-href="https://www.facebook.com/HotelReginaPemalang" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/HotelReginaPemalang"><a href="https://www.facebook.com/HotelReginaPemalang">R-gina Hotel Pemalang</a></blockquote></div></div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <a class="twitter-timeline" href="https://twitter.com/reginahotel_pml" data-widget-id="638561128197394432">Tweets by @reginahotel_pml</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>

                 
            </div>
        </div>
    </section>



    <script text="text/javascript">
    $(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
</script> 