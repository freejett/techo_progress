<?php

namespace Tests\Feature\API\PhoneBook;

use App\Models\PhoneBook;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\API\BaseTest;

abstract class BasePhoneBookTest extends BaseTest
{
    use RefreshDatabase;

    protected function path(): string
    {
        return "phone_book";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return PhoneBook
     */
    protected function makeItem(User $user, array $attributes = [])
    {
        $item = PhoneBook::factory()
            ->for($user, 'user')
            ->make($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    protected function structure(): array
    {
        return PhoneBook::keys();
    }

}
