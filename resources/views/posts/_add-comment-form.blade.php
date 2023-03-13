<x-panel>
    @auth()
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf

            <hea class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="err" width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">Want to participate?</h2>
            </hea>
            <div class="mt-6">
                            <textarea name="body"
                                      class="w-full text-sm focus:outline-none focus:ring"
                                      rows="5"
                                      placeholder="Quick, thing of something to say!"
                                      required
                            ></textarea>
                @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200 ">
<x-submit-button>Post</x-submit-button>
            </div>

        </form>
    @else
        <a href="/register" class="hover:text-blue-500 font-semibold">Register</a> or <a
            href="/login" class="hover:text-blue-500 font-semibold">Log in</a> to leave a comment
    @endauth
</x-panel>
