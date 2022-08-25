<?php 

$items = getNewItem();
if(count($items)){


?>
<!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      <?php echo $items[0][1]; ?>
                    </h1>
                    <p style="font-size: 20px;">
                    <?php echo $items[0][2]; ?>
                    </p>
                    <div class="btn-box">
                      <a href="addToCart.php?item_id=<?php echo $items[0][0];?>" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if(count($items)>1){?>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    <?php echo $items[1][1]; ?>
                    </h1>
                    <p style="font-size: 20px;">
                    <?php echo $items[1][2]; ?>
                    </p>
                    <div class="btn-box">
                      <a href="addToCart.php?item_id=<?php echo $items[1][0];?>" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } if(count($items)>2){?>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                    <?php echo $items[2][1]; ?>
                    </h1>
                    <p style="font-size: 20px;">
                    <?php echo $items[2][2]; ?>
                    </p>
                    <div class="btn-box">
                      <a href="addToCart.php?item_id=<?php echo $items[2][0];?>" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php  } ?>
        </div>
        
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>

    </section>
    <!-- end slider section -->
</div>
<?php } ?>