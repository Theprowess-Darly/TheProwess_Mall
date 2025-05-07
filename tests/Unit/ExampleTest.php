<?php

use App\Models\Delivery;

test('that true is true', function () {
    $delivery = Delivery::factory()->create();

    expect($delivery->delivery_person_id)->toBe(null);
});
