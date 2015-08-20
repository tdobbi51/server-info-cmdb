
{{-- Shared form fields for Applications --}}



<div class="form-group">

  {!! Form::label('name', 'Application Name: ') !!}

  {!! Form::text('name', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group" id="environmentSelect">

  {!! Form::label('environment_id', 'Environment:') !!}

  {!! Form::select('environment_id', $environments, null, 
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


<div class="form-group"> 

  {!! Form::label('hostSearch', 'Add Host: ') !!}

  {!! Form::text('hostSearch', null, ['id' => 'hostSearch', 'class' => 'form-control typeahead', 'placeholder' => 'Search']) !!}

</div>


<div class="form-group">

  {!! Form::label('hosts[]', 'Associated Hosts') !!}

  {!! Form::select('hosts[]', $hosts, null, 
              ['id' => 'hostList', 'class' => 'form-control', 'multiple' => 'multiple', 'size' => '8']) !!}

  <button id="remove" class="btn btn-default">Remove selected</button>

</div> 


<div class="form-group" id="devteamSelect">

  {!! Form::label('devteam_id', 'Dev Team:') !!}

  {!! Form::select('devteam_id', $devteams, null, 
              ['id' => 'devteam', 'class' => 'form-control']) !!}

</div> 



<div class="form-group" id="businessSelect">

  {!! Form::label('business_id', 'Business unit:') !!}

  {!! Form::select('business_id', $businesses, null, 
              ['id' => 'business', 'class' => 'form-control']) !!}

</div> 



<div class="form-group">

  {!! Form::label('notes', 'Notes: ') !!}

  {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '4']) !!}

</div>


<button type="Submit" class="btn btn-default pull-right">{!! $submitButtonText !!}</button>

