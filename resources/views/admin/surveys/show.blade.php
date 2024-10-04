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
            <th class="px-4 py-2 font-bold bg-blue-200">Tipo:</th>
            <td class="px-4 py-2">{{ $survey->type->name }}</td>
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
      <div class="mt-6 p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Preguntas:</h2>
        
        <p class="text-right">
          <a href="{{ route('admin.surveys.questions.create', $survey) }}" class="mb-4 p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Nueva Pregunta</a>
        </p>
        
        @if ($survey->questions->isNotEmpty())
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-4 py-3">ID</th>
                <th scope="col" class="px-4 py-3">Título</th>
                <th scope="col" class="px-4 py-3">Tipo</th>
                <th scope="col" class="px-4 py-3">
                  <span class="sr-only">Actions</span>
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($survey->questions as $question)
                <tr class="border-b dark:border-gray-700">
                  <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="{{ route('admin.questions.show', $question) }}" class="font-bold text-blue-700 underline">{{ $question->id }}</a>
                  </td>
                  <td class="px-4 py-3">{{ $question->title }}</td>
                  <td class="px-4 py-3">{{ $question->type_name }}</td>
                  <td class="px-4 py-3 flex items-center justify-end">
                    <a href="{{ route('admin.questions.edit', $question) }}" class="mx-4 p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white">Editar</a>
                    <form action="{{ route('admin.questions.destroy', $question) }}" method="post" class="inline">
                      @csrf 
                      @method('delete')
                      <button type="submit" class="p-2 rounded-md bg-red-500 hover:bg-red-600 text-white">Eliminar</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <p>No hay preguntas disponibles</p>
        @endif
      </div>
    </div>
  </div>
</x-layout2>