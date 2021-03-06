@extends('layouts.default')
@section('styles')

    {{ HTML::style('plugins/summernote/css/summernote.css') }}
    {{ HTML::style('plugins/summernote/css/css/font-awesome.min.css') }}
@stop

@section('content')

 @include('common.news_errors')

 <p>Tips på layouthjälp <a href="http://www.layoutit.com/build">här</a>. Designa hur du vill att menyn ska se ut,
     välj "Download", sedan "continue non logged". Väl där, kopiera koden, gå tillbaka till denna sida, tryck på
     "Code View" i texeditorn, och klistra in den kopierade koden.</p>

{{Form::open(array('url'=> 'news/store','files'=>true, 'id'=>'form1'))}}
    <p>
        {{Form::label('name', 'Titel', array('class' => 'required'))}} <br/>

        {{Form::text('name', '', array('class'=>'form-control'))}}

    </p>

     <p>
         {{Form::label('abstract', 'Ingress', array('class' => 'required'))}} <br/>

         {{Form::textarea('abstract', '', array('class'=>'form-control'))}}

     </p>

    <p>
            {{Form::label('content', 'Innehåll', array('class' => 'required'))}} <br/>

             <div class="summernote" id="col">{{Input::old('content')}}</div>
             {{Form::hidden('content')}}

 <div class = "row">
     <div class = "col-xs-10">

     </div>
     <div align = "right" class = "col-xs-2">
         <a href="http://www.layoutit.com/build" target="_blank">Länk till kodsida.</a>

     </div>
 </div>

    <p>
            {{Form::label('author', 'Författare', array('class' => 'required'))}} <br/>

            {{Form::text('author', '', array('class'=>'form-control'))}}

     </p>

    <p>
        {{Form::label('order', 'Prioritet', array('class' => 'required'))}} <br/>

        {{Form::select('order', array('1' => '1', '2' => '2', '3' =>'3'), '1')}}
    </p>

 <!------------------------IMAGE START-------------------------->
 <p>
     {{Form::label('image', 'Bild')}} <br/>

 </p>

             <div class="fileinput fileinput-new" data-provides="fileinput">

                 <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                     <!--<img data-src="holder.js/100%x100%" alt="...">-->
                 </div>
                 <div class="fileinput-preview fileinput-exists thumbnail"
                      style="max-width: 200px; max-height: 150px;">

                 </div>
                 <div>
                             <span class="btn btn-default btn-file">
                             <span class="fileinput-new">Select image</span>
                             <span class="fileinput-exists">Change</span>
                             <input id="image" type="file" name="image"></span>
                     <a href="#" class="btn btn-default fileinput-exists"
                        data-dismiss="fileinput">Remove</a>
                 </div>
             </div>

 <!------------------------IMAGE END-------------------------->

    <button id="save" class="btn btn-primary" onclick="save()" type="button">Skapa nyhet
    {{Form::close()}}
@stop

@section('scripts')
    {{HTML::script('plugins/summernote/js/summernote.min.js')}}
    {{HTML::script('plugins/summernote/custom/onImageUpload.js')}}
    <script>
        {{--When uploading an image save it in the folder event--}}

     onImageUpload("filesOwncloud/styrelsen/files/images/news","{{url('events/imgstore')}}");
    </script>

    <script>

        $("#save").click(function () {
            $("#content").val($('#col').summernote('code'));
            $("#form1").submit();
        });

    </script>
@stop