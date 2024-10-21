<x-layout2>
  <x-slot name="title">
    {{ __('Dashboard') }}
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <p>Bienvenido {{ $user->firstname }} a Grafi-k</p>
        @if ($user->type)
        <p>Tu tipo es: {{ $user->type->name }}</p>
        @endif
        @if ($user->surveys->isNotEmpty())
        <h3 class="mt-4 font-semibold">Mis encuestas:</h3>
        <ul class="mt-2 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
          @foreach ($user->surveys as $survey)
            <li>
              <a href="{{ route('admin.surveys.forms.create', $survey) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                {{ $survey->title }}
              </a>
            </li>
          @endforeach
        </ul>
        @endif
      </div>
    </div>
  </div>
</x-layout2>
