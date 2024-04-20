<?php

namespace App\Http\Controllers\Avatar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor; // Eloquent エロクアント
use Illuminate\Support\Facades\DB; // QueryBuilder クエリビルダ
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ActorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:avatars');
    }

    public function index()
    {
        $actors = Actor::select('id', 'name', 'email', 'created_at')
        ->paginate(3);

        return view('avatar.actors.index', 
        compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avatar.actors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->name;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:actors',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Actor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
        ->route('avatar.actors.index')
        ->with('message', 'オーナー登録を実施しました。');
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
        $actor = Actor::findOrFail($id);
        // dd($actor);
        return view('avatar.actors.edit', compact('actor'));
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
        $actor = Actor::findOrFail($id);
        $actor->name = $request->name;
        $actor->email = $request->email;
        $actor->password = Hash::make($request->password);
        $actor->save();

        return redirect()
        ->route('avatar.actors.index')
        ->with(['message' => 'オーナー情報を更新しました。',
        'status' => 'info']);
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
