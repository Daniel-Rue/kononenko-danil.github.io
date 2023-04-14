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
            <div style="margin-left:88px; margin-top:57px "><img src="../images/w1.gif"></div>

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

            </div>
            <div style="margin-left:400px; margin-top:10px "></div>
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
                           <td width="492" valign="top" height="106" style="display: flex;">


                              <div style="margin-left:1px; margin-top:2px; margin-right:10px "><br>
                                 <div style="margin-left:5px "><img src="../images/1_p1.gif" align="left"></div>
                                 <div style="margin-left:95px ">
                                    <font class="title"> </font>

                                 </div>
                              </div>
                              <div>
                                 <?php
                                 session_start();

                                 $tripType = $_SESSION['tripType'];
                                 $foodOptions = $_SESSION['foodOptions'];
                                 $totalCost = $_SESSION['totalCost'];
                                 $countries = array(
                                    "Круиз" => array(
                                       "Италия" => 200,
                                       "Хорватия" => 100,
                                       "Швеция" => 300
                                    ),
                                    "Сафари" => array(
                                       "Кения" => 500,
                                       "Марокко" => 300,
                                       "ЮАР" => 800
                                    ),
                                    "Гастротур" => array(
                                       "Дания" => 50,
                                       "Норвегия" => 100,
                                       "Франция" => 80
                                    )
                                 );

                                 echo '<h2>Страна основного пребывания:</h2>';
                                 $first = true;
                                 foreach ($countries[$tripType] as $country => $price) {
                                    $checked = $first ? 'checked' : '';
                                    echo '<input type="radio" name="country" value="' . $country . '" ' . $checked . '>' . $country . ' (+' . $price . ')<br>';
                                    $first = false;
                                 }
                                 ?>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td width="492" valign="top" height="232">
                              <table cellpadding="0" cellspacing="0" border="0">
                                 <tr>
                                    <td valign="top" height="232" width="248">
                                       <div style="margin-left:6px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                       <?php
                                       session_start();

                                       $entertainment = array(
                                          "Круиз" => array(
                                             "Сауна" => 50,
                                             "Бассейн" => 100,
                                             "Бар" => 200
                                          ),
                                          "Сафари" => array(
                                             "Кормление животных" => 100,
                                             "Фотоохота" => 50,
                                             "Разделывание туши" => 200
                                          ),
                                          "Гастротур" => array(
                                             "Местный рынок" => 50,
                                             "Приготовление еды" => 200,
                                             "Виноферма" => 100
                                          )
                                       );

                                       echo '<h2>Выберите дополнительные услуги:</h2>';
                                       foreach ($entertainment[$tripType] as $option => $price) {
                                          echo '<input type="checkbox" name="entertainment[]" value="' . $option . '">' . $option . ' (+' . $price . ')<br>';
                                       }
                                       ?>

                                       <div style="margin-left:6px; margin-top:7px; "><img src="../images/1_w2.gif"></div>
                                       <div style="margin-left:6px; margin-top:11px; margin-right:0px ">
                                          <font class="title"> </font>
                                       </div>
                                       <div style="margin-top:10px; margin-left:6px ">

                                       </div>
                                       <div style="margin-top:6px; margin-left:6px ">

                                       </div>
                                       <div style="margin-top:6px; margin-left:6px ">

                                       </div>
                                       <div style="margin-top:6px; margin-left:6px ">

                                       </div>
                                       <div style="margin-top:6px; margin-left:6px ">

                                       </div>
                                       <div style="margin-top:6px; margin-left:6px ">

                                       </div>

                                    <td valign="top" height="215" width="1" background="../images/tal.gif" style="background-repeat:repeat-y"></td>
                                    <td valign="top" height="215" width="243">
                                       <div style="margin-left:22px; margin-top:2px; "><img src="../images/hl.gif"></div>
                                       <div style="margin-left:22px; margin-top:7px; "><img src="../images/1_w2.gif"></div>
                                       <div style="margin-left:22px; margin-top:13px; ">

                                          <?php
                                          echo '<h2>Введите количество дней:</h2>';
                                          echo '<input type="number" name="days" value="1">';
                                          ?>
                                       </div>
                                       <div style="margin-left:22px; margin-top:16px; "><img src="../images/hl.gif"></div>

                                       <div style="margin-left:22px; margin-top:7px; ">
                                          <?php
                                          echo '<button onclick="goBack()">Назад</button>';

                                          echo '<script>
                                       function goBack() {
                                           window.location.href = \'order.php\';
                                       }
                                       </script>';
                                          ?>
                                          <?php


                                          echo '<button onclick="goToBasket()">Далее</button>';

                                          echo '<script>
                                       function goToBasket() {
                                          var totalCost = ' . $totalCost . ';
                                          var country = document.querySelector(\'input[name="country"]:checked\').value;
                                          var entertainmentOptions = [];
                                          var checkboxes = document.querySelectorAll(\'input[name="entertainment[]"]:checked\');
                                          checkboxes.forEach(function(checkbox) {
                                             entertainmentOptions.push(checkbox.value);
                                          });
                                          var days = document.querySelector(\'input[name="days"]\').value;

                                          // Добавляем стоимость выбранной страны
                                          totalCost += ' . json_encode($countries[$tripType]) . '[country];

                                          // Добавляем стоимость выбранных услуг
                                          entertainmentOptions.forEach(function(option) {
                                             totalCost += ' . json_encode($entertainment[$tripType]) . '[option];
                                          });

                                          // Умножаем на количество дней
                                          totalCost *= days;

                                          var xhr = new XMLHttpRequest();
                                          xhr.onreadystatechange = function() {
                                             if (this.readyState == 4 && this.status == 200) {
                                                   window.location.href = \'basket.php\';
                                             }
                                          };
                                          xhr.open(\'POST\', \'set_session.php\', true);
                                          xhr.setRequestHeader(\'Content-type\', \'application/x-www-form-urlencoded\');
                                          xhr.send(\'tripType=\' + \'' . $tripType . '\' + \'&foodOptions=\' + \'' . json_encode($foodOptions) . '\' + \'&totalCost=\' + totalCost + \'&country=\' + country + \'&entertainmentOptions=\' + JSON.stringify(entertainmentOptions) + \'&days=\' + days);
                                       }
                                       </script>';
                                          ?></div>

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