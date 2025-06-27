<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class UserActionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $pesan;
    protected $url;
    protected $user;
    protected $action;

    public function __construct($pesan, $url = '#', $user = null, $action = null)
    {
        $this->pesan = $pesan;
        $this->url = $url;
        $this->user = $user;
        $this->action = $action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase($notifiable)
    {
        return [
            'pesan' => $this->pesan,
            'url' => $this->url,
            'user_id' => $this->user ? $this->user->id : null,
            'user_name' => $this->user ? $this->user->name : null,
            'user_role' => $this->user ? $this->user->role : null,
            'action' => $this->action,
            'timestamp' => now(),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'pesan' => $this->pesan,
            'url' => $this->url,
            'user_id' => $this->user ? $this->user->id : null,
            'user_name' => $this->user ? $this->user->name : null,
            'user_role' => $this->user ? $this->user->role : null,
            'action' => $this->action,
            'timestamp' => now(),
        ];
    }

    /**
     * Send notification to all admin users
     */
    public static function notifyAdmins($pesan, $url = '#', $user = null, $action = null)
    {
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new self($pesan, $url, $user, $action));
        }
    }
}
