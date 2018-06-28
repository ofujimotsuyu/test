<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);

        return view('home', [
            'user' => $user,
        ]);
    }
    
    public function edit($id)
    {
        if(\Auth::check()){
            if(\Auth::user()->id == $id){
                $user = User::find($id);
        
                return view('prof.edit', [
                    'user' => $user,    
                ]);
            }else{
               return view('prof.error'); 
            }
        }else{
            return view('welcome');
        }
    }

    public function megumi()
    {
        return view('megumi.megumi');
    }



    /**
     * ファイルアップロード処理
     */
    public function upload(Request $request, $id)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                
                'dimensions:min_width=120,min_height=120,max_width=1000,max_height=1000',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/avatar');

            $user = User::find($id);
            $user->avatar_filename = basename($filename);
            $user->save();
            
            return redirect()->back()->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }

    public function taka()
    {
        return view('taka.taka');
        
    }
    public function jitsu(){
      return view('jitsu.jitsu');
    }

    public function minami(){
        return view('minami.minami');
    }
    
    public function zakichan(){
        return view('zakio.zakichan');
    }

}