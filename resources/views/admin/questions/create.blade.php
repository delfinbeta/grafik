<x-layout2>
  <x-slot name="title">
    Crear Pregunta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Crear Pregunta</h2>

        <form action="{{ route('admin.surveys.questions.store', $survey) }}" method="post">
          @csrf
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="survey_name">Encuesta</label>
            <input type="text" name="survey_name" id="survey_name" value="{{ $survey->title }}" readonly />
          </div>
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="title">Título</label>
            <input type="text" name="title" id="title" required />
          </div>
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="type">Tipo</label>
            <select name="type" id="type" required>
              <option value="">Seleccione</option>
              <option value="1">Texto Simple</option>
              <option value="2">Opción Simple</option>
              <option value="3">Opción Multiple</option>
              <option value="4">Fecha</option>
            </select>
          </div>
          <div class="relative w-full my-4">
            <button type="submit" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout2>