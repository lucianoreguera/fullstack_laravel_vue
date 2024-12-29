<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class LessonType extends Base\LessonType
{
    public function newEloquentBuilder($query): Builders\LessonTypeBuilder
    {
        return new Builders\LessonTypeBuilder($query);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'lesson_type_id', 'lesson_type_id');
    }
}
