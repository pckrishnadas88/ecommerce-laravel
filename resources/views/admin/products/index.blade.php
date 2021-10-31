
@extends('admin.layouts.layout')

@section('title', 'Products')

@section('content')
    <div class="row">    
        <div class="col">
            <h1>Products</h1>
            <br>
                <a href="/admin/products/create" class="btn btn-secondary btn-lg" tabindex="-1" role="button">Create Product</a>
            <hr>
            <table class="table table-responsive">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col" colspan="2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $p)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $p->title }}</td>
                            <td>{{ $p->description }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->quantity }}</td>
                            <td colspan="2">
                                <a><i class="bi bi-pencil-square"></i></a>
                               
                                <a><i class="bi bi-eye-fill"></i></a>
                                <a><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>  
                    @endforeach                
                </tbody>
              </table>
        </div>
    </div>
@endsection