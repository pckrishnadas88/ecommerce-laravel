
@extends('admin.layouts.layout')

@section('title', 'Create product')

@section('content')
<div class="row">    
    <div class="col-xs-6 col-md-6 col-sm-12">
        <h1>Create Product</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/admin/products" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label for="title">Price</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}">
            </div>
            <div class="form-group">
                <label for="title">Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}" id="title">
            </div>
            <div class="form-group">
                <label for="title">Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="title">Images</label>
                    <input type="file" multiple name="images[]" class="form-control" value="{{ old('quantity') }}" id="title">
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
</div>
@endsection