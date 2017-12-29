 @extends('layouts.template')

@section('content')

<div class="container">
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
    <div class="row" style="margin-top:40px">
      <div class="col-md-offset-2 col-md-6" style="margin-bottom:10px">
        <a href="{{url('home')}}">
          <button class="btn btn-info"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Back</button>
        </a>
      </div>
      <div class="col-md-offset-2 col-md-6">
    {!! Form::open(array('method'=>'PATCH','name'=>'edit_contact','id'=>'edit_contact','action' => array('HomeController@update', $contacts->id) )) !!}
    <table class="table">
      <tr>
        <td><label>Name</label></td>
        <td><input type="text" class="form-control" value="{{$contacts->name}}" id="name" name="name">
        </td>
      </tr>

       <tr>
        <td><label>Number</label></td>
        <td><input type="text" class="form-control" value="{{$contacts->number}}" id="number" name="number">
        </td>
      </tr>

      <tr>
        <td colspan="2" style="text-align:right">   
          <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to update this Record?')"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
        </td>
      </tr>
    </table>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection