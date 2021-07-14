@extends('layouts.master')

@section('title')
Categories Management
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manage Category</h4>
                <a class="btn btn-danger" href="{{route('categories.create')}}"><i class="fas fa-plus"></i></a>
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
                                Name
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $row)
                            <tr>
                                <td>
                                    {{ $row->id }}
                                </td>
                                <td>
                                    {{ $row->name }}
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit',$row->id) }}" class="btn btn-success rounded"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('categories.delete',$row->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmdelete{{ $row->id }}">
                                            <i class="fas fa-trash"></i>
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
                                                        Are you sure to delete this existing category permanently?
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
    </div>
    @endsection

    @section('scripts')

    @endsection
