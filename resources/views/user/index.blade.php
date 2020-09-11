@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><b>{{ $user->name }}</b> Links</div>

                <div class="card-body">

                    <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Link</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($user->links as $link)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $link->title }}</td>
                                    <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <hr>

                        <div class="d-flex justify-content-center">
                            @auth
                                <a class="btn btn-info btn-sm" href="/dashboard">Back To Dashboard</a>
                            @endauth
                            @guest
                                <a class="btn btn-success btn-sm" href="/register">Register Now</a>
                                <a class="btn btn-info btn-sm ml-3" href="/login">Login</a>
                            @endguest
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
