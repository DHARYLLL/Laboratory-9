@extends('layouts.layout')

@section('title', 'Users')

@section('content')
    <div class="container vh-100">
        <div class="row justify-content-center align-items-center h-100 d-flex">
            <div class="col col-12 col-sm-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="body">
                            <h1 class="text-center">Users</h1>

                            <table border="1" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <a class="btn btn-primary w-100 mb-3" href="{{ route('index') }}">New Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection