@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    {{-- @if(count($tasks))
        @foreach ($tasks as $task)
            <div>{{$task->title}}</div>
        @endforeach
    @else
        <div>There are none task</div>
    @endif --}}

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task'=>$task->id])}}">{{$task->title}}</a>
        </div>

    @empty
        <div>There is no tasks</div>
    @endforelse
@endsection


