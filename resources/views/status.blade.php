<x-app-layout>
    <x-container>
        <h2 class="text-lg mb-4 text-gray-500">Friend requests</h2>

        @foreach ($requests as $user)
            <x-card class="mb-4">
                <div class="flex justify-between">
                    {{ $user->name }}

                    <form action="{{ route('friends.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-submit-button>Confirm</x-submit-button>
                    </form>
                </div>
            </x-card>
        @endforeach

        <h2 class="text-lg mb-4 text-gray-500">Sent requests </h2>

        @foreach ($sent as $user)
            <x-card class="mb-4">
                {{ $user->name }}
            </x-card>
        @endforeach

        <h2 class="text-lg mb-4 text-gray-500">Friends </h2>

        @foreach ($friends as $user)
            <x-card class="mb-4">
                {{ $user->name }}
            </x-card>
        @endforeach
    </x-container>
</x-app-layout>
