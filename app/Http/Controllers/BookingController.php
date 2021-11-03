<?php

namespace App\Http\Controllers;

use Alert;
use App\Mail\BookingMail;
use App\Models\AllIssueImage;
use App\Models\Booking;
use App\Models\FooterContent;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class BookingController extends Controller
{
    public function index(Request $request)
    {

        $details = DB::table('modals')->join('devices', 'devices.id', '=', 'modals.device_id')->where('modals.id', $request->modelDetials)->first();
        $issues = AllIssueImage::find($request->issue_id);
        $x = [];
        $y = [];
        foreach ($issues as $issue) {
            $x[] = $issue->issue_name;
            $y[] = $issue->issue_price;
        }
        $issue_name = implode(',', $x);
        $issue_price = implode(',', $y);
        $footers = FooterContent::all();
        $stores = Store::all();
        return view('Frontend.repairingform', compact('footers', 'details', 'issues', 'stores', 'issue_name', 'issue_price'));
    }

    public function savebooking(Request $request)
    {

        $booking = new Booking();
        $booking->store_id = $request->store_id;
        $booking->name = $request->name;
        $booking->model = $request->model;
        $booking->email = $request->email;
        $booking->number = $request->number;
        $booking->issue = $request->selected_issues;
        $booking->device = $request->device;
        $booking->message = $request->message;
        if ($booking->save()) {
            Mail::to($request->store_email)->send(new BookingMail($booking));
        }
        return response()->json([
            'message' => 'Thank You, You will be contacted by the store soon'
        ]);
    }

    public function bookingForm()
    {
        return view('Frontend.bookingForm');
    }

    public function search(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        if ($latitude && $longitude) {
            //Get Outlets in lat long
            $outlets = DB::table("stores");
            $outlets = $outlets->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"));
            $outlets = $outlets->orderBy('distance', 'asc')->get();
        } else {
            $outlets = Store::all();
        }
        return response()->json($outlets);
    }
}
