<x-public-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Self-booking Classes') }}
</h2>
</x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
        @foreach( $clubclasses as $clubclass )
            <x-self-booking.class-panel :class-id="$clubclass->id" />
        @endforeach
    </div>
</x-public-layout>
