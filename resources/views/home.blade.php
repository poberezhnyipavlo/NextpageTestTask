@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Список всіх працівників</div>
                <div class="card-body">
                    @php /** @var \App\Employee $employees */@endphp
                    @if(!empty($employees))
                        <ul class="list-unstyled">
                            @include('includes.user_childs', ['employees'=> $employees])
                        </ul>
                    @else
                        <h3>Працівників немає</h3>
                    @endif
                </div>
            </div>
    </div>
</div>
@endsection
