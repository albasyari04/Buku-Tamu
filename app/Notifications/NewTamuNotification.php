<?php

namespace App\Notifications;

use App\Models\Tamu;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class NewTamuNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(protected Tamu $tamu)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'tamu_id' => $this->tamu->id,
            'nama' => $this->tamu->nama,
            'instansi' => $this->tamu->instansi,
            'bertemu_dengan' => $this->tamu->bertemu_dengan,
            'perihal' => $this->tamu->perihal,
            'tanggal_kunjungan' => $this->tamu->tanggal_kunjungan?->format('d M Y H:i'),
            'message' => 'Ada tamu baru masuk: ' . $this->tamu->nama . ' dari ' . $this->tamu->instansi,
            'url' => route('tamu.index'),
        ];
    }
}
