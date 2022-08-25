<?php 
require("./functions.php");
function showItems($item_id,$name,$item_description,$item_price,$rating_avg){ 
  $images = getImages($item_id);
  echo $images[0];
  ?>

<style>
    .detail-box{
      width:500px;
    }
    
   .item-link{
     color:white;
   }
   .arrow{
     color:#343a40;
     font-size: x-large;
     margin-left: 50px;
     margin-right: 50px;
   }
  

   
</style>


<div class="col-sm-4 col-lg-4 all" >
            <div class="box" >
              <div>
                <div class="img-box">
                <a href="item-page.php?menu-name='alaa'">  <img src="./images/<?php echo $images[0]?>" alt=""></a>
                
                </div>
                <div class="detail-box">
                  <h5>
                    <?php echo $name;?>
                  </h5>
                  <p>
                    <?php echo $item_description;?>
                  </p>
                  <div class="options">
                    <h5 style="margin-top: 10px;">
                      $<?php echo $item_price;?>
                    </h5>


                    <a href="rate.php">
                        <button style="  display: inline-block;
                                        padding: 8px 30px;background-color: #ffbe33;
                                        color: #ffffff;
                                        border-radius: 45px;
                                        border: none;">
                                        Rate</button>
                    </a>

                    <a href="./addToCart.php?item_id=">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                          </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
</div>

<?php } ?>

