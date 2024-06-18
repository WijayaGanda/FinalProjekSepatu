<?php

namespace App\Charts;

use App\Models\Shoe;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class SepatuChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $shoes=Shoe::all();
        $shoeslabel=$shoes->pluck('merk')->toArray();
        $shoescount=$shoes->pluck('stok')->toArray();
        return $this->chart->barChart()
            ->setTitle('Stok')
            ->setSubtitle('Jumlah Stok yang Tersedia')
            ->addData('Jumlah Stock', $shoescount)
            ->setXAxis($shoeslabel);
    }
}
