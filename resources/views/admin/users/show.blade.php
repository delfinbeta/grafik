<x-layout2>
  <x-slot name="title">
    Detalle del Usuario
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Detalle del Usuario</h2>

        <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-400">
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200" style="width: 160px;">ID:</th>
            <td class="px-4 py-2">{{ $user->id }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Nombre:</th>
            <td class="px-4 py-2">{{ $user->firstname }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Apellido:</th>
            <td class="px-4 py-2">{{ $user->lastname }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Email:</th>
            <td class="px-4 py-2">{{ $user->email }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Teléfono:</th>
            <td class="px-4 py-2">{{ $user->phone }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Dirección:</th>
            <td class="px-4 py-2">{{ $user->address }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Tipo:</th>
            <td class="px-4 py-2">{{ optional($user->type)->name }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Rol:</th>
            <td class="px-4 py-2">{{ $user->role }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</x-layout2>