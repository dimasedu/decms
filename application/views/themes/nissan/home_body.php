<style type="text/css">
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

<div class="container">
<section class="banner" style="border-top:1px #fff solid;">
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
      <img src="<?php echo $slide->slide1;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption"> <!—description -->
        <h3><?php echo $slide->text1;?></h3>
      </div>
    </div>
    <div class="item">
      <img class="" src="<?php echo $slide->slide2;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption">  <!—description -->
        <h3><?php echo $slide->text2;?></h3>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $slide->slide3;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption"> <!—description -->
        <h3><?php echo $slide->text3;?></h3>
      </div>
    </div>

     <div class="item">
      <img src="<?php echo $slide->slide4;?>" alt="slidebanner"> <!—picture -->
      <div class="carousel-caption"> <!—description -->
        <h3><?php echo $slide->text4;?></h3>
      </div>
    </div>

     <div class="item">
      <img src="<?php echo $slide->slide5;?>" alt="slidebanner"> <!—picture -->
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
</div>
<!--/#home_body-->

<!-- start:container -->
<div class="container">
    <!-- start:page content -->
    <div id="page-content" class="right-sidebar has-breaking-news">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-lg-8">
                <header><h2>NEWS UPDATE</h2><span class="borderline"></span></header>

                <div class="articles relative clearfix">
                <!-- start:row -->
                <div class="row clearfix">
                  <?php echo $this->reginalib->show_artikel();?>
                </div>
                </div>        
            </div>
            <div class="col-xs-12 col-md-4 col-lg-4">
            <header><h2>CONTACT US</h2><span class="borderline"></span></header>
           <table class="table table-responsive">
             <tr>
               <th colspan="2" class="info"> Hotline</th>
              
             </tr>
             <tr>
               <th><i class="glyphicon glyphicon-phone-alt"></i>
               <b>0283-352727</b></th>
             </tr>
             <tr>
               <th><i class="glyphicon glyphicon-phone"></i> <b>0819-1152-2112</b></th>
             </tr>
             <tr>
               <th><i class="glyphicon glyphicon-phone"></i> <b>0858-4219-5679</b></th>
             </tr>

             <tr>
               <th><i class="glyphicon glyphicon-phone"></i> <b>0852-2633-9917</b></th>
             </tr>

             <tr>
               <th colspan="2" class="info"> Address</th>
              
             </tr>

              <tr>
               <th><i class="glyphicon glyphicon-home"></i> <b>Jalan Kol. Soegiono 147 Kota Tegal - Jawa Tengah</b></th>
             </tr>


           </table>
           <span class="borderline"></span>

           
                     <header><h2>OUR LOCATION</h2><span class="borderline"></span></header>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1824788966856!2d109.1195540144155!3d-6.8687251691126265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xf6608e4de67f062f!2sNissan!5e0!3m2!1sid!2sid!4v1453581859607" width="360" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        
          <span class="borderline"></span>

          <header><h2>MOST POPULAR</h2><span class="borderline"></span></header>
            
            
            <?php echo $this->reginalib->show_populer();?>
            
          
          </div>
        </div>
    </div>
</div>    