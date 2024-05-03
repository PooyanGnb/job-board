<x-card class="mb-4">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium">{{ $position->title }}</h2>
        <div class="test-slate-500">
            ${{number_format($position->salary)}}
        </div>
    </div>

    <div class="mb-4 flex justify-between items-center text-sm text-slate-500">
        <div class="flex space-x-4">
            <div>Company Name</div>
            <div>{{ $position->location }}</div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>
                <a href="{{ route('positions.index', ['experience' => $position->experience]) }}">{{ Str::ucfirst($position->experience) }}</a>
            </x-tag>
            <x-tag>
            <a href="{{ route('positions.index', ['category' => $position->category]) }}">{{ $position->category }}</a>
            </x-tag>
        </div>
    </div>



    {{$slot}}
</x-card>