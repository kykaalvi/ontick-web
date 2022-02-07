<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use Illuminate\Support\Facades\Mail;
use App\Mail\ShiftMail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sendFeedback()
    {
        //where('payment_confirm', 1)
        $orders = Orders::where('payment_confirm', 'alvii@naver.com')
            ->whereNotNull('shift')
            //->where('id','>',52) //53 dst
            ->get();
        foreach ($orders as $order) {
            $shift_text = null;
            switch ($order->shift) {
                case 1:
                    $shift_text = '11.00-12.30';
                    break;
                case 2:
                    $shift_text = '12.50-14.20';
                    break;
                case 3:
                    $shift_text = '14.40-16.10';
                    break;
                case 4:
                    $shift_text = '08.00-Bubar';
                    break;
                default:
                    $shift_text = '';
                    break;
            }
            $data = [
                'nama' => $order->name,
                'shift_text' => $shift_text,
                'shift' => $order->shift,
                'kode' => $order->hash
            ];
            $subject = "Wenseul Universe - Konfirmasi Shift";
            $toEmail = $order->email;
            Mail::to($toEmail)
                ->send(new ShiftMail($data, $subject));
            echo 'Email has been sent to ' . $toEmail . '<br>';
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $page = 'manage.home';
        $quota = 84;
        $quota_pvt = 6;
        $total = Orders::where('id', '>', '23')
            ->where('id', '!=', '73')->count();
        $confirmed = Orders::where('payment_confirm', 1)->where('id', '>', '23')
            ->where('id', '!=', '73')->count();
        $checkin = Orders::where('payment_confirm', 4)->where('id', '>', '23')
            ->where('id', '!=', '73')->count();
        /*$unconfirmed = Orders::where('payment_confirm', 3)->where('id','>','23')
        ->where('id','!=','73')->count();
        $cancelled = Orders::where('payment_confirm', 2)->where('id','>','23')
        ->where('id','!=','73')->count();
        $waiting = Orders::where('payment_confirm', 0)->where('id','>','23')
        ->where('id','!=','73')->count();*/
        $peserta = Orders::select('people')
            ->where('payment_confirm', '!=', '2')
            ->where('id', '>', '23')
            ->where('id', '!=', '73')
            ->sum('people');
        $shift = Orders::selectRaw('shift, SUM(people) as jumlah')
            ->where('id', '>', '23')
            ->where('id', '!=', '73')
            ->whereNotNull('shift')
            ->groupBy('shift')
            ->orderBy('shift')
            ->get();
        //$start  = Orders::where('id',24)->first()->created_at;
        //$end    = Orders::orderByDesc('id')->first()->created_at;
        $bucin = Orders::select('bucin')
            ->selectRaw('sum(people) as jml_bucin')
            ->where('payment_confirm', '!=', '2')
            ->where('id', '>', '23')
            ->where('id', '!=', '73')
            ->groupBy('bucin')
            ->get();
        //$waktu = $start->diff($end)->format('%H:%I:%S');
        //->where('id','>','23') ,'waktu'=>$waktu
        //, 'unconfirmed' => $unconfirmed,
        //'waiting' => $waiting, 'cancelled' => $cancelled,
        $data = [
            'total' => $total, 'confirmed' => $confirmed, 'checkin' => $checkin, 'peserta' => $peserta, 'bucin' => $bucin, 'shift' => $shift
        ];
        return view('manage', compact('page', 'data'));
    }
    public function generateqr($id)
    {
        // $tickets = DB::table('ticket')->select('ticket_id', 'ticket.ticket_category as ticket_category', 'name')->where('ticket.id', $id)
        //     ->join('orders', 'ticket.order_id', '=', 'orders.id')
        //     ->first(); 
        $angle = 0;
        $font_ttf = public_path() . '/template/gothammed.ttf';
        $type = 2;
        switch ($type) {
            case 1:
                $cat = 'day1';

                break;
            case 2:
                $cat = 'day2';

                break;
            default:
                $cat = null;
                break;
        }
        $text = "TESTING123";
        $qrcode = QrCode::format('png')->size(302)->margin(0)->generate($text, public_path() . "/qrcodes/qr_$text.png");

        //$im = imagecreatefromjpeg('male.jpg');
        $base_ticket = imagecreatefrompng(public_path() . "/template/untitled_$cat.png");
        $qr = imagecreatefrompng(public_path() . "/qrcodes/qr_$text.png");

        // Create some colors
        if ($type == 2) {
            $color_qr = imagecolorallocate($base_ticket, 229, 172, 207);
            $color_text = imagecolorallocate($base_ticket, 255, 255, 255);
        } else {
            $color_qr = imagecolorallocate($base_ticket, 255, 255, 255);
            $color_text = imagecolorallocate($base_ticket, 229, 172, 207);
        }
        imagecopymerge(
            $base_ticket,
            $qr,
            1058,
            253,
            0,
            0,
            302,
            302,
            100
        );

        imagettftext($base_ticket,  14, 0, 1155, 575, $color_qr, $font_ttf, $text);
        //header("Content-type: application/octet-stream");
        imagettftext($base_ticket,  28, 0, 1125, 160, $color_text, $font_ttf, "Sabtu, Shift 2");
        imagettftext($base_ticket,  28, 0, 1310, 200, $color_text, $font_ttf, "2");

        header('Content-Type: image/png');
        header('Content-Disposition: inline; filename="' . str_replace(' ', '', 'Kamu') . '-' . $id . '.png');

        imagepng($base_ticket);
        imagedestroy($base_ticket);
    }
    public function test()
    {
        $page = 'layouts.themes.wenseul.includes.test';
        return view('layouts.themes.wenseul.base', compact('page'));
    }
    public function test2()
    {
        $page = 'layouts.themes.wenseul.includes.test2';
        return view('layouts.themes.wenseul.base', compact('page'));
    }
    public function test3()
    {
        $page = 'layouts.themes.wenseul.includes.test3';
        return view('layouts.themes.wenseul.base', compact('page'));
    }
}
