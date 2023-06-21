
@isset($orders)
@foreach ($orders as $order)
    <tr>
        <td>{{ ++$loop->index }}</td>
        <td>{{ $order->order_number }}</td>
        <td>{{ $order->order_user_name }}</td>
        <td><a href="https://wa.me/{{ $order->order_user_phone }}/?text=تم استلام طلبك بنجاح" target="_blank">{{ $order->order_user_phone }}</a></td>
        <td><span class="badge badge badge-pill badge-info mr-2">{{ $order->order_type }}</span></td>
        <td><span style="color: red">{{ $order->created_at->diffForHumans() }}</span> <br> {{ $order->created_at }}</td>
        <td>
            {{-- <div class="container">
                <label class="switch">
                    <input type="checkbox" name="status" class="status"
                        data-order-id="{{ $order->id }}"
                        @if ($order->status == true) checked @endif />
                    <div></div>
                </label>
            </div> --}}
            <select class="form-control" wire:model='changeStatus'>
                <option value="">select</option>
                <option value="pending">pending</option>
                <option value="Preparaition">Preparaition</option>
                <option value="delivary">delivary</option>
                <option value="completed">completed</option>
                <option value="canceld">canceld</option>
            </select>

        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic example"
                style="flex-wrap: nowrap;">
                <a href="{{ route('orders.show', $order->id) }}"
                    class="btn btn-primary btn-sm rounded-5 mr-1">
                    <i class="la la-eye"></i>
                </a>
                <form action="{{ route('orders.destroy', $order->id) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit"
                        class="btn btn-danger btn-sm rounded-5 mr-1"><i
                            class="la la-remove"></i></button>
                </form>
            </div>
        </td>
    </tr>
@endforeach
@endisset