<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithEvents;
use Illuminate\Support\Collection;

class OrdersExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping, WithColumnFormatting, WithEvents
{
    public function __construct(private $request) {}

    /**
     * @return Collection
     */
    public function collection(): Collection
    {
        return Order::with('user')
            ->when($this->request->status, function ($q) {
                $q->where('status', $this->request->status);
            })
            ->when($this->request->date_from, function ($q) {
                $q->whereDate('created_at', '>=', $this->request->date_from);
            })
            ->when($this->request->date_to, function ($q) {
                $q->whereDate('created_at', '<=', $this->request->date_to);
            })
            ->get();
    }

    // Передаем чистые данные, форматирование доверяем Excel
    public function map($order): array
    {
        return [
            $order->id,
            $order->user->name ?? '—',
            $this->formatStatus($order->status),
            (float) $order->total_price, // Число для колонки D
            $order->created_at->format('d.m.Y / H:i'), // Строка для колонки E
        ];
    }

    public function headings(): array
    {
        return ['ID', 'Клиент', 'Статус', 'Сумма', 'Дата'];
    }

    // Формат тысяч с пробелом для колонки D
    public function columnFormats(): array
    {
        return [
            'D' => '#,##0',
        ];
    }

    // Стили только для первой строки (шапки)
    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '4F46E5'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
        ];
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function ($event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                $range = "A1:{$highestColumn}{$highestRow}";

                // 1. Возвращаем сетку (границы) для всей таблицы
                $sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);

                // 2. Всем ячейкам задаем базовое выравнивание по левому краю (для текста)
                $sheet->getStyle($range)
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_LEFT)
                    ->setVertical(Alignment::VERTICAL_CENTER);

                // 3. Колонки D (Сумма) и E (Дата) двигаем вправо, начиная со 2-й строки
                if ($highestRow > 1) {
                    $sheet->getStyle("D2:D{$highestRow}")
                        ->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_RIGHT);

                    $sheet->getStyle("E2:E{$highestRow}")
                        ->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_RIGHT);
                }

                // 4. Шапку (первую строку) принудительно центрируем
                $sheet->getStyle("A1:{$highestColumn}1")
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    private function formatStatus($status): string
    {
        return match ($status) {
            'pending' => 'Очікує',
            'paid' => 'Сплачено',
            'processing' => 'Обробка',
            'shipped' => 'Відправлено',
            'completed' => 'Завершено',
            'cancelled' => 'Скасовано',
            default => $status,
        };
    }
}