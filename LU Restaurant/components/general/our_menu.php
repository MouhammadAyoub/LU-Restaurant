<?php 
 ?>
<style>
   #slider-popup{
     display:none;
  }
</style>


  <!-- food section -->
 
  <section class="food_section layout_padding-bottom">
    <div class="container" >
      <div class="heading_container heading_center"id="menu-container">
        <h2 style="margin-top: 50px;">
          Menus
        </h2>
      </div>

      <ul class="filters_menu" style="font-size: 18px;">
        <li class="active" data-filter="*" style="margin:0px 12px;">All</li>
        <?php getMenus();?>
      </ul>

      <div class="filters-content">
        <div class="row grid">

        <?php 
            getAllItems();?>
      </div>
      </div>
      </div>
  </section>

  <!-- end food section -->