@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h1>{{ __('Orders') }}</h1></div>
                <div class="card-body">
                    <a href="{{ route('/api/v1/showProduct') }}" class="btn btn-primary">Show Products</a>
                    @foreach ($orders as $order)
                        <div>
                            <p>{{ $order->{'0'} }}</p>
                            <p>{{ $order->{'1'} }}</p>
                            <p>{{ $order->{'2'} }}</p>
                            <p>{{ $order->{'3'} }}</p>
                            <p>{{ $order->{'4'} }}</p>
                            <hr>
                            @endforeach
                        </div>
                        {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

