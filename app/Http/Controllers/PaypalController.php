<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Bus;
use App\Models\Faq;
use App\Models\User;
use App\Models\About;
use PayPal\Api\Payer;
use App\Models\Guests;
use App\Models\Navbar;
use App\Models\Slider;
use PayPal\Api\Amount;
use App\Models\Booking;
use App\Models\BusTrip;
use App\Models\busType;
use App\Models\Contact;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use App\Models\makeYourBooking;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;

class PaypalController extends Controller
{
    public function index($bustrip,$seat,$total_amount,$bus,$confirm_code)
   {
    // echo($b);
    // echo($seat);
    // dd($bustrip);
    // $sume = 15;
    // dd($booking_date);

    $desc = $bustrip.'~'.$seat.'~'.$bus.'~'.$confirm_code;
    $apiContext = new ApiContext(
        new OAuthTokenCredential(
            'AaVryo9wE0Zm65N2z1BC_yHOTrfAUsRW81OUSLFtSHGAhDeBNR81Cz7-RUercxOHUmRy8nKCLoggSIB9',
            'EKmqzscYKVOnDNxSnGv0UVO7kwWsHzuoHVlsyGD11081TvQzHSggBeXskfU3DCY3_2dirolW9NGC7R2T'
        )
    );

    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    // dd($payer);
    // Set redirect URLs
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(route('paypal.success'))
        ->setCancelUrl(route('paypal.cancel'));
    // dd($redirectUrls);
    // Set payment amount
    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal($total_amount);


    // Set transaction object
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setDescription($desc);
    //   dd($transaction);
    // Create the full payment object
    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
    // dd($payment);
    // Create payment with valid API context
    try {

        $payment->create($apiContext);
        // dd($payment);
        // Get PayPal redirect URL and redirect the customer
        // $approvalUrl =
        return redirect($payment->getApprovalLink());
        // dd($approvalUrl);
        // Redirect the customer to $approvalUrl
    } catch (PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
    } catch (Exception $ex) {
        die($ex);
    }
   }

