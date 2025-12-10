@extends('layouts.app')

@section('content')
<h2>Edit User</h2>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ url('admin/users/update/'.$user->id) }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name" value="{{ $user->name }}" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" required><br><br>

    <button type="submit">Update</button>
</form>
@endsection
