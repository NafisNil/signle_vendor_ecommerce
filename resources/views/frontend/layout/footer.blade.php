
    <footer>
      <div class="container">
          <div class="row">
              <div class="footer-top-cms">
                  <div class="col-sm-7">
                      <div class="newslatter">
                          <form>
                              <h5>Newsletter</h5>
                              <div class="input-group">
                                  <input type="text" class=" form-control" placeholder="Email Here......">
                                  <button type="submit" value="Sign up" class="btn btn-large btn-primary">Subscribe</button>
                              </div>
                          </form>
                      </div>
                  </div>
                  <div class="col-sm-5">
                      <div class="footer-social">
                          <h5>Social</h5>
                          <ul>
                              <li class="facebook"><a href="{{$credential->facebook}}"><i class="fa fa-facebook"></i></a></li>
                              <li class="instagram"><a href="{{$credential->instagram}}"><i class="fa fa-instagram"></i></a></li>
                             
                              <li class="youtube"><a href="{{$credential->youtube}}"><i class="fa fa-youtube-play"></i></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-3 footer-block">
                  <h5 class="footer-title">Information</h5>
                  <ul class="list-unstyled ul-wrapper">
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Delivery Information</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Terms &amp; Conditions</a></li>
                  </ul>
              </div>
              <div class="col-sm-3 footer-block">
                  <h5 class="footer-title">Customer Service</h5>
                  <ul class="list-unstyled ul-wrapper">
                      <li><a href="#">Contact Us</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Wish List</a></li>
                  </ul>
              </div>
              <div class="col-sm-3 footer-block">
                  <h5 class="footer-title">Extras</h5>
                  <ul class="list-unstyled ul-wrapper">
                      <li><a href="#">Brands</a></li>
                      <li><a href="#">Gift Vouchers</a></li>
                      <li><a href="#">Affiliates</a></li>
                      <li><a href="#">Specials</a></li>
                  </ul>
              </div>
              <div class="col-sm-3 footer-block">
                  <div class="content_footercms_right">
                      <div class="footer-contact">
                          <h5 class="contact-title footer-title">Contact Us</h5>
                          <ul class="ul-wrapper">
                              <li><i class="fa fa-map-marker"></i><span class="location2"> {{$contact->address}}
                              USA</span></li>
                              <li><i class="fa fa-envelope"></i><span class="mail2"><a href="#">{{$contact->email}}</a></span></li>
                              <li><i class="fa fa-mobile"></i><span class="phone2">{{$contact->mobile}}</span></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <a id="scrollup">Scroll</a> </footer>
  <div class="footer-bottom">
      <div class="container">
         
          <div class="footer-bottom-cms">
              <div class="footer-payment">
                  <ul>
                      <li class="mastero"><a href="#"><img alt="" src="{{asset('frontend')}}/image/payment/mastero.jpg"></a></li>
                      <li class="visa"><a href="#"><img alt="" src="{{asset('frontend')}}/image/payment/visa.jpg"></a></li>
                      <li class="currus"><a href="#"><img alt="" src="{{asset('frontend')}}/image/payment/currus.jpg"></a></li>
                      <li class="discover"><a href="#"><img alt="" src="{{asset('frontend')}}/image/payment/discover.jpg"></a></li>
                      <li class="bank"><a href="#"><img alt="" src="{{asset('frontend')}}/image/payment/bank.jpg"></a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>