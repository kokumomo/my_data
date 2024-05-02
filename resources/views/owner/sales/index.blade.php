<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('売上一覧') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                <x-flash-message status="session('status')" /> 
                <div class="flex justify-end mb-4"> 
                  <button onclick="location.href='{{ route('owner.sales.create')}}'" class="text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">新規登録する</button>                        
                </div> 
                <div class="flex flex-wrap">
                @foreach ($sales as $sale )
                    <div class="w-1/4 p-2 md:p-4">
                    <a href="{{ route('owner.sales.edit', ['sale' => $sale->id ])}}">  
                    <div class="border rounded-md p-2 md:p-4">
                      <x-thumbnail :filename="$sale->filename" type="products" />
                      <div class="text-gray-700">{{ $sale->title }}</div>
                    </div>
                    </a>
                    </div>
                  @endforeach
                </div>
                {{ $sales->links() }}
              </div>
         
  

  <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">裾野店</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">5月度売上</p>
    </div>
    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">日付</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">当日売上</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">累計売上</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">達成率</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">昨対</th>
            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="px-4 py-3">4/30</td>
            <td class="px-4 py-3">1,000</td>
            <td class="px-4 py-3">1,000</td>
            <td class="px-4 py-3 text-lg text-gray-900">5.0%</td>
            <td class="px-4 py-3 text-lg text-gray-900">100.0%</td>
            <td class="w-10 text-center">
              <input name="plan" type="radio">
            </td>
          </tr>
          <tr>
            <td class="border-t-2 border-gray-200 px-4 py-3">5/1</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">1,000</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">2,000</td>
            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">8.0%</td>
            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">100.0%</td>
            <td class="border-t-2 border-gray-200 w-10 text-center">
              <input name="plan" type="radio">
            </td>
          </tr>
          <tr>
            <td class="border-t-2 border-gray-200 px-4 py-3">5/2</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">1,000</td>
            <td class="border-t-2 border-gray-200 px-4 py-3">3,000</td>
            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">11.0%</td>
            <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">100.0%</td>
            <td class="border-t-2 border-gray-200 w-10 text-center">
              <input name="plan" type="radio">
            </td>
          </tr>
          <tr>
            <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">5/3</td>
            <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">1,000</td>
            <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">4,000</td>
            <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-lg text-gray-900">14.0%</td>
            <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3 text-lg text-gray-900">100.0%</td>
            <td class="border-t-2 border-b-2 border-gray-200 w-10 text-center">
              <input name="plan" type="radio">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
      <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">次月度
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>
      <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
    </div>
  </div>
</section>

</div>
      </div>
</div>
</x-app-layout>