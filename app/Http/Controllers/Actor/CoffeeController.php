<?php

namespace App\Http\Controllers\Actor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coffee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;

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
        $coffee = Coffee::findOrFail($id);
        return view('actor.coffees.edit', compact('coffee'));
    }

    public function update(UploadImageRequest $request, $id)
    {
        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            // Storage::putFile('public/shops', $imageFile);
            $fileName = uniqid(rand() . '_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName . '.' . $extension;
            $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();
            // dd($imageFile, $resizedImage);
            
            // $fileNameToStore = ImageService::upload($imageFile, 'shops');
            // Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage);
            Storage::put('public/shops/' . $fileNameToStore, $resizedImage);

        }

        return redirect()->route('actor.coffees.index');
    }
}