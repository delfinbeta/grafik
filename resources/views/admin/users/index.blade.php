<x-layout2>
  <x-slot name="title">
    Listado de Usuarios
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Listado de Usuarios</h2>
        <p class="text-right">
          <a href="{{ route('admin.users.create') }}" class="mb-4 p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Nuevo Tipo</a>
        </p>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-blue-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-4 py-3">ID</th>
              <th scope="col" class="px-4 py-3">Nombre</th>
              <th scope="col" class="px-4 py-3">Email</th>
              <th scope="col" class="px-4 py-3">Teléfono</th>
              <th scope="col" class="px-4 py-3">Rol</th>
              <th scope="col" class="px-4 py-3">Tipo</th>
              <th scope="col" class="px-4 py-3">
                  <span class="sr-only">Acciones</span>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr class="border-b dark:border-gray-700">
                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <a href="{{ route('admin.users.show', $user) }}" class="font-bold text-blue-700 underline">{{ $user->id }}</a>
                </td>
                <td class="px-4 py-3">{{ $user->firstname }} {{ $user->lastname }}</td>
                <td class="px-4 py-3">{{ $user->email }}</td>
                <td class="px-4 py-3">{{ $user->phone }}</td>
                <td class="px-4 py-3">{{ $user->role }}</td>
                <td class="px-4 py-3">{{ optional($user->type)->name }}</td>
                <td class="px-4 py-3 flex items-center justify-end">
                  <a href="{{ route('admin.users.edit', $user) }}" class="mx-4 p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white">Editar</a>
                  <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="inline">
                    @csrf 
                    @method('delete')
                    <button type="submit" class="p-2 rounded-md bg-red-500 hover:bg-red-600 text-white">Eliminar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-layout2>