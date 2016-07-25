@extends('welcome')
@section('content')
    <section class="container">
        <form action="{{url('article/'.$query->id)}}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="text" name="title" class="form-control" value="{{$query->title}}"></br>
            <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$query->content}}</textarea> </br>
            <input type="submit" value="送出" class="btn btn-primary">
        </form>
    </section>
@stop