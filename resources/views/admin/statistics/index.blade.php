<x-layout2>
  <x-slot name="title">
    Estadisticas
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Estadisticas</h2>

        <h3 class="fount-semibold">Encuestas por Tipo</h3>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3">ID</th>
              <th scope="col" class="px-4 py-3">Tipo</th>
              <th scope="col" class="px-4 py-3">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($types as $type)
              <tr class="border-b dark:border-gray-700">
                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $type->id }}</td>
                <td class="px-4 py-3">{{ $type->name }}</td>
                <td class="px-4 py-3 flex items-center justify-end">{{ $type->surveys_count }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <h3 class="fount-semibold">Respuestas por Encuestas</h3>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3">ID</th>
              <th scope="col" class="px-4 py-3">Encuesta</th>
              <th scope="col" class="px-4 py-3">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($surveys as $survey)
              <tr class="border-b dark:border-gray-700">
                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $survey->id }}</td>
                <td class="px-4 py-3">{{ $survey->title }}</td>
                <td class="px-4 py-3 flex items-center justify-end">{{ $survey->forms_count }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout2>