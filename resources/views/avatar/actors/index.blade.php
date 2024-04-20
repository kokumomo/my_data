<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          actor 一覧
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="md:p-6 bg-white border-b border-gray-200">
                
                <section class="text-gray-600 body-font">
                  <div class="container md:px-5 mx-auto">
                  <x-flash-message status="info" />
                    <div class="flex justify-end mb-4"> 
                      <button onclick="location.href='{{ route('avatar.actors.create')}}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>                        
                    </div>
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                      <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                          <tr>
                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">名前</th>
                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">作成日</th>
                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                          </tr>
                        </thead>
                          <tbody>
                          @foreach ($actors as $actor)
                          <tr>
                            <td class="md:px-4 py-3">{{ $actor->name }}</td>
                            <td class="md:px-4 py-3">{{ $actor->email }}</td>
                            <td class="md:px-4 py-3">{{ $actor->created_at->diffForHumans() }}</td>
                            <td class="px-4 py-3">
                              <button onclick="location.href='{{ route('avatar.actors.edit', ['actor' => $actor->id ])}}'" class="text-white bg-indigo-400 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-500 rounded ">編集</button>                        
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $actors->links() }}
                    </div>
                  </div>
                </section>

              {{--  エロクアント
                @foreach ($e_all as $e_actor)
                  {{ $e_actor->name }}
                  {{ $e_actor->created_at->diffForHumans() }}
                @endforeach
                <br>
                クエリビルダ
                @foreach ($q_get as $q_actor)
                  {{ $q_actor->name }}
                  {{ Carbon\Carbon::parse($q_actor->created_at)->diffForHumans() }}
                @endforeach --}}
              </div>
          </div>
      </div>
  </div>
</x-app-layout>