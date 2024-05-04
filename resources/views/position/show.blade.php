<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['positions' => route('positions.index'), $position->title => '#']"/>
    <x-job-card :$position>
        <p class='text-sm text-slate-500 mb-4'>
            {!! nl2br(e($position->description)) !!}
        </p>
        @can('apply', $position)
      <x-link-button :href="route('positions.application.create', $position)">
        Apply
      </x-link-button>
    @else
      <div class="text-center text-sm font-medium text-slate-500">
        You already applied to this position
      </div>
    @endcan
    </x-job-card>

    <x-card class='mb-4'>
        <h2 class="mb4 text-lg font-medium">More {{$position->employer->company_name}}</h2>

        <div class="text-sm text-slate-500">
            @foreach($position->employer->positions as $job)
                <x-card class='mb-4 flex justify-between'>
                    <div>
                        <div class="text-slate-700">
                            <a href="{{route('positions.show', $job)}}">{{$job->title}}</a>
                        </div>
                        <div class='text-xs'>
                            {{$job->created_at->diffForHumans()}}
                        </div>
                    </div>
                    <div class='text-xs'>
                        ${{number_format($job->salary)}}
                    </div>
                </x-card>
            @endforeach
        </div>
    </x-card>
</x-layout>