@extends('front.layouts.parent')

@section('title','Q&A')

@section('content')
<main class="w-full pt-14">
    <!-- Q&A -->
    <section 
        class="bg-dasar pt-16 pb-10 px-20 flex flex-col justify-start items-center min-h-[40vh] h-auto">
        <span class="inline-flex items-center rounded-[3rem] bg-emerald-200 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-700">Q.&.A</span>
        <h1 class="mt-2 text-3xl font-bold title">Question and Answer.</h1>
        <p class="mt-2 mb-7 text-sm text-gray-700 tracking-wide">
            Temukan berbagai pertanyaan seputar pendaftaran Sekolah Ar-Romusha dibawah ini.
        </p>
        <div class="flex flex-col justify-start items-center gap-y-3 w-full px-10 sm:px-18 md:px-32">
            @foreach ($qna as $index => $item)
                <!-- foreach here -->
            <div class="dropdown w-full shadow-md rounded-[20px] border border-emerald-400">
                <div class="dropdown-title font-[600] p-3 px-7 text-[17px] flex justify-between items-center">
                    <p class="tracking-wider select-none">{{$item->question}}</p>
                </div>
                <div class="dropdown-content select-none pb-5 px-7 tracking-wide hidden">
                    {!!$item->answer!!}
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
</main>
@endsection