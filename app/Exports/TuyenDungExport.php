<?php

namespace App\Exports;
use App\TuyenDung;
use App\NhanVien;
use App\CongViec;
use Maatwebsite\Excel\Concerns\FromCollection;
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
class TuyenDungExport implements FromView, WithDrawings, WithEvents, ShouldAutoSize
{
    use Exportable, RegistersEventListeners;

    public function view(): View
    {
        return view('admin.tuyendung.excel', [
            'dstuyendung' => TuyenDung::all(),
           
        ]);
    }

    /**
     * @return BaseDrawing|BaseDrawing[]
     */
    public function drawings()
    {
        $arrDrawings = [];

        // Hình logo
        $drawingLogo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawingLogo->setName('Logo');
        $drawingLogo->setDescription('Logo');
        $drawingLogo->setPath(public_path('storage/images/logo.png'));
        $drawingLogo->setHeight(100);
        $drawingLogo->setCoordinates('F1');
        $offsetX = 30; //pixels
        $offsetY = 10; //pixels
        $drawingLogo->setOffsetX($offsetX); //pixels
        $drawingLogo->setOffsetX($offsetY); //pixels
        $arrDrawings[] = $drawingLogo;

        // Dòng bắt đầu xuất Excel danh sách tuyển dụng
        $startRow = 7;

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
        $event->sheet->getDelegate()->getStyle('A6:J6')->applyFromArray(
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
        $dstuyendung = TuyenDung::all();
        foreach ($dstuyendung as $index => $td) {
            $currentRow = $startRow + $index;
            $event->sheet->getDelegate()->getRowDimension($currentRow)->setRowHeight(80);

            $coordinate = "A${currentRow}:J${currentRow}";
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
