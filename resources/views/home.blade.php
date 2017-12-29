@extends('layouts.template')
@section('css')
<style type="text/css">
    th{
        background:#306EAA;
        text-align: center;
        color:white;
    }
    tbody td
    {
        text-align:center;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
    @if ($errors->any())
        <ul class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           @foreach($errors->all() as $error)
                <li style="margin-left:15px">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

     @if(Session::has('flash_message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             {{ Session::get('flash_message') }} <i class="fa fa-check"></i>
    </div>
    @endif
    <div class="col-md-12">
        <h4>Welcome, {{ ucwords(\Auth::user()->name)}}!</h4>
    </div>
    <form action="" method="GET" name="searchForm" id="searchForm">
    <div class="col-md-6 col-md-offset-2" style="margin-bottom:30px;margin-top:20px">
      
        <input type="text" name="search" class="form-control" value="{{$search}}" placeholder="Search">
      
    </div>

    <div class="col-md-4" style="margin-top:20px">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>

        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addContact"> <i class="fa fa-user-plus" aria-hidden="true"></i> New Contact</button>
    </div>
    </form>

    </div>
 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><strong><i class="fa fa-address-book" aria-hidden="true"></i> My Contact Lists</strong></h4>
                </div>
               <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th></th>
                    <th></th>
                   </tr>
                </thead>
                <tbody>
                  @foreach($contacts as $contact)
                <tr>
                    <td>{{ucwords($contact->name)}}</td>
                    <td>{{$contact->number}}</td>
                    <td style="width:50px">
                        {!! Form::open(['method'=>'GET', 'action' => ['HomeController@edit', $contact->id]]) !!}
                        <button title="Edit Record" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</button>
                      {!! Form::close() !!}
                    </td>

                    <td  style="width:50px">
                        {!! Form::open(['method'=>'DELETE', 'action' => ['HomeController@destroy', $contact->id]]) !!}
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')" title="Delete">
                            <i class="fa fa-times"></i> Delete
                           </button>
                          {!! Form::close() !!}
                     </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>

            </div>
        </div>

        <div class="col-md-offset-5 col-md-6 col-sm-12" style="margin-bottom:20px">
        {!! $contacts->appends(['search' => Request::get('search') ])->render() !!}
        </div>

    </div>
</div>

@endsection

@section('modal')

  <div class="modal fade" id="addContact" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-address-book" aria-hidden="true"></i> New Contact</h4>
        </div>
        <div class="modal-body">
        {!! Form::open(array('name'=>'add_contact','id'=>'add_contact','action'=>'HomeController@store')) !!}
          <label>Name</label>
          <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name">

          <label>Number</label>
          <input type="text" class="form-control" value="{{old('number')}}" id="number" name="number">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" onclick="return confirm('Confirm save this new record?')"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        {!! Form::close() !!}
      </div>
      
    </div>
  </div>


@endsection


