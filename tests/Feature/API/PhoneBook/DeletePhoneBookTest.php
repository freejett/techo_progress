<?php

namespace Tests\Feature\API\PhoneBook;

class DeletePhoneBookTest extends BasePhoneBookTest
{
    public function testDeleteItemTestPhoneBookByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }

    public function testDeleteItemTestPhoneBookByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $item->save();

        $this->deleteJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}
