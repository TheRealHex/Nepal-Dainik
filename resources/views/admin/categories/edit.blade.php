@extends('layouts.master')

@section('title')
    Categories  Add
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="p-1">Categories</h4>
                        <div class="card-body col">
                            <form action="{{route('categories.update',$category->id)}}" method="POST" class="font-weight-bold">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group row m-4">
                                    <label class="col-form-label">Name&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control col" name="catName" value="{{$category->name}}">
                                </div>
                                <a class="btn btn-danger float-right font-weight-bold p-3 ml-3 shadow text-light" href="{{ route('categories.index') }}">Cancel</a>
                                <button type="submit" class="btn btn-success float-right font-weight-bold p-3 shadow">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
