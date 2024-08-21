@extends('layouts.app')

@section('content')
<h1 class="font-bold text-gray-900 dark:text-white py-4 flex items-center justify-center">Edit People - {{ $person->employee_name }}</h1>

@if ($errors->any())
    <div class="alert alert-danger flex items-center justify-center py-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li><span class="bg-red-100 text-red-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">{{ $error }}</span></li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('people.update', $person) }}" method="POST" class="flex items-center justify-center">
    @csrf
    @method('PUT')
    @include('people.form', ['people' => $person ])
@endsection