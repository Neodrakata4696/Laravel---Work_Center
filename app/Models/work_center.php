<?php

namespace App\Models;

use App\Events\WorkCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class work_center extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'message',
    ];
    
    protected $dispatchesEvents = [
        'created' => WorkCreated::class,
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
