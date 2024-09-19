<x-layout2>
  <x-slot name="title">
    Detalle del Tipo
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Detalle del Tipo</h2>

        <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-400">
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200" style="width: 160px;">ID:</th>
            <td class="px-4 py-2">{{ $type->id }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Nombre:</th>
            <td class="px-4 py-2">{{ $type->name }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</x-layout2>