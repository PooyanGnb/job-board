<x-layout>
  <x-breadcrumbs class="mb-4"
    :links="[
        'positions' => route('positions.index'),
        $position->title => route('positions.show', $position),
        'Apply' => '#',
    ]" />

  <x-job-card :$position />

  <x-card>
    <h2 class="mb-4 text-lg font-medium">
      Your position Application
    </h2>

    <form action="{{ route('positions.application.store', $position) }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="expected_salary"
          class="mb-2 block text-sm font-medium text-slate-900">Expected Salary</label>
        <x-text-input type="number" name="expected_salary" />
      </div>

      <x-button class="w-full">Apply</x-button>
    </form>
  </x-card>
</x-layout>