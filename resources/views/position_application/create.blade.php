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

    <form action="{{ route('positions.application.store', $position) }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <x-label for="expected_salary" :required="true">Expected Salary</x-label>
        <x-text-input type="number" name="expected_salary" />
      </div>

      <div class="mb-4">
      <x-label for="cv" :required="true">Upload CV</x-label>        
      <x-text-input type="file" name="cv" />
      </div>

      <x-button class="w-full">Apply</x-button>
    </form>
  </x-card>
</x-layout>