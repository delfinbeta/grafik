<x-layout2>
  <x-slot name="title">
    Encuesta
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <h2 class="font-bold text-xl">{{ $survey->title }}</h2>

        <form action="{{ route('admin.forms.store', $survey) }}" method="post">
          @csrf

          <div class="my-4 relative">
            <label for="person">Nombre del Encuestado:</label>
            <input type="text" name="person" id="person" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
          </div>

          @if ($survey->questions->isNotEmpty())
            <div id="accordion-collapse" data-accordion="collapse">
              @foreach ($survey->questions as $question)
                <h2 id="accordion-collapse-heading-{{ $question->id }}">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{ $question->id }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $question->id }}">
                    <span>{{ $question->title }}</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                  </button>
                </h2>
                <div id="accordion-collapse-body-{{ $question->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $question->id }}">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p>{{ $question->type }} - {{ $question->type_name }}</p>

                    @if ($question->type == 1)
                      <label for="answer_{{ $question->id }}" class="sr-only">{{ $question->title }}</label>
                      <input type="text" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    @endif

                    @if ($question->type == 2)
                      <label for="answer_{{ $question->id }}" class="sr-only">{{ $question->title }}</label>
                      <textarea name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    @endif

                    @if ($question->type == 3)
                      @if ($question->options->isNotEmpty())
                        @foreach ($question->options as $option)
                          <div class="flex items-center mb-4">
                            <input id="option-{{ $option->id }}" type="radio" value="{{ $option->id }}" name="answers[{{ $question->id }}]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="option-{{ $option->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $option->title }}</label>
                          </div>
                        @endforeach
                      @endif
                    @endif

                    @if ($question->type == 4)
                      @if ($question->options->isNotEmpty())
                        @foreach ($question->options as $option)
                          <div class="flex items-center mb-4">
                            <input id="option-{{ $option->id }}" type="checkbox" value="{{ $option->id }}" name="answers[{{ $question->id }}][]" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="option-{{ $option->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $option->title }}</label>
                          </div>
                        @endforeach
                      @endif
                    @endif

                    @if ($question->type == 5)
                      <label for="answer_{{ $question->id }}" class="sr-only">{{ $question->title }}</label>
                      <input type="date" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    @endif
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <p>No hay preguntas disponibles</p>
          @endif

          <div class="relative w-full my-4">
            <button type="submit" class="p-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white inline-block">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layout2>