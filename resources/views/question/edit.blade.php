@extends('layout')
@push('custom-scripts')
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'editor', {
            enterMode : CKEDITOR.ENTER_BR,
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Question</h1>
        <form method="post" action="{{route('question.update',['question' => $record->id])}}">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-group">
                <label for="detail">Question Detail:</label>
                {{Form::textarea('detail', $record->detail, ['id' => 'editor','class'=>'form-control','name' => 'detail'])}}
            </div>

            <div class="form-group">
                <label for="lastname"> Type </label>
                {{Form::select('type', ['omr' => 'Omr', 'descriptive' => 'Descriptive'], $record->type,['class' => 'form-control','id' => 'type'])}}
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@stop
