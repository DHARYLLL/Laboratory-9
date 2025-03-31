<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create product</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
        
    @endif
    <form action="{{route('store')}}" method="POST">
        @csrf
        @method ('POST')
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="name">
            <br><br>
        </div>

        <div>
            <label for="name">quantity: </label>
            <input type="text" name="quantity" placeholder="quantity">
            <br><br>
        </div>

        <div>
            <label for="name">price: </label>
            <input type="text" name="price" placeholder="price">
        </div>
        
        <div>
            <input type="submit" value="add product">
        </div>
    </form>

    <form action="{{route('index')}}" method="POST">
        @csrf
        @method('GET')
        <input type="submit" value="Back">
    </form>
</body>
</html>