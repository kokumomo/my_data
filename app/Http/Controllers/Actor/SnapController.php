<?php

namespace App\Http\Controllers\Actor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Snap;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class SnapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:actors');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('snap'); 
            if(!is_null($id)){ 
            $snspActorsID = Snap::findOrFail($id)->actor->id;
                $snapId = (int)$snspActorsID; 
                if($snapId !== Auth::id()){ 
                    abort(404);
                }
            }
            return $next($request);
        });
    } 

    public function index()
    {
        $snaps = Snap::where('actor_id', Auth::id())
        ->orderBy('updated_at', 'desc')
        ->paginate(20);

        return view('actor.snaps.index', 
        compact('snaps'));
    }

    public function create()
    {
        return view('actor.snaps.create');
    }

    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if(!is_null($imageFiles)){
            foreach($imageFiles as $imageFile){
                $fileNameToStore = ImageService::upload($imageFile, 'products');    
                Snap::create([
                    'actor_id' => Auth::id(),
                    'filename' => $fileNameToStore  
                ]);
            }
        }

        return redirect()
        ->route('actor.snaps.index')
        ->with(['message' => '画像登録を実施しました。',
        'status' => 'info']);
    }

    public function edit($id)
    {
        $snap = Snap::findOrFail($id);
        return view('actor.snaps.edit', compact('snap'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:50'
        ]);

        $snap = Snap::findOrFail($id);
        $snap->title = $request->title;
        $snap->save();

        return redirect()
        ->route('actor.snaps.index')
        ->with(['message' => '画像情報を更新しました。',
        'status' => 'info']);
    }

    public function destroy($id)
    {
        $snap = Snap::findOrFail($id);
        $filePath = 'public/products/' . $snap->filename;

        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }

        Snap::findOrFail($id)->delete(); 

        return redirect()
        ->route('actor.snaps.index')
        ->with(['message' => '画像を削除しました。',
        'status' => 'alert']);
    }
}
