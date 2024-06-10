<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-primary">
            {{ __('Parent Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <a href="{{ route('parent.manage-payments') }}" class="btn btn-primary">Manage Payments</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>