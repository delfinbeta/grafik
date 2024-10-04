<x-layout2>
  <x-slot name="title">
    Crear Pregunta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Crear Pregunta</h2>

        @if ($errors->any())
          <div class="p-4 font-medium text-sm bg-red-300 text-red-600">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('admin.surveys.questions.store', $survey) }}" method="post">
          @csrf

          <fieldset class="my-4 p-4 border border-gray-300 rounded-lg">
            <legend class="p-2 border border-gray-300 rounded">Datos Generales:</legend>
            <div class="grid md:grid-cols-2 gap-4">
              <div class="relative w-full md:col-span-2">
                <label for="survey_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Encuesta</label>
                <input type="text" name="survey_name" id="survey_name" value="{{ $survey->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly />
              </div>
              <div class="relative w-full">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
              </div>
              <div class="relative w-full">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  <option value="">Seleccione</option>
                  <option value="1" {{ (old("type") == 1) ? 'selected' : '' }}>Texto Corto</option>
                  <option value="2" {{ (old("type") == 2) ? 'selected' : '' }}>Texto Largo</option>
                  <option value="3" {{ (old("type") == 3) ? 'selected' : '' }}>Opción Simple</option>
                  <option value="4" {{ (old("type") == 4) ? 'selected' : '' }}>Opción Multiple</option>
                  <option value="5" {{ (old("type") == 5) ? 'selected' : '' }}>Fecha</option>
                </select>
              </div>
            </div>
          </fieldset>

          <fieldset id="section_options" class="my-4 p-4 border border-gray-300 rounded-lg hidden">
            <legend class="p-2 border border-gray-300 rounded">
              Opciones:
              <button id="btn_add" type="button" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">+ Agregar</button>
            </legend>
            <table id="table_options"></table>
          </fieldset>
          
          <div class="relative w-full my-4">
            <button type="submit" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    (function () {
      'use strict';

      const type = document.querySelector('#type');
      const section_options = document.querySelector('#section_options');
      const table_options = document.querySelector('#table_options');
      const btn_add = document.querySelector('#btn_add');
      let i = 0;

      type.addEventListener('click', function () {
        if ((this.value == 3) || (this.value == 4)) {
          section_options.classList.remove('hidden');
        } else {
          section_options.classList.add('hidden');
        }
      });

      btn_add.addEventListener('click', function () {
        let row = table_options.insertRow();
        let cell1 = row.insertCell();
        let cell2 = row.insertCell();

        cell1.innerHTML = '<button type="button" data-pos="' + i + '" class="btn_delete p-2 rounded-md bg-red-500 hover:bg-red-600 text-white">- Eliminar</button>';
        cell2.innerHTML = '<input type="text" name="options[]" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />';

        i++;
      });

      table_options.addEventListener('click', e => {
        if(e.target.classList.contains('btn_delete')) {
          table_options.deleteRow(e.target.parentNode.parentNode.rowIndex);
        }
      });
    })();
  </script>
</x-layout2>