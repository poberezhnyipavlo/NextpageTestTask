@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('employees.form.form')
        </form>
    </div>
@endsection