   public function indexWithReturn($bustrip,$return_busstrip,$seat,$total_amount,$bus,$return_bus,$return_seats,$confirm_code)
   {
    // echo($b);
    // echo($seat);
    // dd($bustrip);
    // $sume = 15;
    // dd($booking_date);

    $desc = $bustrip.'~'.$return_busstrip.'~'.$seat.'~'.$bus.'~'.$return_bus.'~'.$return_seats.'~'.$confirm_code;
    $apiContext = new ApiContext(
        new OAuthTokenCredential(
            'AaVryo9wE0Zm65N2z1BC_yHOTrfAUsRW81OUSLFtSHGAhDeBNR81Cz7-RUercxOHUmRy8nKCLoggSIB9',
            'EKmqzscYKVOnDNxSnGv0UVO7kwWsHzuoHVlsyGD11081TvQzHSggBeXskfU3DCY3_2dirolW9NGC7R2T'
        )
    );

    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    // dd($payer);
    // Set redirect URLs
    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(route('paypal.success'))
        ->setCancelUrl(route('paypal.cancel'));
    // dd($redirectUrls);
    // Set payment amount
    $amount = new Amount();
    $amount->setCurrency("USD")
        ->setTotal($total_amount);


    // Set transaction object
    $transaction = new Transaction();
    $transaction->setAmount($amount)
        ->setDescription($desc);
    //   dd($transaction);
    // Create the full payment object
    $payment = new Payment();
    $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));
    // dd($payment);
    // Create payment with valid API context
    try {

        $payment->create($apiContext);
        // dd($payment);
        // Get PayPal redirect URL and redirect the customer
        // $approvalUrl =
        return redirect($payment->getApprovalLink());
        // dd($approvalUrl);
        // Redirect the customer to $approvalUrl
    } catch (PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
    } catch (Exception $ex) {
        die($ex);
    }
   }

  public function success(Request $request)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential(
            'AaVryo9wE0Zm65N2z1BC_yHOTrfAUsRW81OUSLFtSHGAhDeBNR81Cz7-RUercxOHUmRy8nKCLoggSIB9',
            'EKmqzscYKVOnDNxSnGv0UVO7kwWsHzuoHVlsyGD11081TvQzHSggBeXskfU3DCY3_2dirolW9NGC7R2T'
        )
    );

    // Get payment object by passing paymentId
    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);
    $payerId = $_GET['PayerID'];

    // Execute payment with payer ID
    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

    try {
        // Execute payment
        $result = $payment->execute($execution, $apiContext);
        // dd($result);
         //dump($result->transactions[0]->description);
        $return_bus_id = null;
        $return_bustrip_id = null;
        if($request->session()->get('return_bus_id') != null){
          $str = $result->transactions[0]->description;
            $splt = explode("~",$str);
            $bustrip_id = $splt[0];
            $return_bustrip_id = $splt[1];
            $seat       = $splt[2];
            $bus_id        = $splt[3];
            $return_bus_id        = $splt[4];
            $return_seats = $splt[5];
            $confirm_code = $splt[6];
            $total_amount =$result->transactions[0]->amount->total;
        }
        else{
            $str = $result->transactions[0]->description;
            $splt = explode("~",$str);
            $bustrip_id = $splt[0];
            $seat       = $splt[1];
            $bus_id        = $splt[2];
            $confirm_code = $splt[3];
            $total_amount =$result->transactions[0]->amount->total;
        }
            //   dd($return_seats);
            // dd($request->session()->get('price'));

            $bustrip = BusTrip::where(['id'=> $bustrip_id,'bus_id'=> $bus_id])->first();

            if($return_bus_id != null){

            $return_bustrip = BusTrip::where(['id'=> $return_bustrip_id,'bus_id'=> $return_bus_id])->first();
            }

            $bustrip->save();

            if(Auth::user() != null){


                //Trip Without return------------------------------------------------------


                // $bustrip->status = 0;



                $find_bus_trip = BusTrip::findorfail($bustrip->id);
                $total_left_seats = $find_bus_trip->left_seat - $seat;
                $find_bus_trip->left_seat = $total_left_seats;
                $find_bus_trip->save();

                if($return_bus_id != null){
                $find_return_bus_trip = BusTrip::findorfail($return_bustrip->id);
                $total_left_seats = $find_return_bus_trip->left_seat - $return_seats;
                $find_return_bus_trip->left_seat = $total_left_seats;
                $find_return_bus_trip->save();
                }

                //-------------------------------------------------------------------------

                //Trip Without Return ------- Booking--------------------------------------

                $booking = new Booking;
                $booking->booking_no = 'PK-'.mt_rand(100000,999999).Auth::user()->id;
                $booking->seat_no =  $seat;
                $booking->total_price = $request->session()->get('price');
                $booking->booking_date = Carbon::now();
                $booking->user_id = Auth::user()->id;
                $booking->bustrip_id = $bustrip->id;
                $booking->confirmation_code = $confirm_code;
                $booking->status = 1;
                $booking->save();


                if($return_bus_id != null){
                $booking_return = new Booking;
                $booking_return->booking_no = 'RETURN-PK-'.mt_rand(100000,999999).Auth::user()->id;
                $booking_return->seat_no =  $return_seats;
                $booking_return->total_price = $request->session()->get('priceR');
                $booking_return->booking_date = Carbon::now();
                $booking_return->user_id = Auth::user()->id;
                $booking_return->bustrip_id =$return_bustrip->id;
                $booking_return->confirmation_code = $confirm_code;
                $booking_return->status = 1;
                $booking_return->save();
                }

                $user = Auth::user();
                $buses = Bus::where('id',$bus_id)->first();
                $navbar= Navbar::first();
                $slider = Slider::all();
                $makeBook = makeYourBooking::first();
                $about = About::all();
                $contact = Contact::all();
                $bustype =busType::all();
                $faq = Faq::where('active',1)->get();
                $subject = "Booking Confirmation";
                if($return_bus_id != null){
                    $message = " Name:".$user->name."\n"." "."Booking No : ".$booking->booking_no."\n"." "."Return Booking No : ".$booking_return->booking_no."\n"."
                    "."Trip date :".$bustrip->pickup_date."  Trip time :".$bustrip->pickup_time."\n"." "."Trip Drop Of Date : ".$bustrip->drop_off_date."  Trip drop of time : ".$bustrip->drop_off_time."\n"."
                    "."Return Trip date :".$bustrip->pickup_date." Return Trip time :".$bustrip->pickup_time."\n"." "."Return Trip Drop Of Date : ".$bustrip->drop_off_date." Return Trip drop of time : ".$bustrip->drop_off_time."\n"." "."Return No of Seat : ".$return_seats."\n"." "."No of Seat : ".$seat;
                }
                else{
                    $message = " Name:".$user->name."\n"." "."Booking No : ".$booking->booking_no."\n"." "."Trip date :".$bustrip->pickup_date."  Trip time :".$bustrip->pickup_time."\n"." "."Trip Drop Of Date : ".$bustrip->drop_off_date."  Trip drop of time : ".$bustrip->drop_off_time."\n"." "."No of Seat : ".$seat;
                    // dd($message);
                }
                // dd($message);
                      //----------------------------------------------------------------------------

            }

            else{

                //Trip With return
                // $bustrip->status = 0;

                // dd($bustrip);
                // dd($seat);

                $find_bus_trip = BusTrip::findorfail($bustrip->id);
                $total_left_seats = $find_bus_trip->left_seat - $seat;
                $find_bus_trip->left_seat = $total_left_seats;
                $find_bus_trip->save();

                if($return_bus_id != null){
                $find_return_bus_trip = BusTrip::findorfail($return_bustrip->id);
                $total_left_seats = $find_return_bus_trip->left_seat - $seat;
                $find_return_bus_trip->left_seat = $total_left_seats;
                $find_return_bus_trip->save();
                }

                //--------------------------------------------------------------------------
                $get_guest = Guests::findorfail($request->session()->get('user_id'));


                //Trip With Return ------- Booking--------------------------------------------

                // dd($bus_id);

                $booking = new Booking;
                $booking->booking_no = 'PK-'.mt_rand(100000,999999).$get_guest->id;
                $booking->seat_no =  $seat;
                $booking->total_price = $request->session()->get('price');
                $booking->booking_date = Carbon::now();
                $booking->guest_id = $get_guest->id;
                $booking->bustrip_id =$bustrip->id;
                $booking->confirmation_code = $confirm_code;
                $booking->status = 1;
                $booking->save();

                // dump($booking);

                if($return_bus_id != null){

                $booking_return = new Booking;
                $booking_return->booking_no = 'RETURN-PK-'.mt_rand(100000,999999).$get_guest->id;
                $booking_return->seat_no =  $return_seats;
                $booking_return->total_price = $request->session()->get('priceR');
                $booking_return->booking_date = Carbon::now();
                $booking_return->guest_id = $get_guest->id;
                $booking_return->bustrip_id =$return_bustrip->id;
                $booking_return->confirmation_code = $confirm_code;
                $booking_return->status = 1;
                $booking_return->save();
                }

                // dd($booking_return);

                $user = $get_guest;
                $buses = Bus::where('id',$bus_id)->first();
                $navbar= Navbar::first();
                $slider = Slider::all();
                $makeBook = makeYourBooking::first();
                $about = About::all();
                $contact = Contact::all();
                $bustype =busType::all();
                $faq = Faq::where('active',1)->get();
                $subject = "Booking Trip With Return Confirmation";
                if($return_bus_id != null){
                    $message = " Name:".$get_guest->name."\n"." "."Booking No : ".$booking->booking_no."\n"." "."Return Booking No : ".$booking_return->booking_no."\n"."
                    "."Trip date :".$bustrip->pickup_date."  Trip time :".$bustrip->pickup_time."\n"." "."Trip Drop Of Date : ".$bustrip->drop_off_date."  Trip drop of time : ".$bustrip->drop_off_time."\n"."
                    "."Return Trip date :".$bustrip->pickup_date." Return Trip time :".$bustrip->pickup_time."\n"." "."Return Trip Drop Of Date : ".$bustrip->drop_off_date." Return Trip drop of time : ".$bustrip->drop_off_time."\n"." "."No of Seat : ".$seat;
                }
                else{
                    $message = " Name:".$get_guest->name."\n"." "."Booking No : ".$booking->booking_no."\n"." "."Trip date :".$bustrip->pickup_date."  Trip time :".$bustrip->pickup_time."\n"." "."Trip Drop Of Date : ".$bustrip->drop_off_date."  Trip drop of time : ".$bustrip->drop_off_time."\n"." "."No of Seat : ".$seat;
                    // dd($message);
                }
                // dd($message);
            }
            //----------------------------------------------------------------------------


            // Mail::to($user->email)->send($message);
    $retval = mail ($user->email,$subject,$message);


    if($return_bus_id != null){
    return view('frontend.schedule-trips3',compact('buses','navbar','slider','makeBook','about','contact','bustype','faq','booking','booking_return','bustrip','user','seat','return_seats'));
    }
    else{
        return view('frontend.schedule-trips3',compact('buses','navbar','slider','makeBook','about','contact','bustype','faq','booking','bustrip','user','seat'));
    }

    } catch (PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
    } catch (Exception $ex) {
        die($ex);
    }
}

  public function cancel()
{
        dd('payment cancel');
}

}
