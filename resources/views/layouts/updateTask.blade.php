@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <form  action="{{{route('task.update', $task['id'])}}}" method="POST">
     @csrf
     @method('PUT')
     <div class="form-group">
        <label for="task">Task</label>
        <input class="form-control" style="@error('task')  border-color:red @enderror" type="text" name="task" id="task" value="{{$task->task}}">
        @error('task')<p style="color:red">{{$message}}</p>@enderror
      </div>
        <input class="btn btn-success" type="submit" value="Update">
    </form>
</div>
@endsection