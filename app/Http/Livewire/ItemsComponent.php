<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ItemsComponent extends Component
{
    public $subTotal;
    public $userSession;
    public $quantities = [];
    public $selectedCategory;
    public $filteredProducts;

    /**
     * Mount the Livewire component.
     *
     * @return void
     */
    public function mount()
    {
        $this->userSession = Session::get('guestIdentifier');
        $this->subTotal = \Cart::session($this->userSession)->getTotal();
        $this->quantities = Session::get('product_quantities', []);
    }
    /**
     * Add To Cart Functionality
     * @param int productId
     * 
     * @return void
     */
    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if(!$product->quantity == 0){
            if($product->offer){
                // dd("under Sale");
                $product->price = $product->getDiscountPrice();
            }
            \Cart::session($this->userSession)->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => [
                    'added_at' => Carbon::now(),
                    'photo' => $product->photo,
                ],
                'associatedModel' => '',
            ]);

            $this->quantities[$productId] = ($this->quantities[$productId] ?? 0) + 1;
            $this->updateSessionQuantities();

            $this->subTotal = \Cart::session($this->userSession)->getTotal();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "تم إضافة المنتج بنجاح"
            ]);
        }else
        {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'info',
                'message' => "لا يوجد كمية متاحة من المنتج"
            ]);
        }
    }

    /**
     * Increase the quantity of a product in the cart.
     *
     * @param int $productId The ID of the product.
     * @return void
     */
    public function increase(int $productId)
    {
        $product = Product::findOrFail($productId);
        if ($this->quantities[$productId] < $product->quantity || $this->quantities[$productId] == null) {
            \Cart::session($this->userSession)->update($productId, [
                'quantity' => 1
            ]);
            $this->quantities[$productId] = ($this->quantities[$productId] ?? 0) + 1;
            $this->subTotal = \Cart::session($this->userSession)->getTotal();
            $this->updateSessionQuantities();
        } else {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'info',
                'message' => "لا يوجد كمية متاحة من المنتج"
            ]);
        }
    }
    /**
     * Decrease the quantity of a product in the cart.
     *
     * @param int $productId The ID of the product.
     * @return void
     */
    public function decrease(int $productId)
    {
        if ($this->quantities[$productId] > 1) {
            \Cart::session($this->userSession)->update($productId, [
                'quantity' => -1
            ]);
            $this->quantities[$productId] = ($this->quantities[$productId] ?? 1) - 1;
            $this->subTotal = \Cart::session($this->userSession)->getTotal();
            $this->updateSessionQuantities();
        }
    }
    /**
     * Update the session quantities with the updated quantities array.
     *
     * @return void
     */
    private function updateSessionQuantities()
    {
        Session::put('product_quantities', $this->quantities);
    }
    /**
     * Remove From Cart Functionality
     * @param int productId
     * 
     * @return void
     */
    public function removeFromCart($productId)
    {
        // dd($this->quantities[$productId]);
        \Cart::session($this->userSession)->remove($productId);
        $this->subTotal = \Cart::session($this->userSession)->getTotal();
        // remove product form quantities
        unset($this->quantities[$productId]);
        $this->updateSessionQuantities();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "تم حذف المنتج بنجاح"
        ]);
    }


    public function category($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }
    /**
     * View Render
     * 
     * @return void
     */
    public function render()
    {
        $getContent = \Cart::session($this->userSession)->getContent();
        $subTotal = $this->subTotal;
        // $categories = Category::with('product')->where('status', true)->get();

        // Retrieve all the products based on the selected category
        if ($this->selectedCategory) {
            $this->filteredProducts = Category::with('product')->where('id', $this->selectedCategory)->where('status', true)->get();
        } else {
            $this->filteredProducts = Category::with('product')->where('status', true)->get();
        }

        // Retrieve all the categories to display in the links
        $categories = Category::with('product')->where('status', true)->get();

        return view('livewire.items-component', compact('categories', 'subTotal', 'getContent'));
    }
}
