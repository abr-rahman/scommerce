<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $siteSettings->first()->business_name }} Invoice</title>
</head>

<body>
    <div style=" max-width: 1000px; margin: 0 auto; border: 1px solid #ff9900; margin-top: 10px;
      ">
      <h1 style="text-align: center; font-weight: 800; font-size: 30px;">{{ $siteSettings->first()->business_name }}</h1>
        <div style="padding: 20px">
            <div style=" display: flex; justify-content: space-between; gap: 20px; border-bottom: 1px solid #ff9900; padding-bottom: 20px; height: 80px;">
                <div style=" ">
                    <div style="float: left; text-align: left; width: 450px;">
                        <span>{{ $siteSettings->first()->address_one }}</span>
                        <span>{{ $siteSettings->first()->phone_one }} | </span>
                        <span>{{ $siteSettings->first()->support_email }} | </span>
                        <span>www.salamatinnovation.com</span>
                    </div>
                    <img src="{{ asset('uploads/logo/'. $siteSettings->first()->logo) ?? asset('frontend/images/logo.png')  }}"
                        alt="img" style="width: 200px; height: 50px; float: left; margin-top: 5px;" />
                </div>
            </div>
            <div style=" display: flex; justify-content: space-between; padding-bottom: 15px; gap: 20px; border-bottom: 1px solid #ff9900; margin-top: 15px; ">
                    <span style="font-weight: bold">Name:</span>
                    <span> {{ $order->customer_name }}</span> <br>
                    <span style="font-weight: bold">Phone:</span>
                    <span> {{ $order->phone }}</span> <br>
                    <span style="font-weight: bold">Email:</span>
                    <span> {{ $order->email }}</span> <br>
                    <span style="font-weight: bold">Address:</span>
                    <span> {{ $order->address }}</span> <br>
                    <div style="float: right; margin-top: -75px;">
                        <span style="font-weight: bold">Date:</span>
                        <span>{{ $order->created_at }} </span><br>
                        <span style="font-weight: bold">Invoice No :</span>
                        <span>{{ $order->invoice_number }} </span>
                    </div>
            </div>
            <div style="margin-top: 20px">
                <h1 style=" text-align: center; font-weight: bold; font-size: 25px; padding-bottom: 15px; ">
                    Order Invoice
                </h1>
                <div style="margin-top: 5px">
                    <table style="width: 100%">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #ff9900; padding: 8px">Product</th>
                                <th style="border: 1px solid #ff9900; padding: 8px">Price</th>
                                <th style="border: 1px solid #ff9900; padding: 8px">Quantity</th>
                                <th style="border: 1px solid #ff9900; padding: 8px">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $item)
                            <tr>
                                <td style="border: 1px solid #ff9900; padding: 8px">
                                    {{ $item->product->product_name }}
                                </td>
                                <td style=" border: 1px solid #ff9900; padding: 8px; text-align: right; ">
                                    TK. {{ $item->product_price }}
                                </td>
                                <td style="  border: 1px solid #ff9900;  padding: 8px;  text-align: center;">
                                    {{ $item->quantity }}
                                </td>
                                <td style="   border: 1px solid #ff9900;   padding: 8px;   text-align: right; ">
                                    TK. {{ $item->quantity * $item->product_price }}
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <th colspan="3" style="padding: 8px; text-align: right">
                                    Subtotal:
                                </th>
                                <th colspan="1" style="  border: 1px solid #ff9900;  padding: 8px;  text-align: right;">
                                    TK. {{ $order->sub_total }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" style="padding: 8px; text-align: right">
                                    Shipping:
                                </th>
                                <th colspan="1" style="  border: 1px solid #ff9900;  padding: 8px;  text-align: right;">
                                    TK. {{ $order->shipping_charge }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" style="padding: 8px; text-align: right">
                                    Grand Total:
                                </th>
                                <th colspan="1" style="  border: 1px solid #ff9900;  padding: 8px;  text-align: right;">
                                    TK. {{ $order->grand_total }}
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p style="text-align: center; color: #ff9900">Thank you for your order!</p>
            </div>
        </div>
    </div>
</body>

</html>