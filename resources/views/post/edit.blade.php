@extends('layouts.master')

@section('title')
@if (Auth::user()->role->type == 'writer')
Edit Post
@elseif (Auth::user()->role->type == 'editor')
Preview Post
@endif
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   @if (Auth::user()->role->type == 'writer')
                   <h4 class="p-1">Edit Post</h4>
                   @endif
                   <div class="card-body col">
                    <form action="{{route('update.post',$post->id)}}" method="POST" class="font-weight-bold" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group row m-4">
                            <label class="col-form-label">Title&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" class="form-control col" name="title" value="{{$post->title}}">
                            <input type="text" class="form-control col"  value="{{$post->tag}}" placeholder="Meta data for search" name="tags">

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
                             <select class="form-control" border-color: lightcoral;" name="cat_id">
                                @foreach($category as $cat)
                                <option value="{{$cat->id}}" @if($post->cat_id == $cat->id) ? selected @endif>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-4">
                        <label class="col-form-label">Content&nbsp;&nbsp;&nbsp;</label>
                        <textarea  class="m-4 rounded" placeholder="Content" style="height: 70vh; width: 95%;" name="content">{{$post->content}}</textarea>
                    </div>
                    <div class="tags ml-5">
                        <label for="breaking">
                            <input type="checkbox" name="breaking" id="breaking" @if($post->breaking == 'on') ? checked @endif> Breaking News
                        </label>
                        <br><br>
                        @if (Auth::user()->role->type == 'writer')
                    </div>
                    <a class="btn btn-danger float-right font-weight-bold p-3 ml-3 shadow text-light" href="{{ route('post.index') }}">Cancel</a>
                    <button type="submit" class="btn btn-success float-right font-weight-bold p-3 shadow">Update</button>
                    @endif
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
