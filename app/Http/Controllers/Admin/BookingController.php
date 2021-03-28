<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendQueueEmail;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;
use Mail;

class BookingController extends Controller
{
    public function list($status = null)
    {
        if (is_null($status)) {
            $list = Booking::orderBy("id", "DESC")->get();
            return view('admin.booking.list', get_defined_vars());
        } else if ($status == "pending") {
            $list = Booking::where('status', '0')->orderBy("id", "DESC")->get();
            return view('admin.booking.pending', get_defined_vars());
        } else if ($status == "active") {
            $list = Booking::where('status', '1')->orderBy("id", "DESC")->get();
            return view('admin.booking.active', get_defined_vars());
        } else if ($status == "completed") {
            $list = Booking::where('status', '2')->orderBy("id", "DESC")->get();
            return view('admin.booking.completed', get_defined_vars());
        } else if ($status == "cancelled") {
            $list = Booking::where('status', '3')->orderBy("id", "DESC")->get();
            return view('admin.booking.cancelled', get_defined_vars());
        }
    }

    public function detail($id = null)
    {
        $booking = Booking::find($id);

        return view('admin.booking.detail', get_defined_vars());
    }

    public function statusChange($id = null, $action = null)
    {
        $book = Booking::find($id);

        if ($action == "accept") {
            $book->status = "1";
            $book->save();

            $details = [
                'id' => $book->id,
                'action' => 'accept',
            ];

            // $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

            // dispatch($job);
            
            Mail::send('email.booking_accept', get_defined_vars(), function ($message) use($book) {
                $message->to($book->email, $book->name);
                $message->subject('Booking ID: '.$book->uuid.' booking accepted');
            });
            Mail::send('email.admin.booking_accept', get_defined_vars(), function ($message) use($book) {
                $message->to(adminEmail(), adminName());
                $message->subject('Booking ID: '.$book->uuid.' booking accepted');
            });
        }

        if ($action == "complete") {
            $book->status = "2";
            $book->save();

            $details = [
                'id' => $book->id,
                'action' => 'complete',
            ];

            // $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

            // dispatch($job);
            
            Mail::send('email.booking_complete', get_defined_vars(), function ($message) use($book) {
                $message->to($book->email, $book->name);
                $message->subject('Booking ID: '.$book->uuid.' booking completed');
            });
            Mail::send('email.admin.booking_complete', get_defined_vars(), function ($message) use($book) {
                $message->to(adminEmail(), adminName());
                $message->subject('Booking ID: '.$book->uuid.' booking completed');
            });
        }

        if ($action == "decline") {
            $book->status = "3";
            $book->save();

            if ($book->payment_method == "3") {
                $trans = $book->transaction;

                try {
                    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                    $refund = \Stripe\Refund::create(['charge' => $trans->stripe_charge_id]);

                    $trans->status = "2";
                    $trans->save();

                } catch(\Stripe\Error\InvalidRequest $e) {
                    dd($e->getMessage());
                } catch(\Stripe\Error\Card $e) {
                    dd($e->getMessage());
                }
            }

            $details = [
                'id' => $book->id,
                'action' => 'decline',
            ];

            // $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

            // dispatch($job);
            
            Mail::send('email.booking_cancel', get_defined_vars(), function ($message) use($book) {
                $message->to($book->email, $book->name);
                $message->subject('Booking ID: '.$book->uuid.' booking cancelled');
            });
            Mail::send('email.admin.booking_cancel', get_defined_vars(), function ($message) use($book) {
                $message->to(adminEmail(), adminName());
                $message->subject('Booking ID: '.$book->uuid.' booking cancelled');
            });
        }

        return redirect()->back()->with('success', 'Booking Status Changed Successfully!');
    }
}
