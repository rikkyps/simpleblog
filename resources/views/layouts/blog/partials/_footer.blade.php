<div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="logo">
              <h6 class="text-white">{{ $setting->title }}</h6>
            </div>
            <div class="contact-details">
              <p>{{ $setting->address }}</p>
              <p>Phone: {{ $setting->phone }}</p>
              <p>Email: <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></p>
              <ul class="social-menu">
                <li class="list-inline-item"><a href="{{ $setting->so_facebook }}"><i class="fa fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="{{ $setting->so_twitter }}"><i class="fa fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="{{ $setting->so_instagram }}"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="menus d-flex">
              <ul class="list-unstyled">
                <li> <a href="#">My Account</a></li>
                <li> <a href="#">Add Listing</a></li>
                <li> <a href="#">Pricing</a></li>
                <li> <a href="#">Privacy &amp; Policy</a></li>
              </ul>
              <ul class="list-unstyled">
                <li> <a href="#">Our Partners</a></li>
                <li> <a href="#">FAQ</a></li>
                <li> <a href="#">How It Works</a></li>
                <li> <a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="latest-posts"><a href="#">
              @foreach(\App\Post::where('status', 1)->inRandomOrder()->limit(3)->get() as $post)
                <div class="post d-flex align-items-center">
                  <div class="image"><img src="{{ $post->featured }}" alt="..." class="img-fluid"></div>
                  <div class="title"><strong>{{ $post->title }}</strong><span class="date last-meta">{{ $post->published_at }}</span></div>
                </div></a><a href="#">
              @endforeach
            </div>
          </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p>&copy; 2017. All rights reserved. Your great site.</p>
            </div>
            <div class="col-md-6 text-right">
              <p>Template By <a href="https://bootstraptemple.com" class="text-white">Bootstrap Temple</a>
                <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
              </p>
            </div>
          </div>
        </div>
    </div>
