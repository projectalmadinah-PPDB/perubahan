<footer
    class="py-1 px-3 text-end text-xs bg-transparent fixed bottom-0 w-full text-primer">
    © {{ App\Models\General::first()->created_at->format('Y') }} - 
    <a class="tracking-wide" href="https://tailwind-elements.com/"
        >Sekolah {{ App\Models\General::first()->school_name }}</a
    >
</footer>