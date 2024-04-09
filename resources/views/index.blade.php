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
    <div>
        <a href="{{ route('tasks.create')}}">Add Task</a>
    </div>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task'=>$task->id])}}">{{$task->title}}</a>
        </div>

    @empty
        <div>There is no tasks</div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>

    @endif
@endsection


