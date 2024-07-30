<?php

namespace App\Enums;

enum SignatureStatus: int
{
	case ACTIVED   = 1;
	case DISABLED  = 2;
	case SUSPENDED = 3;
	case CANCELED  = 0;
}