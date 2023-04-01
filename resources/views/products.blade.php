@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h1>{{ __('Products') }}</h1></div>
                <div class="card-body">
                    <a href="{{ route('/api/v1/showOrder') }}" class="btn btn-primary">Show Orders</a>
                    @foreach ($products as $product)
                        <div>
                            <p>id: #{{ $product->id }}</p>
                            <p>{{ $product->{'0'} }}</p>
                            <p>{{ $product->{'1'} }}</p>
                            <hr>
                            @endforeach
                        </div>
                        {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

