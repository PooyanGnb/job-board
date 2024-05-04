<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="['My Position Applications' => '#']" />

  @forelse ($applications as $application)
    <x-job-card :position="$application->position"></x-job-card>
  @empty
  @endforelse
</x-layout>