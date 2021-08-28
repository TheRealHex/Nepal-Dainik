@extends('layouts.master')

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
                    <div class="card-body  offset-md-1">
                        <form action="{{route('store.post')}}" method="POST" class="font-weight-bold" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group col-md-6  m-4">
                                <input type="text" class="form-control col" placeholder="Title" name="title"><br>
                                <input type="text" class="form-control col" placeholder="Meta data for search" name="tags">
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
                             <select class="form-control  " style="width: 70%; border-color: lightcoral;" name="cat_id">
                                <option disabled>Select Category</option>
                                @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <textarea  class="m-4 rounded" placeholder="Content" style="height:60vh; width: 80%" name="content"></textarea>
                        </div>
                        <div class="tags ml-5">
                            <label for="breaking">
                                <input type="checkbox" name="breaking" id="breaking"> Breaking News
                            </label><br><br>
                        </div>
                        <br>
                        <div class="card-footer float-right" style="margin-right: 3em;">
                            <button type="submit" class="btn btn-success  font-weight-bold p-3 shadow">Post</button>
                            <a class="btn btn-danger font-weight-bold p-3 ml-3 shadow text-light">Cancel</a>
                        </div>
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
