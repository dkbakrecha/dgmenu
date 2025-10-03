<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessItem;
use App\Models\MenuSection;
use App\Models\Room;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class RoomController extends Controller
{
    public function create()
    {
        $_user_id = Auth::user()->id;

        $business = Business::where('user_id', $_user_id)->firstOrFail();
        $room = Room::where('user_id', $_user_id)->max('room_number');

        $roomData = new Room;
        $roomData->user_id = $_user_id;
        $roomData->business_id = $business->id;
        $roomData->room_number = (!empty($room)) ? $room + 1 : 1;
        $roomData->save();

        return redirect()->route('roomList')->with('message', 'Room created successfully');
    }

    public function index()
    {
        $rooms = Room::where('user_id', Auth::user()->id)->get();

        if (count($rooms) == 0) {
            return redirect()->route('createRoom');
        }

        return view('business.room', compact('rooms'));
    }

    public function view($id)
    {
        if (!empty($id)) {
            $idData = base64_decode($id);
            $idArr = explode('--', $idData);

            $_room_id = $idArr[0]; //[1] = Business ID
        }

        $roomSpace = Room::where('id', $_room_id)->firstOrFail();
        $pgBusiness = Business::whereId($roomSpace->business_id)->first();
        $pgBbusinessItem = BusinessItem::where('business_id', $roomSpace->business_id)->first();
        $pgMenuSections = MenuSection::where('user_id', $roomSpace->user_id)->with('items')->get();

        $businessThemes = [
            'default' => 'Default',
            'minimenu' => 'Mini Menu',
            'black-cafe' => 'Black Cafe',
            'cream-blue' => 'Cream Blue',
            'mercury-menu' => 'Mercury Menu',
            'big-moon' => 'Big Moon',
            'black-board' => 'Black Board',
            'blood-red' => 'Bloody Red'
        ];

        //dd($businessThemes);
        return view('business.view', compact('roomSpace', 'pgBusiness', 'pgBbusinessItem', 'pgMenuSections', 'businessThemes', 'id'));
    }


    public function menu_view($id)
    {
        if (!empty($id)) {
            $idData = base64_decode($id);
            $idArr = explode('--', $idData);

            $_room_id = $idArr[0]; //[1] = Business ID
        }

        $roomSpace = Room::where('id', $_room_id)->firstOrFail();
        //dd($roomSpace->business_id);
        $pgBusiness = Business::whereId($roomSpace->business_id)->first();
        $pgBbusinessItem = BusinessItem::where('business_id', $roomSpace->business_id)->first();
        $pgMenuSections = MenuSection::where('user_id', $roomSpace->user_id)->with('items')->get();


        $businessThemes = [
            'default' => 'Default',
            'minimenu' => 'Mini Menu',
            'black-cafe' => 'Black Cafe',
            'cream-blue' => 'Cream Blue',
            'mercury-menu' => 'Mercury Menu',
            'big-moon' => 'Big Moon',
            'black-board' => 'Black Board',
            'blood-red' => 'Bloody Red'
        ];

        return view('business.view', compact('roomSpace', 'pgBusiness', 'pgBbusinessItem', 'pgMenuSections', 'businessThemes', 'id'));
    }

    // Generate PDF
    public function createPDF($id)
    {
        $room = Room::where('id', $id)->with('Business')->first()->toArray();
        //dd($room);
        // share data to view
        view()->share('room', $room);
        $pdf = Pdf::loadView('business.pdf_view', $room);
        $pdf->setPaper('A4', 'portrait');
        //print_r($pdf);
        //exit;
        // download PDF file with download method
        return $pdf->download('menu_qr.pdf');
    }
}
