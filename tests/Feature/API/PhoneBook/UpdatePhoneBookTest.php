<?php

namespace Tests\Feature\API\PhoneBook;

class UpdatePhoneBookTest extends BasePhoneBookTest
{
    public function testUpdateItemTestPhoneBookByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $this->patchJson($this->makeURI($item->id), $item->toArray())
            ->assertStatus(404);
    }

    public function testUpdateItemTestPhoneBookByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $item->save();

        $this->patchJson($this->makeURI($item->id), $item->toArray())
            ->assertStatus(404);
    }
}
