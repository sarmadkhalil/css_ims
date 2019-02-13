<!DOCTYPE html>
<html>
<head>
    <title>Inventory Management System</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('products') }}">IMS</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('products') }}">View All Products</a></li>
        <li><a href="{{ URL::to('products/create') }}">Add new product(s)</a>
    </ul>
</nav>

<h1>Showing {{ $product->ProductName }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $product->ProductName }}</h2>
        <p>
            <strong>Part Number:</strong> {{ $product->PartNumber }}<br>
            <strong>Label:</strong> {{ $product->ProductLabel }}
            <strong>Inventory On Hand:</strong> {{ $product->InventoryOnHand }}
            <strong>Inventory Shipped:</strong> {{ $product->InventoryShipped }}
        </p>
    </div>

</div>
</body>
</html>