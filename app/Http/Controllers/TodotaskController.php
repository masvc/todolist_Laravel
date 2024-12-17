<?php

namespace App\Http\Controllers;

use App\Models\Todotask;
use Illuminate\Http\Request;

class TodotaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todotasks = Todotask::with('user')->latest()->get();
        return view('todotasks.index', compact('todotasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todotasks.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'task' => 'required|string|max:255',
            'done' => 'boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像のバリデーション
        ]);

        // 画像のアップロード処理
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('images', 'public'); // 'images'フォルダに保存
        }

        // 新しいタスクを作成
        $task = Todotask::create([
            'task' => $request->task,
            'done' => 0, // doneの初期値を0に設定
            'img' => $imgPath, // アップロードした画像のパスを保存
            'user_id' => auth()->id(), // 現在のユーザーIDを設定
        ]);

        // タスク一覧ページにリダイレクト
        return redirect()->route('todotasks.index')->with('success', 'タスクが追加されました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todotask $todotask)
    {
        return view('todotasks.show', compact('todotask')); // タスク詳細ページにリダイレクト
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todotask $todotask)
    {
        return view('todotasks.edit', compact('todotask'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todotask $todotask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todotask $todotask)
    {
        //
    }
}
