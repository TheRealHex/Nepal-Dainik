@extends('layouts.master')
@section('title')
Manage Posts
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage Posts</h4>
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
                        Author
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
                        Submit
                    </th>
                </thead>
                <tbody>
                    @foreach ($posts as $row)
                    <tr>
                        <td>
                          {{ $row->id }}
                      </td>
                      <td>
                          {{ $row->user->name }}
                      </td>
                      <td>
                          {{ $row->title }}
                      </td>
                      <td>
                          {{ $row->category->name }}
                      </td>
                      <td>
                          {{ substr($row->content,0,20) }}
                      </td>
                      <td>
                        <br>
                        @if ( ($row->status) == 'approve' )
                        <a class="btn btn-success rounded font-weight-bold text-white">{{ ucfirst($row->status) }}</a>
                        @elseif ( ($row->status) == 'decline' )
                        <a class="btn btn-danger rounded font-weight-bold text-white">{{ ucfirst($row->status) }}</a>
                        @else
                        <a class="btn btn-warning rounded shadow font-weight-bold text-white">{{ ucfirst($row->status) }}</a>
                        @endif
                        </td>
                        <td>
                        <form action="{{ route('manage.postStatus',$row->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <br><select class="form-control-sm rounded border-0" name="status">
                                <option value="pending">Pending</option>
                                <option value="approve">Approve</option>
                                <option value="decline">Decline</option>
                            </select>
                                <button type="button" class="btn btn-sm  btn-info  rounded" data-toggle="modal" data-target="#remarks{{ $row->id }}">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="remarks{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLabel">Remarks</h5>
                                                <button type="buttons" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea class="form-control" name="remarks" placeholder="Message to the Author"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success mr-2 shadow font-weight-bold">Send</button>
                                                <button type="button" class="btn btn-danger shadow font-weight-bold" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </form>
                    </td>
                                    {{-- <td>
                                        <a href="{{ route('edit.post',$row->id) }}" class="btn btn-sm  btn-success rounded"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('delete.post',$row->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm  btn-danger  rounded" data-toggle="modal" data-target="#confirmdelete{{ $row->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>                                            <!-- Modal -->
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
                                            </div> --}}
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