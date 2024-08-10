@extends('layouts.app')

@section('content')
<h1>Add Employee</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('people.store') }}" method="POST">
    @csrf
    @include('people.form')
</form>
@endsection