<x-admin.layout>
    <x-slot name="rows">
        <div class="row">
            <x-admin.dashboard-card title="Categories" :count=$categories type="layout-list-post">
            </x-admin.dashboard-card>
            <x-admin.dashboard-card title="Products" :count=$products type="harddrives"></x-admin.dashboard-card>
            <x-admin.dashboard-card title="Users" :count=$users type="user"></x-admin.dashboard-card>
            <x-admin.dashboard-card title="Orders" :count=$orders type="shopping-cart-full"></x-admin.dashboard-card>
            <x-admin.dashboard-card title="Completed Orders" :count=$completedOrders type="check-box">
            </x-admin.dashboard-card>
            <x-admin.dashboard-card title="Cancelled Orders" :count=$cancelledOrders type="close">
            </x-admin.dashboard-card>
            <x-admin.dashboard-card title="Restored Orders" :count=$restoredOrders type="reload">
            </x-admin.dashboard-card>
            <x-admin.dashboard-card title="Total Income" :count=$income type="money"></x-admin.dashboard-card>
        </div>
    </x-slot>
</x-admin.layout>
