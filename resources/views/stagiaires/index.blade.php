@extends('layouts.app')

@section('title', 'Liste des stagiaires')

@section('content')

<div class="space-y-6">

```
{{-- Messages --}}
@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg">
        {{ session('error') }}
    </div>
@endif


{{-- En-tête --}}
<div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

    <div>
        <h1 class="text-3xl font-bold text-gray-900">
            Liste des stagiaires
        </h1>

        <p class="mt-1 text-gray-500">
            Gestion des stagiaires enregistrés
        </p>
    </div>

    <div class="flex flex-wrap gap-2">

        <a href="{{ route('dashboard') }}"
           class="inline-flex items-center px-4 py-2
                  bg-gray-600 hover:bg-gray-700
                  text-white text-sm font-medium
                  rounded-lg transition">
            ← Dashboard
        </a>

        @if(in_array(auth()->user()->role, ['admin', 'rh']))
            <a href="{{ route('stagiaires.create') }}"
               class="inline-flex items-center px-4 py-2
                      bg-blue-600 hover:bg-blue-700
                      text-white text-sm font-medium
                      rounded-lg transition">
                <span class="mr-2">+</span>
                Ajouter un stagiaire
            </a>
        @endif

    </div>

</div>


{{-- Carousel --}}
<div class="relative">

    {{-- Bouton précédent --}}
    <button id="prevBtn"
            type="button"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-20
                   w-12 h-12 md:w-14 md:h-14
                   bg-gray-900 hover:bg-blue-600
                   text-white rounded-full
                   shadow-lg
                   flex items-center justify-center
                   text-2xl
                   transition">
        ‹
    </button>


    {{-- Zone des cartes --}}
    <div id="carousel"
         class="flex items-center justify-center gap-4
                overflow-hidden
                px-14 md:px-20
                py-8">

        @foreach ($stagiaires as $index => $stagiaire)

            <div class="stagiaire-card flex-shrink-0
                        w-full sm:w-[calc(50%-0.5rem)] lg:w-[30%]
                        bg-white border border-gray-200
                        rounded-2xl shadow-md
                        p-6
                        transition-all duration-500 ease-in-out
                        scale-90 opacity-70 blur-[1px]">

                {{-- Emplacement photo futur --}}
                <div class="flex justify-center mb-5">

                    <div class="w-24 h-24 rounded-full
                                bg-gray-100 border-4 border-gray-200
                                flex items-center justify-center
                                text-gray-400 text-3xl">

                        👤

                    </div>

                </div>


                {{-- Informations --}}
                <div class="text-center">

                    <h2 class="text-xl font-bold text-gray-900">
                        {{ $stagiaire->nom }} {{ $stagiaire->prenom }}
                    </h2>

                    <p class="mt-2 text-gray-500">
                        {{ $stagiaire->etablissement }}
                    </p>

                </div>


                {{-- Nombre de stages --}}
                <div class="mt-5 text-center">

                    <span class="inline-flex items-center
                                 px-4 py-2
                                 rounded-full
                                 bg-blue-100 text-blue-700
                                 font-semibold">

                        {{ $stagiaire->stages_count }}

                        <span class="ml-1">
                            stage{{ $stagiaire->stages_count > 1 ? 's' : '' }}
                        </span>

                    </span>

                </div>


                {{-- Actions --}}
                <div class="mt-6 flex flex-wrap justify-center gap-2">

                    {{-- Informations --}}
                    <a href="{{ route('stagiaires.show', $stagiaire->id) }}"
                       class="px-4 py-2
                              bg-cyan-600 hover:bg-cyan-700
                              text-white text-sm font-medium
                              rounded-lg transition">
                        Informations
                    </a>


                    @if(in_array(auth()->user()->role, ['admin', 'rh']))

                        {{-- Modifier --}}
                        <a href="{{ route('stagiaires.edit', $stagiaire->id) }}"
                           class="px-4 py-2
                                  bg-amber-500 hover:bg-amber-600
                                  text-white text-sm font-medium
                                  rounded-lg transition">
                            Modifier
                        </a>


                        {{-- Supprimer --}}
                        <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="px-4 py-2
                                           bg-red-600 hover:bg-red-700
                                           text-white text-sm font-medium
                                           rounded-lg transition"
                                    onclick="return confirm('Voulez-vous vraiment supprimer ce stagiaire ?')">
                                Supprimer
                            </button>

                        </form>

                    @endif

                </div>

            </div>

        @endforeach

    </div>


    {{-- Bouton suivant --}}
    <button id="nextBtn"
            type="button"
            class="absolute right-0 top-1/2 -translate-y-1/2 z-20
                   w-12 h-12 md:w-14 md:h-14
                   bg-gray-900 hover:bg-blue-600
                   text-white rounded-full
                   shadow-lg
                   flex items-center justify-center
                   text-2xl
                   transition">
        ›
    </button>

</div>
```

</div>

{{-- JavaScript du carousel --}}

<script>

    const carousel = document.getElementById('carousel');
    const cards = document.querySelectorAll('.stagiaire-card');

    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentIndex = 0;


    function getCardsPerView() {

        if (window.innerWidth < 640) {
            return 1;
        }

        if (window.innerWidth < 1024) {
            return 2;
        }

        return 3;
    }


    function updateCarousel() {

        const cardsPerView = getCardsPerView();

        cards.forEach((card, index) => {

            card.classList.remove(
                'scale-100',
                'scale-90',
                'opacity-100',
                'opacity-70',
                'blur-0',
                'blur-[1px]'
            );


            const relativePosition =
                (index - currentIndex + cards.length) % cards.length;


            if (relativePosition === 0) {

                card.classList.add(
                    'scale-100',
                    'opacity-100',
                    'blur-0'
                );

            } else {

                card.classList.add(
                    'scale-90',
                    'opacity-70',
                    'blur-[1px]'
                );

            }

        });


        const cardWidth = cards[0].offsetWidth;
        const gap = 16;

        const offset =
            currentIndex * (cardWidth + gap);

        carousel.style.transform =
            `translateX(-${offset}px)`;

    }


    nextBtn.addEventListener('click', () => {

        if (cards.length === 0) return;

        currentIndex++;

        if (currentIndex >= cards.length) {
            currentIndex = 0;
        }

        updateCarousel();

    });


    prevBtn.addEventListener('click', () => {

        if (cards.length === 0) return;

        currentIndex--;

        if (currentIndex < 0) {
            currentIndex = cards.length - 1;
        }

        updateCarousel();

    });


    window.addEventListener('resize', updateCarousel);


    cards.forEach(card => {

        card.addEventListener('mouseenter', () => {

            card.classList.remove(
                'scale-90',
                'opacity-70',
                'blur-[1px]'
            );

            card.classList.add(
                'scale-100',
                'opacity-100',
                'blur-0'
            );

        });


        card.addEventListener('mouseleave', () => {

            updateCarousel();

        });

    });


    updateCarousel();

</script>

@endsection
