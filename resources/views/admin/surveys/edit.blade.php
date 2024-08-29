<x-layout2>
  <x-slot name="title">
    Editar Encuesta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Editar Encuesta</h2>

        <form action="{{ route('admin.surveys.update', $survey) }}" method="post">
          @csrf
          @method('PUT')
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="title">Título</label>
            <input type="text" name="title" id="title" value="{{ $survey->title }}" required />
          </div>
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="description">Descripción</label>
            <textarea name="description" id="description">{{ $survey->description }}</textarea>
          </div>
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="start">Fecha de Inicio</label>
            <input type="date" name="start" id="start" value="{{ $survey->start->format('Y-m-d') }}" required />
          </div>
          <div class="relative w-full my-4">
            <label class="block w-full font-bold" for="end">Fecha Fin</label>
            <input type="date" name="end" id="end" value="{{ $survey->end->format('Y-m-d') }}" required />
          </div>
          <div class="relative w-full my-4">
            <button type="submit" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout2>