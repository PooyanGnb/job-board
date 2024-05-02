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
                {{ Str::ucfirst($position->experience) }}
            </x-tag>
            <x-tag>
                {{ $position->category }}
            </x-tag>
        </div>
    </div>

    <p class='text-sm text-slate-500 mb-4'>
    {!! nl2br(e($position->description)) !!}
    </p>

    {{$slot}}
</x-card>