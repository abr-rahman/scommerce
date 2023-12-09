<?php
  
namespace App\Enums;
 
enum ProductStatus:int {
    case Inactive = 0;
    case Active = 1;
    case Pending = 2;
    case Rejected = 3;
    case Approved = 4;
    case Slider = 5;
    case Arrival = 6;
    case Comming = 7;
    case Featured = 8;
}

