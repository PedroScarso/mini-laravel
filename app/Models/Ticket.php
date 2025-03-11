<?php

namespace App\Models;

use App\Enums\TicketStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'ticket_category_id',
        'department_id',
        'agent_id',
        'closed_by',
        'created_by',
        'title',
        'status',
        'assessment',
        'summary_closing',
        'internal_notes',
        'description',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'ticket_category_id' => 'integer',
        'department_id' => 'integer',
        'agent_id' => 'integer',
        'closed_by' => 'integer',
        'created_by' => 'integer',
        'title' => 'string',
        'status' => TicketStatus::class,
        'assessment' => 'integer',
        'summary_closing' => 'string',
        'internal_notes' => 'string',
        'description' => 'string',
    ];

    /**
     * Get the user that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the agent that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'agent_id', 'id');
    }

    /**
     * Get the category that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(TicketCategory::class, 'ticket_category_id', 'id');
    }

    /**
     * Get the department that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

}
