@extends('spark::layouts.app')

@section('content')
<div class="container">
    <p class="h3">Password protected</p>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            @if(isset($error))
            <p class="alert alert-danger">{{ $error }}</p>
            @endif
            <div class="card">
                <form action="" class="card-body" method="post">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Access</button>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
