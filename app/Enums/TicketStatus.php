<?php

namespace App\Enums;

enum TicketStatus: int
{
    case CREATED = 1;
    case IN_PROGRESS = 5;
    case PAUSED = 10;
    case BLOCKED = 15;
    case CANCELED = 20;
    case COMPLETED = 25;
    case CLOSED = 30;
}
