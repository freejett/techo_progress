<?php

namespace Tests\Feature\API\PhoneBook;

class CreatePhoneBookTest extends BasePhoneBookTest
{
    public function testCreateItemTestPhoneBookByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $this->postJson($this->makeURI(), $item->toArray())
            ->assertStatus(404);
    }

    public function testCreateItemTestPhoneBookByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $this->postJson($this->makeURI(), $item->toArray())
            ->assertStatus(404);
    }
}
