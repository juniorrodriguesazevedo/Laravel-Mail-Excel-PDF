<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookStoreMail extends Mailable
{
    public $book;
    public $url;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
        $this->url = 'http://127.0.0.1:8000/admin/book/'.$book->id;
    }

    /*
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.book.store')->subject('Cadastrado com sucesso!');
    }
}
