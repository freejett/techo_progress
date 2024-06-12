<?php

namespace App\Http\Controllers;

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
    public function __construct()
    {
        parent::__construct();
        $this->templateBase .= 'phone_book.';
        view()->share('templateBase', $this->templateBase);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view($this->templateBase . $this->currentMethod, [
            'phoneBook' => PhoneBook::getUserPhones()->paginate(),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view($this->templateBase . $this->currentMethod);
    }

    /**
     * Store a newly created resource in storage.
     * @param CreatePhoneBookRequest $request
     * @return RedirectResponse
     */
    public function store(CreatePhoneBookRequest $request): RedirectResponse
    {
        $phone = PhoneBook::create(array_merge($request->validated(), ['is_favorites' => $request->is_favorites, 'user_id' => auth()->id()]));

        return redirect()->route('phone_book.edit', $phone);
    }

    /**
     * @param PhoneBook $phoneBook
     * @return View
     */
    public function show(PhoneBook $phoneBook): View
    {
        return view($this->templateBase . $this->currentMethod, [
            'phoneBook' => $phoneBook,
        ]);
    }

    /**
     * @param PhoneBook $phoneBook
     * @return View
     */
    public function edit(PhoneBook $phoneBook): View
    {
        return view($this->templateBase . $this->currentMethod, [
            'phoneBook' => $phoneBook,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param PhoneBook $phoneBook
     * @param UpdatePhoneBookRequest $request
     * @return RedirectResponse
     */
    public function update(PhoneBook $phoneBook, UpdatePhoneBookRequest $request): RedirectResponse
    {
        $phoneBook->update(array_merge($request->validated(), ['is_favorites' => $request->is_favorites]));
        return redirect()->route('phone_book.edit', $phoneBook);
    }

    /**
     * Remove the specified resource from storage.
     * @param PhoneBook $phoneBook
     * @return RedirectResponse
     */
    public function destroy(PhoneBook $phoneBook): RedirectResponse
    {
        $phoneBook->delete();

        return redirect()->route('phone_book.index');
    }

    /**
     * @param PhoneBook $phoneBook
     * @return RedirectResponse
     */
    public function addToFavorites(PhoneBook $phoneBook): RedirectResponse
    {
        $phoneBook->update(['is_favorites' => !$phoneBook->is_favorites]);
        return redirect()->back();
    }
}
