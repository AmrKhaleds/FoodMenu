<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeliveryRequest;
use App\Http\Requests\RestaurantRequest;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Place;
use App\Models\Product;
use App\Models\Room;
use App\Models\Table;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public function index()
    {
        $value = Session::get('guestIdentifier');
        $items = \Cart::session($value)->getContent();
        return view('front.checkout', compact('items'));
    }

    private function removeQuantity()
    {
        Session::put('product_quantities', []);
    }

    public function deliveryOrder(DeliveryRequest $request)
    {
        try{
            $latestOrder = Order::orderBy('created_at', 'DESC')->first();
            $getUserSession = Session::get('guestIdentifier');
            $userSession = \Cart::session($getUserSession);
            $getTotal = $userSession->getTotal();
            $items = $userSession->getContent();
            if(count($items) == 0){
                toast('يرجى اختيار منتج واحد على الأقل لإكمال الطلب','error')->position('top-end');
                return redirect()->route('front');
            }
            $userUniqeNum = str_pad($latestOrder == null ? 0 : $latestOrder->id + 1, 5, "0", STR_PAD_LEFT);
    
            $request['order_number'] = 'ORD_' . date('Y') . "_" . $userUniqeNum;
            $request['order_amount'] = $getTotal;
            $request['order_status'] = "pending";
            $request['order_traking_number'] = $userUniqeNum;

            $city_id = intval($request['order_user_city']);
            $place_id = intval($request['order_user_place']);
            $cityInfo = City::find($city_id);
            $placeInfo = Place::find($place_id);
            $request['order_user_city'] = $cityInfo->name;
            $request['order_user_place'] = $placeInfo->name;
            
            $order = Order::create($request->all());

            foreach($items as $item){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'product_price' => $item->price,
                    'product_quantity' => $item->quantity,
                ]);
                $product = Product::find($item->id);
                $product->decrement('quantity', $item->quantity);
            }
    
            $userSession->clear();
            $this->removeQuantity();
    
            $message = 'شكراً لك على تعاونك تم ارسال الطلب بنجاح.<br> يمكنك متابعة حالة الطلب من خلال هذا الرقم ' . '<a href="' . url('order-track?order_tracking_number=' . $userUniqeNum) . '">' . $userUniqeNum . '</a>';
            Alert::html('نجاح', $message, 'success')->autoClose(null);
            return redirect()->route('front');
        }catch(Exception $e){
            dd($e);
            toast('حدث خطأ أثناء طلب المنتج. الرجاء المحاولة مرة أخرى.','error')->position('top-end');
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function restaurantOrder(RestaurantRequest $request)
    {
        try{
            $latestOrder = Order::orderBy('created_at', 'DESC')->first();
            $getUserSession = Session::get('guestIdentifier');
            $userSession = \Cart::session($getUserSession);
            $getTotal = $userSession->getTotal();
            $items = $userSession->getContent();
            if(count($items) == 0){
                toast('يرجى اختيار منتج واحد على الأقل لإكمال الطلب','error')->position('top-end');
                return redirect()->route('front');
            }
            $userUniqeNum = str_pad($latestOrder == null ? 0 : $latestOrder->id + 1, 5, "0", STR_PAD_LEFT);
    
            $request['order_number'] = 'ORD_' . date('Y') . "_" . $userUniqeNum;
            $request['order_amount'] = $getTotal;
            $request['order_status'] = "pending";
            $request['order_traking_number'] = $userUniqeNum;
            $request['order_type'] = 'resturant';

            $room_id = intval($request['room_number']);
            $table_id = intval($request['table_number']);

            $roomInfo = Room::find($room_id);
            $tableInfo = Table::find($table_id);
            $request['room_number'] = $roomInfo->name;
            $request['table_number'] = $tableInfo->name;
            

            $order = Order::create($request->all());

            foreach($items as $item){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'product_price' => $item->price,
                    'product_quantity' => $item->quantity,
                ]);
                $product = Product::find($item->id);
                $product->decrement('quantity', $item->quantity);
            }
    
            $userSession->clear();
            $this->removeQuantity();
    
            $message = 'شكراً لك على تعاونك تم ارسال الطلب بنجاح.<br> يمكنك متابعة حالة الطلب من خلال هذا الرقم ' . '<a href="' . url('order-track?order_tracking_number=' . $userUniqeNum) . '">' . $userUniqeNum . '</a>';
            Alert::html('نجاح', $message, 'success')->autoClose(null);
            return redirect()->route('front');
        }catch(Exception $e){
            dd($e);
            toast('حدث خطأ أثناء طلب المنتج. الرجاء المحاولة مرة أخرى.','error')->position('top-end');
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
