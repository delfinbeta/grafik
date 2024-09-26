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

        <form action="{{ route('admin.surveys.update', $survey) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <fieldset class="my-4 p-4 border border-gray-300 rounded-lg">
            <legend class="p-2 border border-gray-300 rounded">Datos Generales:</legend>
            <div class="grid md:grid-cols-2 gap-4">
              <div class="relative w-full">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                <input type="text" name="title" id="title" value="{{ $survey->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
              </div>
              <div class="relative w-full">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $survey->description }}</textarea>
              </div>
              <div class="relative w-full">
                <label for="start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Inicio</label>
                <input type="date" name="start" id="start" value="{{ $survey->start->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
              </div>
              <div class="relative w-full">
                <label for="end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Fin</label>
                <input type="date" name="end" id="end" value="{{ $survey->end->format('Y-m-d') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
              </div>
              <div class="relative w-full">
                <label for="type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                <select name="type_id" id="type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="">Seleccione</option>
                  @if ($types->isNotEmpty())
                    @foreach ($types as $type)
                      <option value="{{ $type->id }}" {{ ($type->id == $survey->type_id) ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                  @endif
                </select>
                @error('type_id')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
              <div class="relative w-full">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
              </div>
            </div>
          </fieldset>

          <fieldset class="my-4 p-4 border border-gray-300 rounded-lg">
            <legend class="p-2 border border-gray-300 rounded">Usuarios Asignados:</legend>
          </fieldset>

          <div class="relative w-full my-4">
            <button type="submit" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout2>