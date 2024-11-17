@extends('admin.layouts.app')
@section('content')
    <!-- resources/views/orders/print.blade.php -->
    <html>

    <head>
        <title>Order #{{ $order->id }}</title>
    </head>

    <body>
        <h1>Order #{{ $order->id }}</h1>
        <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Address:</strong> {{ $order->shipping_address }}</p>

        <h2>Items:</h2>
        <ul>
            @foreach ($order->items as $item)
                <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: {{ $item->price }} VND</li>
            @endforeach
        </ul>

        <p><strong>Total Amount:</strong> {{ $order->total }} VND</p>
    </body>

    </html>
@endsection
