<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>Cetak Tiket {{ $ticket->Concer->concer_name }}</title>
    <link rel="stylesheet" href="{{ asset('print/css/style.css') }}">
</head>

<body>
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style1 tm_type1" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_mb15 tm_align_center">
                        <div class="tm_invoice_left">
                            <h6 style="font-weight: bold">TicketID:{{ $ticket->ticketId }}</h6>
                        </div>
                        <div class="tm_invoice_right tm_text_right tm_mobile_hide">
                           <h5 style="color:white; font-weight:bold">{{ $ticket->Concer->concer_name }}</h5>
                        </div>
                        <div class="tm_shape_bg tm_accent_bg tm_mobile_hide">
                            <img src="{{ asset('print/img/header_bg.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="tm_invoice_info tm_mb25">
                        <div class="tm_card_note tm_ternary_color"></div>
                        <div class="tm_invoice_info_list tm_white_color">
                            <p class="tm_invoice_number tm_m0 fw-bold"><b>{{ $ticket->ticketId }}</b></p>
                        </div>
                        <div class="tm_invoice_seperator tm_accent_bg">
                            <img src="{{ asset('print/img/header_bg_2.jpeg') }}" alt="">
                        </div>
                    </div>
                    <div class="tm_invoice_head tm_mb20">
                        <div class="tm_invoice_left">
                            <p class="tm_mb2"><b class="tm_primary_color">Purcheser Info:</b></p>
                            <p>
                                <b class="tm_primary_color tm_medium">Name:</b> {{ $ticket->name }} <br>
                                <b class="tm_primary_color tm_medium">Email:</b> {{ $ticket->email }}<br>
                                <b class="tm_primary_color tm_medium">Phone:</b> {{ $ticket->phone }}<br>
                                <b class="tm_primary_color tm_medium">Address:</b> {{ $ticket->address }}
                            </p>
                        </div>
                        <div class="tm_invoice_right tm_text_right">
                            <p class="tm_m0_md">
                                <b class="tm_primary_color tm_f16">{{ $ticket->Concer->concer_name }}</b> <br>
                               {{ $ticket->Concer->concer_place }}<br>
                                {{ Carbon\Carbon::parse($ticket->Concer->concer_time)->format('d, M Y H:i:s') }} <br>
                            </p>
                        </div>
                    </div>
                    </div><!-- .tm_note -->
                </div>
            </div>
            <div class="tm_invoice_btns tm_hide_print">
                <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
                                fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
                                stroke="currentColor" stroke-linejoin="round" stroke-width="32" />
                            <circle cx="392" cy="184" r="24" fill='currentColor' />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Print</span>
                </a>
                <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
                    <span class="tm_btn_icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                            <path
                                d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="32" />
                        </svg>
                    </span>
                    <span class="tm_btn_text">Download</span>
                </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('print/js/jquery.min.js') }}"></script>
    <script src="{{ asset('print/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('print/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('print/js/main.js') }}"></script>
</body>

</html>
