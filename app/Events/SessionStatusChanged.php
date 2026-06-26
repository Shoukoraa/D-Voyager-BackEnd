<?php

namespace App\Events;

use App\Models\ChatSession;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SessionStatusChanged implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public ChatSession $session) {}

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('admin.chat'),
            new PrivateChannel("chat.{$this->session->id}")
        ];
    }

    public function broadcastAs(): string
    {
        return 'session.status.changed';
    }

    public function broadcastWith(): array
    {
        return [
            'session_id' => $this->session->id,
            'user_name' => $this->session->user->name ?? 'User',
            'status' => $this->session->status,
            'updated_at' => $this->session->updated_at->toISOString()
        ];
    }
}
