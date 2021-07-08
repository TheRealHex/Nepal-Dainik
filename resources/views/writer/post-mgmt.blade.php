@extends('layouts.writer-master')

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
                            </thead>
                            <tbody>
                            @foreach ($posts as $row)
                                <tr>
                                    <td>
                                      {{ $row->id }}
                                    </td>
                                    <td>
                                      {{ $row->title }}
                                    </td>
                                    <td>
                                      {{ $row->category->name }}
                                    </td>
                                    <td>
                                      {{ substr($row->content,0,90) }}
                                    </td>
                                    <td>
                                        <span class="btn btn-info rounded-lg font-weight-bold">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.post',$row->id) }}" class="btn btn-success rounded shadow font-weight-bold">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('delete.post',$row->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger shadow font-weight-bold" data-toggle="modal" data-target="#confirmdelete{{ $row->id }}">
                                                Delete
                                            </button>

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