<html>

<head>
    <title>Работа</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="0" bottommargin="0" rightmargin="0" leftmargin="0" background="../images/back_main.gif">
    <table cellpadding="0" cellspacing="0" border="0" align="center" width="583" height="614">
        <tr>
            <td valign="top" width="583" height="208" background="../images/row1.gif">
                <div style="margin-left:88px; margin-top:57px "><img src="../images/w1.gif"> </div>
                <div style="margin-left:50px; margin-top:69px ">
                    <a href="../index.php">Главная<img src="../images/m1.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="20" height="10">
                    <a href="order.php">Заказ<img src="../images/m2.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="5" height="10">
                    <a href="basket.php">Корзина<img src="../images/m3.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="5" height="10">
                    <a href="index-3.php">О компании<img src="../images/m4.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="5" height="10">
                    <a href="index-4.php">Контакты<img src="../images/m5.gif" border="0"></a>
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td valign="top" width="583" height="338" bgcolor="#FFFFFF">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td valign="top" height="338" width="42"></td>
                        <td valign="top" height="338" width="492">
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td width="492" valign="top" height="106">

                                        <div style="margin-left:1px; margin-top:2px; margin-right:10px "><br>
                                            <div style="margin-left:5px "><img src="../images/1_p1.gif" align="left"></div>
                                            <div style="margin-left:95px ">
                                                <font class="title"></font><br>





                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="492" valign="top" height="232">
                                        <table cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td valign="top" height="232" width="248">
                                                    <div style="margin-left:6px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                                    <style>
                                                        #tour-image {
                                                            width: 150px;
                                                            height: 150px;
                                                        }
                                                    </style>
                                                    <?php
                                                    session_start();
                                                    $tripType = $_SESSION['tripType'];
                                                    $foodOptions = $_SESSION['foodOptions'];
                                                    $totalCost = $_SESSION['totalCost'];
                                                    $country = $_SESSION['country'];
                                                    $entertainmentOptions = $_SESSION['entertainmentOptions'];
                                                    $days = $_SESSION['days'];
                                                    $image = "";
                                                    if ($tripType == "Круиз") {
                                                        $image = "cruise.jpg";
                                                    } elseif ($tripType == "Сафари") {
                                                        $image = "safari.jpeg";
                                                    } elseif ($tripType == "Гастротур") {
                                                        $image = "gastro_tur.jpg";
                                                    }
                                                    
                                                    echo '<h2>Информация о заказе:</h2>';
                                                    echo '<p>Тип путевки: ' . $tripType . '</p>';
                                                    echo '<p>Страна: ' . $country . '</p>';
                                                    echo '<p>Виды питания:</p>';
                                                    echo '<ul>';
                                                    foreach ($foodOptions as $option) {
                                                        echo '<li>' . $option . '</li>';
                                                    }
                                                    echo '</ul>';
                                                    echo '<p>Дополнительные услуги:</p>';
                                                    echo '<ul>';
                                                    foreach ($entertainmentOptions as $option) {
                                                        echo '<li>' . $option . '</li>';
                                                    }
                                                    echo '</ul>';
                                                    echo '<p>Количество дней: ' . $days . '</p>';
                                                    ?>



                                                    <img id="tour-image" src="../images/<?php echo $image; ?>">

                                                    <div style="margin-left:6px; margin-top:7px; "><img src="../images/1_w2.gif"></div>

                                                <td valign="top" height="215" width="1" background="../images/tal.gif" style="background-repeat:repeat-y"></td>
                                                <td valign="top" height="215" width="243">
                                                    <div style="margin-left:22px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                                    <div style="margin-left:22px; margin-top:7px; "><img src="../images/1_w2.gif"></div>
                                                    <div style="margin-left:22px; margin-top:13px; ">

                                                        <h2>Стоимость путёвки: <?php echo $totalCost; ?></h2>



                                                        <br><br><br><br>

                                                    </div>
                                                    <div style="margin-left:22px; margin-top:16px; "><img src="../images/hl.gif"></div>
                                                    <div style="margin-left:22px; margin-top:7px; "><img src="../images/1_w4.gif"></div>
                                                    <div style="margin-left:22px; margin-top:9px; ">
                                                        <?php
                                                        if (isset($_POST['send'])) {
                                                            $filename = 'Kononenko_' . date('Y-m-d') . '.txt';
                                                            $file = fopen($filename, 'w');
                                                            fwrite($file, "Информация о заказе:\n");
                                                            fwrite($file, "Тип путевки: $tripType\n");
                                                            fwrite($file, "Страна: $country\n");
                                                            fwrite($file, "Виды питания:\n");
                                                            foreach ($foodOptions as $option) {
                                                                fwrite($file, "- $option\n");
                                                            }
                                                            fwrite($file, "Дополнительные услуги:\n");
                                                            foreach ($entertainmentOptions as $option) {
                                                                fwrite($file, "- $option\n");
                                                            }
                                                            fwrite($file, "Количество дней: $days\n");
                                                            fwrite($file, "Общая цена: $totalCost\n");
                                                            fclose($file);

                                                            $to = 'kononenko.dv@edu.spbstu.ru';
                                                            $subject = 'Информация о заказе';
                                                            $headers = 'From: webmaster@example.com' . "\r\n" .
                                                                'Reply-To: webmaster@example.com' . "\r\n" .
                                                                'X-Mailer: PHP/' . phpversion();

                                                            $boundary = md5(time());
                                                            $headers .= "MIME-Version: 1.0\r\n";
                                                            $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
                                                            $message = "--$boundary\r\n";
                                                            $message .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
                                                            $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
                                                            $message .= file_get_contents($filename);
                                                            $message .= "\r\n\r\n--$boundary\r\n";
                                                            $message .= "Content-Type: image/jpeg; name=\"$image\"\r\n";
                                                            $message .= "Content-Disposition: attachment; filename=\"$image\"\r\n";
                                                            $message .= "Content-Transfer-Encoding: base64\r\n\r\n";
                                                            $message .= chunk_split(base64_encode(file_get_contents("../images/$image")));
                                                            $message .= "\r\n\r\n--$boundary--\r\n";

                                                            mail($to, $subject, $message, $headers);
                                                        }
                                                        ?>

                                                        <form method="post">
                                                            <input type="submit" name="send" value="Отправить по почте и записать в файл">
                                                        </form>


                                                    </div>

                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top" height="338" width="49"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" width="583" height="68" background="../images/row3.gif">
                <div style="margin-left:51px; margin-top:31px ">
                    <a href="#"><img src="../images/p1.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="26" height="9">
                    <a href="#"><img src="../images/p2.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="30" height="9">
                    <a href="#"><img src="../images/p3.gif" border="0"></a>
                    <img src="../images/spacer.gif" width="149" height="9">
                    <a href="index-5.php"><img src="../images/copyright.gif" border="0"></a>
                </div>
            </td>
        </tr>

    </table>
</body>

</html>