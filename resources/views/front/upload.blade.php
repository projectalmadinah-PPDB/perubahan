@extends('front.layouts.parent')

@section('title','Upload Document')

@section('content')
<main class="px-5 md:px-32 py-5 pt-20 md:py-20 flex flex-col gap-y-8">
    @if(session('success'))
  <div role="alert"
  id="alertMessage" class="section shadow-inner mb-0 py-3 px-10 flex justify-between items-center bg-emerald-500">
  <p class="text-md font-light tracking-[.5px] text-white leading-5">
      {{session('success')}}
  </p>
  <button id="btnAlert">
      <i class="bi bi-x-circle-fill text-2xl text-white hover:text-slate-200 duration-200"></i>
  </button>

  <script type="text/javascript">
      const btnAlert = document.getElementById("btnAlert");
      var alertMessage = document.getElementById("alertMessage");
       btnAlert.addEventListener("click", function(e) {
          alertMessage.classList.add('hidden');
       });
  </script>
</div>
  @endif
    <section class="section bg-emerald-50/20 dark:bg-slate-900 text-emerald-900 dark:text-slate-100 shadow-lg py-16 px-10">
            <form action="{{route('user.document.process')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="flex flex-col gap-3 w-full">
                    <div class="flex justify-between items-end">
                        <div>
                            <h1 class="text-3xl md:text-4xl font-semibold me-3">Upload Dokumen</h1>
                            <p># {{ Auth::user()->name }}</p>
                        </div>
                        <a href="{{route('user.profile')}}" class="py-1 px-3 text-sm rounded-[2rem] bg-emerald-600 dark:bg-slate-900 text-slate-100 border border-emerald-400 hover:bg-slate-950 hover:text-slate-300 duration-300">Back</a>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between mb-5 mt-4 w-full">
                        <!-- input akte kelahiran -->
                        <div class="flex flex-col gap-y-3 px-1.5">
                            <!-- input file -->
                            <div>
                                <label for="" class="mb-2 font-medium block">Akte Kelahiran</label>
                                <input onchange="readURL1()" type="file" name="akta" id="inputAkte" 
                                    class="rounded-full bg-white text-slate-700 py-2 px-3 shadow-inner file:rounded-full file:border-emerald-400 file:border-solid file:text-emerald-700 file:bg-emerald-100 file:hover:border-emerald-200 file:hover:bg-emerald-300 file:hover:text-emerald-900 file:font-semibold file:border file:lowercase file:text-sm file:duration-200 w-full" 
                                accept="application/pdf">
                            </div>
                            <!-- pdf preview -->
                            <div>
                                <label for="" class="mb-2 font-medium block">Preview - Akte Kelahiran</label>
                                <object id="outputAkte" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full rounded-[30px] shadow-inner" height="600" 
                                type="application/pdf"></object>
                            </div>
                        </div>
    
                        <!-- input kartu keluarga -->
                        <div class="flex flex-col gap-y-3 px-1.5">
                            <!-- input file -->
                            <div>
                                <label for="" class="mb-2 font-medium block">Kartu Keluarga</label>
                                <input onchange="readURL2()" type="file" name="kk" id="inputKk" 
                                    class="rounded-full bg-white text-slate-700 py-2 px-3 shadow-inner file:rounded-full file:border-emerald-400 file:border-solid file:text-emerald-700 file:bg-emerald-100 file:hover:border-emerald-200 file:hover:bg-emerald-300 file:hover:text-emerald-900 file:font-semibold file:border file:lowercase file:text-sm file:duration-200 w-full" 
                                accept="application/pdf">
                            </div>
                            <!-- pdf preview -->
                            <div>
                                <label for="" class="mb-2 font-medium block">Preview - Kartu Keluarga</label>
                                <object id="outputKk" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full rounded-[30px] shadow-inner" height="600" 
                                type="application/pdf"></object>
                            </div>
                        </div>
    
                        <!-- input ijazah -->
                        <div class="flex flex-col gap-y-3 px-1.5">
                            <!-- input file -->
                            <div>
                                <label for="" class="mb-2 font-medium block">Ijazah Kelulusan</label>
                                <input onchange="readURL3()" type="file" name="ijazah" id="inputIjazah" 
                                    class="rounded-full bg-white text-slate-700 py-2 px-3 shadow-inner file:rounded-full file:border-emerald-400 file:border-solid file:text-emerald-700 file:bg-emerald-100 file:hover:border-emerald-200 file:hover:bg-emerald-300 file:hover:text-emerald-900 file:font-semibold file:border file:lowercase file:text-sm file:duration-200 w-full" 
                                accept="application/pdf">
                            </div>
                            <!-- pdf preview -->
                            <div>
                                <label for="" class="mb-2 font-medium block">Preview - Ijazah Kelulusan</label>
                                <object id="outputIjazah" 
                                    class="bg-slate-200 dark:bg-slate-800 w-full rounded-[30px] shadow-inner" height="600" 
                                type="application/pdf"></object>
                            </div>
                        </div>
                        <script>
                            
                            // preview akte
                            function readURL1() {
                                const pdfInput = document.getElementById('inputAkte');
                                const pdfPreview = document.getElementById('outputAkte');
                                
                                // Remove previous data
                                pdfPreview.removeAttribute('data');
                                
                                const file = pdfInput.files[0];
                                if (file) {
                                    pdfPreview.setAttribute('data', URL.createObjectURL(file));
                                }
                            }
    
                            // preview kartu keluarga
                            function readURL2() {
                                const pdfInput = document.getElementById('inputKk');
                                const pdfPreview = document.getElementById('outputKk');
                                
                                // Remove previous data
                                pdfPreview.removeAttribute('data');
                                
                                const file = pdfInput.files[0];
                                if (file) {
                                    pdfPreview.setAttribute('data', URL.createObjectURL(file));
                                }
                            }
    
                            // preview ijazah
                            function readURL3() {
                                const pdfInput = document.getElementById('inputIjazah');
                                const pdfPreview = document.getElementById('outputIjazah');
                                
                                // Remove previous data
                                pdfPreview.removeAttribute('data');
                                
                                const file = pdfInput.files[0];
                                if (file) {
                                    pdfPreview.setAttribute('data', URL.createObjectURL(file));
                                }
                            }
    
                        </script>
                    </div>
                    <button type="submit" class="rounded-full py-2 w-full bg-emerald-900 hover:bg-emerald-950 text-emerald-50 hover:text-emerald-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:border dark:border-emerald-400 uppercase">
                        Submit
                    </button>
                </div>
            </form>
    </section>
</main>
@endsection