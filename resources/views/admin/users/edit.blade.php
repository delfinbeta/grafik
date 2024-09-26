<x-layout2>
  <x-slot name="title">
    Editar Usuario
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">Editar Usuario</h2>

        @if ($errors->any())
          <div class="p-4 font-medium text-sm bg-red-300 text-red-600">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <fieldset class="my-4 p-4 border border-gray-300 rounded-lg">
            <legend class="p-2 border border-gray-300 rounded">Datos Personales:</legend>
            <div class="grid md:grid-cols-2 gap-4">
              <div class="relative w-full">
                <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname', $user->firstname) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('firstname')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
              <div class="relative w-full">
                <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $user->lastname) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('lastname')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
              <div class="relative w-full">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @error('phone')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
              <div class="relative w-full">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @error('address')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </fieldset>

          <fieldset class="my-4 p-4 border border-gray-300 rounded-lg">
            <legend class="p-2 border border-gray-300 rounded">Datos del Sistema:</legend>
            <div class="grid md:grid-cols-2 gap-4">
              <div class="relative w-full">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('email')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
              <div>&nbsp;</div>
              <div class="relative w-full">
                <label for="type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                <select name="type_id" id="type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option value="">Seleccione</option>
                  @if ($types->isNotEmpty())
                    @foreach ($types as $type)
                      <option value="{{ $type->id }}" {{ ($type->id == $user->type_id) ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                  @endif
                </select>
                @error('type_id')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
              <div class="relative w-full">
                <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rol</label>
                <select name="role_id" id="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  <option value="">Seleccione</option>
                  <option value="1" {{ ($user->role_id == 1) ? 'selected' : '' }}>Administrador</option>
                  <option value="2" {{ ($user->role_id == 2) ? 'selected' : '' }}>Supervisor</option>
                  <option value="3" {{ ($user->role_id == 3) ? 'selected' : '' }}>Encuestador</option>
                </select>
                @error('role_id')
                  <div class="text-sm bg-red-300 text-red-600">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </fieldset>

          <div class="relative w-full my-4">
            <button type="submit" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout2>
  