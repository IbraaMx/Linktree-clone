@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <table class="table table-borderless">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Link</th>
                            <th scope="col">Created</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($links as $link)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $link->title }}</td>
                                    <td><a href="{{ $link->link }}">{{ $link->title }}</a></td>
                                    <td>{{ $link->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/dashboard/{{$link->id}}">Edit</a>
                                        <button class="btn btn-danger btn-sm"
                                            onclick="event.preventDefault();
                                            document.getElementById('delete-form').submit();">
                                                {{ __('Delete') }}
                                        </button>
                                        <form id="delete-form" action="/dashboard/{{$link->id}}" method="POST" class="d-none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    <a class="btn btn-info btn-sm" href="/dashboard/new">Add New Link</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
