<x-layout2>
  <x-slot name="title">
    Editar Pregunta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Editar Pregunta</h2>

        @if ($errors->any())
          <div class="p-4 font-medium text-sm bg-red-300 text-red-600">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('admin.questions.update', $question) }}" method="post">
          @csrf
          @method('PUT')
          <div class="grid md:grid-cols-2 gap-4">
            <div class="relative w-full md:col-span-2">
              <label for="survey_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Encuesta</label>
              <input type="text" name="survey_name" id="survey_name" value="{{ $question->survey->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly />
            </div>
            <div class="relative w-full">
              <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
              <input type="text" name="title" id="title" value="{{ $question->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            </div>
            <div class="relative w-full">
              <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
              <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option value="">Seleccione</option>
                <option value="1" {{ ($question->type == 1) ? 'selected' : '' }}>Texto Corto</option>
                <option value="2" {{ ($question->type == 2) ? 'selected' : '' }}>Texto Largo</option>
                <option value="3" {{ ($question->type == 3) ? 'selected' : '' }}>Opción Simple</option>
                <option value="4" {{ ($question->type == 4) ? 'selected' : '' }}>Opción Multiple</option>
                <option value="5" {{ ($question->type == 5) ? 'selected' : '' }}>Fecha</option>
              </select>
            </div>
          </div>
          
          <div class="relative w-full my-4">
            <button type="submit" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout2>