<section id="slider"><!--slider-->
  <div class="container">
    <div class="row">

      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">

          <?php $item_active = 1;
          $all_publish_slider = DB::table('tbl_slider')
          ->where('publication_status', 1)
          ->get(); ?>

          <ol class="carousel-indicators">
            <?php
              $i = 1;
              $active = 1;
              foreach($all_publish_slider as $slider)
              {?>

                <li data-target="#slider-carousel" data-slide-to="{{$i++}}"
                class= <?php echo ($active == 1) ? "active" : ""?>></li>
                <?php $active++; }?>
              </ol>

        <div class="carousel-inner">
          <?php
            foreach($all_publish_slider as $slider)
            {?>

              <div class="item <?php echo ($item_active == 1) ? "active" : ""?> ">
                <div class="col-sm-8">

                    <button type="button" class="btn btn-default get">Get it now</button>
                  </div>
                  <div class="col-sm-6">
                    <img src="{{URL::to($slider->slider_image)}}" class="girl img-responsive" alt=""/>
                    <img src="{{asset('frontend/images/home/pricing.png')}}" class="pricing" alt=""/>
                  </div>
                </div>
              <?php $item_active++; } ?>
            </div>
                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="next">
                  <i class="fa fa-angle-left"></i>
                </a>
                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="prev">
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section><!--/slider-->
