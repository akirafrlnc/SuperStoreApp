<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}">Add New Product</a>
<ul>
    @foreach ($products as $product)
    <li>
        {{ $product->name }}
        <a href="{{ route('products.edit', $product) }}">Edit</a>
        <form action="{{ route('products.destroy', $product) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
    @endforeach
</ul>
@endsection
