<x-layout>
  <x-breadcrumbs :links="['My Positions' => route('my-positions.index'), 'Create' => '#']" class="mb-4" />

  <x-card class="mb-8">
    <form action="{{ route('my-positions.store') }}" method="POST">
      @csrf

      <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
          <x-label for="title" :required="true">Position Title</x-label>
          <x-text-input name="title" />
        </div>

        <div>
          <x-label for="location" :required="true">Location</x-label>
          <x-text-input name="location" />
        </div>

        <div class="col-span-2">
          <x-label for="salary" :required="true">Salary</x-label>
          <x-text-input name="salary" type="number" />
        </div>

        <div class="col-span-2">
          <x-label for="description" :required="true">Description</x-label>
          <x-text-input name="description" type="textarea" />
        </div>

        <div>
          <x-label for="experience" :required="true">Experience</x-label>
          <x-radio-group name="experience" :value="old('experience')"
            :all-option="false"
            :options="array_combine(
                array_map('ucfirst', \App\Models\Position::$experience),
                \App\Models\Position::$experience,
            )" />
        </div>

        <div>
          <x-label for="category" :required="true">Category</x-label>
          <x-radio-group name="category" :all-option="false" :value="old('category')"
            :options="\App\Models\position::$category" />
        </div>

        <div class="col-span-2">
          <x-button class="w-full">Create position</x-button>
        </div>
      </div>
    </form>
  </x-card>
</x-layout>