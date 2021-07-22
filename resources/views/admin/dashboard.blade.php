@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row text-light font-weight-bold">
  <div class="col-md-3">
    <div class="card shadow bg-danger">
      <div class="card-header">
        <h6 class="card-title">Capacity <i class="now-ui-icons location_compass-05 float-right" style="font-size:25px;"></i></h6>
      </div>
      <div class="card-body float-right">
        50 TB
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow bg-primary">
      <div class="card-header">
        <h6 class="card-title">Views <i class="now-ui-icons media-2_sound-wave float-right" style="font-size:25px;"></i></h6>
      </div>
      <div class="card-body float-right" id="Views">
        3000
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow bg-dark">
      <div class="card-header">
        <h6 class="card-title">Posts Today <i class="now-ui-icons education_paper float-right" style="font-size:25px;"></i></h6>
      </div>
      <div class="card-body float-right">
        {{$todayPost}}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow" style="background: lightsalmon;">
      <div class="card-header">
        <h6 class="card-title text-light">Revenue <i class="now-ui-icons business_money-coins float-right" style="font-size:25px;"></i></h6>
      </div>
      <div class="card-body float-right text-light font-weight-bold" id="Revenue">
        100
      </div>
    </div>
  </div>
</div>
  @if (Auth::user()->role->type == 'admin')
<div class="row text-light font-weight-bold">
  <div class="col-md-3">
    <div class="card shadow bg-warning">
      <div class="card-header">
        <h6 class="card-title">Editors <i class="now-ui-icons users_single-02 float-right" style="font-size:25px;"></i></h6>
      </div>
      <div class="card-body float-right">
        {{$editor}}
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow" style="background: lightcoral;">
      <div class="card-header">
        <h6 class="card-title">Writers <i class="now-ui-icons users_single-02 float-right" style="font-size:25px;"></i></h6>
      </div>
      <div class="card-body float-right">
        {{$writer}}
      </div>
    </div>
  </div>
  @endif
  @endsection

  @section('scripts')
  <script type="text/javascript">
    var count = 100,views=3128;
    var increment = setInterval(function() {
      count++;
      views+=29;
      document.getElementById("Revenue").textContent = count + "$";
      document.getElementById("Views").textContent = views;
    }, 4000);
  </script>
  @endsection