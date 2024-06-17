<x-app-layout>
    <x-container>
        <form action="" class="px-4 mb-8" method="POST">
            @csrf
            
            <input 
                    type="submit"
                    class="px-4 py-2 bg-yellow-400 text-gray-800 font-semibold sm:rounded-lg text-xs"
                    value="Add friend"
                >
        </form>

        @foreach ($posts as $post)
            <x-card class="mb-4">
                {{ $post->body }}

                <div class="text-xs text-slate-500">
                    {{ $post->created_at->diffForHumans() }}
                </div>
            </x-card>
        @endforeach
    </x-container>
</x-app-layout>
