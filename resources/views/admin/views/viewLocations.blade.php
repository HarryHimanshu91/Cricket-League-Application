@extends('admin.layouts.layout')
@section('title','View Team')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">View Locations </h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
          <button class="btn btn-info pull-right"> <a style="color:#fff;" href="{{ route('locations.create') }}"> Add Location </a> </button>
          </div><!-- /.row -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <div class="col-md-12">
            <table class="table table-bordered" id="example">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Stadium Name</th>
                    <th>City</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($locations as $location)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $location->stadium }}</td>
                    <td>{{ $location->city }}</td>
                   
                    <td>
                    <div class="btn-group btn-group-sm">
                      <a title="Edit Location" href="{{ route('locations.edit', $location->id ) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <form method="post" action="{{ route('locations.destroy',$location->id ) }}" style="display:none;" id="delete-form-{{ $location->id }}"> 
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                      </form>

                            <a href="#" title="Delete Location" onclick="
                                if(confirm('Are you sure, You want to delete this?'))
                                { 
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $location->id }}').submit();
                                }else
                                {
                                event.preventDefault();
                                }" class="btn btn-danger"><i class="fas fa-trash-alt"></i> 
                             </a>
                    </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
         </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection
 
 