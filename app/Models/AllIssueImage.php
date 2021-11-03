<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllIssueImage extends Model
{
    use HasFactory;

    protected $fillable = [
        "issue_name", "issue_price", "issue_description", "model_id"
    ];
}
