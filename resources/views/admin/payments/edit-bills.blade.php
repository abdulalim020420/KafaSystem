<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-primary">
            {{ __('Edit Bills for ' . $student->StudentName) }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.students.update-bills', $student->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bills as $bill)
                                    <tr>
                                        <td><input type="text" name="description_{{ $bill->billID }}" value="{{ $bill->billDescription }}" class="form-control"></td>
                                        <td><input type="text" name="amount_{{ $bill->billID }}" value="{{ $bill->billAmount }}" class="form-control"></td>
                                        <td><input type="date" name="due_date_{{ $bill->billID }}" value="{{ $bill->billDueDate }}" class="form-control"></td>
                                        <td>
                                            <select name="status_{{ $bill->billID }}" class="form-control">
                                                <option value="unpaid" {{ $bill->billStatus == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                                <option value="paid" {{ $bill->billStatus == 'paid' ? 'selected' : '' }}>Paid</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-success">Update Bills</button>
                        <a href="{{ route('admin.students.manage-bills', $student->id) }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>