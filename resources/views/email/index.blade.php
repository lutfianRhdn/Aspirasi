<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body
    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; box-sizing: border-box; background-color: #f8fafc; color: #74787e; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>

    <div style=" margin:5vh 5vw; padding: 20px; text-align: center; border: 1px solid #303030c0;">
        <h1 style="text-align: center;">Aspirasi Rakyat</h1>
        <hr>

        <p>Hi Kementrian {{ $position }}, kami disini memiliki sebuah Aspirasi dari {{ $name }}, untuk info lebih lanjut
        </p>

        <p style="border:1px solid #303030c0; padding: 20px 40px; margin: auto; width: 25%;">{{ $pesan }}</p>
        <a href="{{ $url }}"
            style="text-decoration: none; text-align: center; box-shadow: rgb(180, 180, 180)  2px 2px 5px; background-color: rgb(0, 171, 250); padding: 10px 30px; color:#fff; border-radius: .5rem;">klik
            disini</a>
        <br>
        <p> Aspirasi ini di dukung oleh {{ $totalSuport }} Orang,terima kasih </p> <a href="{{route('home')}}"></a>
    </div>
</body>

</html>
©2019 Aspirasi Rakyat Copyright Products, Inc. All rights reserved.