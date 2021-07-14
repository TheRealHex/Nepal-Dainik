@extends('frontend.main')
@section('content')
<div class="contanier">
    <div class="row justify-content-center" style="background-color: white;">
        <div class="col-md-10">
            <h2>Search Results</h2><br>
            <form action="">
                <div class="form-group" style="display: inline;">
                    <input type="text" class="form-control form-control-sm" style="width: 70%" name="search" placeholder="Search"/><br>
                    <input type="submit" class="btn btn-primary" style="border-radius: 7em;" value="Search"/>
                </div>
            </form><br><br>
        </div>
        <div class="col-md-10">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Preview</th>
                    <th>Posted on</th>
                </tr>
                @foreach($data as $post)
                <tr>
                    {{-- <td><img src="{{asset('/image/'.$post->image)}}"></td> --}}
                    <td>{{$post->title}}</td>
                    <td><a href="{{route('newshome.showPost',$post->title)}}"><i class='fa fa-eye'></i></a></td>
                    <td>{{date('M d,Y',strtotime($post->created_at))}}</td>
                </tr>
                @endforeach
            </table>
            <br><br>
        </div>
        @endsection