<?php

namespace App\Transformers;

use App\Status;
use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [

    ];

    protected $availableIncludes = [
        'commerce'
    ];


    public function includeCommerce(User $user)
    {
        $commerce = $user->commerce()->first();
        if ($commerce)
            return $this->item($commerce, new CommerceTransformer());
    }

    function getStatus($user)
    {
        $status = $user->status()->first();
        return [
            'id' => $status->id,
            'status' => $status->status,
            'is_enabled' => $status->status === Status::ENABLED,
            'label' => $status->status === Status::ENABLED ? 'Activo' : 'Inactivo'
        ];
    }

    function getRol($user)
    {
        $rol = $user->rol()->first();
        return [
            'id' => $rol->id,
            'rol' => $rol->rol
        ];
    }

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'phone' => $user->phone,
            'email' => $user->email,
            'status' => $this->getStatus($user),
            'rol' => $this->getRol($user),
            'has_commerce' => $user->commerce()->count() > 0
        ];
    }
}
