@extends('layouts.master')
@section('title')
Settings
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="p-1">User Profile</h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="card-body offset-md-1 mr-5">
                        <form action="{{route('password.update')}}" method="POST" class="font-weight-bold" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="user" value="{{$users->id}}">
                            <button type="button" class="btn btn-sm btn-warning rounded float-right font-weight-bold" data-toggle="modal" data-target="#Password">
                                Change Password
                            </button>
                            <br>
                            <!-- Modal -->
                            <div class="modal fade" id="Password" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Password Change</h5>
                                            <button type="buttons" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input class="form-control" type="password" name="password" placeholder="New Password">
                                            <br>
                                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success mr-2 shadow font-weight-bold">Change</button>
                                            <button type="button" class="btn btn-danger shadow font-weight-bold" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{route('profile.update',$users->id)}}" method="POST" class="font-weight-bold" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="form-group ml-5">
                                <img id="uploadPreview" width="100" height="100" class="shadow" style="border-radius: 50%; border: 2px solid lightslategrey;" accept="image/png, .jpeg, image/jpg"/>
                                <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" style="margin-left:12px; "/>
                                @if(isset($users->image))
                                <img height="100px" width="100px" class="profile-user-img ml-5 shadow" style="border-radius: 50%; border:2px solid lightcoral;" src="{{ asset('userImage/'.$users->image) }}"
                                alt="User profile picture">
                                @endif
                            </div>
                            <div class="form-group row m-4">
                                <label class="col-form-label">Name&nbsp;&nbsp;&nbsp;</label>
                                <input type="text" class="form-control col" name="name" value="{{ $users->name }}">
                            </div>
                            <div class="form-group row m-4">
                                <label class="col-form-label">Email&nbsp;&nbsp;&nbsp;</label>
                                <input type="text" class="form-control col" name="email" value="{{ $users->email }}">
                            </div>
                            <div class="form-group row m-4">
                                <label class="col-form-label">Phone&nbsp;&nbsp;&nbsp;</label>
                                <input type="text" class="form-control col" name="phone" value="{{ $users->phone }}">
                            </div>
                            <div class="form-group row m-4">
                                <label class="col-form-label">Address&nbsp;&nbsp;&nbsp;</label>
                                <input type="text" class="form-control col" name="address" value="{{ $users->address }}">
                            </div>
                            <button type="submit" class="btn btn-success float-right shadow"><i class="fas fa-check-circle"></i></button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">  
    function PreviewImage() {  
        var oFReader = new FileReader();  
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);  
        oFReader.onload = function (oFREvent) {  
            document.getElementById("uploadPreview").src = oFREvent.target.result;  
        };  
    };  
</script>
@endsection
