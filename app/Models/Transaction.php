<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'type',
        'amount',
        'balance_before',
        'balance_after',
        'reference',
        'description',
        'status',
        'metadata',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'balance_before' => 'decimal:2',
        'balance_after' => 'decimal:2',
        'metadata' => 'array',
    ];

    /**
     * Get the user that owns this transaction.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the game associated with this transaction.
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Scope for completed transactions.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope for pending transactions.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for deposits.
     */
    public function scopeDeposits($query)
    {
        return $query->where('type', 'deposit');
    }

    /**
     * Scope for withdrawals.
     */
    public function scopeWithdrawals($query)
    {
        return $query->where('type', 'withdrawal');
    }

    /**
     * Mark transaction as completed.
     */
    public function markAsCompleted(): void
    {
        $this->status = 'completed';
        $this->save();
    }

    /**
     * Mark transaction as failed.
     */
    public function markAsFailed(): void
    {
        $this->status = 'failed';
        $this->save();
    }
}
