@extends('layouts.app')

@section('content')
<h1 class="font-bold text-gray-900 dark:text-white py-4 flex items-center justify-center">Add Organization</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('organization.store') }}" method="POST" class="flex items-center justify-center">
    @csrf
    @include('organization.form')
</form>
@endsection