<?php

namespace App\Models\Base;

use App\Traits\Models\CreatedBy;
use App\Traits\Models\DeletedBy;
use App\Traits\Models\HasSlug;
use App\Traits\Models\UpdatedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasSlug, CreatedBy, UpdatedBy, DeletedBy;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'category_id' => 'integer',
        'name' => 'string',
        'slug' => 'string',
        'description' => 'string',
        'is_active' => 'boolean',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
