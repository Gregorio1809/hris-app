@extends('layouts.app')

@section('content')
<h1>Edit People - {{ $person->employee_name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('people.update', $person) }}" method="POST">
    @csrf
    @method('PUT')
    @include('people.form', ['people' => $person ])
@endsection