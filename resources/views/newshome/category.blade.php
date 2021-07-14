@extends('frontend.main')
@section('content')
<section id="contentSection" style="padding: 0 50px;">
  <div class="row">
    <div class="col-md-12 ml-3">
        <div class="contact_area">
          <div class="row">
            @foreach($cat as $c)
            <div class="related_post " style="width: 50%;">
              <ul class="spost_nav wow ">
                <h2>{{$c->title}}</h2>
                <li>
                  <div class="media"> <a class="media-left" href="{{route('newshome.showPost',$c->title)}}"> <img src="{{asset('/image/'.$c->image)}}"> </a>
                    <div class="media-body"> <a class="catg_title" href="{{route('newshome.showPost',$c->title)}}">{{ substr($c->content,0,20) }}</a>
                    </div>
                    <a class="rounded btn btn-info" style="font-weight: bold; border-radius: 5em;" href="{{route('newshome.showPost',$c->title)}}">&emsp;View&emsp;</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach
          </div>
        </div>
      </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation"><a href="#" aria-controls="profile" style="background-color: #de5555" role="tab">Others</a>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  @foreach($category as $c)
                  <li class="cat-item"><a href="{{route('newshome.category',$c->name )}}">{{ $c->name }}</a></li>
                  @endforeach
                </ul>
            </div>
          </div>
    </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
      </div>
    </div>

  </section>
@endsection