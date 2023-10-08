@extends('front.dashboard.layouts.parent')

@section('title','Q&A')

@section('content')
<main class="w-full pt-5 min-h-screen h-auto bg-gradient-to-br from-dasar via-sky-50 to-sky-100">
    <section 
        class="py-10 px-20 flex flex-col justify-start items-center min-h-min">
        <span class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700">Q.&.A</span>
        <h1 class="mt-2 text-3xl font-bold title">Question and Answer.</h1>
        <p class="mt-2 mb-7 text-sm text-gray-700 tracking-wide">
            Temukan berbagai pertanyaan seputar pendaftaran Sekolah Ar-Romusha dibawah ini.
        </p>
        <div class="flex flex-col justify-start items-center gap-y-3 w-full px-10 sm:px-18 md:px-32">
            @foreach ($question as $index => $item)
                <!-- foreach here -->
            <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400 select-none">
                <div class="dropdown-title font-[600] p-3 px-7 text-[17px] flex justify-between items-center cursor-pointer">
                    <p class="tracking-wider">{{$item->question}}</p>
                </div>
                <div class="dropdown-content pb-5 px-7 tracking-wide hidden">
                    {{$item->answer}}
                </div>
            </div>
            <!-- endforeach here -->
            @endforeach
        </div>

        <script>
            // accordion question
                const ItemHeaders = document.querySelectorAll('div.dropdown-title');
                
                ItemHeaders.forEach(ItemHeader => {
                    ItemHeader.addEventListener('click', event => {
                        ItemHeader.classList.toggle('show');
                        
                        const ItemBody = ItemHeader.nextElementSibling;
                        
                        if(ItemHeader.classList.contains('show')) {
                            ItemBody.classList.remove('hidden');
                        } else {
                            ItemBody.classList.add('hidden');
                        }
                    })
                })
        </script>
    </section>

    
    <!-- kotak bantuan -->
    <section class="pt-5 pb-10 px-5 md:px-10 lg:px-60">
        <div class="bg-sky-900 p-10 w-full text-dasar flex justify-center items-center flex-col text-center gap-y-3 rounded-xl">
            <p class="3xl7g">Untuk informasi lebih lanjut, silahkan hubungi kami melalui tombol ini.
            <a href="https://api.whatsapp.com/send?phone={{ App\Models\General::first()->school_phone }}&text=Assalamu%20Alaikum%20Admin." target="_blank" 
            class="bg-sekunder ms-3 py-2 px-7 font-bold uppercase tracking-wider rounded-full shadow-lg hover:bg-sekunder/50 duration-200"
            >Hubungi kami</a>
        </div>
    </section>

</main>
@endsection