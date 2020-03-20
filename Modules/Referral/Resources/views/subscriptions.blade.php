@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  <form action="{{ route('subscriptions')}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-primary">May Payment</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
