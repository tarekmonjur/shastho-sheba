<div class="panel panel-default checkout">
    <div class="panel-heading">Your Shopping Cart Product</div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th class="text-center">SL.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Photo</th>
                <th class="text-center">Unit</th>
                <th class="text-center">Qty</th>
                <th class="text-center">Price</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $totalPrice=0; $totalQty=0;?>
            @foreach($cartItems as $cartItem)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$cartItem->name}}</td>
                <td><img src="{{$cartItem->photo}}" alt=""></td>
                <td>{{$cartItem->unit}}</td>
                <td>
                    <input type="text" style="width: 30px" value="{{$cartItem->qty}}" onkeyup="cartUpdate('{{$cartItem->itemHash}}', this.value)">
                </td>
                <td>{{$cartItem->price}}</td>
                <td><a onclick="cartItemRemove('{{$cartItem->itemHash}}')"><i class="fa fa-remove"></i></a></td>
            </tr>
                <?php $totalPrice = $totalPrice + $cartItem->price; $totalQty = $totalQty + $cartItem->qty;?>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Total : </td>
                <td>{{$totalQty}}</td>
                <td>{{$totalPrice}}</td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>