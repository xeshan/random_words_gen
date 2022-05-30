<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UserName;
use App\Models\UserDetail;
use Redirect;

class UserNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('username');
    }

   
    public function generate_string(Request $request){
        
        if($request->alphabetselction == 1){   
            $word_range = array_merge(range('a', 'z'), range('A', 'Z'));
        }
        elseif($request->alphabetselction == 2){
            $word_range = range('0', '9');
        }
        else{
            $word_range = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'));
        }
        $characters = implode($word_range);
        $length = strlen($characters);
        $word_length = 6;
        $random_string = '';
        for ($i = 0; $i < $request->inputNumber * $word_length; $i++) {
            $random_string .= $characters[rand(0, $length - 1)];
        }
        
        $name = $request->UserName;

        $this->store($name,$random_string);

        return redirect()->route('all-data')->with('message','Data Enter Successfully');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($name, $random_string)
    {
        
        $split_string = str_split($random_string, 6);
        
        $count = count($split_string);
        
        $user = UserName::create([
            'user_name' => $name,
        ]); 
        
        for($i= 0; $i < $count; $i++ ){
            $UserData[$i] = new UserDetail([
                'user_name_id' => $user->id,
                'random_words' => $split_string[$i],
            ]);
        
            $UserData[$i]->save();

        }
        
    }
    public static function UserDetail($id)
    {

        $random_words = UserDetail::where('user_name_id', $id)->get();
        
        return $random_words;
    }

    public function show()
    {
        
        $user_name_data = UserName::all();
        
        $data = UserDetail::all();
        
        return view('all-data',compact('data','user_name_data'));
    }


}
