@extends('layouts.app')

@section('styles')
    <style>
        #outer {
            width: auto;
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Список задач') }}</div>

                    <div class="card-body">
                        @if(\Illuminate\Support\Facades\Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ \Illuminate\Support\Facades\Session::get('alert-success') }}
                            </div>
                        @endif

                            @if(\Illuminate\Support\Facades\Session::has('alert-info'))
                                <div class="alert alert-info" role="alert">
                                    {{ \Illuminate\Support\Facades\Session::get('alert-info') }}
                                </div>
                            @endif

                        @if(\Illuminate\Support\Facades\Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ \Illuminate\Support\Facades\Session::get('error') }}
                            </div>
                        @endif

                        @if(isset($todos) > 0)
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Описание</th>
                                    <th>Выполнено</th>
                                    <th>Действии</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($todos as $todo)
                                    <tr>
                                        <td>{{ $todo->title }}</td>
                                        <td>{{ $todo->description }}</td>
                                        <td>
                                            @if ($todo->is_completed == 1)
                                                <a class="btn btn-sm btn-success" href="">Выполнено</a>
                                            @else
                                                <a class="btn btn-sm btn-danger" href="">Не выполнено</a>
                                            @endif
                                        </td>
                                        <td id="outer">
                                            <a class="inner btn btn-sm btn-success"
                                               href="{{ route('todos.show', $todo->id) }}">Подробнее
                                            </a>
                                            <a class="inner btn btn-sm btn-info"
                                               href="{{ route('todos.edit', $todo->id) }}">Изменить
                                            </a>
                                            <form class="d-inline-block" action="">
                                                <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                <input type="submit" class="btn btn-sm btn-danger" value="Удалить">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4 class="text-danger">Пока нет задач</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection