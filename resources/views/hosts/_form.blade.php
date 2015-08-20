
{{-- Shared form fields for Applications --}}



<div class="form-group">

  {!! Form::label('name', 'Application Name: ') !!}

  {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group" id="envSelect">

  {!! Form::label('environment', 'environment:') !!}

  {!! Form::select('environment', $environments, null, 
                                   ['id' => 'environment', 'class' => 'form-control']) !!}

</div>

<div class="form-group">

  {!! Form::label('url', 'URL: ') !!}

  {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'https://mysite.premierinc.com/myapp']) !!}

</div>



<div class="form-group"> 

  {!! Form::label('description', 'Description: ') !!}

  {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) !!}

</div>



<div class="input_fields_wrap">

  {!! Form::label('host[]', 'Server Hosts: ') !!}  

  <div class="form-group input-group" id="host_typeahead"> 

  {!! Form::text('host[]', null, ['class' => 'form-control typeahead', 'placeholder' => 'Host 1']) !!}

  <span class="input-group-btn">
    <button id="add" class="btn btn-default" type="button">
      <i class="glyphicon glyphicon-plus"></i>
    </button></span>
  </div>
</div>




<div class="form-group" id="devteamSelect">

  {!! Form::label('devteam_id', 'Dev Team:') !!}

  {!! Form::select('devteam_id', $devteams, null, 
                                 ['id' => 'devteam', 'class' => 'form-control']) !!}

</div> 



<div class="form-group" id="businessSelect">

  {!! Form::label('business', 'Business Unit:') !!}

  {!! Form::select('business', $busnessUnits, null, 
                                 ['id' => 'business', 'class' => 'form-control']) !!}

</div>




<div class="form-group">

  {!! Form::label('notes', 'Notes: ') !!}

  {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '4']) !!}

</div>


<button type="Submit" class="btn btn-default pull-right">{!! $submitButtonText !!}</button>

