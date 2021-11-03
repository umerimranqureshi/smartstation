<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modal extends Model
{
     protected $fillable = ["device_name", "ModelName", "image", "ModelDescription", "device_id"];
}
