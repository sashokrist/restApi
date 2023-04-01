!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
            crossorigin="anonymous"></script>
</head>
<body>
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
</body>
</html>

