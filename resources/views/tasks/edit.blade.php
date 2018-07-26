@extends('layouts.base')

@section('content')

<div class="container">
        <h2 class="text-center">Edit task</h2><br/>
        <form method="PUT" action="/edit-task/{{$id}}">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="name_task">Name task:</label>
              <input type="text" class="form-control" name="name_task" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" required>
              </div>
            </div>

          <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <input type="radio" name="status" value="1" >Done <br>
                <input type="radio" name="status" value="0" checked>Incomplete <br>
              </div>
            </div>

          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="assign">Assign:</label> 
              <input type="text" name="assign" class="form-control" required>   
           </div>
          </div>
          
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
              <button type="submit" class="btn btn-success">Edit task</button>
            </div>
          </div>
        </form>
        @include('layouts.errors')
      </div>

@endsection