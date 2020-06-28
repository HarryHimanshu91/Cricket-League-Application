@extends('admin.layouts.layout')
@section('title','View Player')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0 text-dark">Player</h1>
          </div><!-- /.col -->
          <div class="col-sm-6" style="text-align: right;">
          <button class="btn btn-info pull-right"> <a style="color:#fff;" href="{{ route('player.create') }}"> Add Player </a> </button>
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
                    <th>Player Name</th>
                    <th>Image</th>
                    <th>Country</th>
                    <th>Jersey Number</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @php $i=1; @endphp
                @foreach($players as $player)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td> {{ $player->firstname }} {{ $player->lastname }}  </td>
                    <td><img class="logoplayer" src="{{ asset('uploads/players/'.$player->logo) }}"> </td>
                    <td>{{ $player->team->name }} </td>
                    <td>{{ $player->jersey }} </td>
                    <td>
                    <div class="btn-group btn-group-sm">
                      <a title="Edit" href="{{ route('player.edit', $player->id ) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <a title="View" href="{{ route('player.show', $player->id ) }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <form method="post" action="{{ route('player.destroy',$player->id ) }}" style="display:none;" id="delete-form-{{ $player->id }}"> 
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                      </form>

                <a href="#" title="Delete Player" onclick="
                    if(confirm('Are you sure, You want to delete this?'))
                    { 
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $player->id }}').submit();
                    }else
                    {
                      event.preventDefault();
                    }" class="btn btn-danger"><i class="fas fa-trash-alt"></i>  </a>
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
 
 