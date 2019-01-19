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
        <a class="navbar-brand" href="{{ URL::to('ims') }}">IMS</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('products') }}">View All Products</a></li>
        <li><a href="{{ URL::to('products/create') }}">Add new product(s)</a>
    </ul>
</nav>

<h1>Edit {{ $product->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('ProductName', 'ProductName') }}
        {{ Form::text('ProductName', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('PartNumber', 'PartNumber') }}
        {{ Form::text('PartNumber', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('ProductLabel', 'ProductLabel') }}
        {{ Form::text('ProductLabel', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('StartingInventory', 'StartingInventory') }}
        {{ Form::text('StartingInventory', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('InventoryRecieved ', 'InventoryRecieved ') }}
        {{ Form::text('InventoryRecieved', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('MinimumRequired', 'MinimumRequired') }}
        {{ Form::text('MinimumRequired', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('InventoryOnHand ', 'InventoryOnHand ') }}
        {{ Form::text('InventoryOnHand', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('InventoryShipped ', 'InventoryShipped ') }}
        {{ Form::text('InventoryShipped', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit Product', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>