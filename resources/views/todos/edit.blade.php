@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Создание задачи') }}</div>

                    <div class="card-body">
                        <form action="{{ route('todos.update') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                            <div class="mb-3">
                                <label class="form-label">Заголовок</label>
                                <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Описание</label>
                                <textarea name="description" class="form-control" cols="5" rows="5">
                                    {{ $todo->description }}
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Статус</label>
                                <select name="is_completed" class="form-control">
                                    <option disabled selected>Выберите</option>
                                    <option value="1">Выполнено</option>
                                    <option value="0">Не выполнено</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
