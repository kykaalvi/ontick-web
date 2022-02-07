<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateordersRequest;
use App\Http\Requests\UpdateordersRequest;
use App\Repositories\ordersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\orders;
use Flash;
use Response;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Mail;

use App\Mail\ShiftMail;

class ordersController extends AppBaseController
{
    /** @var  ordersRepository */
    private $ordersRepository;
    private $quota;
    private $lock;
    private $price;
    public function __construct(ordersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
        $this->quota = 78;
        $this->lock = true;
        $this->price = 25000;
    }

    /**
     * Show Order Form
     *
     * @param int $id
     *
     * @return Response
     */
    public function order()
    {
        $open = false;
        $date_open = strtotime('2020-01-30 19:30:00');
        //$date_now = date('Y-m-d H:i:s');
        $date_now = time();
        // /*
        if ($date_open > $date_now and $this->lock == true) {
            $page = 'layouts.themes.wenseul.includes.coming';
        } else {
            $peserta = Orders::select('people')
                ->where('payment_confirm', '!=', '2')
                ->where('id', '>', '23')
                ->where('id', '!=', '73')
                ->sum('people');
            if ($peserta >= 180) {
                $page = 'layouts.themes.wenseul.includes.close';
            } else {
                $page = 'layouts.themes.wenseul.includes.transfer';
            }
        }
        // */
        return view('layouts.themes.wenseul.base', compact('page', 'open'));
    }
    /**
     * Show Order Form
     *
     * @param int $id
     *
     * @return Response
     */
    public function transfer()
    {
        $page = 'layouts.themes.wenseul.includes.transfer';
        return view('layouts.themes.wenseul.base', compact('page'));
    }
    /**
     * Show Order Payment Confirm
     *
     * @param string $hash
     *
     * @return Response
     */
    public function orderConfirm($hash)
    {
        $data = orders::where('hash', $hash)->first();
        if (empty($data)) {
            return abort(404);
        } else {
            if ($data->payment_confirm == 1 || $data->payment_confirm == 3)
                $page = 'layouts.themes.wenseul.includes.finish';
            else if ($data->payment_confirm == 2)
                $page = 'layouts.themes.wenseul.includes.cancelled';
            else if ($data->payment_confirm == 0)
                $page = 'layouts.themes.wenseul.includes.confirm';
            return view('layouts.themes.wenseul.base', compact('page', 'data'));
        }
    }
    /**
     * Show Order Payment Confirm
     *
     * @param string $hash
     *
     * @return Response
     */
    public function orderShift($hash)
    {
        $data = orders::where('hash', $hash)->first();
        if (empty($data)) {
            return abort(404);
        } else {
            $data->jml_shift = Orders::selectRaw('shift, SUM(people) as jml')
                ->where('id', '>', '23')
                ->where('id', '!=', '73')
                ->whereNotNull('shift')
                ->groupBy('shift')
                ->orderBy('shift')
                ->get();
            if (($data->payment_confirm == 1 || $data->payment_confirm == 3) && empty($data->shift)) {
                $page = 'layouts.themes.wenseul.includes.shift';
            } else if (!empty($data->shift)) {
                $page = 'layouts.themes.wenseul.includes.finishshift';
            } else return abort(404);
            return view('layouts.themes.wenseul.base', compact('page', 'data'));
        }
    }
    /**
     * Confirm Order
     *
     * @param Request $request
     *
     * @return Response
     */
    public function submitShift(Request $request)
    {
        $validasi = $this->validate($request, [
            'shift' => 'required',
            'hash' => 'required',
            'alternate_shift' => 'required',
        ], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        $orders = orders::where('hash', $request->get('hash'))
            ->update(['shift' => $request->shift, 'alternate_shift' => $request->alternate_shift]);
        if ($orders) {
            return redirect()->back();
        }
    }
    /**
     * Submit Form
     *
     * @param Request $request
     *
     * @return Response
     */
    public function submit(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'people' => 'required',
            'bucin' => 'required',
            'sendername' => 'required',
            'shift_form' => 'required',
            'day_form' => 'required',
            'tfslip' => 'required|file|image|mimes:jpeg,png,jpg,bmp,tiff|max:3048',
        ], $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'Only jpg, png are allowed.'
        ]);
        $bucin = '';
        if (is_array($request->bucin)) {
            if (count($request->bucin) == 2) {
                $bucin = "Yerene";
            } else {
                $bucin = $request->bucin[0];
            }
        } else $bucin = $request->bucin;
        $harga = $this->price * $request->people;
        if (!empty($request->ganci_form) && $request->ganci_form == 1) {
            $ganci = 10000 * $request->people;
        } else {
            $ganci = 0;
        }
        $keterangan = (!empty($request->member_1) ? "Irene : {$request->member_1}, " : '') . (!empty($request->member_2) ? "Yeri : {$request->member_2}" : '');
        $harga = $harga + $ganci;
        //echo $keterangan;
        //dd($request);

        $hash = strtoupper(str_random(8));
        $ticket_id = "YRN" . strtoupper(str_random(9));
        $file = $request->file('tfslip');
        $name_masked = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
        $file->storeAs('payments', $name_masked);
        $data = [
            'name' => $request->full_name,
            'hash' => $hash,
            'ticket_id' => $ticket_id,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'bucin' => $bucin,
            'people' => $request->people,
            'total' => $harga,
            'sender_name' => $request->sendername,
            'payment_slip' => $name_masked,
            'shift' => $request->shift_form,
            'extra' => $request->ganci_form,
            'day' => $request->day_form,
            'keterangan' => $keterangan,
            'payment_confirm' => 3
        ];
        $orders = orders::create($data);
        if ($orders) {
            $datas = [
                'nama' => $orders->name
            ];
            $subject = "Entre En Fleur - Konfirmasi RSVP";
            $toEmail = $orders->email;
            Mail::to($toEmail)
                ->send(new ShiftMail($datas, $subject, "emails.rsvp_confirm"));
            return redirect('order/' . $data['hash']);
        }
    }

    /**
     * Confirm Order
     *
     * @param Request $request
     *
     * @return Response
     */
    public function confirm(Request $request)
    {
        $validasi = $this->validate($request, [
            'hash' => 'required',
            'sendername' => 'required',
            'tfslip' => 'required|file|image|mimes:jpeg,png,jpg,bmp,tiff|max:3048',
        ], $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'Only jpg, png are allowed.'
        ]);
        $file = $request->file('tfslip');
        $name_masked = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
        $file->storeAs('payments', $name_masked);
        $orders = orders::where('hash', $request->get('hash'))
            ->update(['sender_name' => $request->get('sendername'), 'payment_slip' => $name_masked, 'payment_confirm' => 3]);
        if ($orders) {
            return redirect()->back();
        }
    }
}
