<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'balance',
        'bonus_coins',
        'total_wagered',
        'total_won',
        'games_played',
        'level',
        'experience_points',
        'vip_status',
        'preferences',
        'last_login_at',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'bonus_coins' => 'decimal:2',
        'total_wagered' => 'decimal:2',
        'total_won' => 'decimal:2',
        'games_played' => 'integer',
        'level' => 'integer',
        'experience_points' => 'integer',
        'preferences' => 'array',
        'last_login_at' => 'datetime',
    ];

    /**
     * Get the user that owns the player profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all transactions for this player.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id', 'user_id');
    }

    /**
     * Add experience points and check for level up.
     */
    public function addExperience(int $points): void
    {
        $this->experience_points += $points;
        
        // Level up every 1000 XP
        $newLevel = intdiv($this->experience_points, 1000) + 1;
        if ($newLevel > $this->level) {
            $this->level = $newLevel;
        }
        
        $this->save();
    }

    /**
     * Update VIP status based on total wagered.
     */
    public function updateVipStatus(): void
    {
        if ($this->total_wagered >= 100000) {
            $this->vip_status = 'diamond';
        } elseif ($this->total_wagered >= 50000) {
            $this->vip_status = 'platinum';
        } elseif ($this->total_wagered >= 10000) {
            $this->vip_status = 'gold';
        } elseif ($this->total_wagered >= 1000) {
            $this->vip_status = 'silver';
        } else {
            $this->vip_status = 'bronze';
        }
        
        $this->save();
    }

    /**
     * Record login timestamp.
     */
    public function recordLogin(): void
    {
        $this->last_login_at = now();
        $this->save();
    }
}
