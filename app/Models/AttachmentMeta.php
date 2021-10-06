<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentMeta extends Model
{
    use HasFactory;
    protected $fillable = ['attachment_id', 'key', 'value'];

    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }
}
