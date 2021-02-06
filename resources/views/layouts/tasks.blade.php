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

   
 <div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
          <tr>
            <th scope="col">Task</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
            <td> {{$task->task}} </td>
            <td><form action="{{ route('task.destroy', $task['id']) }}" method="POST">
               @method('DELETE') @csrf
               <input class="btn btn-danger" type="submit" value="DELETE">
            </form></td>
            </tr>
        @endforeach
        </tbody>
      </table>

      <div class="d-flex justify-content-center">
        {!! $tasks->links() !!}
    </div>
</div>

@endsection