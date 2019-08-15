@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('employees.create') }}">Новий працівник</a>
        <div class="row justify-content-center">

            <table class="table">
                <thead>
                <tr>
                    <td>@sortablelink('id', 'ID')</td>
                    <td>@sortablelink('fio', 'Фіо')</td>
                    <td>@sortablelink('position', 'Посада')</td>
                    <td>@sortablelink('boss', 'Начальник')</td>
                    <td>@sortablelink('salary', 'Зарплата')</td>
                    <td>@sortablelink('work_start_at', 'Прийом на роботу')</td>
                    <td>Аватар</td>
                    <td>Дії</td>
                </tr>
                </thead>
                <tbody>
                @php /** @var \App\Employee $employees */ @endphp
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td><a href="{{ route('employees.show', $employee) }}">{{ $employee->fio }}</a></td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->boss->fio ?? '' }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->work_start_at }}</td>

                        <td><img src="{{ asset($employee->thubnaill) }}" alt="" width="100"></td>
                        <td class="text-right">
                            <form onsubmit="if(confirm('Видалити?')){ return true }else{ return false }"
                                  action="{{route('employees.destroy', $employee)}}" method="post">
                                @method('delete')
                                @csrf
                                <a class="btn btn-info" href="{{ route('employees.edit', $employee) }}">Редагувати</a>
                                <button type="submit" class="btn btn-danger">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4">{{ $employees->links() }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
