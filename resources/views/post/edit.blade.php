@extends('layouts.writer-master')

@section('title')
    Edit Post
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="p-1">Edit</h4>
                        <div class="card-body col">
                            <form action="{{route('update.post',$post->id)}}" method="POST" class="font-weight-bold" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="form-group row m-4">
                                    <label class="col-form-label">Title&nbsp;&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control col" name="title" value="{{$post->title}}">
                                </div>
                                <div class="ml-5">
                                    <img id="uploadPreview" width="100" height="100" accept="image/png, .jpeg, image/jpg" src="{{asset('image/'.$post->image)}}" />
                                    <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" style="border-radius: 2px; margin-left:12px;"/>  
                                      
                                    <script type="text/javascript">  
                                        function PreviewImage() {  
                                            var oFReader = new FileReader();  
                                            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);  
                                            oFReader.onload = function (oFREvent) {  
                                                document.getElementById("uploadPreview").src = oFREvent.target.result;  
                                            };  
                                        };  
                                    </script>
                                </div>
                                <div class="form-group row m-4">
                                    <label class="col-form-label">Category&nbsp;&nbsp;&nbsp;</label>
                                    <div class=" ml-5 mt-5">
                                    <select name="cat_id">
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="form-group row m-4">
                                    <label class="col-form-label">Content&nbsp;&nbsp;&nbsp;</label>
                                    <textarea  class="m-4 rounded" placeholder="Content" style="height: 70vh; width: 95%;" name="content">{{$post->content}}</textarea>

                                </div>
                                
                                <a class="btn btn-danger float-right font-weight-bold p-3 ml-3 shadow text-light" href="{{ route('post.index') }}">Cancel</a>
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
