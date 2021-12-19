<footer id="footer" class="footer color-bg">

  <div class="footer-bottom">
    <div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>

          @php
            $setting = App\Models\SiteSetting::find(1);
          @endphp

          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> 
                  <span class="icon fa-stack fa-lg"> 
                    <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> 
                  </span> 
                </div>
                <div class="media-body">
                  <p>{{ $setting->company_name }}, {{ $setting->company_address }}</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left">
                    <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span> 
                  </div>
                <div class="media-body">
                  <p>
                    {{ $setting->phone_one }}
                    <br>
                    {{ $setting->phone_two }}
                  </p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> 
                  <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> 
                </div>
                  <div class="media-body"> 
                    <span><a href="#">{{ $setting->email }}</a></span> 
                  </div>
              </li>
            </ul>
          </div>

        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-3">

          <div class="module-heading">
            <h4 class="module-title">Payment Method</h4>
          </div>
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li>
                <a href="#">Bank</a>
              </li>
              <li>
                <a href="#">Go Pay</li></a>
              <li>
                <a href="#">OVO</li></a>
            </ul>
          </div>

        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-3">

          <div class="module-heading">
            <h4 class="module-title">Shipping Method</h4>
          </div>
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li>
                <a href="#">JNE</li></a>
            </ul>
          </div>

        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-3">

          <div class="module-heading">
            <h4 class="module-title">About Me</h4>
          </div>
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li>
                <a href="{{ route('about-me') }}">Profile</a>
              </li>
            </ul>
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="copyright-bar">
    <div class="container">

      <div class="col-xs-12 col-sm-6 no-padding social">

        <ul class="link">
          <li class="tw pull-left">
            <a target="_blank" rel="nofollow" href="{{ $setting->twitter }}" title="Twitter"></a>
          </li>
          <li class="linkedin pull-left">
            <a target="_blank" rel="nofollow" href="{{ $setting->linkedin }}" title="Linkedin"></a>
          </li>
          <li class="youtube pull-left">
            <a target="_blank" rel="nofollow" href="{{ $setting->youtube }}" title="Youtube"></a>
          </li>
        </ul>

      </div>

      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="assets/images/payments/1.png" alt=""></li>
            <li><img src="assets/images/payments/2.png" alt=""></li>
            <li><img src="assets/images/payments/3.png" alt=""></li>
            <li><img src="assets/images/payments/4.png" alt=""></li>
            <li><img src="assets/images/payments/5.png" alt=""></li>
          </ul>
        </div>
      </div>
      
    </div>
  </div>

</footer>