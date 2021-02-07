@extends('layouts.app')


@section('content')
    

    <div class="container mt-5">
        <form  action="{{route('tasks')}}" method="POST">
         @csrf
         <div class="form-group">
            <label for="task">Task</label>
            <input class="form-control" style="@error('task')  border-color:red @enderror" type="text" name="task" id="task">
            @error('task')<p style="color:red">{{$message}}</p>@enderror
          </div>
            <input class="btn btn-success" type="submit" value="+ Add Task">
        </form>
    </div>

    <div class="container mt-5">
      @if(session()->has('status_success'))
        <div class="alert alert-success">
        {{ session()->get('status_success') }}
        </div>
      @endif
    </div>
    

   
 <div class="container mt-5">
   <h3 style="color: #3490dc">To Do Tasks !</h3>
    <table class="table table-bordered mb-5">
        <thead>
          <tr>
            <th style="width: 50%" scope="col">Task</th>
            <th style="width: 50%" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            @if($task->completed == 0)
                <tr>
                <td> {{$task->task}} </td>
                <td style="display:flex">

                  <form action="{{ route('task.destroy', $task['id']) }}" method="POST">
                  @method('DELETE') @csrf
                  <input class="btn btn-danger"  style="margin-right:5px" type="submit" value=" ❌ Delete">
                  </form>

                  <form action="{{ route('task.complete', $task['id']) }}" method="POST">
                    @csrf
                    <input class="btn btn-primary"  style="text-color:white" type="submit" value=" ✅ Complete">
                  </form>

                </td>
                </tr>
            @endif
        @endforeach
        </tbody>
      </table>
    
    <h3 style="color:#38c172">Completed Tasks !</h3>
    <table class="table table-bordered mb-5">
        <thead>
          <tr>
            <th style="width: 50%" scope="col">Task</th>
            <th style="width: 50%" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            @if(!$task->completed == 0)
                <tr>
                <td style="font-style:italic"> {{$task->task}} </td>
                <td style="display:flex">
  
                  <form action="{{ route('task.destroy', $task['id']) }}" method="POST">
                  @method('DELETE') @csrf
                  <input class="btn btn-danger"  style="margin-right:5px" type="submit" value=" ❌ Delete">
                  </form>
                </td>
                </tr>
            @endif
        @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {!! $tasks->links() !!}
    </div>
 


</div>







@endsection
