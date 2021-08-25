@extends('frontend.main')

@section('title')
नेपाल दैनिक
@endsection

@section('content')
<section id="sliderSection">
  <div class="ticker">
    <div class="title">
      <p>Breaking News</p>
    </div>
    <div class="news marquee">
      <ul>


        <div style="width:900px; ">
          <marquee direction="left" onmouseover="stop(this);" onmouseout="start(this);" Scrolldelay="100" >
            @foreach($breakingNews as $b)
            <a href="{{route('newshome.showPost',$b->title)}}" style="color: whitesmoke; padding-right: 40px;">{{$b->title}}</a>
            @endforeach
          </marquee> 


        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
          @foreach ($slider as $s)
          <div class="single_iteam"> <a href="{{route('newshome.showPost',$s->title)}}"> <img src="{{asset('/image/'.$s->image)}}" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="{{route('newshome.showPost',$s->title)}}">{{$s->title}}</a></h2>
              <h2><a class="slider_content" href="{{route('newshome.showPost',$s->title)}}">{{ date('M d, Y',strtotime($s->created_at)) }}</a></h2>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              @foreach($post as $p)
              <li>
                <div class="media"> <a href="{{route('newshome.showPost',$p->title)}}" class="media-left"> <img src="{{asset('/image/'.$p->image)}}"></a>
                  <div class="media-body"> <a href="{{route('newshome.showPost',$p->title)}}" class="catg_title text-danger" style="font-weight: bold;">{{$p->title}}</a> 
                    <p style=" height: 80px;width: 180px;overflow: hidden;">{{$p->content}}</p>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>National</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="" class="featured_img"> <img alt="" src="images/featured_img1.jpg"> <span class="overlay"></span> </a>
                    <figcaption> <a href="#fashion">What is National news?</a> </figcaption>
                    <p>It is a category of news article which covers that news of nationwide only.</p>
                    <br>

                  </li>
                </ul>
              </div>
              <div class="single_post_content_right">
                <ul class="spost_nav">
                  @foreach($natPost as $nat)
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{route('newshome.showPost',$nat->title)}}" class="media-left"> <img alt="" src="{{asset('/image/'.$nat->image)}}"> </a>
                      <div class="media-body"> <a href="{{route('newshome.showPost',$nat->title)}}" class="catg_title"> {{$nat->title}}</a>
                        <p style=" height: 80px;width: 180px;overflow: hidden;">{{$p->content}}</p>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="fashion_technology_area">
              <div class="fashion" id="fashion">
                <div class="single_post_content">
                  <h2><span>Fashion</span></h2>
                  <ul class="business_catgnav wow fadeInDown">
                    <li>
                      <figure class="bsbig_fig">
                        <figcaption> <a href="#fashion">What is Fashion?</a> </figcaption>
                        <p>Fashion is a form of self-expression and autonomy at a particular period and place and in a specific context, of clothing, footwear, lifestyle, accessories, makeup, hairstyle, and body posture.</p>
                        <br>
                      </figure>
                    </li>
                  </ul>
                  <ul class="spost_nav">
                   @foreach($fashion as $e)
                   <li>
                     <div class="media"> <a href="{{route('newshome.showPost',$e->title)}}" class="media-left"> <img src="{{asset('/image/'.$e->image)}}"></a>
                      <div class="media-body"> <a href="{{route('newshome.showPost',$e->title)}}" class="catg_title text-danger" style="font-weight: bold;">{{$e->title}}</a>
                        <p style="padding-left: 1em; height: 80px; width: 180px; overflow: hidden;">{{$e->content}}</p>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="technology" id="technology">
              <div class="single_post_content">
                <h2><span>Technology</span></h2>
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown">
                      <figcaption> <a href="#technology">What is Technology?</figcaption></a><br>
                      <p>Technology is the sum of techniques, skills, methods, and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation.</p>
                      <br>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                  @foreach($tech as $e)
                  <li>
                   <div class="media"> <a href="{{route('newshome.showPost',$e->title)}}" class="media-left"> <img src="{{asset('/image/'.$e->image)}}"></a>
                    <div class="media-body"> <a href="{{route('newshome.showPost',$e->title)}}" class="catg_title text-danger" style="font-weight: bold;">{{$e->title}}</a>
                      <p style="padding-left: 1em; height: 80px; width: 180px; overflow: hidden;">{{$e->content}}</p>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <aside class="right_content">
        <div class="single_sidebar">
          <h2><span>Links</span></h2>
        </div>
        <div class="single_sidebar">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="category">
              <ul>
                @foreach($category as $row)
                <li class="cat-item"><a href="{{route('newshome.category',$row->name )}}">{{ $row->name }}</a></li>
                @endforeach
              </ul>
            </div>
            <br>
          </div>
        </div>
        <div class="single_sidebar wow fadeInDown">
          <h2><span>Sponsor</span></h2>
          @foreach($sponsorNormal as $s)
          <a class="sideAdd" href="{{$s->website}}" target="_blank">
            <img style="border: 2px solid #606060; border-radius: 1em;" src="{{asset('/ads/'.$s->image)}}" alt="">
          </a>
          @endforeach
        </div>
      </aside>
    </div>
  </div>
  <br><br>
  <div class="banner_ads">
    <marquee behavior="scroll" direction="left" Scrolldelay=100>
      @foreach ($sponsorBanner as $s)
      <li style="display:inline-block">
        <a href="{{$s->website}}" target="_blank">
          <img src="{{asset('/ads/'.$s->image)}}" height="85px" alt="add_banner">
        </a>
      </li>
      @endforeach
    </marquee>
    <br><br>
  </div>
</section>
@endsection
