<?php

namespace App\Models;

use App\Models\User;
use App\Models\HaveService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laundry extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id'); 
    }

    public function have(): HasMany
    {
        return $this->hasMany(HaveService::class);
    }
}
