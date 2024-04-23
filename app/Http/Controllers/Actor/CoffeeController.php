<?php

namespace App\Http\Controllers\Actor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coffee;
use Illuminate\Support\Facades\Auth;

class CoffeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:actors');
        
        $this->middleware(function ($request, $next) {
            // dd($request->route()->parameter('shop')); //文字列
            // dd(Auth::id()); //数字

            $id = $request->route()->parameter('coffee'); //shopのid取得
            if(!is_null($id)){ // null判定
            $coffeesActorId = Coffee::findOrFail($id)->actor->id;
                $coffeeId = (int)$coffeesActorId; // キャスト 文字列→数値に型変換
                $actorId = Auth::id();
                if($coffeeId !== $actorId){ // 同じでなかったら
                    abort(404); // 404画面表示
                }
            }
            return $next($request);
        });
    } 

    public function index()
    {
        $coffees = Coffee::where('actor_id', Auth::id())->get();

        return view('actor.coffees.index', 
        compact('coffees'));
    }

    public function edit($id)
    {
        dd(Coffee::findOrFail($id));
    }

    public function update(Request $request, $id)
    {

    }
}