<x-layout>
    @foreach($positions as $position)
        <x-card class="mb-4">
            {{ $position->title }}
        </x-card>
    @endforeach
</x-layout>