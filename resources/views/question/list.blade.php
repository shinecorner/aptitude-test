@extends('layout')
@push('custom-styles')
<link rel="stylesheet" href="{{asset('vendor/dataTables.bootstrap4.min.css')}}">
@endpush

@push('custom-scripts')
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#questionList").DataTable({
      "pageLength": 2
    });
  });
</script>
@endpush

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p>
        <a class="btn btn-primary" href="{{route('question.insert')}}"> Add Record </a>
    </p>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Questions DataTables </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="questionList">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Detail</th>
                            <th>Type</th>
                            <th>Update</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            <td>{{$record->id}}</td>
                            <td>{{$record->detail}}</td>
                            <td>{{$record->type}}</td>
                            <td>
                                <a href="{{route('question.edit',['id' => $record->id])}}" class="btn btn-primary">Edit</a>

                            </td>
                            <td>
                                <form action="{{ route('question.delete',['id' => $record->id]) }}" method="post">
                                    <input class="btn btn-danger" type="submit" value="Delete" />
                                    @method('delete')
                                    @csrf
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
<!-- /.container-fluid -->

@stop