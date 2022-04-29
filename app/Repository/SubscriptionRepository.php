<?php

namespace App\Repository;

use App\Models\Subscription;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\SubscriptionRepositoryInterface;

/**
 * @author emanueldossantoset5@gmail.com
 * Class SubscriptionRepository
 * @package App\Repository
 */
class SubscriptionRepository implements SubscriptionRepositoryInterface
{

    const MSG_SUCCESS = 'Subscripcion creada correctamente.';
    const MSG_ERROR = 'Error al crear la Subscripcion: ';
    /**
     * @param Subscription $model
     */
    public function __construct(Subscription $subscription)
    {
        $this->model = $subscription;
    }

    public function findById($subscription_id)
    {
        abort(404);
    }

    public function save($attributes)
    {
        try {
            $subscription = new Subscription();
            $subscription->email = $attributes['email'];
            $subscription->state_id = $attributes['state_id'];
            $subscription->save();
            return response()->json([
                'message'   => 	SELF::MSG_SUCCESS,
                'subscription'     => 	$subscription,
                'ok'    =>  true 
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([SELF::MSG_ERROR => $th->getMessage()], 500);
        }
    }

    public function update($model, array $attributes = [])
    {
        abort(404);
    }

    /**
     * @param $model
     * @return bool
     */
    public function delete($model): bool
    {
        abort(404);
    }

    public function all()
    {
        abort(404);
    }
    
}