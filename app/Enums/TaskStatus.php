<?php
namespace App\Enums;

enum TaskStatus:string {

    case Completed = 'completed';
    case Started = 'in progress';
    case NotStarted = 'not stated';
    
}