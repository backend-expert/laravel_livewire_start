<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    use WithPagination;
    // public $message = 'Show do livewire';
    public $message = '';

    protected $rules = [
        'message' => 'required|min:3|max:255'

    ];

    public function render()
    {
        $tweets = Tweet::with('user')->latest()->paginate(4);

        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    { 
        //dd($this->message);
        $this->validate();
        
        auth()->user()->tweets()->create([
            'content' => $this->message
        ]);
        // Tweet::create([
        //     'content' => $this->message,
        //     'user_id' => 9
        // ]);

        $this->message = '';


       
    }

    public function like($id_tweet)
    {
        $tweet = Tweet::find($id_tweet);

        $tweet->likes()->create([
            'user_id'=> auth()->user()->id
        ]);

    } 

    public function unlike(Tweet $tweet)
    {

        $tweet->likes()->delete();

    } 
}
