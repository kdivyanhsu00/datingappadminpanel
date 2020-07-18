@extends('layouts.app')

@section('content')
<section class="content-header">
     <div class="row">
        <div class="col-sm-12">
        <h4>User | View</h4>
         </div>
        </div>
    </section>
    <section class="content">
        <div class="col-md-12 bg-w">
      <div class="row">
        <div class="col-sm-4">
            <div class="cadd">
                <label class="label"> Full Name:</label>
            </div>
            <div class="cadd">
                <label class="label"> Subscription:</label>
            </div>
              <div class="cadd">
                <label class="label"> Phone Number:</label>
            </div>
            <div class="cadd">
                <label class="label"> Email:</label>
            </div>
            <div class="cadd">
                <label class="label"> Gender:</label>
            </div>
            <div class="cadd">
                <label class="label"> Address:</label>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="cadd">
                <p>{{ $user->full_name }}</p>
            </div>
             <div class="cadd">
                <p>{{ $user->plan->label ?? '' }}&nbsp;</p>
            </div>
              <div class="cadd">
                <p>{{ $user->mobileNumber }}&nbsp;</p>
            </div>
            <div class="cadd">
                <p>{{ $user->email }}&nbsp;</p>
            </div>
            <div class="cadd">
                <p>{{ ($user->gender == true) ? 'Male' : 'Female' }}&nbsp;</p>
            </div>
            <div class="cadd">
                <p>{{ $user->homeAddress }}</p>
            </div>
        </div>
          </div>
        </div>
      </section>
@endsection


