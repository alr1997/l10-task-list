@extends('layouts.app')

@section('title', 'Create Tasks')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0,8rem;
        }
    </style>
@endsection

@section('content')
    {{-- {{$errors}} --}}

    <form action="{{route('tasks.store')}}" method="post">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name='title' id='title'>
            @error('title')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" id="description" rows="5"></textarea>
            @error('description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label>Long Description</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
            @error('long_description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type='submit'>Add Task</button>
        </div>

    </form>

@endsection
