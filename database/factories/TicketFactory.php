<?php

namespace Database\Factories;

use App\Enums\TicketStatus;
use App\Models\Department;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'ticket_category_id' => TicketCategory::factory(),
            'department_id' => Department::factory(),
            'agent_id' => User::factory(),
            'closed_by' => null,
            'created_by' => null,
            'title' => fake()->words(6,true),
            'description' => fake()->paragraph(),
            'status' => TicketStatus::CREATED,
            'assessment' => null,
            'summary_closing' => null,
            'internal_notes' => null,
        ];
    }
}
