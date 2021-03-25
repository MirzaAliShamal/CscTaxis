<?php

namespace App\Http\Controllers;

use App\Models\ContactEnquiry;
use Illuminate\Http\Request;
use App\Jobs\SendQueueEmail;
use App\Models\Transaction;
use App\Models\Booking;
use Carbon\Carbon;
use Mail;

class HomeController extends Controller
{
    public function home()
    {
        return view('front.home', get_defined_vars());
    }

    public function privateTours()
    {
        return view('front.private_tours', get_defined_vars());
    }

    public function everydayTaxi()
    {
        return view('front.everyday_taxi', get_defined_vars());
    }

    public function airportTransport()
    {
        return view('front.airport_transport', get_defined_vars());
    }

    public function cruiseTransport()
    {
        return view('front.cruise_transport', get_defined_vars());
    }

    public function faq()
    {
        return view('front.faq', get_defined_vars());
    }

    public function contact()
    {
        return view('front.contact', get_defined_vars());
    }

    public function getAQuote()
    {
        return view('front.get-a-quote', get_defined_vars());
    }

    public function booking(Request $req)
    {
        $booking = [];
        $booking['uuid'] = bookingUUID();
        $booking['from'] = $req->from_location ?? null;
        $booking['from_lat'] = $req->slat ?? null;
        $booking['from_long'] = $req->slon ?? null;
        $booking['to'] = $req->to_location ?? null;
        $booking['to_lat'] = $req->elat ?? null;
        $booking['to_long'] = $req->elon ?? null;
        $booking['flight_no'] = $req->flight_no ?? null;
        $booking['arrival_from'] = $req->arrival_from ?? null;
        $booking['airline'] = $req->airline ?? null;
        $booking['meeting_point'] = $req->meeting_point ?? null;
        $booking['ship_name'] = $req->ship_name ?? null;
        $booking['direction'] = $req->direction ?? null;
        $booking['pickup_datetime'] = Carbon::parse($req->pickup_date.' '.$req->pickup_time);
        if ($req->direction == "2") {
            $booking['return_datetime'] = Carbon::parse($req->return_date.' '.$req->return_time);
        }
        $booking['vehicle_type'] = $req->vehicle_type ?? null;
        $booking['passenger'] = (int)$req->passengers ?? null;
        $booking['large_cases'] = (int)$req->large_cases ?? null;
        $booking['small_cases'] = (int)$req->small_cases ?? null;
        $booking['payment_method'] = $req->payment_method ?? null;
        $booking['phone'] = $req->phone ?? null;
        $booking['name'] = $req->name ?? null;
        $booking['email'] = $req->email ?? null;
        $booking['instruction'] = $req->instruction ?? null;
        $booking['fare'] = $req->fare ?? null;

        if ($req->payment_method == "3") {
            session()->forget('booking');
            session(['booking' => $booking]);

            return redirect()->route('payment');
        } else {
            session(['booking_done' => true]);
            $book = Booking::create($booking);

            $details = [
                'id' => $book->id,
                'action' => 'submit',
            ];

            $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

            dispatch($job);

            return redirect()->route('thankyou');
        }
    }

    public function thankYou()
    {
        if (is_null(session('booking_done'))) {
            return redirect()->route('home');
        }

        return view('front.thankyou', get_defined_vars());
    }

    public function payment()
    {
        if (is_null(session('booking'))) {
            return redirect()->route('get.quote');
        }

        $booking = (object)session('booking');
        return view('front.payment', get_defined_vars());
    }

    public function paymentSave(Request $req)
    {
        if (is_null(session('booking'))) {
            return redirect()->route('get.quote');
        }

        $booking = session('booking');
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = \Stripe\Charge::create(array(
                "amount" => $booking['fare'] * 100,
                "currency" => "gbp",
                "description" => "Ride Book",
                "source" => $req->stripeToken,
            ));

            if ($charge) {

                session(['booking_done' => true]);
                $book = Booking::create($booking);

                $transaction = Transaction::create([
                    'booking_id' => $book->id,
                    'stripe_charge_id' => $charge->id,
                    'amount' => $booking['fare'],
                ]);

                $details = [
                    'id' => $book->id,
                    'action' => 'submit',
                ];

                $job = (new SendQueueEmail($details))->delay(now()->addSeconds(2));

                dispatch($job);

                session()->forget('booking');
            }

        } catch(\Stripe\Error\Card $e) {
            dd($e->getMessage());
        } catch(\Stripe\Error\InvalidRequest $e) {
            dd($e->getMessage());
        }

        return redirect()->route('thankyou');
    }

    public function contactSave(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $enq = new ContactEnquiry();
        $enq->name = $req->name;
        $enq->email = $req->email;
        $enq->phone = $req->phone;
        $enq->subject = $req->subject;
        $enq->message = $req->message;
        $enq->save();

        return redirect()->back();
    }
}
