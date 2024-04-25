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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actor.snaps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
