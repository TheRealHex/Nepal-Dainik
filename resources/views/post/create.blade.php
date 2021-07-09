@extends('layouts.writer-master')

@section('title')
    Create a new post
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="p-1">New Post</h4>
                        <div class="card-body col">
                            <form action="{{route('store.post')}}" method="POST" class="font-weight-bold" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row m-4">
                                <input type="text" class="form-control col" placeholder="Title" name="title">
                                </div>
                                <div class="ml-5">
                                    <img id="uploadPreview" width="100" height="100" accept="image/png, .jpeg, image/jpg"/>
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
                                <div class="ml-5 mt-5">
                                	<select class="form-control-sm rounded border-0" name="cat_id">
                                		@foreach($category as $cat)
                                		<option value="{{$cat->id}}">{{$cat->name}}</option>
                                		@endforeach
                                	</select>
                                </div>
                                <div>
                                    <i class="fas fa-pencil-alt "></i>
                                    <textarea  class="m-4 rounded" placeholder="Content" style="height: 70vh; width: 95%;" name="content"></textarea>
                                </div>
                                <a class="btn btn-danger float-right font-weight-bold p-3 ml-3 shadow text-light">Cancel</a>
                                <button type="submit" class="btn btn-success float-right font-weight-bold p-3 shadow">Post</button>
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
