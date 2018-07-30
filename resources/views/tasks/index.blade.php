@extends('layouts.base')

@section('content')
<div>
        <a href="/add-button" class="btn btn-info btn-xs" >
           Add task  
        </a>
    <br><br>
    <table id="mytable" class="table table-bordered">
                   
        <thead>
            <th>id</th>
            <th>Task</th> 
            <th>Description</th>
            <th>Status</th>
            <th>Assign by</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

            
            @foreach($task as $value)
                @if($value->assign === auth()->user()->id)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->description}}</td>
                    @if($value->status)
                        <td>Done</td>
                    @else
                        <td>Incomplete</td>
                    @endif
                    
                    @foreach($users as $user)
                        @if($user->id === $value->user_id)
                            @if($value->user_id === auth()->user()->id)
                                <td>You</td>
                                @break
                            @else
                                <td>{{$user->name}}</td>
                                @break
                            @endif
                        @endif
                        
                    @endforeach

                    <td>             
                        <form method="PUT" action="/edit-button/{{$value->id}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit"  class="btn btn-primary btn-xs"> 
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </form>
                    </td>
                    
                    <td>
                        <form method="POST" action="/delete-task/{{$value->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-xs" ><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endif
            @endforeach
        
       
    </table>

    {{$task->render()}}
   
    
</div>
@if(Session::has('message'))
<div class="message-alert">
    <span> {{session()->get('message')}}</span>
</div>
@endif

@endsection 