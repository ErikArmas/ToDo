@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos-update',['id' => $todo->id ] ) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror

            <div class="col-mb-3 col-xs-12">
                <label class="form-label">Tareas</label>
                <input type="text" class="form-control" name="title" value="{{ $todo->title }}">
            </div>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Actualizar tarea</button>
            </div>
        </form>
    </div>
@endsection