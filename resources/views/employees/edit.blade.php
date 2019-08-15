@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('employees.update', $employee) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            @include('employees.form.form')
        </form>
    </div>
@endsection
