<x-layout2>
  <x-slot name="title">
    Detalle de la Encuesta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Detalle de la Encuesta</h2>

        <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-400">
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200" style="width: 160px;">ID:</th>
            <td class="px-4 py-2">{{ $survey->id }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Título:</th>
            <td class="px-4 py-2">{{ $survey->title }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Descripción:</th>
            <td class="px-4 py-2">{{ $survey->description }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Fecha de Inicio:</th>
            <td class="px-4 py-2">{{ $survey->start->format('d/m/Y') }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Fecha de Fin:</th>
            <td class="px-4 py-2">{{ $survey->end->format('d/m/Y') }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</x-layout2>