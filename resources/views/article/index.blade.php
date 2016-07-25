@extends('welcome')
@section('content')
    <section class="container">
        <a href="{{'article/create'}}" role="btn" class="btn-primary">Create</a>
        <form action="{{url('article/search')}}" method="get">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="search">
            <input type="text" name="search" />
            <button name="submit">搜尋</button>
        </form>
        <table class="table table-hover">
            @foreach($query as$var)
                <tr>
                    <td>{{$var->id}}</td>
                    <td>{{$var->title}}</td>
                    <td><a href="{{url('article/'.$var->id.'/edit')}}" role="button">Edit</a> </td>
                    <td>
                        <form action="{{url('article/'.$var->id)}}" method="get">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" role="button" class="btn" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@stop