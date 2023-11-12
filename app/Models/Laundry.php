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

    public function scopeFilter($query, array $filters){
        if(isset($filters['search']) ? $filters['search'] : false){//if else
            return $query->where('location','like','%' . $filters['search'] . '%')
            ->orWhere('name','like','%' . $filters['search'] . '%')
            ->orWhere('description','like','%' . $filters['search'] . '%');
        }
    }

    // public function scopeFilter($query, array $filters){    
    //     $query->when($filters['search'] ?? false, function($query, $search) {
    //         return $query->where(function($query) use ($search) {
    //              $query->where('title', 'like', '%' . $search . '%')
    //                          ->orWhere('body', 'like', '%' . $search . '%');
    //          });
    //      });

    //     $query->when($filters['category'] ?? false, function($query, $category) {
    //         return $query->whereHas('category',function($query) use ($category) {
    //              $query->where('slug', $category);
    //          });
    //      });

    //     $query->when($filters['author'] ?? false, fn($query, $author) =>
    //          $query->whereHas('author',fn($query) =>
    //              $query->where('username', $author)
    //         )
    //      );
    // }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id'); 
    }

    public function have(): HasMany
    {
        return $this->hasMany(HaveService::class);
    }
}
