@extends('layouts.master')

@section('title')
    User Edit
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="p-1">Change Roles</h4>
                        <div class="card-body col">
                            <form action="{{route('userRoleUpdate',$users->id)}}" method="POST" class="font-weight-bold">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group row m-4">
                                    <label class="col-form-label">Name&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control col" name="user-name" value="{{ $users->name }}">
                                </div>
                                <div class="form-group row m-4">
                                    <label class="col-form-label">User Type&nbsp;&nbsp;&nbsp;</label>
                                    <select name="usertype" class="form-control col">
                                        @foreach ($roles as $r)
                                            <option value="{{$r->id}}" @if($users->role_id == $r->id) ? selected @endif >{{$r->type}}</option>
                                        @endforeach
{{--                                         <option value="writer" @if($users->usertype == 'writer') ? selected @endif>Writer</option>
                                        <option value="editor" @if($users->usertype == 'editor') ? selected @endif>Editor</option> --}}
                                    </select>
                                </div>
                                <a class="btn btn-danger float-right font-weight-bold shadow" href="{{ route('getUsers') }}">x</a>
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
