<?php

namespace App\Models;

use App\Models\HaveService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function have(): HasMany
    {
        return $this->hasMany(HaveService::class);
    }
}
