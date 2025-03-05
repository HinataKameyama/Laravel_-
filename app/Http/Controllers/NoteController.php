<?php
namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // メモ作成フォーム表示
    public function create()
    {
        return view('notes.create');
    }

    // メモ保存
    public function store(Request $request)
    {
        Note::create([
            'title' => $request->title,
            'detail' => $request->detail,
        ]);

        return redirect()->route('notes.create')->with('status', 'メモが保存されました！');
    }

    // メモ一覧（全取得）
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    // メモ一覧（タイトル10文字以上のメモ）
    public function filter()
    {
        $notes = Note::whereRaw('length(title) >= 20')->get();
        return view('notes.index', compact('notes'));
    }
}