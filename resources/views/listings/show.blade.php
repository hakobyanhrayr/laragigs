<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4" style="width: 550px;margin: auto;">
        <x-card class="p-10">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$listing->logo ? asset('storage/'.$listing->logo) :  asset('/images/no-image.png')}}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <x-listing-tags :tagsCsv="$listing->tags"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $listing->description }}

                        <a
                            href="mailto: {{ $listing->email }}"
                            target="_blank"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href=" {{ $listing->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>
            @if(Auth::id() == $listing->user_id)
            <div style="width: 550px;margin: 20px auto 0;display: flex; justify-content: space-around;align-items: center" >
                <a href="/listing/{{ $listing->id }}/edit" class="mt-3">
{{--                <a href="{{ route('post.edit') }}">--}}
                    <i class="fa-solid fa-pencil"></i>
                    Edit
                </a>
                <form action="{{ route('post.delete',$listing->id) }}" method="POST">
                    @csrf
                    @method('delete')
                        <button type="submit" class="text-red-500 mt-3">
                            <i class="fa-solid fa-trash"></i>
                            Dell
                        </button>
                </form>
            </div>
            @endif
        </x-card>
        {{--        111--}}
    </div>
</x-layout>
