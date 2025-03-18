<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Master;
class OrdersControlller extends Controller
{
    public function index()
    {
        return view('orders',[
            'orders' => Order::all()
        ]);
    }
    public function show(string $id)
    {
        return view('order',
            ['order' => Order::all()->where('id',$id)->first()
        ]);
    }
    public function create()
    {
        return view('order_create',
            ['clients' => Client::all(),
                'masters' => Master::all()
        ]);
    }
    public function store(Request $request)
    {
        // Валидация данных
        $validate = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'master_id' => 'required|exists:masters,id',
        ]);
        $order = new Order($validate);
        $order->save();
        return redirect()->route('orders.index');
    }
    public function edit($id)
    {
        // Передаем данные в представление
        return view('orders_edit', [
            'order' => Order::all()->where('id', $id)->first(),
            'clients' => Client::all(),
            'masters' => Master::all()]);
        }
    public function update(Request $request, string $id)
    {
        // Валидация данных
        $validate = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'master_id' => 'required|exists:masters,id',
        ]);

        $order = Order::findOrFail($id);

        $order->update([
            'brand' => $validate['brand'],
            'model' => $validate['model'],
            'client_id' => $validate['client_id'],
            'master_id' => $validate['master_id'],
        ]);

        return redirect()->route('orders.index');
    }

    public function destroy(string $id)
    {
        Order::destroy($id);
        return redirect()->route('orders.index');
    }
}
