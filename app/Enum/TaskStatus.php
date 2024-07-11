<?php

namespace App\Enum;


Enum TaskStatus: int {
    case New = 1;
    case Work = 2;
    case Done = 3;



    public function name(): string
    {
        return static::getName($this);
    }

    public static function getName(self $value): string {
        return match ($value) {
            self::New => 'Новая задача',
            self::Work => 'В работе',
            self::Done => 'Выполнено',
        };
    }

}
