<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class OrderDetailsExport implements FromArray, ShouldAutoSize, WithEvents
{
    public function __construct(private Order $order)
    {
    }

    public function array(): array
    {
        $rows = [];

        // Блок информации о заказе (Инфо-карта) — Строки 1-4
        $rows[] = ['Замовлення', '№' . $this->order->id];
        $rows[] = ['Дата', $this->order->created_at->format('d.m.Y / H:i')];
        $rows[] = ['Статус', $this->formatStatus($this->order->status)];
        $rows[] = ['Разом', (float) $this->order->total_price];

        $rows[] = []; // Сместили на 2 строки выше: теперь здесь только один пустой ряд для отступа (Строка 5)

        // Таблица товаров (Теперь это Строка 6 в Excel)
        $rows[] = ['Товар', 'Кількість', 'Ціна', 'Сума'];

        foreach ($this->order->items as $item) {
            $rows[] = [
                $item->product_name,
                (int) $item->quantity,
                (float) $item->price,
                (float) $item->total,
            ];
        }

        return $rows;
    }

    public function registerEvents(): array
    {
        return [
            \Maatwebsite\Excel\Events\AfterSheet::class => function ($event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();

                // --- 1. КРАСИМ ИНФО-КАРТУ (Строки 1-4) ---
                $sheet->getStyle('A1:A4')->getFont()->setBold(true);
                $sheet->getStyle('A1:B4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                $sheet->getStyle('B4')->getNumberFormat()->setFormatCode('#,##0" грн"');

                $sheet->getStyle('A1:B4')->applyFromArray([
                    'borders' => [
                        'outline' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['rgb' => 'D1D5DB'],
                        ],
                    ],
                ]);


                // --- 2. СТИЛИЗУЕМ ТАБЛИЦУ ТОВАРОВ (Теперь с 6-й строки) ---
                $tableHeaderRow = 5;  // Было 7, стало 6
                $productsStartRow = 6; // Было 8, стало 7

                // Шапка таблицы (Indigo)
                $sheet->getStyle("A{$tableHeaderRow}:D{$tableHeaderRow}")->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF'],
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '4F46E5'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Если товары есть, настраиваем их
                if ($highestRow >= $productsStartRow) {
                    $tableRange = "A{$tableHeaderRow}:D{$highestRow}";
                    $productsRange = "A{$productsStartRow}:D{$highestRow}";

                    // Тонкая сетка для товаров
                    $sheet->getStyle($tableRange)->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['rgb' => 'E5E7EB'],
                            ],
                        ],
                    ]);

                    // Выравнивание текста
                    $sheet->getStyle($productsRange)->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_LEFT)
                        ->setVertical(Alignment::VERTICAL_CENTER);

                    // Центрируем количество
                    $sheet->getStyle("B{$productsStartRow}:B{$highestRow}")->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                    // Цены и суммы вправо + формат грн
                    $sheet->getStyle("C{$productsStartRow}:D{$highestRow}")->getAlignment()
                        ->setHorizontal(Alignment::HORIZONTAL_RIGHT);

                    $sheet->getStyle("C{$productsStartRow}:D{$highestRow}")
                        ->getNumberFormat()->setFormatCode('#,##0" грн"');
                }
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
