<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-primary">
            {{ __('Payment for ' . $student->StudentName) }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <h4>Unpaid Bills</h4>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unpaidBills as $bill)
                                <tr>
                                    <td>{{ $bill->billDescription }}</td>
                                    <td>{{ $bill->billAmount }}</td>
                                    <td>{{ $bill->billDueDate }}</td>
                                    <td>{{ $bill->billStatus }}</td>
                                    <td>
                                        <form action="{{ route('parent.process-payment', $student->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="billID" value="{{ $bill->billID }}">
                                            <input type="hidden" name="paymentAmount" value="{{ $bill->billAmount }}">
                                            <div class="form-group">
                                                <label for="paymentMethod">Method</label>
                                                <select name="paymentMethod" class="form-control">
                                                    <option value="Credit Card">Credit Card</option>
                                                    <option value="Online Transfer">Online Transfer</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="paymentRemark">Remark</label>
                                                <input type="text" name="paymentRemark" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="paymentDate">Payment Date</label>
                                                <input type="date" name="paymentDate" class="form-control" value="{{ now()->toDateString() }}">
                                            </div>
                                            <button type="submit" class="btn btn-success">Pay</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('parent.manage-payments') }}" class="btn btn-secondary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>