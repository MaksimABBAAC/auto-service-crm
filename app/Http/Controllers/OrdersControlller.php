<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Client;
use App\Models\Master;
use Illuminate\Support\Facades\Gate;

class OrdersControlller extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('orders',[
            'orders' => Order::paginate($perpage)->withQueryString()
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
        $clients = Client::all();
        $masters = Master::all();
        $works = Work::all();

        return view('order_create', compact('clients', 'masters', 'works'));
    }

    public function store(Request $request)
    {
        // Валидация
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'master_id' => 'required|exists:masters,id',
            'works' => 'required|array|min:1',
            'works.*.quantity' => 'required|integer|min:1',
            'works.*.cost' => 'nullable|numeric|min:0'
        ]);

        // Создание заказа
        $order = Order::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'client_id' => $request->client_id,
            'master_id' => $request->master_id
        ]);

        // Добавление работ
        foreach ($request->works as $workId => $workData) {
            // Если работа не выбрана - пропускаем
            if (!isset($workData['selected'])) continue;

            $order->works()->attach($workId, [
                'quantity' => $workData['quantity'],
                'cost' => $workData['cost'] ?? Work::find($workId)->cost
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Заказ создан!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'master_id' => 'required|exists:masters,id',
            'works' => 'required|array|min:1',
            'works.*.quantity' => 'required|integer|min:1',
            'works.*.cost' => 'nullable|numeric|min:0'
        ]);

        $order = Order::findOrFail($id);

        // Обновляем основные данные заказа
        $order->update([
            'brand' => $validated['brand'],
            'model' => $validated['model'],
            'client_id' => $validated['client_id'],
            'master_id' => $validated['master_id']
        ]);

        // Подготовка данных для синхронизации
        $worksData = [];
        foreach ($request->works as $workId => $workData) {
            if (!isset($workData['selected'])) continue;

            $worksData[$workId] = [
                'quantity' => $workData['quantity'],
                'cost' => $workData['cost'] ?? Work::find($workId)->cost
            ];
        }

        // Синхронизация работ
        $order->works()->sync($worksData);

        return redirect()->route('orders.index')->with('success', 'Запись '.$id.' успешно изменена');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        if (!Gate::allows('destroy-order', $order)) {
            return redirect()->intended('/')->withErrors([
                'error' => 'У вас нет разрешения на удаление данной записи '.$id
            ]);
        }

        // Удаляем связанные работы
        $order->works()->detach();

        // Удаляем сам заказ
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Запись '.$id.' успешно удалена');
    }

    public function edit($id)
    {
        $order = Order::with(['works', 'client', 'master'])->findOrFail($id);

        if (!Gate::allows('edit-order', $order)) {
            return redirect()->intended('/')->withErrors([
                'error' => 'У вас нет разрешения на редактирование данной записи '.$id
            ]);
        }

        return view('orders_edit', [
            'order' => $order,
            'clients' => Client::all(),
            'masters' => Master::all(),
            'works' => Work::all(),
            'selectedWorks' => $order->works->pluck('pivot')->keyBy('work_id')
        ]);
    }
}
