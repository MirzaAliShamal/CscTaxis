<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;
use Mail;

class SendQueueEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    public $timeout = 7200; // 2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info("hello");
        $id = $this->details['id'];
        $action = $this->details['action'];

        $book = Booking::find($id);

        if ($action == "submit") {
            Mail::send('email.booking', get_defined_vars(), function ($message) use($book) {
                $message->to($book->email, $book->name);
                $message->subject('Booking ID: '.$book->uuid.' request submitted');
            });
            Mail::send('email.admin.booking', get_defined_vars(), function ($message) use($book) {
                $message->to(adminEmail(), adminName());
                $message->subject('Booking ID: '.$book->uuid.' request submitted');
            });
        } else if ($action == "accept") {
            Mail::send('email.booking_accept', get_defined_vars(), function ($message) use($book) {
                $message->to($book->email, $book->name);
                $message->subject('Booking ID: '.$book->uuid.' booking accepted');
            });
            Mail::send('email.admin.booking_accept', get_defined_vars(), function ($message) use($book) {
                $message->to(adminEmail(), adminName());
                $message->subject('Booking ID: '.$book->uuid.' booking accepted');
            });
        } else if ($action == "complete") {
            Mail::send('email.booking_complete', get_defined_vars(), function ($message) use($book) {
                $message->to($book->email, $book->name);
                $message->subject('Booking ID: '.$book->uuid.' booking completed');
            });
            Mail::send('email.admin.booking_complete', get_defined_vars(), function ($message) use($book) {
                $message->to(adminEmail(), adminName());
                $message->subject('Booking ID: '.$book->uuid.' booking completed');
            });
        } else if ($action == "decline") {
            Mail::send('email.booking_cancel', get_defined_vars(), function ($message) use($book) {
                $message->to($book->email, $book->name);
                $message->subject('Booking ID: '.$book->uuid.' booking cancelled');
            });
            Mail::send('email.admin.booking_cancel', get_defined_vars(), function ($message) use($book) {
                $message->to(adminEmail(), adminName());
                $message->subject('Booking ID: '.$book->uuid.' booking cancelled');
            });
        }
    }
}
