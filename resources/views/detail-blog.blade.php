<x-layout>
    {{-- header --}}
    <x-slot:title>{{ $title }}</x-slot:title>


    {{-- <article class="py-8 max-w-screen-md border-b border-gray-300">
            <h2 class=" mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post->title }}</h2>

            <div class=" text-base text-gray-500">
                <a href="">{{ $post->author->name }} | {{ $post->category->name }}</a>
            </div>
            <p class="my-4 font-light ">
                {{ $post->body }}
            </p>

        </article> --}}


    <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->
<a href="/edit-blog/{{ $post->slug }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400">
    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
    Edit
    </span>
    </a>

    <main class="pt-4 pb-16 lg:pt-8 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/blog" class=" text-xs text-primary-600 hover:underline my-2 lg:my-2">&laquo; Back to all
                        posts</a>
                    <address class="flex items-center mb-6 not-italic">

                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }}">
                            <div>
                                <a href="/author/{{ $post->author->username }}"  rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white hover:underline hover:text-blue-500">{{ $post->author->name }}</a>
                                <p class="text-base text-gray-500 dark:text-gray-400">Graphic Designer, educator & CEO
                                    Flowbite</p>
                                <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                                        datetime="2022-02-08"
                                        title="February 8th, 2022">{{ $post->created_at->diffForHumans() }}</time></p>
                            </div>
                        </div>
                    </address>

                    <a href="" class="">

                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white hover:underline hover:text-blue-500">
                            {{ $post->title }}</h1>
                    </a>
                </header>
                <p class="lead">{{ $post->body }}</p>

                {{-- <figure><img src="https://flowbite.s3.amazonaws.com/typography-plugin/typography-image-1.png"
                        alt="">
                    <figcaption>Digital art by Anonymous</figcaption>
                </figure> --}}


            </article>
        </div>
    </main>



</x-layout>
