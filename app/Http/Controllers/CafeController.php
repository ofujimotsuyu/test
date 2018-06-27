<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cafemenu;
use App\User;

class CafeController extends Controller
{
    public function index(){
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $cafemenus = Cafemenu::all();
            $data = [
                'user' => $user,
                'cafemenus' => $cafemenus,
            ];
            
           
            return view('contents.cafe_menu', $data);
        }else{
        return view('welcome', $data);
        }
    }
    
    public function store(Request $request)
    {
        $user = \Auth::user();
        $this->validate($request, [
            'content' => 'required|max:191',
            'cafe_menu' => 'required|max:300',
        ]);

        $request->user()->cafemenu()->create([
            'content' => $request->content,
            'cafe_menu' => $request->cafe_menu,
            'user_id' => $user->id,
        ]);
        
        $cafemenus = Cafemenu::all();
        $data = [
            'user' => $user,
            'cafemenus' => $cafemenus,
        ];

        return view('contents.cafe_menu', $data);
    }
    
    public function cafe($id){
        $user = User::find($id);
        return view('contents.cafe', [
            'user' => $user,
        ]);   
    }
    
    public function upload(Request $request, $id)
    {
        $this->validate($request, [
            'cafe_menu' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                
                'dimensions:min_width=120,min_height=120,max_width=1000,max_height=1000',
            ]
            
        ]);
        
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        if ($request->file('cafe_menu')->isValid()) {
            $filename = $request->file('cafe_menu')->store('public/avatar');
            $request->user()->cafemenu()->create([
                'content' => $request->content,
                'cafe_menu' => basename($filename),
                'user_id' => $request->user()->id,
            ]);
            
            $cafemenus = Cafemenu::all();
            $data = [
                'user' => \Auth::user(),
                'cafemenus' => $cafemenus,
            ];
            
            return view('contents.cafe_menu', $data)->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['cafe_menu' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
    
    public function destroy($id)
    {
        $cafemenu = Cafemenu::find($id);

        if (\Auth::user()->id === $cafemenu->user_id) {
            $cafemenu->delete();
        }

        return redirect()->back();
    }
    
    public function test(){
        return view('test');
    }
}
