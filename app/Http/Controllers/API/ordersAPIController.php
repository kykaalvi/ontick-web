<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateordersAPIRequest;
use App\Http\Requests\API\UpdateordersAPIRequest;
use App\Models\orders;
use App\Repositories\ordersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use Yajra\Datatables\Datatables;
use Session;
use Carbon\Carbon;
use Auth;

/**
 * Class ordersController
 * @package App\Http\Controllers\API
 */

class ordersAPIController extends AppBaseController
{
    /** @var  ordersRepository */
    private $ordersRepository;

    public function __construct(ordersRepository $ordersRepo)
    {
        $this->ordersRepository = $ordersRepo;
    }
    public function query()
    {
        $orders = orders::query();
        return $orders;
    }
    /**
     * Display a listing of the orders.
     * GET|HEAD /orders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orders = Datatables::of($this->query())->make(true);
        return $orders;
    }
    public function shift(Request $request)
    {
        $total_shift = Orders::selectRaw('shift, SUM(people) as jml')
            ->where('day', $request->day)
            ->whereNotNull('shift')
            ->groupBy('shift')
            ->orderBy('shift')
            ->get();
        $result = [];
        foreach ($total_shift as $shift) {
            //$dt_shift = (!empty($shift) ? $shift->jml : 0);
            //$sisa = 88 - $dt_shift;
            //$name = ($shift->shift == 1 ? "SHIFT 1 : 11.00 - 13.00" : "SHIFT 2 : 14.00 - 16.00");
            //$result[$shift->shift] = ['name' => $name, 'total' => $dt_shift, 'left' => $sisa];
            $result[$shift->shift] = $shift;
        }
        $shift_1 = (!empty($result[1]) ? $result[1]->jml : 0);
        $shift_2 = (!empty($result[2]) ? $result[2]->jml : 0);
        $sisa_1 = 10 - $shift_1;
        $sisa_2 = 10 - $shift_2;
        //dd($total_shift);
        return [
            1 => ['name' => "SHIFT 1 : 11.00 - 13.00", 'total' => $shift_1, 'left' => $sisa_1],
            2 => ['name' => "SHIFT 2 : 14.00 - 16.00", 'total' => $shift_2, 'left' => $sisa_2]
        ];
    }
    public function next(Request $request)
    {
        if (!Session::has('step') and $request->get('step') == 2) {
            Session::put('step', $request->get('step'));
        } else {
            if (Session::has('stepfinish')) {
                Session::forget('stepfinish');
            }
            Session::forget('step');
        }
        return $request->get('step');
    }
    public function action(Request $request)
    {
        $act = [1, 2, 4];
        if (in_array($request->action, $act)) {
            $test = orders::where('id', $request->id)->update([
                'payment_confirm' => $request->action,
                'payment_confirm_date' => Carbon::now(), 'payment_confirm_admin' => Auth::user()->id
            ]);
            return $test;
        }
        return abort(404);
    }
    public function view(Request $request)
    {
        $test = orders::where('id', $request->id)->first();
        return $test;
    }
    /**
     * Store a newly created orders in storage.
     * POST /orders
     *
     * @param CreateordersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateordersAPIRequest $request)
    {
        $input = $request->all();

        $orders = $this->ordersRepository->create($input);

        return $this->sendResponse($orders->toArray(), 'Orders saved successfully');
    }

    /**
     * Display the specified orders.
     * GET|HEAD /orders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var orders $orders */
        $orders = $this->ordersRepository->find($id);

        if (empty($orders)) {
            return $this->sendError('Orders not found');
        }

        return $this->sendResponse($orders->toArray(), 'Orders retrieved successfully');
    }

    /**
     * Update the specified orders in storage.
     * PUT/PATCH /orders/{id}
     *
     * @param int $id
     * @param UpdateordersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateordersAPIRequest $request)
    {
        $input = $request->all();

        /** @var orders $orders */
        $orders = $this->ordersRepository->find($id);

        if (empty($orders)) {
            return $this->sendError('Orders not found');
        }

        $orders = $this->ordersRepository->update($input, $id);

        return $this->sendResponse($orders->toArray(), 'orders updated successfully');
    }

    /**
     * Remove the specified orders from storage.
     * DELETE /orders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var orders $orders */
        $orders = $this->ordersRepository->find($id);

        if (empty($orders)) {
            return $this->sendError('Orders not found');
        }

        $orders->delete();

        return $this->sendResponse($id, 'Orders deleted successfully');
    }
    public function getkota(Request $request)
    {
        $id = $request->id;
        $url = "https://api.rajaongkir.com/starter/city";
        $data = ['province' => $id];
        $query_string = http_build_query($data);
        if (!empty($data)) {
            $url .= "?" . $query_string;
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: c0ac01c5ca57815cba4d473cda8f0a5f"
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $result_tmp = json_decode($response);
        $result = [];
        $result['code'] = $result_tmp->rajaongkir->status->code;
        $result['message'] = $result_tmp->rajaongkir->status->description;
        $result['data'] = null;
        if (!$err) {
            $result['data'] = $result_tmp->rajaongkir->results;
        }
        return $this->sendResponse($result['data'], 'orders updated successfully');
    }
}
