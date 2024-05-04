<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PositionApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id', 'position_id'];

    public function position() : BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
