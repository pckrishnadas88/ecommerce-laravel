@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1>Latest products</h1>
    @foreach ($products as $p)
        @if ($loop->first || $loop->iteration % 4 == 0)
            <div class="row">
        @endif
        
        <div class="col-md-4" style="margin-bottom:20px;">
            
            <div class="card" style="width: 20rem;">
                <img src="{{ url('product-images/'.$p->images[0]->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ substr($p->title, 0, 25) }}</h5>
                    <p class="card-text">&#8377; {{ $p->price }}</p>
                    <a href="/products/{{ $p->id }}" class="btn btn-primary">View more details</a>
                </div>
            </div>
            
        </div>
        
    @if ($loop->last || $loop->iteration % 3 == 0)    
        </div>
        
    @endif
    
    @endforeach
@endsection