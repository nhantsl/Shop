<?php

use App\Enums\OrderStatus;

it('only allows valid order status transitions', function () {
    expect(OrderStatus::Pending->canTransitionTo(OrderStatus::Confirmed))->toBeTrue()
        ->and(OrderStatus::Pending->canTransitionTo(OrderStatus::Completed))->toBeFalse()
        ->and(OrderStatus::Completed->canTransitionTo(OrderStatus::Cancelled))->toBeFalse();
});
