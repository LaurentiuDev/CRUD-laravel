@extends('layouts.base')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8"></div>
            <a href="/home" class="btn btn-primary">Back</a>
        </div>

        <h2 class="text-center">Create task</h2><br/>
        <form method="post" action="/add-task">
          {{csrf_field()}}
          
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="name">Name task:</label>
              <input type="text" class="form-control" name="name" required>
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
              <select name="assign" class="form-control">
                  <option value="{{auth()->user()->id}}"> You </option>
                  @foreach($users as $user)
                    @if($user->id !== auth()->user()->id)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                  @endforeach
              </select>   
           </div>
          </div>

          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <input type="hidden" name="user_id" value="{{auth()->user()->id}}" class="form-control" >   
           </div>
          </div>
          
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
              <button type="submit" class="btn btn-success">Add task</button>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                @include('layouts.errors')
              </div>
         </div>
        </form>
       
      </div>

@endsection