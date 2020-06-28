@extends('admin.layouts.auth_layout')

@section('title', 'Admin Login')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>ADMIN </b> PANEL </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Please Sign in to start your session</p>
      @if(session()->has("message"))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
        @endif

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
      <form action="{{ route('checklogin') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
         
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        
        </div>
      </form>

      

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

@endsection