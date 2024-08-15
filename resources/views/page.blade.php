<x-layout2>
  <x-slot name="title">
    Bienvenido a Grafi-k
  </x-slot>

  @if (Route::has('login'))
    <nav class="-mx-3 flex flex-1 justify-end">
      @auth
          <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
            Dashboard
          </a>
      @else
          <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
            Log in
          </a>

          @if (Route::has('register'))
            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
              Register
            </a>
          @endif
      @endauth
    </nav>
  @endif

  <h1>Hola Mundo</h1>

  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, commodi harum aut molestiae maxime, expedita, consectetur deserunt qui quasi sed cum. Dolor distinctio atque quaerat, labore maiores repellat dolorem sunt.</p>
</x-layout2>