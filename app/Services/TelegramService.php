<?php

// app/Services/TelegramService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    protected $botToken;
    protected $chatId;

    public function __construct()
    {
        // Set your bot token and chat ID
        $this->botToken = env('TELEGRAM_BOT_TOKEN');
        $this->chatId = env('TELEGRAM_CHAT_ID');
    }

    // Method to send blog content (title, image, description, and link) to Telegram
    public function sendBlogToTelegram($title, $imageUrl, $description, $link)
    {
        // 1. Send the image using the `sendPhoto` method
        $this->sendImage($imageUrl);
        
        // 2. Send the title and description as text using the `sendMessage` method
        $this->sendText($title, $description, $link);
    }

    // Send image to Telegram
    private function sendImage($imageUrl)
    {
        $response = Http::post("https://api.telegram.org/bot{$this->botToken}/sendPhoto", [
            'chat_id' => $this->chatId,
            'photo' => $imageUrl, // The image URL
        ]);

        // Optionally, you can check for errors in the response
        if (!$response->successful()) {
            \Log::error('Error sending image to Telegram: ' . $response->body());
        }
    }

    // Send text (title, description, and link) to Telegram
    private function sendText($title, $description, $link)
    {
        // Prepare the message
        $message = "<b>{$title}</b>\n\n";  // Title in bold
        $message .= "{$description}\n\n";  // Description
        $message .= "<a href='{$link}'>Read More</a>"; // Link at the end

        // Send the message using sendMessage method
        $response = Http::post("https://api.telegram.org/bot{$this->botToken}/sendMessage", [
            'chat_id' => $this->chatId,
            'parse_mode' => 'HTML',  // Use HTML formatting
            'text' => $message,
        ]);

        // Optionally, you can check for errors in the response
        if (!$response->successful()) {
            \Log::error('Error sending text to Telegram: ' . $response->body());
        }
    }
}
