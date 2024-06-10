<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Bill;
use App\Models\Payment;

class ParentPaymentController extends Controller
{
    public function index()
    {
        return view('parent.payment.manage');
    }

    public function searchStudents(Request $request)
    {
        $search = $request->input('search');
        $students = Student::where('id', 'like', "%{$search}%")
            ->orWhere('StudentName', 'like', "%{$search}%")
            ->get();

        $students->each(function($student) {
            $student->unpaidBills = $student->bills->where('billStatus', 'unpaid');
        });

        $totalBills = $students->map(function($student) {
            return $student->unpaidBills->sum('billAmount');
        })->sum();

        return view('parent.payment.manage', compact('students', 'totalBills'));
    }

    public function paymentPage(Student $student)
    {
        $unpaidBills = $student->bills->where('billStatus', 'unpaid');
        return view('parent.payment.payment', compact('student', 'unpaidBills'));
    }

    public function processPayment(Request $request, Student $student)
    {
        $request->validate([
            'billID' => 'required|exists:bills,billID',
            'paymentRemark' => 'nullable|string',
            'paymentAmount' => 'required|numeric',
            'paymentDate' => 'required|date',
            'paymentMethod' => 'required|string',
        ]);

        Payment::create([
            'billID' => $request->billID,
            'paymentRemark' => $request->paymentRemark,
            'paymentAmount' => $request->paymentAmount,
            'paymentDate' => $request->paymentDate,
            'paymentMethod' => $request->paymentMethod,
            'paymentStatus' => 'Completed',
        ]);

        return redirect()->route('parent.manage-payments')->with('success', 'Payment processed successfully.');
    }
}