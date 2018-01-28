@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <form enctype="multipart/form-data" action="/profile" method="POST">
                  &nbsp;&nbsp;<label>Update Profile Image</label>
                <br>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br><br><br><br>
                <div>
                    <center>
                <input type="submit" class="btn btn-sm btn-success">
                    </center>
                </div>
                
            </form>  
                <br><br><br>
                
                
                
                </div>
        </div>
    </div>
</div>
@endsection
