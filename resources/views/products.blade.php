@extends('layout')
@section('title', 'Products')
@section('content')
    <div class="container products">
        <div class="row">
            @foreach ($products as $key => $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <a href="{{ route('add-to-cart', [$product->id]) }}" class="btn btn-warning btn-block text-center"
                                role="button">Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
