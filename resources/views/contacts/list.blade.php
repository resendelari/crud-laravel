@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{url('contacts/new')}}">Add Contact</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Contacts List</h1>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                                </thead>
                        @foreach($p_Contact as $c)
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{$c->id}}</th>
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->email}}</td>
                                        <td>{{$c->phone}}</td>
                                        <td><a href="contact/{{$c->id}}/edit" class="btn btn-info"></a></td>
                                        <td>
                                            <form action="contacts/delete/{{$c->id}}" method="post"></form>
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
