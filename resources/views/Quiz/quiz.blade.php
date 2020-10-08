<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <form method="POST" action="{{ route('quizsubmit') }}">
            @csrf
            {{$i=0}}
            {{$j=1}}
            <input type="hidden" name="test" value="{{ serialize($hotel) }}">
            @foreach($hotel as $key=>$value)
            <h1>category : {{ $value['category'] }} </h1>
            <b>{{$i++}}{{ $value['question'] }}    </b>
            <div>
                <input type="radio" name="{{$i}}" value="{{ $value['correct_answer'] }}">&nbsp;{{ $value['correct_answer'] }}<br /><br />
                @foreach($value['incorrect_answers'] as $key1=>$val)
                    <input type="radio" name="{{$i}}" value="{{ $val}}">&nbsp;{{ $val }}<br /><br />
                @endforeach
                <br>
            @endforeach
            <div>  
                <x-jet-button class="ml-4">
                    {{ __('Submit') }}
                </x-jet-button>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
