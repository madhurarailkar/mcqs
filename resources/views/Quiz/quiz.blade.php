<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Quiz') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div style="margin-left: 30px;">

        <form method="POST" action="{{ route('quizsubmit') }}">
            @csrf
            @php $i=0; $j=1; @endphp
            <input type="hidden" name="test" value="{{ serialize($hotel) }}">
            @foreach($hotel as $key=>$value)
            <br>
            <h1 style="font-size:23px;">category :{{ $value['category'] }} </h1>
            <h1 style="font-size:23px;"><b>{{$i++}}] {{ $value['question'] }}</b></h1>
            <br>
            <div>
            <input type="radio" id="{{ $value['correct_answer'] }}" name="{{$i}}" value="{{ $value['correct_answer'] }}">&nbsp;<label for="{{ $value['correct_answer'] }}">{{ $value['correct_answer'] }}</label><br /><br />
                @foreach($value['incorrect_answers'] as $key1=>$val)
                <input type="radio" id="{{ $val }}" name="{{$i}}" value="{{ $val }}">&nbsp;<label for="{{ $val }}">{{ $val }}</label><br /><br />
                @endforeach
                <br>
                <hr>
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
    </div>
</x-app-layout>
