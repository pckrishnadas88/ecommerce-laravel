@extends('layouts.app')

@section('title', 'Product Detail')

@section('content')
<div class="row mt-5">
    <div class="col-md-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($product->images as $i)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}"
                        @class([
                            'active' => $loop->index === 0
                        ])
                         >
                        </li>                        
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($product->images as $i)
                    <div 
                    @class([
                            'carousel-item' => true,
                            'active' => $loop->index === 0
                        ])
                    >
                        <img src="{{ url('product-images/'.$i->image)}}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
              
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
          </div>
        
    </div>
    <div class="col-md-6">
        <h1>{{ $product->title }}</h1>
        <h3 class="text-primary mt-3">&#8377; {{ $product->price }}</h3>
        <div class="badge badge-warning mt-4" style="font-size:21px;">{{$product->category->name}}</div>
        <p class="mt-4">{{ $product->description}}</p>
        <p class="mt-4">Quantity <input type="number" min="1" max="{{ $product->quantity}}" value="1" size="3"></p>
        <button type="button" class="btn btn-primary mt-4"><i class="bi bi-cart-plus"></i> Add to Cart</button>
    </div>
</div>
@endsection
        