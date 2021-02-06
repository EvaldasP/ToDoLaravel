@extends('layouts.app')


@section('content')
    

    <div class="addTaskForm">
        <form action="{{route('tasks')}}" method="POST">
         @csrf
            <label for="task">Task</label>
            <input type="text" name="task" id="task">
            <input type="submit" value="+ Add Task">
        </form>
    </div>

   
 <div>
    @foreach ($tasks as $task)
         <p> {{$task->task}} </P>
            <form action="{{ route('task.destroy', $task['id']) }}" method="POST">
                @method('DELETE') @csrf
                <input class="btn btn-danger" type="submit" value="DELETE">
                </form>
    @endforeach
</div>

@endsection