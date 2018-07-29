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
            <th>Assign</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>

            
            @foreach($task as $value)
           
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->status}}</td>
                    <td>{{$value->assign}}</td>

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