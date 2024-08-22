<x-layout2>
  <x-slot name="title">
    Detalle de la Encuesta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <p>Detalle de la Encuesta</p>

        <p><span class="font-bold">ID:</span> {{ $survey->id }}</p>
        <p><span class="font-bold">Título:</span> {{ $survey->title }}</p>
        <p><span class="font-bold">Descripción:</span> {{ $survey->description }}</p>
        <p><span class="font-bold">Fecha de Inicio:</span> {{ $survey->start->format('d/m/Y') }}</p>
        <p><span class="font-bold">Fecha de Fin:</span> {{ $survey->end->format('d/m/Y') }}</p>
      </div>
    </div>
  </div>
</x-layout2>