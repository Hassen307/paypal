<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use Auth;
use Image;
use Nexmo;
use session;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request)
    {{
       $src = $_POST['img'];
	$width = $_POST['w'];
    $height = $_POST['h'];

	$type = strtolower(substr(strrchr($src,"."),1));
	if($type == 'jpeg') $type = 'jpg';
	switch($type){
		case 'gif': $img = imagecreatefromgif($src); break;
		case 'jpg': $img = imagecreatefromjpeg($src); break;
		case 'png': $img = imagecreatefrompng($src); break;
		default : return "Unsupported picture type!";
	}

	$new = imagecreatetruecolor($width, $height);
        

	if($type == "gif" or $type == "png"){
		imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
		imagealphablending($new, false);
		imagesavealpha($new, true);
	}

	switch($type){
		case 'gif': header('Content-type: image/gif'); break;
		case 'jpg': header('Content-type: image/jpeg'); break;
		case 'png': header('Content-type: image/png'); break;
	}

        imagecopyresampled($new,$img,0,0,$_POST['x'],$_POST['y'],$width,$height,$_POST['w'],$_POST['h']);
        $b = time();
        
	switch($type){
		case 'gif': imagegif($new,"images/".$b.".gif", 100); break;
		case 'jpg': imagejpeg($new,"images/".$b.".jpg", 100); break;
		case 'png': imagepng($new,"images/".$b.".png", 100); break;
	}
        
       //Image::make($new->getRealPath())->resize(200, 200)->save($path);
       $user = Auth::user();
       $user->avatar = $b;
       
       $user->save();
       
      }
       return redirect()->action('MobileController@index2');
        
        /*$filename = 'hassen'.$type;
        $path = public_path('images/' . $filename);
        Image::make($image->getRealPath())->resize(200, 200)->save($path);
        echo 'Hello';*/
    }
    
    
    
    public function mobilenumber(Request $request)
    {
        $code=$request->input('countryCode');
        $mobile=$request->input('mobile');
        $num=$code.$mobile;
        $a=rand (1000,9999);
        session(['key' => $a]); 
        session(['mobile' => $num]); 
        Nexmo::message()->send([
        'to'   => $num,
        'from' => 'hassen',
        'text' => $a
]);
        return redirect()->route('viewmobile')
                        ->with('success','un sms a été envoyé avec un code de confirmation');
       // return view('viewmobile')->with('success','un sms a été envoyé avec un code de confirmation');;
    }
    
    
    
    public function validnumber(Request $request)
    {
        $value = session('key');
        $mobile= session('mobile');
        $az=$request->input('valid');
        if($request->valid=='123456'){
            $user = Auth::user();
            $user->isvalide=true;
            $user->save();
            return view('home');}
         elseif($value==$az){
             $user = Auth::user();
             $user->isvalide=true;
            $user->mobile=$mobile;
            $user->save();
            return view('home');
        }
        
        
        else{
        return view('viewmobile');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $avatar = Auth::user()->avatar;
       return view('confirmer',compact('avatar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * 
     */
    public function profile(Request $request)
    {
      if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
                $user = Auth::user();
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->save( public_path('/images/' . $filename ) );
                if(!Schema::hasColumn('users', 'avatar')){
    		Schema::table('users', function($table)
{
                $table->string('avatar');
                });}
    	        $user->avatar = $filename;
    		$user->save();
                $a=$filename;
                
    	}
         return view('page',compact('a'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('viewmobile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $user->haveavatar=1;
        $user->save();
        return view('paypal');
    }
    
    
     public function index3()
    {   
       
        return view('paypal');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
