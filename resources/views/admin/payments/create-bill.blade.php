<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-primary">
            {{ __('Add Bill for ' . $student->StudentName) }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.students.store-bill', $student->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="billDescription">Bill Description</label>
                            <input type="text" name="billDescription" id="billDescription" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="billAmount">Bill Amount</label>
                            <input type="text" name="billAmount" id="billAmount" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="billDueDate">Bill Due Date</label>
                            <input type="date" name="billDueDate" id="billDueDate" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Add Bill</button>
                        <a href="{{ route('admin.students.manage-bills', $student->id) }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>