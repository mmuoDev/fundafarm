@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => url('/')])
            Fundafarm.NG
        @endcomponent
    @endslot


    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')StartFarm Enterprise. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
