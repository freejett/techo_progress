<?php

namespace Tests\Feature\API\PhoneBook;

class ReadPhoneBookTest extends BasePhoneBookTest
{
    public function testReadItemTestPhoneBookByGuest()
    {
        $user = $this->createUser();
        $item = $this->makeItem($user);
        $item->save();

        $this->getJson($this->makeURI($item->id))
            ->assertStatus(404);
    }

    public function testReadItemTestPhoneBookByUser()
    {
        $user = $this->createUser();
        $this->actingAs($user);
        $item = $this->makeItem($user);
        $item->save();

        $this->getJson($this->makeURI($item->id))
            ->assertStatus(404);
    }
}
