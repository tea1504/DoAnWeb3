<?php

namespace App\Exports;

use App\NhanVien;
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

class ThongTinChungExport implements FromView, WithDrawings, WithEvents, ShouldAutoSize
{
    use Exportable, RegistersEventListeners;
    public function view(): View
    {
        return view('admin.thongtinchung.excel')
            ->with('dsttc', NhanVien::all());
    }
    public function drawings()
    {
        $arrDrawings = [];

        $drawingLogo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawingLogo->setName('Logo');
        $drawingLogo->setDescription('Logo');
        $drawingLogo->setPath(public_path('storage/images/logo.png'));
        $drawingLogo->setHeight(100);
        $drawingLogo->setCoordinates('N1');
        $offsetX = 20; //pixels
        $offsetY = 10; //pixels
        $drawingLogo->setOffsetX($offsetX); //pixels
        $drawingLogo->setOffsetY($offsetY); //pixels
        $arrDrawings[] = $drawingLogo;
        $startRow = 7;
        $dsttc = NhanVien::all();
        foreach ($dsttc as $index => $ttc) {
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName($ttc->nv_hoTen);
            $drawing->setDescription($ttc->nv_hoTen);
            if (Storage::exists('public/avatar/' . $ttc->nv_anh) && isset($ttc->nv_anh))
                $drawing->setPath(public_path('storage/avatar/' . $ttc->nv_anh));
            else
                $drawing->setPath(public_path('storage/avatar/default.png'));
            $drawing->setOffsetY(20);
            $drawing->setHeight(80);
            $drawing->setWidth(80);
            $drawing->setCoordinates('B' . ($startRow + $index));
            $arrDrawings[] = $drawing;
        }

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
        $event->sheet->getDelegate()->getStyle('A6:AF6')->applyFromArray(
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
        $dsttc = NhanVien::all();
        foreach ($dsttc as $index => $ttc) {
            $currentRow = $startRow + $index;
            $event->sheet->getDelegate()->getRowDimension($currentRow)->setRowHeight(80);
            $coordinate = "A${currentRow}:AF${currentRow}";
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
