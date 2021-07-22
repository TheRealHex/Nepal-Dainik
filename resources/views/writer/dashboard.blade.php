@extends('layouts.master')

@section('title')
Writer Dashboard
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="float-right text-light font-weight-bold" style="background-color: lightseagreen; border-radius: 50%; padding: 9px; font-size: 1em;"></h5>
        <h4 class="card-title ">Dashboard</h4>
      </div>
      <div class="card-bod row p-4 text-light">
        <div class="col-md-4">
          <div class="card shadow bg-primary">
            <div class="card-header">
              <h6 class="card-title">Views <i class="now-ui-icons media-2_sound-wave float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right" id="Views">
              3000
            </div>
          </div>
          <div class="card shadow" style="background: lightsalmon;">
            <div class="card-header">
              <h6 class="card-title">Revenue <i class="now-ui-icons business_money-coins float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right" id="Revenue">
              100
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card shadow bg-primary">
            <div class="card-header">
              <h6 class="card-title">Views <i class="now-ui-icons media-2_sound-wave float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right" id="Views">
              3000
            </div>
          </div>
          <div class="card shadow" style="background: lightsalmon;">
            <div class="card-header">
              <h6 class="card-title">Revenue <i class="now-ui-icons business_money-coins float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right" id="Revenue">
              100
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card shadow bg-primary">
            <div class="card-header">
              <h6 class="card-title">Views <i class="now-ui-icons media-2_sound-wave float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right" id="Views">
              3000
            </div>
          </div>
          <div class="card shadow" style="background: lightsalmon;">
            <div class="card-header">
              <h6 class="card-title">Total Posts<i class="now-ui-icons business_money-coins float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right">
              {{-- <label name ="postcount">{{postcount}}</label> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
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