<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: A work-around for iOS meddling in triggered links. */
        *[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
        }

        /* What it does: A work-around for Gmail meddling in triggered links. */
        .x-gmail-data-detectors,
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
        }

        /* What it does: Prevents Gmail from displaying an download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }
        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
            display:none !important;
        }

        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */
        /* Thanks to Eric Lepetit @ericlepetitsf) for help troubleshooting */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) { /* iPhone 6 and 6+ */
            .email-container {
                min-width: 375px !important;
            }
        }

    </style>

    <!-- Progressive Enhancements -->
    <style>

        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid {
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }
        }

    </style>

</head>
<body width="100%" bgcolor="#ffffff" style="margin: 0; mso-line-height-rule: exactly;">
    
        <!-- Email Header : BEGIN -->
        <table role="presentation" aria-hidden="true" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" width="600" style="margin: auto;" class="email-container">
            <tr>
                <td style="padding: 20px 0; text-align: center"  bgcolor="#ffffff">
                    <img src="http://oi68.tinypic.com/21c740l.jpg" aria-hidden="true" height="60" alt="alt_text" border="0" style="height:40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                </td>
            </tr>
            <tr>
                <td bgcolor="#ffffff">&nbsp;</td>
            </tr>
        </table>
        <!-- Email Header : END -->
 
        <!-- Email Body : BEGIN -->
        <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="600" style="margin: auto;" class="email-container">
        
            <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 10px; padding-bottom:30px;  font-family: sans-serif; font-size: 15px; line-height: 20px; color: #333;">
                    <h2>Permohonan Informasi Perlu Klarifikasi </h2>
                    <p style="color:#000 !important;">
                    {{$permohonan->nama_pemohon}}, Mohon maaf permohonan informasi anda dengan nomor #{{$permohonan->nomor}} tanggal {{tanggal_indo2($permohonan->tanggal)}} belum dapat diproses dan perlu dilakukan klarifikasi sebagai berikut:
                    </p>
                    <blockquote>
                      <p style="color:#454577 !important;">
                         {{$proses->isi}}
                      </p>
                    </blockquote>                  
                    <br>
                    <!-- Button : Begin -->
                    <br>
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto">
                        <tr>
                            <td style="border-radius: 3px; background: #1bbcc2; text-align: center;" class="button-td">
                                <a href="{{URL::to('statuspermohonan/token/'.Crypt::encrypt($permohonan->id))}}" style="background: #1bbcc2; border: 15px solid #1bbcc2; font-family: sans-serif; font-size: 12px; line-height: 0.5; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
                                    &nbsp;&nbsp;<span style="color:#ffffff;">Cek Status Permohonan</span>&nbsp;&nbsp;
                                </a>
                            </td>
                        </tr>
                    </table>
                    <p style="color:#000 !important; font-size: 10px;">
                    Untuk Kelancaran Pengiriman Email, Mohon untuk tidak membalas email ini.
                    </p>
                    <!-- Button : END -->
                </td>
            </tr>          
            <tr>
                <td height="40" style="font-size: 0; line-height: 0;">
                    &nbsp;
                </td>
            </tr>
            <tr>
                <td height="4" style="font-size: 0; line-height: 0;" bgcolor="#bebebe;">
                    &nbsp;
                </td>
            </tr>
            <?php
                $setting = DB::table('setting')->first();
            ?>
            <tr>
                <td bgcolor="#ffffff">
                    <table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                            <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
                               <b><a  style="text-decoration: none; color:#1bbcc2" href="http://ppid.batangharikab.go.id">PPID Kabupaten Batanghari </a></b> <br>
                               <p style="font-size: 12px; color:#000 !important; text-decoration: none !important;">{{$setting->alamat}}<br>
                               Email: {{$setting->email}} <br>Telepon: {{$setting->telepon}}</p>
                            </td>
                            </tr>
                    </table>
                </td>
            </tr>
            <!-- 1 Column Text + Button : BEGIN -->

        </table>
        <!-- Email Body : END -->

    
</body>
</html>
