<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="['My Position Applications' => '#']" />

  @forelse ($applications as $application)
    <x-job-card :position="$application->position">
        <div class="flex items-center justify-between text-xs text-slate-500">
            <div>
            <div>
                Applied {{ $application->created_at->diffForHumans() }}
            </div>
            <div>
                Other {{ Str::plural('applicant', $application->position->position_applications_count - 1) }}
                {{ $application->position->position_applications_count - 1 }}
            </div>
            <div>
                Your asking salary ${{ number_format($application->expected_salary) }}
            </div>
            <div>
                Average asking salary
                ${{ number_format($application->position->position_applications_avg_expected_salary) }}
            </div>
            </div>
            <div>Right</div>
        </div>
    </x-job-card>
  @empty
  @endforelse
</x-layout>