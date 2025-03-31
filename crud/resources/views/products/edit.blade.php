<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit product</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
        
    @endif
    <form action="{{route('update', ['product' => $product])}}" method="POST">
        @csrf
        @method ('put')
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" placeholder="name" value="{{$product->name}}">
            <br><br>
        </div>

        <div>
            <label for="quantity">quantity: </label>
            <input type="text" name="quantity" placeholder="quantity" value="{{$product->quantity}}">
            <br><br>
        </div>

        <div>
            <label for="price">price: </label>
            <input type="text" name="price" placeholder="price" value="{{$product->price}}">
        </div>
        
        <div>
            <input type="submit" value="Update product">
        </div>
    </form>
</body>
</html>