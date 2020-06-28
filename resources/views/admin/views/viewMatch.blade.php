@extends('admin.layouts.layout')
@section('title','View Match')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">Matches</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
          <button class="btn btn-info pull-right"> <a style="color:#fff;" href="{{ route('match-create') }}"> Add Match </a> </button>
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
                    <th>Match Between</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($matches as $match)
                 <tr>
                   <td>{{ $i++ }}</td>
                   <td> {{ $match->team1 }} Vs {{ $match->team2 }} </td>
                   <td>  {{ $match->location['stadium'] }}, {{ $match->location['city'] }} </td>
                   <td> {{ $match->date }} , {{ $match->time }} </td>
                   <td> 
                       @php  $text =  ($match['status'] == 0) ? 'Pending' : 'Finish' ;  @endphp 
                       @php  $class =  ($match['status'] == 0) ? 'text-success' : 'text-danger' ;  @endphp 
                       <p class="{{ $class }}"> {{ $text }} </p> 
                   </td>
                   <td> 
                   <div class="btn-group btn-group-sm">
                      <a title="Edit" href="{{ route('match-edit',$match->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                
                      <form method="post" action="{{ route('match-destroy',$match->id ) }}" style="display:none;" id="delete-form-{{ $match->id }}"> 
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                      </form>

                      <a href="#" title="Delete Match" onclick="
                    if(confirm('Are you sure, You want to delete this?'))
                    { 
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $match->id }}').submit();
                    }else
                    {
                      event.preventDefault();
                    }" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  </a>


<a title="Manage Match" href="{{ route('match-manage',$match->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
 
 