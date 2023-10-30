<?php

namespace App\Models;

use App\Models\Laundry;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HaveService extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function service():BelongsTo
    {
        return $this->belongsTo(Service::class,'service_id'); 
    }
    public function laundry():BelongsTo
    {
        return $this->belongsTo(Laundry::class,'laundry_id'); 
    }
}
