<?php

it('returns ok on ping', function () {
    $this->getJson('/api/v1/ping')
        ->assertOk()
        ->assertJson(['status' => 'ok']);
});
