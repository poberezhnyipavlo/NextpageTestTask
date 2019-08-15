@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset($employee->avatar) ?? '' }}" class="card-img" alt="...">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title">Інофрмація про працівника</h5>
                            <p class="card-text"><strong>Фіо: </strong>{{ $employee->fio ?? '' }}</p>
                            <p class="card-text"><strong>Посада: </strong>{{ $employee->position ?? '' }}</p>
                            <p class="card-text"><strong>Зарплата: </strong>{{ $employee->salary ?? '' }}</p>
                            <p class="card-text"><strong>Начальник: </strong>{{ $employee->boss->fio ?? '' }}</p>
                            <p class="card-text"><small class="text-muted">{{ $employee->work_start_at ?? '' }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
