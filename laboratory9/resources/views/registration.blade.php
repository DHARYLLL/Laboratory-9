@extends('layouts.layout')

@section('title')

@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center h-100 d-flex">
            <div class="col col-12 col-sm-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="body">
                            <h1 class="text-center">Add User</h1>

                            <form action="{{route('store')}}" method="POST">
                                @csrf
                                @method('post')
                                <div class="row mb-2">
                                    <dic class="col">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" >
                                    </dic>
                                    <dic class="col">
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email" >
                                    </dic>
                                </div>
                                <button class="btn btn-primary form-control">Submit</button>
                            </form>
                            <a class="btn btn-outline-dark w-100 mt-2" href="{{route('indexx')}}">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection