<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Article;

class ArticleChangesNotification extends Notification
{
    use Queueable;

    public $messageData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Article $article, $changesData)
    {
        $this->messageData['title'] = $changesData;
        $this->messageData['article'] = $article->title;
        if ($changesData != 'Статья удалена') {
            $this->messageData['actionText'] = 'Посмотреть статью: ';
            $this->messageData['url'] = '/articles/' . $article->slug;
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if ($this->messageData['title'] != 'Статья удалена'){
            return (new MailMessage)
                ->line($this->messageData['title'])
                ->line($this->messageData['article'])
                ->action($this->messageData['actionText'], url($this->messageData['url']));
        }

        return (new MailMessage)
            ->line($this->messageData['title'])
            ->line($this->messageData['article']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
