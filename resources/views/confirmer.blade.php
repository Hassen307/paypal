@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                
                
               
              
                <div class="panel-body">

                    
                    <center>
                    <img src="{{ URL::to('/') }}/images/{{ $avatar }}.jpg" />
                    
                    </center><br><br>
                    <center>
                        
                    <button class="btn-primary" type="button" onclick="window.location='{{ url("page") }}'">Confirmer</button>
                    </center>
                    

                    
                    
                
            </div>
        </div>
    </div>
</div>



@endsection