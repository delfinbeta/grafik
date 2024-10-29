<x-layout2>
  <x-slot name="title">
    Listado de Formularios
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Listado de Formularios</h2>
        <p class="text-right">
          <a href="{{ route('admin.forms.excel') }}" class="mb-4 p-2 rounded-md bg-green-500 hover:bg-blue-600 text-white inline-block">Descargar Excel</a>
        </p>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3">ID</th>
              <th scope="col" class="px-4 py-3">Persona Encuestada</th>
              <th scope="col" class="px-4 py-3">Encuesta</th>
              <th scope="col" class="px-4 py-3">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($forms as $form)
              <tr class="border-b dark:border-gray-700">
                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <a href="{{ route('admin.forms.show', $form) }}" class="font-bold text-blue-700 underline">{{ $form->id }}</a>
                </td>
                <td class="px-4 py-3">{{ $form->person }}</td>
                <td class="px-4 py-3">{{ $form->survey->title }}</td>
                <td class="px-4 py-3 flex items-center justify-end">
                  <a href="{{ route('admin.forms.show', $form) }}" class="mx-4 p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white">Ver Respuestas</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div>{{ $forms->links() }}</div>
      </div>
    </div>
  </div>
</x-layout2>