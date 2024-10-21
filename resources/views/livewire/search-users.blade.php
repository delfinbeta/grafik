<div>
  <div class="relative group mb-6 px-6 py-2 border border-neutral-300 rounded-lg">
    <label for="users" class="text-sm font-medium text-neutral-400 dark:text-white hidden">Users</label>
    <select id="users" name="users[]" class="hidden" multiple>
      @if (count($users) > 0)
        @foreach ($users as $user)
          <option value="{{ $user->id }}" wire:key="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
        @endforeach
      @endif
    </select>

    <div x-data="dropdown()" x-init="loadOptions()" class="w-full flex flex-col items-center overflow-y">
      <div class="w-full inline-block relative">
        <div class="flex flex-col items-center relative">
          <div class="w-full flex flex-auto flex-wrap">
            <template x-for="(option,index) in selected" :key="option.value">
              <div class="flex justify-center items-center m-1 font-medium py-1 px-2 rounded-full text-teal-800 bg-teal-200 border border-teal-300">
                <div class="text-xs font-normal leading-none max-w-full flex-initial" x-model="option" x-text="option.text"></div>
                <div class="flex flex-auto flex-row-reverse">
                  <div x-on:click="remove(option.value)">
                    <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
                      <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0 c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183 l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15 C14.817,13.62,14.817,14.38,14.348,14.849z" />
                    </svg>
                  </div>
                </div>
              </div>
            </template>
          </div>
          <div x-on:click="open" class="w-full">
            <div class="my-2 p-1 flex bg-white rounded">
              <div class="flex-1">
                <input type="text" id="search" placeholder="Search" class="bg-transparent border-0 p-1 px-2 appearance-none outline-none h-full w-full text-gray-800" @input="search()" autocomplete="off" />
              </div>
              <div class="text-gray-300 w-8 py-1 pl-2 pr-1 flex items-center">
                <button type="button" x-show="isOpen() === true" x-on:click="open" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                  <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                    <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83 c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z" />
                  </svg>
                </button>
                <button type="button" x-show="isOpen() === false" @click="close" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                  <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                    <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div class="w-full">
            <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-52 overflow-y-auto" x-on:click.away="close">
              <div class="flex flex-col w-full">
                <template x-for="(option,index) in options" :key="option.value">
                  <div>
                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100" @click="select(option.value,$event)">
                      <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                        <div class="w-full items-center flex">
                          <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </template>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function dropdown() {
      return {
        options: [],
        selected: [],
        show: false,
        open() { this.show = true; this.options = []; this.loadOptions(); },
        close() { this.show = false; },
        isOpen() { return this.show === true; },
        select(value, event) {
          this.selected = [];
          const options = document.getElementById('users').options;
          for (let i = 0; i < options.length; i++) {
            if (options[i].value === value) {
              options[i].selected = true;

              this.selected.push({
                value: options[i].value,
                text: options[i].innerText
              });
            } else {
              if (options[i].selected) {
                this.selected.push({
                  value: options[i].value,
                  text: options[i].innerText
                });
              }
            }
          }
        },
        remove(value) {
          this.selected = [];
          const options = document.getElementById('users').options;
          for (let i = 0; i < options.length; i++) {
            if (options[i].value === value) {
              options[i].selected = false;
            } else {
              if (options[i].selected) {
                this.selected.push({
                  value: options[i].value,
                  text: options[i].innerText
                });
              }
            }
          }
        },
        loadOptions() {
          const options = document.getElementById('users').options;
          for (let i = 0; i < options.length; i++) {
            this.options.push({
              value: options[i].value,
              text: options[i].innerText,
              selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
            });
          }
        },
        search() {
          const search = document.getElementById('search');
          const term = search.value.toLowerCase();
          const options = document.getElementById('users').options;
          let text = '';
          this.show = true;
          this.options = [];
          for (let i = 0; i < options.length; i++) {
            text = options[i].innerText.toLowerCase();
            if (text.includes(term)) {
              this.options.push({
                value: options[i].value,
                text: options[i].innerText,
                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
              });
            }
          }
        }
      }
    }
  </script>
</div>
