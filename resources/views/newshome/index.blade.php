@extends('frontend.main')

@section('title')
नेपाल दैनिक
@endsection

@section('content')
<section id="sliderSection">
  <div class="ticker">
    <div class="title">
      <h5>Breaking News</h5>
    </div>
    <div class="news marquee">
      @foreach($breakingNews as $b)
      <li style="display:inline-block;">
        <div class="media">
          <div class="media-body" style="padding-right: 3em;">
            <a href="{{route('newshome.showPost',$b->title)}}" style="color: whitesmoke;">{{$b->title}}</a> 
          </div>
        </div>
      </li>
      @endforeach
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
      <div class="slick_slider">
        @foreach ($natPost as $nat)
        <div class="single_iteam"> <a href="{{route('newshome.showPost',$nat->title)}}"> <img src="{{asset('/image/'.$nat->image)}}" alt=""></a>
          <div class="slider_article">
            <h2><a class="slider_tittle" href="{{route('newshome.showPost',$nat->title)}}">{{$nat->title}}</a></h2>
            <h2><a class="slider_content" href="{{route('newshome.showPost',$nat->title)}}">{{ date('M d, Y',strtotime($nat->created_at)) }}</a></h2>
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
          <h2><span>Something1</span></h2>
          <div class="single_post_content_left">
            <ul class="business_catgnav  wow fadeInDown">
              <li>
                <figure class="bsbig_fig"> <a href="/single" class="featured_img"> <img alt="" src="images/featured_img1.jpg"> <span class="overlay"></span> </a>
                  <figcaption> <a href="/single">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                  <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                </figure>
              </li>
            </ul>
          </div>
          <div class="single_post_content_right">
            <ul class="spost_nav">
              @foreach($natPost as $nat)
              <li>
                <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="{{asset('/image/'.$nat->image)}}"> </a>
                  <div class="media-body"> <a href="/single" class="catg_title"> {{$nat->title}}</a> </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="fashion_technology_area">
          <div class="fashion">
            <div class="single_post_content">
              <h2><span>Something2</span></h2>
              <ul class="business_catgnav wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="/single" class="featured_img"> <img alt="" src="images/featured_img2.jpg"> <span class="overlay"></span> </a>
                    <figcaption> <a href="/single">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                  </figure>
                </li>
              </ul>
              <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="technology">
            <div class="single_post_content">
              <h2><span>Something3</span></h2>
              <ul class="business_catgnav">
                <li>
                  <figure class="bsbig_fig wow fadeInDown"> <a href="/single" class="featured_img"> <img alt="" src="images/featured_img3.jpg"> <span class="overlay"></span> </a>
                    <figcaption> <a href="/single">Proin rhoncus consequat nisl eu ornare mauris</a> </figcaption>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a phare...</p>
                  </figure>
                </li>
              </ul>
              <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <aside class="right_content">
        <div class="single_sidebar">
          <h2><span>Technology</span></h2>
          <ul class="spost_nav">
            <li>
              <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="single_sidebar">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="category">
              <ul>
                <li class="cat-item"><a href="#">Sports</a></li>
                <li class="cat-item"><a href="#">Fashion</a></li>
                <li class="cat-item"><a href="#">Business</a></li>
                <li class="cat-item"><a href="#">Technology</a></li>
                <li class="cat-item"><a href="#">Games</a></li>
                <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                <li class="cat-item"><a href="#">Photography</a></li>
              </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="video">
              <div class="vide_area">
                <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="comments">
              <ul class="spost_nav">
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                  </div>
                </li>
                <li>
                  <div class="media wow fadeInDown"> <a href="/single" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                    <div class="media-body"> <a href="/single" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="single_sidebar wow fadeInDown">
          <h2><span>Sponsor</span></h2>
          <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a>
          <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> 
          <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> 
        </div>
      </aside>
    </div>
  </div>
  <br><br>
  <div class="banner_ads">
    
    <marquee behavior="scroll" direction="left">
      @foreach ($breakingNews as $b)
      <li style="display:inline-block">
        <a href="#"></a>
        <img src="/image/CG.gif" alt="">
      </li>
      @endforeach
    </marquee>
    <br><br>
  </div>
</section>
@endsection
