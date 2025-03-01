@extends('layouts.default')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<style>
  /* Doctor */
  .doctor__list {
    margin: 80px 0 135px 0;
  }
  .doctor__ico__arrow {
    width: 25px;
    height: 25px;
  }
  .cascade-slider_container {
    position: relative;
    width: 100%;
    height: 250px;
    margin: 25px auto;
    padding-top: 150px;
  }
  .cascade-slider_item {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%) scale(0.3);
    transition: all 1s ease;
    opacity: 0;
    z-index: -1;
    text-align: center;
  }
  .cascade-slider_item img {
    width: 400px;
  }
  .cascade-slider_item.next {
    left: 50%;
    transform: translateY(-50%) translateX(-150%) scale(0.6);
    opacity: 1;
    z-index: 1;
  }
  .cascade-slider_item.prev {
    left: 50%;
    transform: translateY(-50%) translateX(50%) scale(0.6);
    opacity: 1;
    z-index: 1;
  }
  .cascade-slider_item.now {
    top: 50%;
    left: 50%;
    transform: translateY(-50%) translateX(-50%) scale(1);
    opacity: 1;
    z-index: 5;
  }
  .cascade-slider_arrow {
    display: inline-block;
    position: absolute;
    top: 50%;
    cursor: pointer;
    z-index: 5;
    
  }
  .cascade-slider_arrow-left { left: 0; }
  .cascade-slider_arrow-right { right: 0; }
  .cascade-slider_nav {
    position: absolute;
    bottom: -150px;
    width: 100%;
    text-align: center;
    z-index: 5;
  }
  .cascade-slider_dot {
    display: inline-block;
    width: 1em;
    height: 1em;
    margin: 1em;
    border-radius: 10px;
    background: #ddd;
    list-style: none;
    cursor: pointer;
  }
  .cascade-slider_dot:hover { background: #555; }
  .cascade-slider_dot.cur { background: #555; }

  /* VDO */
  .video-container {
    overflow: hidden;
    position: relative;
    width:100%;
  }
  .video-container::after {
    padding-top: 56.25%;
    display: block;
    content: '';
  }
  .video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  /* MAP */
  .map-responsive{
      overflow:hidden;
      padding-bottom:50%;
      position:relative;
      height:0;
  }
  .map-responsive iframe{
      left:0;
      top:0;
      height:100%;
      width:100%;
      position:absolute;
  }
  /* Contact */
  .home__contact__section {
    margin-top: -150px;
  }
  .home__contact__box {
    background-color: white;
    border: 1px solid #cccccc;
  }
  .home__services__section {
    margin: 50px 0;
  }
  .home__services__box a:hover {
    color: black;
  }
  .home__contact__box_info {
    min-height: 80px;
  }
  .home__services__title {
    margin-top: 15px;
    margin-bottom: 0;
  }
  .home__services__txt {
    line-height: 1;
  }

  /* Small devices (landscape phones, less than 576px) */
  @media (max-width: 575.98px) {
    .home__contact__section {
      margin-top: 25px;
    }
    .home__contact__box {
      margin-top: 8px;
    }
  }

</style>

@include('includes.banner')

<section class="section__info">
  <div class="container">
      <div class="row">
          <!-- Desktop Version. -->
          <div class="col-10 offset-1 section__info__txt d-none d-sm-block">
            <div class="row">
              <div class="col-sm-4 col-12 home__info colorWhite section_info_1">
                <img src="{{ asset('images/ico_stethoscope_white.svg') }}" class="icoInfo" />
                <h3>{!! __('home.info_estimate') !!}</h3>
                <div>{!! __('home.info_estimate_detail') !!}</div>
              </div>   
              <div class="col-sm-4 col-12 home__info colorWhite section_info_2">
                <img src="{{ asset('images/ico_brain_white.svg') }}" class="icoInfo" />
                <h3>{!! __('home.info_cure') !!}</h3>
                <div>{!! __('home.info_cure_detail') !!}</div>
              </div>   
              <div class="col-sm-4 col-12 home__info colorWhite section_info_1">
                <img src="{{ asset('images/ico_heart_white.svg') }}" class="icoInfo" />
                <h3>{!! __('home.info_heal') !!}</h3>
                <div>{!! __('home.info_heal_detail') !!}</div>
              </div>  
            </div>
          </div>
          <!-- Mobile Version. -->
          <div class="col-10 offset-1 section__info__txt d-block d-sm-none">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <img src="{{ asset('images/ico_stethoscope_white.svg') }}" class="icoInfo" />
                <h3>{!! __('home.info_estimate') !!}</h3>
                <div>{!! __('home.info_estimate_detail') !!}</div> 
              </div>
              <div class="item">
                <img src="{{ asset('images/ico_brain_white.svg') }}" class="icoInfo" />
                <h3>{!! __('home.info_cure') !!}</h3>
                <div>{!! __('home.info_cure_detail') !!}</div>
              </div>
              <div class="item">
                <img src="{{ asset('images/ico_heart_white.svg') }}" class="icoInfo" />
                <h3>{!! __('home.info_heal') !!}</h3>
                <div>{!! __('home.info_heal_detail') !!}</div>
              </div>
            </div>
          </div>
      </div>    
  </div>
</section>

<!-- Doctor -->
<section class="section__doctor">
  <div class="container">
      <div class="row">
        <div class="col-8 offset-2 text-center">
          <!--h2 class="colorPrimary">{{-- __('home.info_doctor') --}}</h2-->
          <p class="fontSize125rem">{{ __('home.info_doctor_detail') }}</p>
        </div>
        <div class="col-12 text-center">
          <hr class="section__doctor__hr" >
        </div>
      </div>

      <div class="row">
        <div class="col-12 doctor__list">

          <!-- On Mobile -->
          <div class="col-10 offset-1 d-block d-sm-none">
            <div class="owl-carousel owl-theme">
              @foreach ($doctor as $item)
                <div class="item">
                  <a href="{{$item['slug']['th']}}">
                    <img src="{{$item['thumbnail']}}" width="100%" alt="{{$item['title']['th']}}" />
                    <h3 class="colorPrimary text-center">{{$item['title']['th']}}</h3>
                  </a>
                </div>
              @endforeach
            </div>
          </div>

          <!-- On Desktop -->
          <div class="cascade-slider_container d-none d-sm-block" id="cascade-slider">
            <div class="cascade-slider_slides">
              @foreach ($doctor as $item)
                <div class="cascade-slider_item">
                  <a href="{{$item['slug']['th']}}">
                    <img src="{{$item['thumbnail']}}" alt="{{$item['title']['th']}}">
                  </a>
                  <br />
                  <a href="{{$item['slug']['th']}}">
                    <h3 class="colorPrimary">{{$item['title']['th']}}</h3>
                  </a>
                  <br />
                </div>
              @endforeach
            </div>
            <ol class="cascade-slider_nav">
              @foreach ($doctor as $key => $item)
                <li class="cascade-slider_dot cur"></li>
              @endforeach
            </ol>
            <span class="cascade-slider_arrow cascade-slider_arrow-left" data-action="prev">
              <img src="{{ asset('images/ico_arrow_back.svg') }}" class="doctor__ico__arrow" />
            </span>
            <span class="cascade-slider_arrow cascade-slider_arrow-right" data-action="next">
              <img src="{{ asset('images/ico_arrow_next.svg') }}" class="doctor__ico__arrow" />
            </span>
          </div>

        </div>
      </div>
    </div>
</section>

<!-- VDO -->
<section class="section__vdo">
  <div class="container">
    <div class="row">
      <div class="col-10 offset-1" id="player-overlay">
        <!--video controls>
          <source src="/images/video/sample.mp4" />
          <source src="/images/video/sample.webm" type='video/webm; codecs="vp8, vorbis"' />
          <source src="/images/video/sample.ogv" type='video/ogg; codecs="theora, vorbis"' />
        </video-->
        <div class="video-container">
          <iframe src="https://www.youtube.com/embed/dfa9s8WsiyE" 
                  frameborder="0" 
                  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen></iframe>
        </div>
      </div>
  </div>
</section>

<!-- Article & Services -->
<section class="section__doctor">
  <div class="container">
      <div class="row">
        <div class="col-8 offset-2 text-center">
          <h2><a href="{{ URL::to('articles') }}" class="colorPrimary">{{ __('home.info_article') }}</a></h2>
          <p class="fontSize15rem">{{ __('home.info_article_detail') }}</p>
        </div>
      </div>
      <div class="row text-center">
        <hr class="section__doctor__hr" >
      </div>
      <div class="row home__services__section">
        @foreach ($data as $item)
            <div class="col-sm-6 col-12 home__services__box">
                <a href="{{$item['slug']['th']}}">
                    <div class="home__services__item">
                      <img src="{{$item['thumbnail']['th']}}" width="100%" />
                      <h4 class="colorPrimary fontSize2rem home__services__title">{{$item['title']['th']}}</h4>
                      <!--p class="fontSize15rem home__services__txt">{{--$item['description']['th']--}}</p-->
                    </div>
                </a>
            </div>
        @endforeach
      </div>
    </div>
</section>

<!-- Google Map & Contact Infomation -->
<div id="googlemap" class="container">
  <div class="row">
    <div class="col-12">
      <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=asoke+tower" 
            width="600" 
            height="450" 
            frameborder="0" 
            style="border:0" 
            allowfullscreen></iframe>
      </div>
      <div id="contactus" class="row home__contact__section">
        <div class="col-10 offset-1">
          <div class="row">
            <div class="col-sm-4 col-12 text-center home__contact__box">
              <img src="{{ asset('images/ico_map_pin.svg') }}" class="icoInfo" />
              <h4>{{ __('home.contact_title_1') }}</h4>
              <div class="home__contact__box_info">{{ __('home.contact_address') }}</div>
              <br />
              <div class="fontSize15rem">
                <a href="https://www.google.com/maps?saddr=Current+Location&daddr=13.745728917160257,100.56217863046466" target="_blank">
                  <b class="colorPrimary">{{ __('home.contact_footer_1') }}</b>
                </a>
              </div>
              <br />
            </div>
            <div class="col-sm-4 col-12 text-center home__contact__box">
              <img src="{{ asset('images/ico_contact.svg') }}" class="icoInfo" />
              <h4>{{ __('home.contact_title_2') }}</h4>
              <div class="home__contact__box_info">
                <p>{!! __('home.contact_contact_mail') !!}</p>
                <p>{!! __('home.contact_contact_phone') !!}</p>
              </div>
              <br />
              <div class="colorPrimary fontSize15rem">
                <b class="colorPrimary">{{ __('home.contact_footer_2') }}</b>
              </div>
              <br />
            </div>
            <div class="col-sm-4 col-12 text-center home__contact__box">
              <img src="{{ asset('images/ico_gallery.svg') }}" class="icoInfo" />
              <h4>{{ __('home.contact_title_3') }}</h4>
              <div class="home__contact__box_info">{{ __('home.contact_gallery_txt') }}</div>
              <br />
              <div class="colorPrimary fontSize15rem">
                <a href="{{ URL::to('aboutus#gallery') }}">
                  <b class="colorPrimary">{{ __('home.contact_footer_3') }}</b>
                </a>
              </div>
              <br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Minimal-3D-Image-Rotator-with-jQuery-CSS3-Cascade-Slider/cascade-slider.js"></script>
<!-- 
  https://codepen.io/cy2/pen/MWYaRQj 
  https://codepen.io/Ranju26/pen/xvWEme
  https://codepen.io/Nagaprasanna/pen/GoKLrJ
  https://codepen.io/Pycb/pen/wWRrjg
  https://www.flaticon.com/categories/arrows
-->
<script>
  jQuery(document).ready(function() {
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      responsive:{
          0:{
              items:1
          },
          768:{
              items:3
          },
          1200:{
              items:5
          }
      }
    });

    $('#cascade-slider').cascadeSlider({
      itemClass: 'cascade-slider_item',
      arrowClass: 'cascade-slider_arrow'
    });

  });
</script>
  
@stop