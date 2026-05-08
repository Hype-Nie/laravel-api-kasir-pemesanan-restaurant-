<?php

namespace Database\Seeders;

use App\Models\Addon;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemAddon;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customers = User::where('role', 'customer')->get();
        $menus = Menu::where('is_available', true)->get();
        $addons = Addon::where('is_available', true)->get();

        $statuses = ['completed', 'pending', 'cancelled', 'preparing', 'ready'];
        $payments = ['card', 'bank', 'cash'];
        $delivery = ['door_delivery', 'pick_up'];
        $types = ['dine_in', 'takeaway'];

        foreach ($customers as $customerIndex => $customer) {
            for ($orderIndex = 0; $orderIndex < random_int(2, 3); $orderIndex++) {
                $orderNumber = '#' . (1230 + ($customerIndex * 3) + $orderIndex);
                $status = $statuses[($customerIndex + $orderIndex) % count($statuses)];
                $paymentMethod = $payments[($customerIndex + $orderIndex) % count($payments)];
                $deliveryMethod = $delivery[$orderIndex % count($delivery)];
                $orderType = $types[$orderIndex % count($types)];

                $order = Order::create([
                    'order_number' => $orderNumber,
                    'user_id' => $customer->id,
                    'order_type' => $orderType,
                    'table_number' => $orderType === 'dine_in' ? 'Table ' . ($orderIndex + 1) : null,
                    'status' => $status,
                    'payment_method' => $paymentMethod,
                    'delivery_method' => $deliveryMethod,
                    'total_amount' => 0,
                    'created_at' => now()->subDays(random_int(0, 30)),
                ]);

                $totalAmount = 0;
                $itemCount = random_int(1, 4);
                $randomMenus = $menus->random(min($itemCount, $menus->count()));

                foreach ($randomMenus as $menu) {
                    $quantity = random_int(1, 3);
                    $subtotal = $menu->price * $quantity;

                    $orderItem = OrderItem::create([
                        'order_id' => $order->id,
                        'menu_id' => $menu->id,
                        'quantity' => $quantity,
                        'unit_price' => $menu->price,
                        'subtotal' => $subtotal,
                    ]);

                    $totalAmount += $subtotal;

                    if (random_int(0, 1) === 1 && $addons->count() > 0) {
                        $randomAddons = $addons->random(min(random_int(1, 2), $addons->count()));
                        foreach ($randomAddons as $addon) {
                            OrderItemAddon::create([
                                'order_item_id' => $orderItem->id,
                                'addon_id' => $addon->id,
                                'addon_price' => $addon->price,
                            ]);

                            $totalAmount += $addon->price;
                        }
                    }
                }

                $order->update(['total_amount' => $totalAmount]);

                Payment::create([
                    'order_id' => $order->id,
                    'method' => $paymentMethod,
                    'status' => $status === 'cancelled' ? 'failed' : ($status === 'pending' ? 'pending' : 'paid'),
                    'amount' => $totalAmount,
                    'transaction_id' => $status !== 'cancelled' ? 'TXN-' . strtoupper(substr(md5((string) random_int(1, PHP_INT_MAX)), 0, 10)) : null,
                ]);
            }
        }
    }
}

