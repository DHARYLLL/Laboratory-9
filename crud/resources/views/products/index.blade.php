<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product list</h1>

    {{-- <a href="{{route('create')}}">Create new product</a> --}}
    
    <form action="{{route('create')}}" method="POST">
        @csrf
        @method('GET')
        <input type="submit" value="Create new product">
    </form>
        
    @if (session()->has('success'))
    {{session('success')}}
        
    @endif
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('edit', ['product' => $product])}}">Edit</a>
                </td>
                <td>
                    <form action="{{route('destroy', ['product' => $product])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>