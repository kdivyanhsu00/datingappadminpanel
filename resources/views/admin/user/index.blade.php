@extends('layouts.app')
@section('content')

<section class="content-header">
     <div class="row">
        <form class="form" id="searchBar">
        <div class="col-sm-6">
          <div id="custom-search-input">
            <div class="input-group col-md-12">
                <input type="text" id="searchbar" name="searchby" value="{{ isset($searchString) ? $searchString : null }}" class="  search-query form-control" placeholder="Search user by name, email, phone number" />
                <span class="input-group-btn">
                    <a href="#" onclick="$(this).closest('form').submit();"><button class="btn btn-danger" type="button">
                        <span class=" glyphicon glyphicon-search"></span>
                    </button>
                  </a>
                </span>
            </div>
        </div>
            
        </div>
         
        </form>
        </div>
    </section>
    <section class="content">
      @include('admin.partials.message')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                  <tr>
                  <th>Srial no</th>
                  <th>User Name</th>
                  <th>Phone Number</th>
                  <th>E Mail</th>
                  <th>Actions</th>
                </tr>
                
                </thead>
                <tbody>
                   
                <tr>
                @php($no=1)
                @forelse($users as $user)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->mobileNumber }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    @if(!$user->isBlock)
                    <a href="{{ url('admin/user/block', [$user, 1])}}" class="action-link" data-placement="bottom"  data-toggle="popover" >Block</a>
                    @else
                    <a href="{{ url('admin/user/block', [$user, 0])}}" class="action-link" data-placement="bottom"  data-toggle="popover">Unblock</a>
                    @endif
                    &nbsp&nbsp&nbsp&nbsp  <a href="{{ route('user.show', $user)}}" class="action-link">View</a></td>
                  </tr>
                  @empty
                  <tr class="table-danger">
                    <td>No record found</td>
                  </tr>  
                  @endforelse
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="col-lg-12">
            <nav aria-label="Page navigation example" class="pull-right">
              {{ $users->appends(request()->input())->links() }}
            </nav>
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <script type="text/javascript">
    $('.plan').click(function(){
        if($(this).prop("checked") == true){
          $('#searchBar').submit();
        }
    });
  </script>
@endsection