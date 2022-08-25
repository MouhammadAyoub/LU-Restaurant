
  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container" >

      <div class="row">
        <div class="col-md-6 " >
          <div class="img-box" style="margin-right: 150px;">
            <img src="images/about-img.png" alt="" height="459px">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2 style="font-size: 45px;margin-top:-50px;">
                We Are &nbsp;<span style="text-shadow: 0 0 20px #FFFFC0, 0 0 20px #FFFFFF;"><b>LU Restaurant</b></span>
              </h2><br/>
            </div>
            <p>
              <?php
                $about = getAbout();
                if(count($about)>0){
                echo $about[0][0];}
              ?>
            </p>
         
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
