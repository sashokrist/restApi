@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-header text-center"><h1>{{ __('Random Product') }}</h1></div>
                    <div class="card-body">
                        <a href="{{ route('/api/v1/showOrder') }}" class="btn btn-primary">Show Random Order</a>
                        <a href="{{ route('/api/v1/getRandomFeed') }}" class="btn btn-primary">Get Random Feed Info</a>

                        @foreach ($products as $product)
                            <div>
                                @php
                                    $productData = $product->data;
                                    $productData = str_replace(['[', ']'], '', $productData); // Remove the square brackets from the string to make it a comma-separated list of items
                                   $productItems = explode(',', $productData); // Convert the comma-separated string to an array of items
                                    // Loop through each item in the array and display it separately
                                    foreach ($productItems as $item) {
                                    // Extract the key and value from the item
                                        $itemParts = explode('{', str_replace('}', '', $item));
                                        $key = $itemParts[0];
                                        $value = $itemParts[1];
                                        echo "<p>$key:<br> $value\n<br></p>";
                                    }
                                @endphp
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function () {
                $('.alert').fadeOut('slow');
            }, 1000);
        </script>

@endsection

