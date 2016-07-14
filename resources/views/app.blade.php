<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{URL::to('book')}}">View all books</a></li>
            <li><a href="{{URL::to('book/create')}}">Add new book</a></li>
            <li><a href="{{URL::to('user')}}">View all users</a></li>
            <li><a href="{{URL::to('user/create')}}">Add new user</a></li>
        </ul>
    </nav>
    <h1>@yield('pagetitle')</h1>
    @yield('content')
</div>
</body>
</html>