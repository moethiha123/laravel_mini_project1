 @extends('layouts.app')

 @section('title', 'Create-Todo-List')

 @section('content')

     <h1>
         Edit Todo List</h1>
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif

     <div class="d-flex justify-content-center vh-40">
         <div class="p-4 border w-50">
             <form action="{{ route('todos.update', $todo->id) }}" method="post">
                 @csrf
                 @method('PUT')
                 <div class="mb-3">
                     <label for="name" class="form-label">Name:</label>
                     <input type="text" class="form-control" id="name" name="name"
                         value="{{ old('name', $todo->name) }}" placeholder="Enter Name">
                 </div>
                 <div class="mb-3">
                     <label class="form-check-label">Status:</label>
                     <div class="form-check">
                         <input class="form-check-input" type="radio" id="completed_yes" value="1" name="completed"
                             {{ $todo->completed == 1 ? 'checked' : '' }}>
                         <label class="form-check-label" for="completed_yes">Completed</label>
                     </div>
                     <div class="form-check">
                         <input class="form-check-input" type="radio" id="completed_no" value="0" name="completed"
                             {{ $todo->completed == 0 ? 'checked' : '' }}>
                         <label class="form-check-label" for="completed_no">Incomplete</label>
                     </div>
                 </div>
                 <button type="submit" class="btn btn-primary">Edit Todo</button>
             </form>
         </div>
     </div>
 @endsection
