@php /** @var \App\Employee $employees */@endphp
@foreach($employees as $employee)
    <li>
        {{ $employee->fio }} <span class="font-weight-bold">{{ $employee->position }}</span>
    @if(count($employee->childrens) > 0)
        <ul>
            @include('includes.user_childs', ['employees' => $employee->childrens])
        </ul>
    @endif
    </li>
@endforeach
