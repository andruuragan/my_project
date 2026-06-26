<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Замовлення підтверджено</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f5f5f5; padding:20px;">

<div style="max-width:600px;margin:auto;background:#fff;padding:20px;border-radius:10px;">
 <!-- HEADER (логотип + название) -->
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:20px;">
        <img src="https://dymsystems.pp.ua/favicon-32x32.png"
     width="32"
     height="32"
     alt="DymSystems">

        <div style="font-size:18px;font-weight:700;color:#111;">
            DymSystems
        </div>
    </div>
    <h2 style="color:#333;">Дякуємо за ваше замовлення 🙌</h2>

    <p>Замовлення <b>№{{ $order->id }}</b> успішно оформлено.</p>

    <p><b>Сума:</b> {{ number_format($order->total_price, 0, '.', ' ') }} грн</p>

    <hr>

    <h3>Товари:</h3>

    <table width="100%" cellpadding="8" cellspacing="0" border="0">
        <thead>
        <tr style="background:#f0f0f0;">
            <th align="left">Товар</th>
            <th align="center">К-сть</th>
            <th align="right">Ціна</th>
        </tr>
        </thead>

        <tbody>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td align="center">{{ $item->quantity }}</td>
                <td align="right">
                    {{ number_format($item->total, 0, '.', ' ') }} грн
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <hr>

    <p style="margin-top:20px;">
        Ми вже обробляємо ваше замовлення.<br>
        Якщо будуть питання — ми зв’яжемось з вами.
    </p>

    <a href="{{ url('/dymohody-ta-komplektuyuchi') }}"
       style="display:inline-block;padding:10px 15px;background:#f59e0b;color:#000;text-decoration:none;border-radius:6px;">
        Перейти до каталогу
    </a>

</div>

</body>
</html>