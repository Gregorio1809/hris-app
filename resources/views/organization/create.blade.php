@extends('layouts.app')

@section('content')
<h1>Add Organization</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('organization.store') }}" method="POST">
    @csrf
    @include('organization.form')
</form>
@endsection