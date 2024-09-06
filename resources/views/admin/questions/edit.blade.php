<x-layout2>
  <x-slot name="title">
    Editar Encuesta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Editar Encuesta</h2>

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
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="survey_name">Encuesta</label>
            <input type="text" name="survey_name" id="survey_name" value="{{ $question->survey_id }}" readonly />
          </div>
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ $question->title }}" />
          </div>
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="type">Tipo</label>
            <select name="type" id="type" required>
              <option value="">Seleccione</option>
              <option value="1" {{ ($question->type == 1) ? 'selected' : '' }}>Texto Simple</option>
              <option value="2" {{ ($question->type == 2) ? 'selected' : '' }}>Opción Simple</option>
              <option value="3" {{ ($question->type == 3) ? 'selected' : '' }}>Opción Multiple</option>
              <option value="4" {{ ($question->type == 4) ? 'selected' : '' }}>Fecha</option>
              <option value="5" {{ ($question->type == 5) ? 'selected' : '' }}>ERROR</option>
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