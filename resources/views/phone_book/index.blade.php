<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Телефонная книга
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('phone_book.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Добавить телефон
                    </a>
                    <hr class="mt-4 mb-4">
                    @if( count($phoneBook))
                        <table class="table hover:table-fixed w-full">
                            <thead>
                            <tr>
                                <th class="sm:text-left">
                                    Номер
                                </th>
                                <th class="sm:text-left">
                                    ФИО
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phoneBook as $phone)
                                <tr>
                                    <td>
                                        <a href="{{ route('phone_book.show', $phone) }}">
                                            @if($phone->is_favorites )
                                                &starf;
                                            @endif {{ $phone->phoneNumber }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $phone->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('phone_book.edit', $phone) }}" class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Редактировать
                                        </a>
                                        <a href="{{ route('phone_book.show', $phone) }}" class="mb-4 ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                            Смотреть
                                        </a>
                                        <a href="{{ route('phone_book.set_favorite', $phone) }}" class="mb-4 ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                           onclick="setNumberFavorite({{ $phone->id }})"
                                        >
                                            &starf;
                                        </a>
                                        <form id="phone-favorite-{{ $phone->id }}"
                                              action="{{ route('phone_book.set_favorite', $phone) }}"
                                              method="POST" style="display: none;">
                                            @csrf
                                            @method('patch')
                                        </form>

                                        <a href="{{ route('phone_book.destroy', $phone) }}"
                                           class=" ml-4 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                           onclick="deleteNumber({{ $phone->id }})"
                                        >
                                            Удалить
                                        </a>
                                        <form id="phone-{{ $phone->id }}"
                                              action="{{ route('phone_book.destroy', $phone) }}"
                                              method="POST" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $phoneBook->onEachSide(5)->links() }}
                    @else
                        <p>Телефонная книга пуста</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteNumber(id) {
            event.preventDefault();
            let confirmRes = confirm("Вы действительно хотите удалить номер?");
            if (confirmRes) {
                document.getElementById('phone-' + id).submit();
            } else {
                return false;
            }
        }

        function setNumberFavorite(id) {
            event.preventDefault();
            document.getElementById('phone-favorite-' + id).submit();
        }
    </script>
</x-app-layout>


