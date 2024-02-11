<nav x-data="{ open: false }" class="bg-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex items-center flex-shrink-0">
          <a href="{{route('welcome')}}" class="text-blue font-bold text-xl"><img src="{{ asset('images/logo.png') }}" height="40" width="180" /></a>
        </div>

        <!-- Bouton de menu pour les petits écrans -->
        <div class="absolute inset-y-0 right-0 flex items-center sm:hidden">
          <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-blue hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-blue transition duration-150 ease-in-out" aria-label="Menu">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>

        <!-- Menu principal -->
        <div class="hidden sm:block sm:ml-6">
          <div class="flex">
            <a href="{{route('welcome')}}" class="px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Accueil</a>
            <a href="{{ route('how-it-works') }}" class="ml-4 px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Comment ça marche ?</a>
            <a href="{{ route('about') }}" class="ml-4 px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">À propos</a>
            <a href="{{ route('contact') }}" class="ml-4 px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Contact</a>

            @auth
            <div class="flex sm:items-center sm:ml-6">
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button class="text-black hover:text-gray-700 flex items-center rounded py-2 px-4 mx-2 text-sm font-medium">
                    <div>{{ "Bonjour, ".Auth::user()->name." ". Auth::user()->firstname }}</div>
                    <div class="ml-1">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </div>
                  </button>
                </x-slot>

                <x-slot name="content">
                  <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profil') }}
                  </x-dropdown-link>
                  <x-dropdown-link :href="route('dashboard')">
                    {{ __('Tableau de bord') }}
                  </x-dropdown-link>

                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Se déconnecter') }}
                    </x-dropdown-link>
                  </form>
                </x-slot>
              </x-dropdown>
            </div>
            @else
            <a href="{{ route('login') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-base leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">Gérer mes colis</a>
            @endauth
          </div>
        </div>
      </div>
    </div>

    <!-- Menu déroulant pour les petits écrans -->
    <div x-show="open" class="sm:hidden">
      <div class="px-2 pt-2 pb-3">
        <a href="{{route('welcome')}}" class="block px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Accueil</a>
        <a href="{{ route('how-it-works') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Comment ça marche ?</a>
        <a href="{{ route('about') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">À propos</a>
        <a href="{{ route('contact') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Contact</a>
        @auth
        <hr class="my-2">
        <p class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue2 hover:text-blue2 focus:outline-none focus:text-blue2">{{ "Bonjour, ".Auth::user()->name." ". Auth::user()->firstname }}</p>
        <a  href="{{ route('dashboard') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-blue2 focus:outline-none focus:text-blue2">Tableau de bord</a>
        @else
        <a href="{{ route('register') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Créer un compte</a>
        <a href="{{ route('login') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-blue hover:text-blue2 focus:outline-none focus:text-blue2">Gérer mes colis</a>
        @endauth

      </div>
    </div>
  </nav>
