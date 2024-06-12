<form action="{{ $action }}" method="{{ $method }}">
    @method($realMethod)
    @csrf
    <div class="mb-4 mt-4">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
            Телефон
        </label>
        <input
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
            id="name" name="phone" type="number" value="{{ old('phone', $phoneBook->phone ?? null) }}" minlength="11" maxlength="11" required="required" autofocus="autofocus"
            autocomplete="name">

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-4">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300" for="name">
            ФИО
        </label>
        <input
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full"
            id="name" name="name" type="text" value="{{ old('name', $phoneBook->name ?? null) }}"
            autocomplete="name">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mb-4">
        <input value="1" id="is_favorites" name="is_favorites" {{ old('is_favorites', isset($phoneBook) && $phoneBook->is_favorites ? 'checked' : '') }}
               class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mb-4 mt-3 pe-4"
               type="checkbox"/>
        Добавить в избранное
    </div>

    <x-primary-button>Сохранить</x-primary-button>

    <a href="{{ route('phone_book.index') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        Вернуться
    </a>
</form>
