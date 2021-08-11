<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ __('antenna::mail.meta-title') }}</title>
    <style>
        /* -------------------------------------
            GLOBAL RESETS
        ------------------------------------- */
        
        /*All the styling goes here*/
        body {
            box-sizing: border-box;
            background-color: #eaebed;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        a {
            text-decoration: none;
        }

        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
        }

            table td {
                vertical-align: top; 
            }
            

        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */
        .body {
            background-color: #eaebed;
            width: 100%;
        }

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 15px auto 35px;
            max-width: 580px;
            padding: 25px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 0 8px 0 #dedfe2;
        }
        
        .header {
            display: block;
            margin: 0 auto !important;
            max-width: 580px;
            padding-top: 25px;
            text-align: center;
        }

            .header img {
                width: 50px;
                margin-left: 4px;
                margin-right: 4px;
            }

            .header a {
                display: block;
                color: #575757;
            }

            .header .package-name {
                font-size: 20px;
                font-weight: 600;
                position: relative;
                top: -15px;
            }
            
            .svg-header {
                width: 55px;
                height: 55px;
            }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            margin: 0 auto;
            max-width: 580px;
            width: 100%;
            padding: 10px;
        }

        .info small {
            font-size: 8px;
            position: relative;
            top: -2px;
        }

        .donate small, .light-color {
            color: #646464;
        }

        .donate a {
            color: orangered;
        }

        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1 {
            font-size: 28px;
            font-weight: 800;
            text-align: center;
            text-transform: capitalize;
            margin-bottom: 4px;
        }
        
        h2 {
            font-size: 24px;
            font-weight: 600;
        }

        h3 {
            margin-bottom: 4px;
        }

        h3, h4, h5, h6 {
            display: block;
            font-weight: 600;
            font-size: 15px;
        }

        /* -------------------------------------
            BUTTONS
        ------------------------------------- */
        .btn {
            padding: 10px 80px;
            display: block;
            border-radius: 5px;
        }

        .btn-primary {
            color: white;
            background: lightslategrey;
        }

        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .ltr, .ltr * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            -webkit-font-smoothing: antialiased;
            line-height: 1.4;
        }

        .rtl, .rtl * {
            direction: rtl;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            line-height: 1.4;
        }

        .block {
            display: block;
        }

        .inline-block {
            display: inline-block;
        }

        .align-center {
            text-align: center; 
        }

        .align-right {
            text-align: right; 
        }

        .align-left {
            text-align: left; 
        }

        .clear {
            clear: both; 
        }
        
        .mx-4 {
            margin-left: 4px;
            margin-right: 4px;
        }

        .mx-12 {
            margin-left: 12px;
            margin-right: 12px;
        }

        .mt-4 {
            margin-top: 4px;
        }

        .mb-4 {
            margin-bottom: 15px;
        }

        .mt-0 {
            margin-top: 0;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .mb-sec {
            margin-bottom: 50px;
        }

        .mb-tr {
            display: block;
            margin-bottom: 10px;
        }

        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0 30px; 
        }

        /* -------------------------------------
            RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 414px) {
            body {
                margin: 0 !important;
                padding: 0 !important;
            }

            h1 {
                font-size: 22px;
            }

            p, td, .donate b {
                font-size: 14px;
            }

            .container, .header, .footer, .content {
                margin: 0 auto !important;
                max-width: 395px;
                clear: both;
                overflow: hidden;
                box-sizing: border-box;
            }

            .header {
                padding: 0;
            }

            .header > a, .footer > p {
                margin: 20px auto;
            }

            .content {
                padding: 0;
            }

            .mb-sec {
                margin-bottom: 12px
            }
        }
        @media only screen and (max-width: 375px) {
            .container, .header, .footer, .content {
                margin: 0 auto !important;
                max-width: 320px;
                clear: both;
                overflow: hidden;
                box-sizing: border-box;
            }
        }
    </style>
  </head>
  <body class="ltr">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
        {{-- Header --}}
        <thead>
            <td class="header">
                <a href="#">
                    <img class="mx-4" src="https://farsisho.com/wp-content/uploads/2020/05/retina-transparent-logo.png">
                    <span class="package-name mx-4">{{ __('antenna::mail.packagename') }}</span>
                </a>
            </td>
        <thead>
        {{-- Content --}}
        <tbody>
            <td class="container">
                <!-- Header of information -->
                <table border="0" cellpadding="0" cellspacing="0" class="content">
                    <tr>
                        <td class="align-center">
                            <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="bug" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-bug fa-w-16 fa-9x __web-inspector-hide-shortcut__ svg-header"><g class="fa-group"><path fill="darkorange" d="M369 112H145a112 112 0 0 1 224 0z" class="fa-secondary"></path><path fill="orange" d="M512 288.9c-.48 17.43-15.22 31.1-32.66 31.1H424v16a143.4 143.4 0 0 1-13.6 61.14l60.23 60.23a32 32 0 0 1-45.26 45.26l-54.73-54.74A143.42 143.42 0 0 1 280 480V236a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v244a143.42 143.42 0 0 1-90.64-32.11l-54.73 54.74a32 32 0 0 1-45.26-45.26l60.23-60.23A143.4 143.4 0 0 1 88 336v-16H32.67C15.23 320 .49 306.33 0 288.9A32 32 0 0 1 32 256h56v-58.74l-46.63-46.63a32 32 0 0 1 45.26-45.26L141.25 160h229.49l54.63-54.63a32 32 0 0 1 45.26 45.26L424 197.26V256h56a32 32 0 0 1 32 32.9z" class="fa-primary"></path></g></svg>
                        </td> 
                    </tr>
                    <tr>
                        <td class="align-center">
                            <h1>{{ __('antenna::mail.main-title', ['log-count'   => count($logs)]) }}</h1>
                            <p class="mb-sec mt-0">{{ __('antenna::mail.dev-desc-title', ['app-name'    => config('app.name')]) }}</p>
                        </td>
                    </tr>
                </table>
                <!-- Infomation Content -->
                <table border="0" cellpadding="0" cellspacing="0" class="content">
                    <!-- Report time and note -->
                    <tr>
                        <td>
                            <h6 class="mb-4">
                                <span>&#128355</span>
                                <span> {{ __('antenna::mail.report-time', 'time' => $time) }} </span>
                            </h6>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ __('antenna::mail.dev-warning-note') }}
                        </td>
                    </tr>
                    <!-- Client Information -->
                    @if ( isset($client['name']) || isset($client['location']) || isset($client['tell']))
                    <tr>
                        <td>
                            <h5 class="mb-4">
                                <span>&#128161</span>
                                <span> {{ __('antenna::mail.info-title', ['person'   => 'Client']) }} </span>
                            </h5>
                            <table border="0" cellpadding="0" cellspacing="0" class="content info">
                                @if (isset($client['name']))
                                <tr>
                                    <td>
                                        <h6 class="mb-4 mt-0 mx-12">
                                            <small style="">&#11035</small>
                                            {{ __('antenna::mail.name') . ' ' . $client['name'] }}
                                        </h6>
                                    </td>
                                </tr>
                                @endif

                                @if (isset($client['location']))
                                <tr>
                                    <td>
                                        <h6 class="mb-4 mt-0 mx-12">
                                            <small style="">&#11035</small>
                                            {{ __('antenna::mail.location') . ' ' . $client['location'] }}
                                        </h6>
                                    </td>
                                </tr>
                                @endif

                                @if (isset($client['tell']))
                                <tr>
                                    <td>
                                        <h6 class="mb-4 mt-0 mx-12">
                                            <small style="">&#11035</small>
                                            {{ __('antenna::mail.tell') . ' ' . $client['tell'] }}
                                        </h6>
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                    @endif
                    <!-- // Divider // -->
                    <tr>
                        <td><hr /></td>
                    </tr>
                    <!-- // Report Loop // -->
                    @foreach ($logs as $key => $log)
                    <tr class="mb-tr">
                        <td class="block">
                            <table border="0" cellpadding="0" cellspacing="0" class="content no-pad">
                                <tr class="mb-4 block">
                                    <td class="block">
                                        <h3>
                                            <span>&#128721</span>
                                            @if (is_null($log->title))
                                            {{ __('default-log-title', ['key' => $key]) }}
                                            @else 
                                            {{ $log->title }}
                                            @endif
                                        </h3>
                                        <small>
                                            {{ $log->log }}
                                        </small>
                                    <td>
                                </tr>
                                <tr>
                                    <td class="align-center">
                                        <small class="light-color">{{ $log->created_at }}</small>
                                    </td>
                                </tr>
                            </table>
                        <td>
                    </tr>
                    @endforeach
                    <!-- // Divider // -->
                    <tr>
                        <td><hr /></td>
                    </tr>
                    <!-- // Call to action // -->
                    <tr class="align-center">
                        <td>
                            <a href="#" class="btn btn-primary mb-sec">{{ __('antenna::mail.host-action') }}</a>
                        <td>
                    </tr>
                    <!-- Donate Package -->
                    <tr class="align-center donate">
                        <td>
                            <b class="mb-0">{{ __('antenna::mail.happy_to_use') }}</b>
                            <small class="mt-4 block">
                                <a href="#"><b>{{ __('antenna::mail.donate-part1') }}</b></a>
                                {{ __('antenna::mail.donate-part2') }}
                            </small>
                        </td>
                    </tr>
                </table>
            </td>
        </tbody>
        {{-- Footer --}}
        <tfoot class="align-center">
            <td class="footer">
                <p class="mb-sec mt-4 light-color">{{ __('antenna::mail.copyright') }}</p>
            </td>
        </tfoot>
    </table>
  </body>
</html>
