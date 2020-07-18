@extends('layouts.app')
@section('content')

<section class="content-header">
<div class="bg-img" style="background-image: url('{{ asset('img/d.png')}}');">
  <form action="{{ route('sendnotification.store') }}" class="container" method="post">
    {{ csrf_field() }}
   <center> <img src="{{ asset('img/e.png')}}" class="brand_logo_container" alt="center" />
    <h1>Sent Notification</h1>
    <p>All registered user will get the same notification that you submit here.</p>
    @include('admin.partials.message')
    <label for="tnc"></label>
    <input type="text" placeholder="Type Notification Caption" name="Notification Caption" required>

    <label for="tnd"></label>
    <input type="text" placeholder="Type Notification Description" name=" Notification Description" required>

    <button type="submit" class="btn">Send</button>
  </form>
</div>
    </section>

@endsection