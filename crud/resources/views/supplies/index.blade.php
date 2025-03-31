<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DCS | Supplies</title>

    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div>
        <nav class="nav align-items-center">
            <img src="" alt="DCS Logo">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </nav>
    </div>

    <div class="sidenav">
        <button class="btn text-light"> <a href="#"></a>Home</button>
        <button class="btn text-light"> <a href="#"></a>Patients</button>
        <button class="btn text-light"> <a href="#"></a>Appointments</button>
        <button class="btn text-light"> <a href="#"></a>Supplies</button>
    </div>
    
    <div class="content-wrapper" >
        <div class="container-fluid">
            <div class="row border-bottom align-items-center" style="padding: 30px 0;">
                <div class="col">Supply List</div>
                <div class="col col-auto pe-5">
                    <button class="btn text-white fw-bold"  style="background-color: #00a1df" data-bs-toggle="modal" data-bs-target="#addSuppliesModal">Add</button>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="backgorund-color: #d9d9d9; max-height: 400px; overflow-y:auto;">
            @foreach ($supplies as $supply)
            <ul class="list-group mb-1">
                <li class="list-group-item d-flex align-items-center justify-content-between border border-2">
                    <div class="d-flex align-items-center">
                        <div>
                            <span><strong>Supply Name: </strong>{{$supply->Name}}</span><br><br>
                            <span><strong>Supply Description: </strong>{{$supply->Description}}</span>
                        </div>
                        <div class="text-center">
                            <span><strong>Quantity</strong><br>{{$supply->Quantity}}</span>
                        </div>
                        <div class="group-btn">
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#editSuppliesModal{{$supply->id}}">Edit</button>
                            <form action="{{route('supply.destroy', ['supply' => $supply])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
            {{-- <div class="row" style="background-color: #d9d9d9; width: 100%">
                <div class="col col-auto">
                    <label for="Sname">Supply Name: {{$supply->Name}}</label><br><br>
                    <label for="dscrpt">Description: {{$supply->Description}}</label>
                </div>
                <div class="col">
                    <label for="qty">Quantity {{$supply->Quantity}}</label>
                </div>

                <div class="col">
                    <button class="btn">Edit</button>
                    <button class="btn">Delete</button>
                </div>
            </div> --}}

            {{-- Modal to Edit supplies --}}
            <div class="modal fade" id="editSuppliesModal{{$supply->id}}" tabindex="-1" aria-labelledby="editSuppliesModalLabel{{$supply->id}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header fw-semibold">
                            <h5 class="modal-title" id="editSuppliesModalLabel{{$supply->id}}">EDIT SUPPLIES</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form action="{{route('supply.update', ['supply' => $supply])}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="row mb-3">
                                    <div class="col">
                                        <input style="background-color: #d9d9d9" type="text" id="SupplyName" name="Name" class="form-control" value="{{$supply->Name}}">
                                    </div>
                                    <div class="col">
                                        <input style="background-color: #d9d9d9" type="number" id="SupplyQuantity" name="Quantity" min="1" class="form-control" value="{{$supply->Quantity}}">
                                    </div>
                                </div>
            
                                    <div class="row px-2">
                                        <textarea style="background-color: #d9d9d9" name="Description" id="SupplyDescription" class="form-control"  value="{{$supply->Description}}"></textarea>
                                    </div>

                                
                                <div class="modal-footer row">
                                    <div class="col">
                                        <button class="btn btn-outline-info text-black fw-bold w-75" type="button" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn w-75 fw-bold text-white" style="background-color: #00a1df" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Modal to Add supplies --}}
    <div class="modal fade" id="addSuppliesModal" tabindex="-1" aria-labelledby="addSuppliesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header fw-semibold">
                    <h5 class="modal-title" id="addSuppliesModalLabel">ADD SUPPLIES</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{route('supply.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row mb-3">
                            <div class="col">
                                <input style="background-color: #d9d9d9" type="text" id="SupplyName" name="Name" placeholder="Supply Name" class="form-control">
                            </div>
                            <div class="col">
                                <input style="background-color: #d9d9d9" type="number" id="SupplyQuantity" name="Quantity" placeholder="Quantity" min="1" class="form-control">
                            </div>
                        </div>
    
                            <div class="row px-2">
                                <textarea style="background-color: #d9d9d9" name="Description" id="SupplyDescription" class="form-control" placeholder="Description"></textarea>
                            </div>

                           
                        <div class="modal-footer row">
                            <div class="col">
                                <button class="btn btn-outline-info text-black fw-bold w-75" type="button" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col">
                                <button class="btn w-75 fw-bold text-white" style="background-color: #00a1df" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>