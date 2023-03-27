@extends('layout')
@section('content')

    <section class="px-6 py-8">


        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center fond-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="mt-10">
        @csrf  {{--TOKEN DO VALIDACJI--}}
               <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="email" type="email" autocomplete="username" />
                <x-form.input name="password" type="password" autocomplete="new-password"/>
                <x-form.field>
                    <x-submit-button>Submit</x-submit-button>


                    </x-form.field>
            </form>

        </main>


    </section>
@endsection
