@section('title', isset($task) ? 'Edit Tasks': 'Add Task')

@section('styles')
    <style>
        .error-message{
            color: red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    {{-- {{$errors}} --}}

    <form
    action="{{isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store')}}"
    method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        <div>
            <label for="title">Title</label>
            <input type="text" name='title' id='title' value="{{ $task->title ?? old('title')}} ">
            @error('title')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description')}}</textarea>
            @error('description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <label>Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description')}}</textarea>
            @error('long_description')
                <p class="error-message">{{$message}}</p>
            @enderror
        </div>

        <div>
            <button type='submit'>
                @isset($task)
                    Edit Task
                @else
                    Add Task
                @endisset

            </button>
        </div>

    </form>

@endsection
