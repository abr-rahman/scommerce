<?php
  
namespace App\Enums;
 
enum StatusEnum:int {
    case Inactive = 0;
    case Active = 1;
    case Pending = 2;
    case Rejected = 3;
    case Approved = 4;
    case Processing = 5;
    case OnWay = 6;
    case Complete = 7;
    case Replied = 8;
    case Return = 9;
}

