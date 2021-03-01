@extends('layout')
@push('custom-scripts')
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('editor', {
            enterMode: CKEDITOR.ENTER_BR,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Insert Question</h1>
        <form method="post" action="{{url('question/store')}}">
            @csrf
            <div class="form-group">
                <label for="detail">Question Detail:</label>
                {{Form::textarea('detail', '', ['id' => 'editor','class'=>'form-control','name' => 'detail'])}}
                @error('detail')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                {{Form::select('type', ['' => 'select','omr' => 'Omr', 'descriptive' => 'Descriptive','name' => 'type'], '',['class' => 'form-control'])}}
                @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
