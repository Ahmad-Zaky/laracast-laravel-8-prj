@props(['comment'])

<article class="flex space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" width="60" height="60" alt="avatar" class="rounded-xl">
    </div>
    <x-layout.reuse.panel class="bg-gray-50">
        <header>
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">
                Posted
                <time class="">{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </x-layout.reuse.panel>
</article>