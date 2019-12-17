<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Game;
use App\User;
 
class GamesController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth')->except(['index', 'show']);

    }

    public function index()

    {

    	$games = Game::latest()->get();


    	$activeusers = User::activeusers();
        
        return view('games.index', ['games' => $games, 'activeusers' => $activeusers]);
 
    }
    
    public function show(Game $id)

    {

        return view('games.show', ['game' => $id]);

    }

    public function create()

    {

    	return view('games.create');

    }

    public function store()

    {

        $this->validate(request(), [
            'title' => 'required|unique:games',
            'publisher' => 'required',
            'releasedate' => 'required',
            'image' => 'required',

        ]);
        
        $game = new Game;
        
        $game->title = request('title');
        $game->publisher = request('publisher');
        $game->releasedate = request('releasedate');
        $game->image = request()->file('image')->store('public/images');
        $game->user_id = auth()->id();
        $game->save();

        session()->flash('message', 'Nice Game Submission!');
        session()->flash('type', 'success');
        
        return redirect('/games');
        
    }

}