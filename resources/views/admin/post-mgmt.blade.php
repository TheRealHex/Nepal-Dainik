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
            <table class="table" style="text-align: center;">
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
                          &nbsp;
                              @if(($row->breaking)=='on')
                            <span class="font-weight-bold" style="color:red;"><i class='fa fa-fire'></i></span>
                            @endif
                      </td>
                      <td>
                          {{ $row->category->name }}
                      </td>
                      <td>
                        <a href='/edit-post/{{$row->id}}' class='text-dark'>{{ substr($row->content,0,20) }}</a>
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