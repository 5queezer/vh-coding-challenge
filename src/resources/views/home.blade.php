@extends('layouts.app')

@section('content')

@error('title')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
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

@if ($questions->count() > 0)
    <hr />
    <h2 class="mb-3 p-3 bg-primary text-white">Questions ({{ $questions->count() }})</h2>
    <div class="list-group">
        @foreach($questions as $question)
            <a href="questions/{{ $question->id }}/answers" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <h3>
                    {{ $question->title }}
                </h3>
                <span class="badge badge-{{ $question->answers->count() > 0 ? 'primary' : 'secondary' }}">
                    {{ $question->answers->count() }} answers
                </span>
            </a>
        @endforeach
    </div>
@else
    <small class="text-secondary">No questions yet. Create an entry to see a list of questions.</small>
@endif
@endsection