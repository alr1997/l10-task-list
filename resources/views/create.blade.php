@extends('layouts.app')

@section('title', 'Create Tasks')

@section('content')

    <form action="{{route('tasks.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name='title' id='title'>
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <div>
            <label>Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>

        <div>
            <button type='submit'>Add Task</button>
        </div>

    </form>

@endsection
