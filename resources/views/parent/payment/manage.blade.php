<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-primary">
            {{ __('Manage Payments') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('parent.search-students') }}" method="POST" class="form-inline mb-3">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="search" class="form-control" placeholder="Search by Student ID or Name">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>
                    @isset($students)
                        @if($students->isNotEmpty())
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Unpaid Bill Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                        @if($student->unpaidBills->isNotEmpty())
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->StudentName }}</td>
                                                <td>{{ $student->StudentContact }}</td>
                                                <td>{{ $student->StudentEmail }}</td>
                                                <td>{{ $student->unpaidBills->sum('billAmount') }}</td>
                                                <td>
                                                    <a href="{{ route('parent.payment-page', $student->id) }}" class="btn btn-success">Pay</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="alert alert-info">Total Unpaid Bill Amount: {{ $totalBills }}</div>
                        @else
                            <div class="alert alert-info">No students found.</div>
                        @endif
                    @endisset
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>