<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['positions' => route('positions.index'), $position->title => '#']"/>
    <x-job-card :$position/>
</x-layout>