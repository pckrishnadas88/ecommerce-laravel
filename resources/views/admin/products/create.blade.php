
@extends('admin.layouts.layout')

@section('title', 'Create product')

@section('content')
<div class="row">    
    <div class="col-xs-6 col-md-6 col-sm-12">
        <h1>Create Product</h1>
        <form action="/admin/products/create" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Price</label>
                <input type="number" name="price" class="form-control" id="price" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="title">Quantity</label>
                    <input type="text" name="quantity" class="form-control" id="title">
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
        </form>
    </div>
</div>
@endsection