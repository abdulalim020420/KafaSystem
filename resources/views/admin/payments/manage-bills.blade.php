<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-primary">
            {{ __('Manage Bills for ' . $student->StudentName) }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if(session('success'))
                        <div id="success-message" class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('info'))
                        <div class="alert alert-info">
                            {{ session('info') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <a href="{{ route('admin.students.create-bill', $student->id) }}" class="btn btn-primary">Add Bill</a>
                        @if($bills->isNotEmpty())
                            <a href="{{ route('admin.students.edit-bills', $student->id) }}" class="btn btn-warning">Edit Bills</a>
                        @endif
                        <a href="{{ route('admin.manage-payments') }}" class="btn btn-secondary">Back</a>
                    </div>
                    @if($bills->isNotEmpty())
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
                                @foreach($bills as $bill)
                                    <tr>
                                        <td>{{ $bill->billDescription }}</td>
                                        <td>{{ $bill->billAmount }}</td>
                                        <td>{{ $bill->billDueDate }}</td>
                                        <td>{{ $bill->billStatus }}</td>
                                        <td>
                                            <form action="{{ route('admin.students.destroy-bill', ['student' => $student->id, 'bill' => $bill->billID]) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">No bills available.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 3000); // Hide after 3 seconds
        }
    });
</script>