<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Http\Requests\AddBoard;

class BoardController extends Controller
{
    public function index ( Request $request ) {
      $board = new Board;
      $boards = $board::all();
      return view('boards.index', ['boards' => $boards]);
    }
    public function addComment ( AddBoard $request ) {
      $board = new Board;
      $param = [
        $board->name = $request->name,
        $board->comment = $request->comment,
      ];
      $board->fill($param)->save();

      return redirect()->route('board.index');
    }
}
