@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <form action="/dashboard/new" method="POST">
                        @method('post')
                        <div class="row">
                          <div class="col">
                            <input type="text" name="title" class="form-control" placeholder="Website Name">
                          </div>
                          <div class="col">
                            <input type="text" name="link" class="form-control" placeholder="The URL">
                          </div>
                          <div class="col">
                              @csrf
                            <button type="submit" class="btn btn-dark btn-block">Add</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
