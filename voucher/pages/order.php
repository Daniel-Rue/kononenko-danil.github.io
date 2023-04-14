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
                                                <font class="title">Тип тура:</font><br>
                                                <?php
                                                $trips = array(
                                                    "Круиз" => array("Цена" => 2000, "Описание" => "На большом теплоходе ..."),
                                                    "Сафари" => array("Цена" => 3000, "Описание" => "В жаркой пустыне ..."),
                                                    "Гастротур" => array("Цена" => 1000, "Описание" => "Этнические рестораны ...")
                                                );

                                                echo '<select name="trip" onchange="showDescription(this.value)">';
                                                foreach ($trips as $type => $info) {
                                                    echo '<option value="' . $type . '">' . $type . ' - ' . $info['Цена'] . '</option>';
                                                }
                                                echo '</select>';

                                                $first_trip = array_key_first($trips);
                                                echo '<div id="description">' . $trips[$first_trip]['Описание'] . '</div>';

                                                echo '<script>function showDescription(tripType) {var trips = ' .
                                                    json_encode($trips) .
                                                    ';document.getElementById("description").innerHTML = trips[tripType]["Описание"];}</script>';
                                                ?>




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
                                                <h2>Виды питания:</h2>
                                                    <?php
                                                    $food_options = array(
                                                        "Завтрак" => array("Стоимость" => 10, "Время" => "с 8-00 до 10-00"),
                                                        "Ужин" => array("Стоимость" => 20, "Время" => "с 19-00 до 22-00"),
                                                        "Пансион" => array("Стоимость" => 50, "Время" => "добавляется обед с 13-00 до 15-00")
                                                    );

                                                    foreach ($food_options as $option => $info) {
                                                        echo '<input type="checkbox" name="food[]" value="' . $option . '" onchange="updateTotal()">' . $option . ' - ' . $info['Стоимость'] . '<br>';
                                                    }

                                                    echo '<div id="total"></div>';

                                                    echo '<script> function updateTotal() {
                                                    var foodOptions = ' . json_encode($food_options) . ';
                                                    var totalCost = 0;
                                                    var times = [];
                                                    var checkboxes = document.querySelectorAll(\'input[name="food[]"]:checked\');
                                                    checkboxes.forEach(function(checkbox) {
                                                        var option = checkbox.value;
                                                        totalCost += foodOptions[option]["Стоимость"];
                                                        times.push(option + ": " + foodOptions[option]["Время"]);
                                                    });
                                                    document.getElementById("total").innerHTML = "Общая стоимость: " + totalCost + "<br>Время: <br>" + times.join("<br>");
                                                    }
                                                    </script>';
                                                    ?>
                                                    <div style="margin-left:6px; margin-top:7px; "><img src="../images/1_w2.gif"></div>







                                                <td valign="top" height="215" width="1" background="../images/tal.gif" style="background-repeat:repeat-y"></td>
                                                <td valign="top" height="215" width="243">
                                                    <div style="margin-left:22px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                                    <div style="margin-left:22px; margin-top:7px; "><img src="../images/1_w2.gif"></div>
                                                    <div style="margin-left:22px; margin-top:13px; ">
                                                        <p>Имя: Danil Kononenko</p>
                                                        <p>Телефон: +79535920105</p>
                                                        <p>Почта: kononenko.dv@edu.spbstu.ru</p>
                                                        <br><br><br><br>

                                                    </div>
                                                    <div style="margin-left:22px; margin-top:16px; "><img src="../images/hl.gif"></div>
                                                    <div style="margin-left:22px; margin-top:7px; "><img src="../images/1_w4.gif"></div>
                                                    <div style="margin-left:22px; margin-top:9px; ">
                                                        <?php
                                            
                                                        echo '<button onclick="goToBill()">Создать переменные</button>';

                                                        echo '<div id="total"></div>';

                                                        echo '<script>
                                                        function updateTotal() {
                                                            var foodOptions = ' . json_encode($food_options) . ';
                                                            var totalCost = 0;
                                                            var times = [];
                                                            var checkboxes = document.querySelectorAll(\'input[name="food[]"]:checked\');
                                                            checkboxes.forEach(function(checkbox) {
                                                                var option = checkbox.value;
                                                                totalCost += foodOptions[option]["Стоимость"];
                                                                times.push(option + ": " + foodOptions[option]["Время"]);
                                                            });
                                                            document.getElementById("total").innerHTML = "Общая стоимость: " + totalCost + "<br>Время: <br>" + times.join("<br>");
                                                        }

                                                        function goToBill() {
                                                            var trips = ' . json_encode($trips) . ';
                                                            var tripType = document.querySelector(\'select[name="trip"]\').value;
                                                            var tripCost = trips[tripType]["Цена"];
                                                            var foodOptions = [];
                                                            var checkboxes = document.querySelectorAll(\'input[name="food[]"]:checked\');
                                                            checkboxes.forEach(function(checkbox) {
                                                                foodOptions.push(checkbox.value);
                                                            });

                                                            var totalCost = tripCost + parseInt(document.getElementById("total").innerHTML.split(": ")[1].split("<br>")[0]);
                                                            
                                                            var xhr = new XMLHttpRequest();
                                                            xhr.onreadystatechange = function() {
                                                                if (this.readyState == 4 && this.status == 200) {
                                                                    window.location.href = \'bill.php\';
                                                                }
                                                            };
                                                            xhr.open(\'POST\', \'set_session.php\', true);
                                                            xhr.setRequestHeader(\'Content-type\', \'application/x-www-form-urlencoded\');
                                                            xhr.send(\'tripType=\' + tripType + \'&foodOptions=\' + JSON.stringify(foodOptions) + \'&totalCost=\' + totalCost);
                                                        }
                                                        </script>';
                                                        ?>

                                                    </div>
                                                    </div>




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