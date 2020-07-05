@extends('layouts.app')

@section('content')
<h2 class="mb-3 p-3 bg-primary text-white">
  {{ $question->title }}
</h2>
<div class="list-group">
  @forelse($question->answers as $answer)
    <div class="list-group-item">
        {{ $answer->title }}
    </div>
  @empty
    <p class="list-group-item text-primary">No answers yet. Be the first!</p>
  @endforelse
</div>

<hr />
{{ Form::open(array('url' => "questions/{$question->id}/answers", 'method' => 'POST')) }}
<div class="form-group">
    {{ Form::textarea('title','', [
        'class' => 'form-control', 
        'rows' => '2' ]) }}
</div>
<div class="text-right">
    {{ Form::submit('Submit Answer', ['class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}
@endsection