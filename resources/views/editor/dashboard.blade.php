@extends('layouts.editor-master')

@section('title')
	Editor Dashboard
@endsection

@section('content')
  <div class="row text-light font-weight-bold">
          <div class="col-md-4">
            <div class="card shadow bg-danger">
              <div class="card-header">
              <h6 class="card-title">Capacity <i class="now-ui-icons location_compass-05 float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right">
              50 TB
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow bg-primary">
              <div class="card-header">
              <h6 class="card-title">Views <i class="now-ui-icons media-2_sound-wave float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right" id="Views">
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow bg-dark">
              <div class="card-header">
              <h6 class="card-title">Posts Today <i class="now-ui-icons education_paper float-right" style="font-size:25px;"></i></h6>
            </div>
            <div class="card-body float-right">
              10
            </div>
          </div>
        </div>
      </div>
          
@endsection

@section('scripts')
	
@endsection