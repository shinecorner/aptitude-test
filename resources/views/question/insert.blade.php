@extends('layout')
@section('content')
<form method="post" action="{{url('question/store')}}">
    @csrf
    <div class="form-group">
        <label for="detail">Question Detail:</label>
        <input type="text" class="form-control" id="detail" name="detail" placeholder="Enter Detail">
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select class="form-control" id="type" name="type">
            <option value="select"> select </option>
            <option value="omr"> Omr </option>
            <option value="descriptive">Descriptive</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop