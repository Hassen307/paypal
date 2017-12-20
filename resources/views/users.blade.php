@extends('layouts.app')

@section('content')





<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des utilisateurs</div>

                <div class="panel-body">
               
                    
                    
                    <div class="row">
            <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10"  style="border: 1px solid white; margin: 32px;padding: 25px; border-radius: 7px;">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<th width="90px">photo</th>
			<th width="200px"><b>email</b></th>
			<th width="100px"><b>prenom</b></th>
                        <th width="100px"><b>mobile</b></th>
                        <th width="180px"><b>date de naissance</b></th>
			
		</tr>
	@foreach ($users as $u)
        
        <tr>
            
		<td> <img src="{{ URL::to('/') }}/images/{{ $u->avatar }}.jpg" style="width:90px; height:90px;" /></td>
		<td><b>{{ $u->email }}</b></td>
                <td><b>{{ $u->prenom }}</b></td>
                <td><b>+{{ $u->mobile }}</b></td>
		<td><b>{{ $u->ddn }}</b></td>
                </tr>	
		
	
	@endforeach
	</table>
                <div class="col-lg-1 col-md-1 hidden-xs hidden-sm"></div>
            </div></div>
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

 