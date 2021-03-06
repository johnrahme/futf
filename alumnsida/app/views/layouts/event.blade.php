@extends('layouts.default')
@section('styles')
    @yield('styles')
@stop

@section('content')

    @yield('before')

    <div class = "row">
        <div class = "col-md-6">
            <div class = "panel panel-default">
                <div class = "panel-body" style = "padding-top: 0">
                    <div class = "page-header" style = "margin-top:0px">
                        <h3>{{$title}}</h3>
                    </div>
                        <div role="tabpanel">

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" @if(Input::old('activeTab')&&Input::old('activeTab')!='home')@else class="active"@endif><a href="#home" id = "tab1" aria-controls="home" role="tab" data-toggle="tab">Namn tid och plats</a></li>
                            <li role="presentation" @if(Input::old('activeTab')&&Input::old('activeTab')=='profile') class = "active" @endif><a href="#profile" id = "tab2" aria-controls="profile" role="tab" data-toggle="tab">Beskrivning</a></li>
                            <li role="presentation" @if(Input::old('activeTab')&&Input::old('activeTab')=='messages') class = "active" @endif><a href="#messages" id = "tab3" aria-controls="messages" role="tab" data-toggle="tab">Registrering</a></li>
                            <li role="presentation" @if(Input::old('activeTab')&&Input::old('activeTab')=='settings') class = "active" @endif><a href="#settings" id = "tab4" aria-controls="settings" role="tab" data-toggle="tab">Övrigt</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                          {{--Namn tid och plats--}}
                            <div role="tabpanel" class="tab-pane @if(Input::old('activeTab')&&Input::old('activeTab')!='home')@else active @endif" id="home">
                            <br>
                            @yield('panelOne')
                            </div>
                            {{--Beskrivning--}}
                            <div role="tabpanel" class="tab-pane @if(Input::old('activeTab')&&Input::old('activeTab')=='profile') active @endif" id="profile">
                            <br>
                            @yield('panelTwo')
                            </div>
                            {{--Registrering--}}
                            <div role="tabpanel" class="tab-pane @if(Input::old('activeTab')&&Input::old('activeTab')=='messages') active @endif" id="messages">
                            <br>
                            @yield('panelThree')

                            </div>
                            {{--Övrigt--}}
                            <div role="tabpanel" class="tab-pane @if(Input::old('activeTab')&&Input::old('activeTab')=='settings') active @endif" id="settings">
                            <br>
                            @yield('panelFour')
                            </div>
                          </div>

                        </div>
                 </div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class = "panel panel-default">
                <div class = "panel-body" style = "padding-top: 0">
                    <div class = "page-header" style = "margin-top:0px">
                        <h3> <div id = "header">Header</div> <small id="date">datum</small></h3>

                    </div>
                    <p id="desc">Beskrivning</p>
                    {{--Ett alternativ--}}
                    {{--<a href = "#" class="btn btn-default"  role = "button" aria-label="Left Align" style="margin-bottom: 5px">--}}
                      {{--<span class="glyphicon glyphicon-time" aria-hidden="true" style="font-size: 1.8em"></span>--}}
                      {{--{{date('Y-m-d', strtotime($currEvent->dateTimeFrom))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeFrom))}} - {{date('Y-m-d', strtotime($currEvent->dateTimeTo))}} Kl. {{date('H:i', strtotime($currEvent->dateTimeTo))}}--}}
                    {{--</a>--}}

                    <p aria-label = "Left Align">
                            <span class="glyphicon glyphicon-time" style="font-size: 1.8em" ></span>
                            <d id = "date2"> datum Kl. tid - datum 2 Kl. tid</d>
                    </p>
                    <p>
                        <span class="glyphicon glyphicon-map-marker" style="font-size: 1.8em"></span>
                        <a><d id = "location">plats</d></a>
                    </p>
                    <p id = "register">
                        <span class="glyphicon glyphicon-pencil" style="font-size: 1.8em"></span>
                        <a>Anmälan</a>
                    </p>

                    <p>
                        <span class="glyphicon glyphicon-edit" style="font-size: 1.8em"></span>
                        <a>Ändra</a>
                    </p>
                    <p id = "registrations">
                        <span class="glyphicon glyphicon-eye-open" style="font-size: 1.8em"></span>
                        <a>Registreringar</a>
                    </p>
                    {{ Form::button('Ta bort', array('class'=>'btn btn-danger')) }}

                    {{Form::hidden('activeTab', 'home', array('id'=>'activeTab'))}}
                </div>
            </div>
        </div>
    </div>

    @yield('after')
@stop

@section('scripts')
@yield('scripts')
@stop
