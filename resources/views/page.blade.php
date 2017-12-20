@extends('layouts.app')

@section('content')

<?php

$image = "images/".$a;

?>
<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                <div class="panel-heading">Photo de profil</div>
                <center><img src="<?php echo $image ?>" id="cropbox" /></center>
                <p></p>
                <form action="{{ route('image') }}" method="post" onsubmit="return checkCoords();">
                    {{ csrf_field() }}
                    <input type="hidden" id="x" name="x" />
                    <input type="hidden" id="y" name="y" />
                    <input type="hidden" id="w" name="w" />
                    <input type="hidden" id="h" name="h" />
                    <input type="hidden" id="img" name="img" value="<?php echo $image ?>" />
                    <p class="text-center">
                        <input type="submit"  value="Choisir une zone" class="btn btn-primary btn-lg" />
                    </p>
                </form>
                <div class="panel-body">
                 
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                
            </div>
        </div>
    </div>
</div>



@endsection
