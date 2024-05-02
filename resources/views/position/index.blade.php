<x-layout>
    @foreach($positions as $position)
        <x-job-card class='mb-4' :$position>
            <div>
                <x-link-button :href="route('positions.show', $position)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>