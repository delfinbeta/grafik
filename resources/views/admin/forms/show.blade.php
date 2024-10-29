<x-layout2>
  <x-slot name="title">
    Encuesta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-400">
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200" style="width: 160px;">ID:</th>
            <td class="px-4 py-2">{{ $form->id }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Encuestado:</th>
            <td class="px-4 py-2">{{ $form->person }}</td>
          </tr>
          <tr class="border">
            <th class="px-4 py-2 font-bold bg-blue-200">Encuesta:</th>
            <td class="px-4 py-2">{{ $form->survey->title }}</td>
          </tr>
        </table>

        <hr class="my-4 border border-gray-300" />

        @if ($form->answers->isNotEmpty())
        <table class="w-full border text-sm text-left text-gray-500 dark:text-gray-400">
          @foreach ($form->answers as $answer)
            @php
              if ($answer->question->type == 3) {
                $option = $answer->question->options()->where('id', $answer->content)->first();
              }

              if ($answer->question->type == 4) {
                $ids = explode('-', $answer->content);
                $options = $answer->question->options()->whereIn('id', $ids)->get();
              }
            @endphp
            <tr class="border">
              <th class="px-4 py-2 font-bold bg-blue-200">{{ $answer->question->title }}</th>
              <td class="px-4 py-2">
                @if (($answer->question->type == 1) || ($answer->question->type == 2) || ($answer->question->type == 5))
                  {{ $answer->content }}
                @endif

                @if ($answer->question->type == 3)
                  {{ $option->title }}
                @endif

                @if ($answer->question->type == 4)
                  <ul>
                    @foreach ($options as $option)
                      <li>{{ $option->title }}</li>
                    @endforeach
                  </ul>
                @endif
              </td>
            </tr>
          @endforeach
        </table>
        @endif
      </div>
    </div>
  </div>
</x-layout2>