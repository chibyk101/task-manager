<?php
namespace App\Enums;

enum TaskStatus:string {

    case Completed = 'completed';
    case Started = 'in_progress';
    case NotStarted = 'not_started';
    
}