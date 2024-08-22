<x-layout2>
  <x-slot name="title">
    Listado de Encuestas
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <p>Listado de Encuestas</p>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3">ID</th>
              <th scope="col" class="px-4 py-3">Título</th>
              <th scope="col" class="px-4 py-3">Inicio</th>
              <th scope="col" class="px-4 py-3">Fin</th>
              <th scope="col" class="px-4 py-3">
                  <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($surveys as $survey)
              <tr class="border-b dark:border-gray-700">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <a href="{{ route('admin.detalle', $survey) }}" class="font-bold text-blue-700 underline">{{ $survey->id }}</a>
                </th>
                <td class="px-4 py-3">{{ $survey->title }}</td>
                <td class="px-4 py-3">{{ $survey->start->format('d/m/Y') }}</td>
                <td class="px-4 py-3">{{ $survey->end->format('d/m/Y') }}</td>
                <td class="px-4 py-3 flex items-center justify-end">
                  botones
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout2>