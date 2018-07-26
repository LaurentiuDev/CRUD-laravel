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
                    <a class="btn btn-primary btn-xs" href="/edit-button/{{$value->id}}" >
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
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
@endsection 