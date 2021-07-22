@extends('layouts.master')

@section('title')
Manage Posts
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">My Posts</h4>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>
                        ID
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Content
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Actions
                    </th>
                </thead>
                <tbody>
                    @foreach ($posts as $row)
                    <tr>
                        <td>
                          {{ $row->id }}
                      </td>
                      <td>
                          {{ $row->title }}
                          <br>
                          @if(($row->breaking)=='on')
                          <span class="btn-danger font-weight-bold" style="border-radius: 5em; font-size: 12px; padding:3px;"><i class='fa fa-fire'></i></span>
                          @endif
                          </td>
                          <td>
                          {{ $row->category->name }}
                          </td>
                          <td>
                          {{ substr($row->content,0,60) }}
                          </td>
                          <td>
                          @if ( ($row->status) == 'approve' )
                          <a class="btn btn-success rounded text-white font-weight-bold">{{ ucfirst($row->status) }}</a>
                          @elseif ( ($row->status) == 'decline' )
                          <a class="btn btn-danger rounded text-white font-weight-bold">{{ ucfirst($row->status) }}</a>
                          @else
                          <a class="btn btn-warning rounded text-white font-weight-bold">{{ ucfirst($row->status) }}</a>
                          @endif
                          </td>
                          <td>
                          <hr><a href="{{ route('edit.post',$row->id) }}" class="btn btn-sm btn-info rounded"><i class="fas fa-pencil-alt"></i></a>
                          <form action="{{ route('delete.post',$row->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <!-- Button trigger modal -->
                          <br><button type="button" class="btn btn-sm btn-danger rounded" data-toggle="modal" data-target="#confirmdelete{{ $row->id }}">
                          <i class="fas fa-trash"></i>
                          </button>
                          <hr>
                          <!-- Modal -->
                          <div class="modal fade" id="confirmdelete{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Deletion</h5>
                          <button type="buttons" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          <div class="modal-body">
                          Are you sure to delete this existing user permanently?
                          </div>
                          <div class="modal-footer">
                          <button type="submit" class="btn btn-danger mr-2 shadow font-weight-bold">Delete</button>
                          <button type="button" class="btn btn-info shadow font-weight-bold" data-dismiss="modal">Close</button>
                          </div>
                          </div>
                          </div>
                          </div>
                          </form>
                          </td>
                          </tr>
                          @endforeach
                          </tbody>
                          </table>
                          </div>
                          </div>
                          </div>
                          @endsection

                          @section('scripts')
                          @endsection