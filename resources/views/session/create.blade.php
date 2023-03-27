@extends('layout')
@section('content')

    <section class="px-6 py-8">


        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>
            <h1 class="text-center fond-bold text-xl">Log In</h1>
            <form method="POST" action="/login" class="mt-10">
                @csrf  {{--TOKEN DO VALIDACJI--}}

                <x-form.input name="email" type="email" autocomplete="username" />
                <x-form.input name="password" type="password" autocomplete="new-password"/>

                <div class="mb-6">
                   <x-submit-button>Log In</x-submit-button>


                </div>
            </form>
            </x-panel>
        </main>
    </section>
@endsection
