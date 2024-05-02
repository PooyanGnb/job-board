<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['positions' => route('positions.index')]"/>

    <x-card class="mb-4 text-sm">
        <form action="{{route('positions.index')}}" method="GET">
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <div class="mb-1 font-semibold">Search</div>
                <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any category."/>
            </div>
            <div>
                <div class="mb-1 font-semibold">Salary</div>
                <div class="flex space-x-2"><x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From"/>
                    <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To"/>
                </div>
                
            </div>
            <div>
                <div class="mb-1 font-semibold">
                    Experience
                </div>
                <x-radio-group name="experience" :options="\App\Models\Position::$experience" />
            </div>
            <div>
                <div class="mb-1 font-semibold">
                    Category
                </div>
                <x-radio-group name="category" :options="\App\Models\Position::$category" />
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