<x-layout>
  <x-breadcrumbs :links="['My Positions' => '#']" class="mb-4" />

  <div class="mb-8 text-right">
    <x-link-button href="{{ route('my-positions.create') }}">Add New</x-link-button>
  </div>

  @forelse ($positions as $position)
    <x-job-card :$position>
      <div class="text-xs text-slate-500">
        @forelse ($position->positionApplications as $application)
          <div class="mb-4 flex items-center justify-between">
            <div>
              <div>{{ $application->user->name }}</div>
              <div>
                Applied {{ $application->created_at->diffForHumans() }}
              </div>
              <div>
                Download CV
              </div>
            </div>

            <div>${{ number_format($application->expected_salary) }}</div>
          </div>
        @empty
          <div>No applications yet</div>
        @endforelse
      </div>
    </x-job-card>
  @empty
    <div class="rounded-md border border-dashed border-slate-300 p-8">
      <div class="text-center font-medium">
        No positions yet
      </div>
      <div class="text-center">
        Post your first position <a class="text-indigo-500 hover:underline"
          href="{{ route('my-positions.create') }}">here!</a>
      </div>
    </div>
  @endforelse
</x-layout>