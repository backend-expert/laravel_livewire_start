<div>
    Show Tweets
    <h1>{{ $message }}</h1>

    <form action="" method="post" wire:submit.prevent="create">
        <input type="text" wire:model="message">
        @error('message')
            {{ $message }}
            
        @enderror

        <button type="submit">Criar Tweet</button>
    </form>
    

    <hr>

    @foreach ($tweets as $tweet)
    <div class="flex">

        <div class="w-1/8">
            @if ($tweet->user->photo)
                <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="" class="rounded-full h-8 w-8">
            @else
                <img src="{{ url("images/user.png") }}" alt="" class="rounded-full h-8 w-8">
            @endif

            {{ $tweet->user->name }} 
        </div>

        <div class="w-7/8">        
            {{ $tweet->content }}  

            @if ($tweet->likes->count())
                <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
                @else
                <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
            @endif
        </div>   

    </div>   
    @endforeach

    <hr>

    <div>
        {{ $tweets->links() }}
    </div>
   
</div>
