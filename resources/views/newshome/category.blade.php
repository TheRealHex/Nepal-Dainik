@extends('frontend.main')
@section('content')
<section id="contentSection" style="padding: 0 100px;">
  <div class="row">
    {{-- @foreach($category as $c) --}}
    <div class="title" style="background-color: lightcoral; border-radius: 1em; color: white; padding: 1px;">
      <h4>{{$title}}</h4>
    </div>
    <br>
    {{-- @endforeach --}}
    <div class="col-md-12 ml-3">
      <div class="contact_area">
        <div class="row">
          @foreach($cat as $c)
          <div class="related_post " style="width: 50%;">
            <ul class="spost_nav wow ">
              <h2>{{$c->title}}</h2>
              <li>
                <div class="media"> <a class="media-left" href="{{route('newshome.showPost',$c->title)}}"> <img src="{{asset('/image/'.$c->image)}}"> </a>
                  <div class="media-body"> <a class="catg_title" href="{{route('newshome.showPost',$c->title)}}">{{ substr($c->content,0,30) }}</a>
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
    <div class="single_sidebar" style="border-bottom: 0px;">
      <br><br>
      <ul class="nav nav-tabs" style="border-radius: 2em; width: 50%; margin:auto;" role="tablist">
        <li role="presentation"><a href="#" class="bg-primary"aria-controls="profile" role="tab">Others</a>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="category">
            <ul>
              @foreach($category as $c)
              <li class="cat-item" style="margin: 2em 30px;"><a href="{{route('newshome.category',$c->name )}}">{{ $c->name }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
      </div>
    </div>
    <br><br>
  </section>
  @endsection