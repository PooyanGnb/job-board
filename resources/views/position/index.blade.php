<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['positions' => route('positions.index')]"/>

    <x-card class="mb-4 text-sm">
        <form action="{{route('positions.index')}}" method="GET">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input name="search" value="" placeholder="Search for any category."/>
            </div>
            <div>
                <div class="mb-1 font-semibold">salary</div>
                <div class="flex space-x-2"><x-text-input name="min_salary" value="" placeholder="From"/>
                    <x-text-input name="max_salary" value="" placeholder="To"/>
                </div>
                
            </div>
        </div>
        <button class="w-full">Filter</button>
        </form>
    </x-card>

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