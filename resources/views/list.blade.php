<x-app-layout>
  <x-slot name="header">
      @include('includes/header')
  </x-slot>

  <div class="py-12">
    @if(!$places->count())
      <div class="text-blue-900 px-6 py-4 rounded relative bg-gray-200 max-w-7xl mx-auto">
          <span class="inline-block align-middle mr-8">
               لا يوجد مواقع ضمن هذا التصنيف.
          </span>
      </div>
    @else
      <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div>
           @foreach($places as $place)
           <div class="flex mb-5 bg-white">
              <div class="flex-none w-48 relative">
                  <a href="{{ route('place.show', [$place->id, $place->slug]) }}">
                      <img src="{{ $place->image }}" alt="" class="absolute inset-0 w-full h-full object-cover" />
                  </a>
              </div>
              <div class="flex-auto p-6">
                  <div class="flex flex-wrap">
                      <h1 class="flex-auto text-xl font-semibold">
                      {{ $place->name }}
                      </h1>
                  </div>
                  <div class="flex space-x-3 mb-4 text-sm font-medium mt-5">
                      <div class="flex-auto flex space-x-3">
                      {{ $place->address }}
                      </div>
                  </div>
              </div>
          </div>
           @endforeach
        </div>
      <div>
  @endif
  </div>

</x-app-layout>