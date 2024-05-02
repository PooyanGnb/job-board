<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['positions' => route('positions.index'), $position->title => '#']"/>
    <x-job-card :$position>
        <p class='text-sm text-slate-500 mb-4'>
            {!! nl2br(e($position->description)) !!}
        </p>
    </x-job-card>
</x-layout>