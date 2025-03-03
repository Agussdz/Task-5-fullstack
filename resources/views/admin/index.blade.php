@extends('layouts.app')

@section('css')
      <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row">
      <div class="col-12">
          <div class="alert alert-success text-center" role="alert">
              <h1 class="display-4">🎉 Welcome Admin! 🎉</h1>
              <p class="lead">We're glad to have you back. Let's make today productive!</p>
              <hr class="my-4">
              <p>Check out the latest updates and manage your articles:</p>
           
          </div>
      </div>
  </div>

    
@endsection

@section('script')
  @include('layouts.auth');
@endsection
