<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;

/**
 * @author emanueldossantoset5@gmail.com
 * Class SubscriptionController
 * @package App\Http\Controllers\Car\SubscriptionController
 */
class SubscriptionController extends Controller
{
    private $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * @param \App\Http\Requests\SubscriptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SubscriptionRequest $request)
    {
        $params = $request->validated();
        return $this->subscriptionService->make($params);
    }

}