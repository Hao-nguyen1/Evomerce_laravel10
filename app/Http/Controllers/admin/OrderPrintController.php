<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderPrintController extends Controller
{
    public function printOrder($orderId)
    {
        $pdf = Pdf::make('dompdf.wrapper');
        $pdf->loadHTML($this->printOrderConvert($orderId));
        return $pdf->stream();
    }

    public function printOrderConvert($orderId)
    {
        return $orderId;
    }
}