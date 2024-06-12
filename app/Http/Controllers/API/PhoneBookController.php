<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePhoneBookRequest;
use App\Http\Requests\UpdatePhoneBookRequest;
use App\Models\PhoneBook;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Request;


class PhoneBookController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $phoneBook = PhoneBook::getUserPhones()->paginate();
        return response()->json($phoneBook);
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePhoneBookRequest $request
     * @return JsonResponse
     */
    public function store(CreatePhoneBookRequest $request): JsonResponse
    {
        $phoneBook = PhoneBook::create(
            array_merge($request->validated(), [
                'is_favorites' => $request->is_favorites,
                'user_id' => auth()->id(),
            ]));
        return response()->json($phoneBook);
    }

    /**
     * @param PhoneBook $phoneBook
     * @return JsonResponse
     */
    public function show(PhoneBook $phoneBook): JsonResponse
    {
        return response()->json($phoneBook);
    }

    /**
     * Update the specified resource in storage.
     * @param PhoneBook $phoneBook
     * @param UpdatePhoneBookRequest $request
     * @return JsonResponse
     */
    public function update(PhoneBook $phoneBook, UpdatePhoneBookRequest $request): JsonResponse
    {
        $phoneBook->update(array_merge($request->validated(), ['is_favorites' => $request->is_favorites]));
        return response()->json($phoneBook);
    }

    /**
     * Remove the specified resource from storage.
     * @param PhoneBook $phoneBook
     * @return JsonResponse
     */
    public function destroy(PhoneBook $phoneBook): JsonResponse
    {
        $phoneBook->delete();

        return response()->json([], 200);
    }

    /**
     * @param PhoneBook $phoneBook
     * @return JsonResponse
     */
    public function addToFavorites(PhoneBook $phoneBook): JsonResponse
    {
        $phoneBook->update(['is_favorites' => !$phoneBook->is_favorites]);
        return response()->json($phoneBook);
    }
}
