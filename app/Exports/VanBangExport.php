<?php

namespace App\Exports;

use App\VBCC;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Storage;

class VanBangExport implements FromView, WithDrawings, WithEvents, ShouldAutoSize
{
    use Exportable, RegistersEventListeners;
    public function view(): View
    {
        return view('admin.vanbang.excel')
            ->with('dsvbcc', VBCC::all());
    }
    public function drawings()
    {
        $arrDrawings = [];

        $drawingLogo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawingLogo->setName('Logo');
        $drawingLogo->setDescription('Logo');
        $drawingLogo->setPath(public_path('storage/images/logo.png'));
        $drawingLogo->setHeight(100);
        $drawingLogo->setCoordinates('D1');
        $offsetX = 140; //pixels
        $offsetY = 10; //pixels
        $drawingLogo->setOffsetX($offsetX); //pixels
        $drawingLogo->setOffsetY($offsetY); //pixels
        $arrDrawings[] = $drawingLogo;
        return $arrDrawings;
    }

    /* Event beforeExport
    */
    public static function beforeExport(BeforeExport $event)
    {
        //
    }

    /* Event beforeWriting
    */
    public static function beforeWriting(BeforeWriting $event)
    {
        //
    }

    /* Event beforeSheet
    */
    public static function beforeSheet(BeforeSheet $event)
    {
        //
    }

    /* Event afterSheet
    */
    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->getDelegate()->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(100);
        $event->sheet->getDelegate()->getStyle('A6:I6')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '00000000'],
                    ],
                ]
            ]
        );
        $startRow = 7;
        $dsnv = VBCC::all();
        foreach ($dsnv as $index => $vb) {
            $currentRow = $startRow + $index;
            $event->sheet->getDelegate()->getRowDimension($currentRow)->setRowHeight(80);

            $coordinate = "A${currentRow}:I${currentRow}";
            $event->sheet->getDelegate()->getStyle($coordinate)->applyFromArray(
                [
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ]
                ]
            );
            if ($index % 2 == 0) {
                $event->sheet->getDelegate()->getStyle($coordinate)->applyFromArray(
                    [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['rgb' => 'CCCCCC']
                        ]
                    ]
                );
            } else {
                $event->sheet->getDelegate()->getStyle($coordinate)->applyFromArray(
                    [
                        'fill' => [
                            'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                            'color' => ['rgb' => 'FFFFFF']
                        ]
                    ]
                );
            }
        }
    }
}
