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
                            <th width="70%">Detail</th>
                            <th width="10%">Type</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($records as $record)
                        <tr>
                            <td>{!! $record->detail !!}</td>
                            <td>{{$record->type}}</td>

                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('question.edit',['question' => $record->id])}}">Edit</a>
                                        <form action="{{ route('question.delete',['question' => $record->id]) }}" method="post">
                                            <button class="dropdown-item" type="submit">Delete</button>
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </div>
                                </div>

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
