@extends('layouts.app')

@section('content')

@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
{{ Form::open(array('url' => 'questions', 'method' => 'POST')) }}
    <div class="form-group">
        {{ Form::textarea('title','', [
            'class' => 'form-control', 
            'rows' => '2',
            'placeholder' => "$placeholder" ]) }}
    </div>
    <div class="text-right">
        {{ Form::submit('Ask me everything', ['class' => 'btn btn-primary']) }}
    </div>
{{ Form::close() }}
<hr />
<h2 class="mb-3 p-3 bg-primary text-white">Questions</h2>
<div class="list-group">
    @foreach($questions as $question)
        <a href="questions/{{ $question->id }}/answers" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
            <h3>
                {{ $question->title }}
            </h3>
            <span class="badge badge-secondary badge-pill badge-info">
                {{ $question->answers()->count() }} answers
            </span>
        </a>
    @endforeach
</div>
@endsection