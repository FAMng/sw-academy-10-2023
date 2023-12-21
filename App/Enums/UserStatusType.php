<?php

namespace App\Enums;

enum UserStatusType: int
{
    case ACTIVE_USER = 1;
    case INACTIVE_USER = 0;

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE_USER => 'Доступен для установки в график',
            self::INACTIVE_USER => 'Не доступен для установки в график',
        };
    }

    public static  function getList(): array
    {
        return array_map(fn ($status) => [
            'value' => $status->value,
            'label' => $status->label(),
        ], self::cases());
    }
}
