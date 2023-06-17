<?php

namespace App\Http\Livewire;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class RestaurantOrder extends Component
{
    public function render()
    {
        $value = Session::get('guestIdentifier');
        $items = \Cart::session($value)->getContent();
        return view('livewire.restaurant-order', compact('items'));
    }

    private function removeQuantity()
    {
        Session::put('product_quantities', []);
    }

    public function restaurantOrder(CheckoutRequest $request)
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
            $userUniqeNum = str_pad($latestOrder->id + 1, 5, "0", STR_PAD_LEFT);
    
            $request['order_number'] = 'ORD_' . date('Y') . "_" . $userUniqeNum;
            $request['order_amount'] = $getTotal;
            $request['order_status'] = "pending";
            $request['order_traking_number'] = $userUniqeNum;
    
            $order = Order::create($request->all());

            foreach($items as $item){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'product_price' => $item->price,
                    'product_quantity' => $item->quantity,
                ]);
            }
    
            $userSession->clear();
            $this->removeQuantity();
    
            $message = 'شكراً لك على تعاونك تم ارسال الطلب بنجاح.<br> يمكنك متابعة حالة الطلب من خلال هذا الرقم ' . '<a href="' . $userUniqeNum . '">' . $userUniqeNum . '</a>';
            Alert::html('نجاح', $message, 'success');
            return redirect()->route('front');
        }catch(Exception $e){
            toast('حدث خطأ أثناء طلب المنتج. الرجاء المحاولة مرة أخرى.','error')->position('top-end');
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
