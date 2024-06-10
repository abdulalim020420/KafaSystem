<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-primary">
            {{ __('Admin Manage Payment') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Student Contact</th>
                                <th>Student Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->StudentName }}</td>
                                    <td>{{ $student->StudentContact }}</td>
                                    <td>{{ $student->StudentEmail }}</td>
                                    <td>
                                        <a href="{{ route('admin.students.manage-bills', $student->id) }}" class="btn btn-sm btn-primary">Manage Bills</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>