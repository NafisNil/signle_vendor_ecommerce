
    <div class="mainbanner">
        <div id="main-banner" class="owl-carousel home-slider">
            @foreach ($slider as $item)
                
         
            <div class="item"> <a href="#"><img src="{{(!empty($item->image))?URL::to('upload/slider_image/'.$item->image):URL::to('image/no_image.png')}}" alt="main-banner1" class="img-responsive" /></a> </div>
           

            @endforeach
        </div>

    </div>