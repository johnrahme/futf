@extends('layouts.default')

@section('content')

    <h1>{{$samarbetspartners->name}}</h1>
    {{--    <!--url har värdet 'empty' om det inte finns någon bild--> <!-- Bortkommenterat för jag tycker det är onödigt att visa företagets logga här..-->
        @if($samarbetspartners->url != 'empty')
            {{HTML::image($samarbetspartners->url, '', array('class' => 'img-responsive'))}}
        @endif--}}
    <div style="word-wrap: break-word">
        <p><i>{{$samarbetspartners->abstract}}</i></p>
        <p>{{$samarbetspartners->content}}</p>
        <p>Order: {{$samarbetspartners->order}}</p>
    </div>

    <td>
        {{ Form::open(array('url'=>'samarbetspartners/delete', 'method' =>'DELETE')) }}
        {{ Form::hidden('id', $samarbetspartners->id)}}
        {{ Form::submit('Radera', array('class'=>'btn btn-danger btn-sm')) }}
        {{Form::close()}}
    </td>

    @if(Auth::check())
        <td>{{link_to_route('samarbetspartners.edit','Ändra', $samarbetspartners->id, array('class'=>'btn btn-primary btn-sm'))}}</td>
    @endif
@stop

@section('scripts')

@stop