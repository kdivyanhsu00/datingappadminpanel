@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
     <div class="row">
        <div class="col-sm-12">
       
         </div>
        </div>
    </section>
    <!-- Content Header (Page header) -->
    <section class="content">
        
        <div class="container bg-w">
         <div class="row">
           <div class="col-sm-6">
                <label class="label"> Users Activity in last 7 Days</label>
               <canvas id="myChart" width="400" height="200"></canvas>
           </div>
           <div class="col-sm-6">
                <label class="label"> Users Activity in last 6 months</label>
               <canvas id="myChart1" width="400" height="200"></canvas>
           </div>
          </div>
        </div>
        
        <div class="container bg-w">
            <div class="row">
                <div class="col-sm-6">
                <div class="doughnut-chart-container">
                <canvas id="doughnut-chartcanvas-2" width="400" height="200"></canvas>
                </div>
                </div>
                <div class="col-sm-6">
                    <div class=" bg-w bottom-table">
                       <div class="row">
                           <div class="col-xs-12"><label class="label"> Latest Registered Users </label><a href="{{ route('user.index') }}"> View All</a></div>
                           @forelse($latestUsers as $user)
                           <div class="col-xs-8"><p>{{ $user->full_name ?? '' }}</p></div>
                           <div class="col-xs-4"><a href="{{ route('user.show', $user) }}">View</a></div>
                           @empty
                           <p>No user found</p>
                           @endforelse 
                       </div>
                     </div>
                </div>
            </div>
        </div>
    </section>
    @endsection