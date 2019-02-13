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
        <li><a href="{{ URL::to('suppliers') }}">View All Suppliers</a></li>
        <li><a href="{{ URL::to('suppliers/create') }}">Add new supplier(s)</a>
        <li class="nav-item dropdown mr-auto">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<h1>All Suppliers</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
    </thead>
    <tbody>
    @foreach($suppliers as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->Supplier }}</td>
            <!-- we will also add show, edit, and delete buttons -->
            <td>

                {{ Form::open(array('url' => 'suppliers/' . $value->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this supplier', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <!-- show the supplier (uses the show method found at GET /suppliers/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('suppliers/' . $value->id) }}">Show this Supplier</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>