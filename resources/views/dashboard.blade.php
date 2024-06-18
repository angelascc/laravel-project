<x-app-layout>
    <x-container>
        <form action="{{ route('posts.store') }}" class="px-4 mb-8" method="POST">
            @csrf

            <textarea 
                name="body" 
                rows="2" 
                class="w-full mb-2 text-white bg-transparent border-0 border-b-2 border-slate-800 focus:border-b-slate-700 focus:ring-0 resize-none overflow-hidden"
                placeholder="Your comment..."
            ></textarea>
        
            <x-submit-button>Submit</x-submit-button>
        </form>

        @foreach ($posts as $post)
            <a href="{{ route('profile.show', $post->user) }}" class="px-6 mb-2 flex items-center gap-2 font-medium text-slate-100">
            <svg class="h-4" data-slot="icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z"></path>
            </svg>
            {{ $post->user->name }}
            </a>
            <x-card class="mb-4">
                {{ $post->body }}

                <div class="text-xs text-slate-500">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </x-card>
        @endforeach
    </x-container>
</x-app-layout>
