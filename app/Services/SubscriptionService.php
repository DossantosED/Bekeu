<?php

namespace App\Services;

use App\Models\Subscription;
use App\Repository\Interfaces\SubscriptionRepositoryInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Class SubscriptionService
 * @package App\Services\SubscriptionService
 */
class SubscriptionService
{

    private $subscriptionRepository;

    public function __construct(
        SubscriptionRepositoryInterface $subscriptionRepository
    ) {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    public function make($attributes)
    {
        return $this->subscriptionRepository->save($attributes);
    }
}
