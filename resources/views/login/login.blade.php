@extends('layouts.nomenu')

@section('title', 'Login')

@section('content')

<div class="row mt-5">
    <div class="col-md-6">
        <img class="img-fluid" src="https://cdn.pixabay.com/photo/2019/04/26/07/14/store-4156934__480.png">
    </div>
    <div class="col-md-6 mt-5">
        <h1>Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/authenticate" class="align-middle" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
    </div>
</div>
@endsection