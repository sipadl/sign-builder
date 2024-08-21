<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/2.3.2/signature_pad.min.css">

            <style>
                .signature-pad {
                    border: 1px solid #000;
                    border-radius: 5px;
                    height: 200px;
                }
                .signature-pad--body {
                    width: 100%;
                    height: 100%;
                }
                .signature-pad--footer {
                    text-align: center;
                    margin-top: 10px;
                }
                .spesial-case a, a {
                    text-decoration: none;
                }
            </style>
    </head>
    <body>
