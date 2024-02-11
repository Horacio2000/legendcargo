<footer class="bottom-0 left-0 w-full bg-gray-800 text-white py-8 px-2">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
    <div class="flex items-center">
        <a href="{{ route('welcome') }}"><img class="h-12" src="{{ asset('images/logo2.jpeg') }}" height="16" width="120" /></a>

    </div>
    <nav class="mt-4 md:mt-0">
      <ul class="flex flex-wrap justify-center">
        <li class="mr-4 mb-2"><a href="{{ route('welcome') }}" class="hover:text-gray-400">Accueil</a></li>
        <li class="mr-4 mb-2"><a href="{{ route('about') }}" class="hover:text-gray-400">À propos</a></li>
        <li class="mr-4 mb-2"><a href="{{ route('contact') }}" class="hover:text-gray-400">Contact</a></li>
        <li class="mr-4 mb-2"><a href="{{ route('how-it-works') }}" class="hover:text-gray-400">Comment ça marche ?</a></li>
        <li class="mr-4 mb-2"><a href="{{ route('register') }}" class="hover:text-gray-400">S'inscrire</a></li>
      </ul>
    </nav>
    <div class="mt-4 md:mt-0">
      <p class="text-sm">© 2023 LegendCargo. Tous droits réservés.</p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js" defer></script>
</footer>
