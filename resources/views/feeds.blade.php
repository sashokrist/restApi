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
                    <div class="card-header text-center">
                        <h3>{{ __('Random Order') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="col text-center">
                            <a href="{{ route('/api/v1/getRandomFeed') }}" class="btn btn-primary">Get Random Feed Info</a>
                        </div>
                        @foreach ($orders as $order)
                            <div>
                                @php
                                    $display = $order->data;
                                    $data = json_decode($display, true);  // Decode the JSON string into a PHP array
                                    foreach ($data as $item) {
                                        $value = str_replace(['{', '}'], '', $item);
                                        $key = str_replace(['{', $value, '}'], '', $item);
                                        echo "$key:<br> $value\n";
                                    }
                                @endphp
                                @endforeach
                            </div>
                            <div class="card-header text-center">
                                <h3>{{ __('Random Product') }}</h3></div>
                            <div>
                                @foreach ($products as $product)
                                    @php
                                        $display = $product->data;
                                        $data = json_decode($display, true);
                                        $title = str_replace(['title{', '}'], '', $data[0]); // Access the title and SKU values
                                        $sku = str_replace(['SKU{', '}'], '', $data[1]);
                                        echo "Title: $title\n<br>";
                                        echo "SKU: $sku\n";
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

