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
                    <h4 class="p-1">Create a category</h4>
                    <div class="card-body col">
                        <form action="{{route('categories.store')}}" method="POST" class="font-weight-bold">
                            {{ csrf_field() }}
                            <div class="form-group row m-4">
                                <label class="col-form-label">Name&nbsp;&nbsp;&nbsp;</label>
                                <input type="text" class="form-control col" name="catName" value="">
                            </div>
                            <a class="btn btn-danger float-right font-weight-bold shadow" href="{{ route('categories.index') }}">x</a>
                            <button type="submit" class="btn btn-success float-right shadow"><i class="fas fa-check-circle"></i></button>
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
