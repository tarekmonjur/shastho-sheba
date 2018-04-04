<?php

namespace App\Http\Controllers\Site;

use App\Models\Medicine;
use Illuminate\Http\Request;
use LukePOLO\LaraCart\Facades\LaraCart;

class CartController extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Cart Controller
    |--------------------------------------------------------------------------
    |
    | @Description : Site Shopping Cart Controller
    | @Author : Tarek Monjur.
    | @Email  : tarekmonjur@gmail.com
    */


    public function __construct()
    {

    }


    public function addToCart(Request $request)
    {
        if($request->ajax()){
            $medicine = Medicine::with('type')->find($request->id);
            if($medicine){
                $id = $medicine->id;
                $name = $medicine->medicine_name;
                $price = $medicine->medicine_price;
                $qty = $request->qty;
                $unit = $request->unit;
                $photo = $medicine->smallPhoto;
                $code = $medicine->medicine_code;
                $type = $medicine->type->type_name;

                if($unit == 'box'){
                    $price = $price;
                }else if($unit == 'strip'){
                    $price = ($price / $medicine->medicine_unit_per_box);
                }else if($unit == 'single'){
                    $price = (($price / $medicine->medicine_unit_per_box) / $medicine->medicine_unit_per_strip);
                }

                $product_id = $id;
                $product_name = $name;
                $product_qty = $qty;
                $product_price = number_format($price,2,'.','');
                $product_unit = $unit;

                $item = LaraCart::find(['id' => $product_id, 'unit' => $unit]);
//                dd($item, $item->itemHash);
                if(!empty($item) && $item->unit == $unit){
                    $product_qty = $item->qty + $product_qty;
                    $product_price = number_format($item->price + $product_price,2,'.','');
                    LaraCart::updateItem($item->itemHash, 'qty', $product_qty);
                    LaraCart::updateItem($item->itemHash, 'price', $product_price);
                }else{
                    LaraCart::add($product_id, $product_name, $product_qty, $product_price, ['unit' => $product_unit, 'photo' => $photo, 'code' => $code, 'type' => $type]);
                }
                return response()->json(['msg' => $medicine->medicine_name.' successfully add to cart.', 'success' => true, 'data' => $this->showCart()]);
            }else{
                return response()->json(['msg' => 'Medicine not add to cart.', 'success' => false]);
            }
        }
    }


    public function showCart()
    {
        $data['cartItems'] = LaraCart::getItems();
        $data['totalItem'] = count($data['cartItems']);
        $data['cartTotal'] = LaraCart::total($formatted = false);

        if($data['totalItem'] > 0){
            $totalPrice=0; $totalQty=0;
            $html = '<table class="table">
            <thead>
            <tr>
            <th>Name</th>
            <th>Photo</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>';

            foreach($data['cartItems'] as $cartItem){
                $html .= '<tr>
                <td>'.$cartItem->name.'<br>( per '.$cartItem->unit.' )</td>
                <td><img src="'.$cartItem->photo.'" alt=""></td>
                <td>';

                $html .= "<input type='text' style='width: 30px' value='".$cartItem->qty."' onkeyup=\"cartUpdate('".$cartItem->itemHash."', this.value)\" >(".$cartItem->price.")";

                $html .= '</td><td>'.$cartItem->price * $cartItem->qty.'</td>';
                $html .="<td><a onclick=\"cartItemRemove('".$cartItem->itemHash."')\"><i class='fa fa-remove'></i></a></td></tr>";

                $totalQty = $totalQty + $cartItem->qty;
            }

            $html .= '<tr>

                    <td colspan="2" class="text-right">Total : </td>

                    <td>'.$totalQty.'</td>

                    <td>'.$data['cartTotal'].'</td>

                    <td></td>

                    </tr>

                    </tbody>

                </table>';



            $data['cart_table'] = $html;
        }else{
            $html = '<div class="empty-shopping-bag"><img  width="200px" src="https://az741509.vo.msecnd.net/components/header/ShoppingCart/images/empty-shopping-bag.svg" alt="##"><div class="cart-menu-body-text">Your shopping bag is empty. Start shopping now.</div></div>';
        }

        
        $data['cart_table'] = $html;

        return $data;
    }


    public function updateToCart($item_id, $qty)
    {
        $item = LaraCart::find(['itemHash' => $item_id]);
        $medicine = Medicine::find($item->id);

        $price = $medicine->medicine_price;
        $unit = $item->unit;

        if($unit == 'box'){
            $price = $price;
        }else if($unit == 'strip'){
            $price = ($price / $medicine->medicine_unit_per_box);
        }else if($unit == 'single'){
            $price = (($price / $medicine->medicine_unit_per_box) / $medicine->medicine_unit_per_strip);
        }

        $product_price = number_format($price,2,'.','');
        LaraCart::updateItem($item->itemHash, 'qty', $qty);
        LaraCart::updateItem($item->itemHash, 'price', $product_price);
        return response()->json($this->showCart());
    }


    public function removeToCart($item){
        LaraCart::removeItem($item);
        return response()->json($this->showCart());
    }


    public function destroy(){
        LaraCart::destroyCart();
    }


}
