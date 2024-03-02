@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Список задач') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <b>Задача:</b> {{ $todo->title }}
                        </div>
                        <div>
                            <b>Описание:</b> {{ $todo->description }}
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('todos.index') }}" class="">
                                <button class="btn btn-primary">Назад</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
