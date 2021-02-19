@extends('layout')
@section('content')
<form method="post" action="{{route('question.update',['id' => $record->id])}}">
    <input type="hidden" name="_method" value="PUT">
    @csrf
    <div class="form-group">
        <label for="detail">Question Detail:</label>
        {{Form::text('detail', $record->detail,['class' => 'form-control', 'placeholder' => 'Enter Questions Detail','id' => 'detail'])}}
    </div>

    <div class="form-group">
        <label for="lastname"> Type </label>
        {{Form::select('type', ['omr' => 'Omr', 'descriptive' => 'Descriptive'], $record->type,['class' => 'form-control','id' => 'type'])}}
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop