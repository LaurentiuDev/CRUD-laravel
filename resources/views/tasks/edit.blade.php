@extends('layouts.base')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-md-8"></div>
            <a href="/home" class="btn btn-primary">Back</a>
        </div>
        <h2 class="text-center">Edit task</h2><br/>
        <form method="post" action="/edit-task/{{$id}}" >
          {{csrf_field()}}
          {{ method_field('PUT') }}
          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="name">Name task:</label>
              <input type="text" class="form-control" name="name" value="{{$task->name}}" required>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description"  value="{{$task->description}}" required>
              </div>
            </div>

          <div class="row">
            <div class="col-md-4"></div>
              <div class="form-group col-md-4">
                <input type="radio" name="status" value="1" {{$task->status ? 'checked' : '' }} >Done <br>
                <input type="radio" name="status" value="0" {{$task->status ===0 ? 'checked' : ''}}>Incomplete <br>
              </div>
            </div>

          <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="assign">Assign:</label>  
              <select name="assign" class="form-control">
                <option value="{{auth()->user()->id}}" {{auth()->user()->id === $task->user_id ? 'selected' : ''}} > You </option>

                @foreach($users as $user)
                  @if($user->id !== auth()->user()->id)
                    <option value="{{$user->id}}" {{$user->id === $task->user_id ? 'selected' : ''}}>{{$user->name}}</option>
                    @break
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
              <button type="submit" class="btn btn-success">Edit task</button>
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