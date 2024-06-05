<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Add New Product</h1>
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <label for="description">Description:</label>
    <textarea name="description" id="description" required></textarea>
    <button type="submit">Create</button>
</form>
@endsection
