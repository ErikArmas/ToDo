@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{route('todos')}}" method="POST">
            @csrf
            @if (session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror

            <div class="col-mb-3 col-xs-12">
                <label class="form-label">Tareas</label>
                <input type="text" class="form-control" name="title">
            </div>
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Crear nueva tarea</button>
            </div>
        </form>

        <div>
            @foreach ($todos as $todo)
                <div class="row p-2">
                    <div class="col-9 d-flex align-items-center">
                        <a href="{{ route('todos-show',['id' => $todo->id ] ) }}">{{$todo->title}}</a>
                    </div>

                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('todos-destroy',[$todo->id]) }}" method="POST" >
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection