<?php

use App\Enums\TicketStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('ticket_category_id')->index()->nullable();
            $table->unsignedBigInteger('department_id')->index()->nullable();
            $table->unsignedBigInteger('agent_id')->nullable()->index();
            $table->unsignedBigInteger('closed_by')->nullable()->index();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->string('title')->index();
            $table->longText('description')->nullable();
            $table->integer('status')->index()->default(TicketStatus::CREATED?->value);
            $table->integer('assessment')->index()->nullable();
            $table->longText('summary_closing')->nullable();
            $table->longText('internal_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->foreign('department_id')->references('id')
            ->on('departments')->onDelete('set null');

            $table->foreign('ticket_category_id')->references('id')
            ->on('ticket_categories')->onDelete('set null');

            $table->foreign('agent_id')->references('id')
            ->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
