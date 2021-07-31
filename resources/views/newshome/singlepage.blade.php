@extends('frontend.main')
@section('title')
नेपाल दैनिक - {{$post->title}}
@endsection

@section('content')
<section id="contentSection">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="single_page">
          <h1>{{$post->title}}</h1>
          <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>{{$post->user->name}}</a> <span><i class="fa fa-calendar"></i>{{$post->created_at}}</span> <a href="#"><i class="fa fa-tags"></i>{{$post->category->name}}</a> </div>
          <div class="single_page_content"> <img id="center" class="img-center" src="{{asset('/image/'.$post->image)}}" style="height: 70%; width:auto;">
           <br> <blockquote style="min-height: 70%"> {{$post->content}} </blockquote>
         </div>
         <div class="social_link">
          <ul class="sociallink_nav">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
          </ul>
        </div>
        <div class="related_post">
          <h2>Related Posts</h2>
          <ul class="spost_nav wow fadeInDown animated">
            @foreach($allPost as $all)
            <li>
              <div class="media"> <a class="media-left" href="{{route('newshome.showPost',$all->title)}}"> <img src="{{asset('/image/'.$all->image)}}"> </a>
                <div class="media-body"> <a class="catg_title" href="{{route('newshome.showPost',$all->title)}}">{{$all->title}}</a> </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection

@section('scripts')
@endsection

</body>
</html>
