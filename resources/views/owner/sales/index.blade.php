<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('売上一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class=" bg-white border-b border-gray-200">
          <section class="text-gray-600 body-font">
            <div class="container px-5 py-12 mx-auto">
              <div class="flex flex-col text-center w-full mb-10">
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
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">昨年累計</th>
                      <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($sales as $sale )
                    <tr>
                      <td class="border-t-2 border-gray-200 px-4 py-3">{{ $sale->date }}</td>
                      <td class="border-t-2 border-gray-200 px-4 py-3">{{ number_format($sale->today_sale) }}</td>
                      <td class="border-t-2 border-gray-200 px-4 py-3">{{ number_format($sale->total_sales) }}</td>
                      <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">{{ $sale->plan_rate }}</td>
                      <td class="border-t-2 border-gray-200 px-4 py-3 text-lg text-gray-900">{{ number_format($sale->last_rate) }}</td>
                      <td class="border-t-2 border-gray-200 w-10 text-center">
                        <input name="plan" type="radio">
                      </td>
                    </tr>
                    @endforeach

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

            <form method="POST" action="sales/index.php" enctype="multipart/form-data">
              @csrf
              @method('put')
              <input type="file" name="csv_file"><br>
              <button type="submit">アップロード</button>
            </form>


          </section>

        </div>
      </div>
    </div>
</x-app-layout>