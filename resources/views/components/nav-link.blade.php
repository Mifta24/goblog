{{-- Jadi, props di Blade digunakan untuk mengatur dan mengirimkan data yang dapat digunakan oleh komponen Blade untuk
menghasilkan konten dinamis. nilai default --}}
@props(['active' => false])
<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<a {{ $attributes }}
    class="rounded-md {{ $active ? 'bg-gray-900 px-3 py-2 text-sm font-medium' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}  text-white"
    aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}</a>
