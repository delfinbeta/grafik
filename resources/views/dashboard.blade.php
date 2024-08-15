<x-layout2>
  <x-slot name="title">
    {{ __('Dashboard') }}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <p>Bienvenido a Grafi-k</p>

        @foreach ($surveys as $survey)
          <p>{{ $survey->title }} - {{ $survey->start->format('d/m/Y') }} a {{ $survey->end->format('d/m/Y') }}</p>
        @endforeach

        <hr class="my-4" />

        <h3>{{ $survey->title }}</h3>
      </div>
    </div>
  </div>
</x-layout2>
