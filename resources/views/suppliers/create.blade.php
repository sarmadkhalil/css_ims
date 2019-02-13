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

<h1>New Supplier</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'suppliers')) }}

    <div class="form-group">
        {{ Form::label('suppliers', 'suppliers') }}
        {{Form::text('suppliers')}}
    </div>

    {{ Form::submit('Add supplier!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</body>
</html>