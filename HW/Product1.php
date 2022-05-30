<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Product1</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="bootstrap/css/small-business.css" rel="stylesheet">
  <link href="bootstrap/css/product.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="//code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .cart a {
      color: #ffffff;
    }

    div.nav .nav-pills .py-3 .cart {
      padding: 12pt 0 !important;
    }

    .cart a.nav-link {
      padding: 12px;
    }

    .menu {
      display: none;
      z-index: 2;
    }

    header {
      font-size: .8rem;
      position: relative;
    }

    div.background {
      z-index: 0;
      background-image: url(product_pic/background.jpg);
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.6;
    }

    @media (max-width:1199px) {
      .intl-shipping-info .form-select {
        width: 80%;
      }
    }
  </style>
</head>

<body>
  <header>
    <!-- <div class="menu">
      <i class="fa fa-bars"> </i>
    </div>

    <ul class="nav nav-pills py-3" style="width: 65%;">
      <li class="nav-item"><a href="#" class="nav-link active">Home</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Features</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">Pricing</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">FAQs</a></li>
      <li class="nav-item d-flex justify-content-center"><a href="#" class="nav-link">About</a></li>
    </ul>

    <div class="nav nav-pills py-3 cart" style="width: auto; display:block; top:-1pt; right:0; z-index: 3; position:absolute;">
      <span class="nav-item d-flex justify-content-end cart">
        <a href="register.php" class="nav-link">Sign Up</a>
        <a href="signin.php" class="nav-link">Sign In</a>
        <a href="checkout.php" class="nav-link"><img src="product_pic/cart.svg" alt="" height="35" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
      </span>
    </div>
  </header> -->
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-darkred fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Go SKoff</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="About.html">About</a> </li>
            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          </ul>

        </div>
        <span class="nav-item d-flex justify-content-end cart">
          <a href="register.php" class="nav-link">Sign Up</a>
          <a href="signin.php" class="nav-link">Sign In</a>
          <a href="checkout.php" class="nav-link"><img src="product_pic/cart.svg" alt="" height="35" width="35" xmlns="http://www.w3.org/2000/svg">CART</a>
        </span>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="n-product">
        <div class="row align-items-center my-5 mx-auto">
          <!-- Heading Row -->
          <div id="main">
            <div class="main-inner">
              <img class="img-fluid rounded mb-4" src="product_pic/no1.svg" alt="">

              <div id="scroll-hooks-advanced-info" data-sticky-target="advanced-info" data-tracking-seen="advanced-info">

                <div class="m-box m-box-main m-product-advanced-info">

                  <h2 class="m-box-title">運費與其他資訊</h2>
                  <div class="m-box-body">
                    <dl class="m-product-list m-product-list-main">

                      <div class="js-block-intl-shipping-react m-product-list-item " data-props="">
                        <div class="intl-shipping-info">
                          <dt class="m-product-list-title">商品運費</dt>
                          <dd class="m-product-list-content g-lazy-fadein">
                            <div class="intl-shipping-info-hd">
                              <div class="intl-shipping-info-title">從 <select class="form-select">
                                  <option value="" disabled="">選擇國家/地區</option>
                                  <option value="TW">台灣</option>
                                  <option value="CN">中國大陸</option>
                                  <option value="HK">香港</option>
                                  <option value="JP">日本</option>
                                  <option value="US">美國</option>
                                  <option value="CA">加拿大</option>
                                  <option value="MO">澳門</option>
                                  <option value="AU">澳洲</option>
                                  <option value="SG">新加坡</option>
                                  <option value="TH">泰國</option>
                                  <option value="MY">馬來西亞</option>
                                  <option value="DE">德國</option>
                                  <option value="GB">英國</option>
                                  <option value=" " disabled="">------</option>
                                  <option value="AC">阿森松島</option>
                                  <option value="AD">安道爾</option>
                                  <option value="AE">阿拉伯聯合大公國</option>
                                  <option value="AF">阿富汗</option>
                                  <option value="AG">安地卡及巴布達</option>
                                  <option value="AI">安圭拉</option>
                                  <option value="AL">阿爾巴尼亞</option>
                                  <option value="AM">亞美尼亞</option>
                                  <option value="AO">安哥拉</option>
                                  <option value="AQ">南極洲</option>
                                  <option value="AR">阿根廷</option>
                                  <option value="AS">美屬薩摩亞</option>
                                  <option value="AT">奧地利</option>
                                  <option value="AW">荷屬阿魯巴</option>
                                  <option value="AX">奧蘭群島</option>
                                  <option value="AZ">亞塞拜然</option>
                                  <option value="BA">波士尼亞與赫塞哥維納</option>
                                  <option value="BB">巴貝多</option>
                                  <option value="BD">孟加拉</option>
                                  <option value="BE">比利時</option>
                                  <option value="BF">布吉納法索</option>
                                  <option value="BG">保加利亞</option>
                                  <option value="BH">巴林</option>
                                  <option value="BI">蒲隆地</option>
                                  <option value="BJ">貝南</option>
                                  <option value="BL">聖巴瑟米</option>
                                  <option value="BM">百慕達</option>
                                  <option value="BN">汶萊</option>
                                  <option value="BO">玻利維亞</option>
                                  <option value="BQ">荷蘭加勒比區</option>
                                  <option value="BR">巴西</option>
                                  <option value="BS">巴哈馬</option>
                                  <option value="BT">不丹</option>
                                  <option value="BV">布威島</option>
                                  <option value="BW">波札那</option>
                                  <option value="BY">白俄羅斯</option>
                                  <option value="BZ">貝里斯</option>
                                  <option value="CC">科科斯（基林）群島</option>
                                  <option value="CD">剛果（金夏沙）</option>
                                  <option value="CF">中非共和國</option>
                                  <option value="CG">剛果（布拉薩）</option>
                                  <option value="CH">瑞士</option>
                                  <option value="CI">象牙海岸</option>
                                  <option value="CK">庫克群島</option>
                                  <option value="CL">智利</option>
                                  <option value="CM">喀麥隆</option>
                                  <option value="CO">哥倫比亞</option>
                                  <option value="CP">克里派頓島</option>
                                  <option value="CR">哥斯大黎加</option>
                                  <option value="CU">古巴</option>
                                  <option value="CV">維德角</option>
                                  <option value="CW">庫拉索</option>
                                  <option value="CX">聖誕島</option>
                                  <option value="CY">賽普勒斯</option>
                                  <option value="CZ">捷克共和國</option>
                                  <option value="DG">迪亞哥加西亞島</option>
                                  <option value="DJ">吉布地</option>
                                  <option value="DK">丹麥</option>
                                  <option value="DM">多米尼克</option>
                                  <option value="DO">多明尼加共和國</option>
                                  <option value="DZ">阿爾及利亞</option>
                                  <option value="EA">休達與梅利利亞</option>
                                  <option value="EC">厄瓜多</option>
                                  <option value="EE">愛沙尼亞</option>
                                  <option value="EG">埃及</option>
                                  <option value="EH">西撒哈拉</option>
                                  <option value="ER">厄利垂亞</option>
                                  <option value="ES">西班牙</option>
                                  <option value="ET">衣索比亞</option>
                                  <option value="EU">歐盟</option>
                                  <option value="FI">芬蘭</option>
                                  <option value="FJ">斐濟</option>
                                  <option value="FK">福克蘭群島</option>
                                  <option value="FM">密克羅尼西亞群島</option>
                                  <option value="FO">法羅群島</option>
                                  <option value="FR">法國</option>
                                  <option value="GA">加彭</option>
                                  <option value="GD">格瑞那達</option>
                                  <option value="GE">喬治亞共和國</option>
                                  <option value="GF">法屬圭亞那</option>
                                  <option value="GG">根西島</option>
                                  <option value="GH">迦納</option>
                                  <option value="GI">直布羅陀</option>
                                  <option value="GL">格陵蘭</option>
                                  <option value="GM">甘比亞</option>
                                  <option value="GN">幾內亞</option>
                                  <option value="GP">瓜地洛普</option>
                                  <option value="GQ">赤道幾內亞</option>
                                  <option value="GR">希臘</option>
                                  <option value="GS">南喬治亞與南三明治群島</option>
                                  <option value="GT">瓜地馬拉</option>
                                  <option value="GU">關島</option>
                                  <option value="GW">幾內亞比索</option>
                                  <option value="GY">蓋亞那</option>
                                  <option value="HM">赫德島和麥克唐納群島</option>
                                  <option value="HN">宏都拉斯</option>
                                  <option value="HR">克羅埃西亞</option>
                                  <option value="HT">海地</option>
                                  <option value="HU">匈牙利</option>
                                  <option value="IC">加那利群島</option>
                                  <option value="ID">印尼</option>
                                  <option value="IE">愛爾蘭</option>
                                  <option value="IL">以色列</option>
                                  <option value="IM">曼島</option>
                                  <option value="IN">印度</option>
                                  <option value="IO">英屬印度洋領地</option>
                                  <option value="IQ">伊拉克</option>
                                  <option value="IR">伊朗</option>
                                  <option value="IS">冰島</option>
                                  <option value="IT">義大利</option>
                                  <option value="JE">澤西島</option>
                                  <option value="JM">牙買加</option>
                                  <option value="JO">約旦</option>
                                  <option value="KE">肯亞</option>
                                  <option value="KG">吉爾吉斯</option>
                                  <option value="KH">柬埔寨</option>
                                  <option value="KI">吉里巴斯</option>
                                  <option value="KM">葛摩</option>
                                  <option value="KN">聖克里斯多福及尼維斯</option>
                                  <option value="KP">北韓</option>
                                  <option value="KR">南韓</option>
                                  <option value="KW">科威特</option>
                                  <option value="KY">開曼群島</option>
                                  <option value="KZ">哈薩克</option>
                                  <option value="LA">寮國</option>
                                  <option value="LB">黎巴嫩</option>
                                  <option value="LC">聖露西亞</option>
                                  <option value="LI">列支敦斯登</option>
                                  <option value="LK">斯里蘭卡</option>
                                  <option value="LR">賴比瑞亞</option>
                                  <option value="LS">賴索托</option>
                                  <option value="LT">立陶宛</option>
                                  <option value="LU">盧森堡</option>
                                  <option value="LV">拉脫維亞</option>
                                  <option value="LY">利比亞</option>
                                  <option value="MA">摩洛哥</option>
                                  <option value="MC">摩納哥</option>
                                  <option value="MD">摩爾多瓦</option>
                                  <option value="ME">蒙特內哥羅</option>
                                  <option value="MF">法屬聖馬丁</option>
                                  <option value="MG">馬達加斯加</option>
                                  <option value="MH">馬紹爾群島</option>
                                  <option value="MK">馬其頓</option>
                                  <option value="ML">馬利</option>
                                  <option value="MM">緬甸</option>
                                  <option value="MN">蒙古</option>
                                  <option value="MP">北馬里亞納群島</option>
                                  <option value="MQ">馬丁尼克島</option>
                                  <option value="MR">茅利塔尼亞</option>
                                  <option value="MS">蒙哲臘</option>
                                  <option value="MT">馬爾他</option>
                                  <option value="MU">模里西斯</option>
                                  <option value="MV">馬爾地夫</option>
                                  <option value="MW">馬拉威</option>
                                  <option value="MX">墨西哥</option>
                                  <option value="MZ">莫三比克</option>
                                  <option value="NA">納米比亞</option>
                                  <option value="NC">新喀里多尼亞</option>
                                  <option value="NE">尼日</option>
                                  <option value="NF">諾福克島</option>
                                  <option value="NG">奈及利亞</option>
                                  <option value="NI">尼加拉瓜</option>
                                  <option value="NL">荷蘭</option>
                                  <option value="NO">挪威</option>
                                  <option value="NP">尼泊爾</option>
                                  <option value="NR">諾魯</option>
                                  <option value="NU">紐埃島</option>
                                  <option value="NZ">紐西蘭</option>
                                  <option value="OM">阿曼王國</option>
                                  <option value="PA">巴拿馬</option>
                                  <option value="PE">秘魯</option>
                                  <option value="PF">法屬玻里尼西亞</option>
                                  <option value="PG">巴布亞紐幾內亞</option>
                                  <option value="PH">菲律賓</option>
                                  <option value="PK">巴基斯坦</option>
                                  <option value="PL">波蘭</option>
                                  <option value="PM">聖皮埃爾和密克隆群島</option>
                                  <option value="PN">皮特肯群島</option>
                                  <option value="PR">波多黎各</option>
                                  <option value="PS">巴勒斯坦自治區</option>
                                  <option value="PT">葡萄牙</option>
                                  <option value="PW">帛琉</option>
                                  <option value="PY">巴拉圭</option>
                                  <option value="QA">卡達</option>
                                  <option value="QO">大洋洲邊疆群島</option>
                                  <option value="RE">留尼旺</option>
                                  <option value="RO">羅馬尼亞</option>
                                  <option value="RS">塞爾維亞</option>
                                  <option value="RU">俄羅斯</option>
                                  <option value="RW">盧安達</option>
                                  <option value="SA">沙烏地阿拉伯</option>
                                  <option value="SB">索羅門群島</option>
                                  <option value="SC">塞席爾</option>
                                  <option value="SD">蘇丹</option>
                                  <option value="SE">瑞典</option>
                                  <option value="SH">聖赫勒拿島</option>
                                  <option value="SI">斯洛維尼亞</option>
                                  <option value="SJ">冷岸及央麥恩群島</option>
                                  <option value="SK">斯洛伐克</option>
                                  <option value="SL">獅子山</option>
                                  <option value="SM">聖馬利諾</option>
                                  <option value="SN">塞內加爾</option>
                                  <option value="SO">索馬利亞</option>
                                  <option value="SR">蘇利南</option>
                                  <option value="SS">南蘇丹</option>
                                  <option value="ST">聖多美普林西比</option>
                                  <option value="SV">薩爾瓦多</option>
                                  <option value="SX">荷屬聖馬丁</option>
                                  <option value="SY">敘利亞</option>
                                  <option value="SZ">史瓦濟蘭</option>
                                  <option value="TA">特里斯坦達庫尼亞群島</option>
                                  <option value="TC">土克斯及開科斯群島</option>
                                  <option value="TD">查德</option>
                                  <option value="TF">法屬南方屬地</option>
                                  <option value="TG">多哥</option>
                                  <option value="TJ">塔吉克</option>
                                  <option value="TK">托克勞群島</option>
                                  <option value="TL">東帝汶</option>
                                  <option value="TM">土庫曼</option>
                                  <option value="TN">突尼西亞</option>
                                  <option value="TO">東加</option>
                                  <option value="TR">土耳其</option>
                                  <option value="TT">千里達及托巴哥</option>
                                  <option value="TV">吐瓦魯</option>
                                  <option value="TZ">坦尚尼亞</option>
                                  <option value="UA">烏克蘭</option>
                                  <option value="UG">烏干達</option>
                                  <option value="UM">美國本土外小島嶼</option>
                                  <option value="UY">烏拉圭</option>
                                  <option value="UZ">烏茲別克</option>
                                  <option value="VA">梵蒂岡</option>
                                  <option value="VC">聖文森及格瑞那丁</option>
                                  <option value="VE">委內瑞拉</option>
                                  <option value="VG">英屬維京群島</option>
                                  <option value="VI">美屬維京群島</option>
                                  <option value="VN">越南</option>
                                  <option value="VU">萬那杜</option>
                                  <option value="WF">瓦利斯和富圖納群島</option>
                                  <option value="WS">薩摩亞</option>
                                  <option value="XK">科索沃</option>
                                  <option value="YE">葉門</option>
                                  <option value="YT">馬約特</option>
                                  <option value="ZA">南非</option>
                                  <option value="ZM">尚比亞</option>
                                  <option value="ZW">辛巴威</option>
                                </select> 寄出，寄往：</div>
                              <div class="intl-shipping-info-ctrl">
                                <div class="m-react-select s-web-native s-fullwidth">
                                  <select class="form-select">
                                    <option value="" disabled="">選擇國家/地區</option>
                                    <option value="TW">台灣</option>
                                    <option value="CN">中國大陸</option>
                                    <option value="HK">香港</option>
                                    <option value="JP">日本</option>
                                    <option value="US">美國</option>
                                    <option value="CA">加拿大</option>
                                    <option value="MO">澳門</option>
                                    <option value="AU">澳洲</option>
                                    <option value="SG">新加坡</option>
                                    <option value="TH">泰國</option>
                                    <option value="MY">馬來西亞</option>
                                    <option value="DE">德國</option>
                                    <option value="GB">英國</option>
                                    <option value=" " disabled="">------</option>
                                    <option value="AC">阿森松島</option>
                                    <option value="AD">安道爾</option>
                                    <option value="AE">阿拉伯聯合大公國</option>
                                    <option value="AF">阿富汗</option>
                                    <option value="AG">安地卡及巴布達</option>
                                    <option value="AI">安圭拉</option>
                                    <option value="AL">阿爾巴尼亞</option>
                                    <option value="AM">亞美尼亞</option>
                                    <option value="AO">安哥拉</option>
                                    <option value="AQ">南極洲</option>
                                    <option value="AR">阿根廷</option>
                                    <option value="AS">美屬薩摩亞</option>
                                    <option value="AT">奧地利</option>
                                    <option value="AW">荷屬阿魯巴</option>
                                    <option value="AX">奧蘭群島</option>
                                    <option value="AZ">亞塞拜然</option>
                                    <option value="BA">波士尼亞與赫塞哥維納</option>
                                    <option value="BB">巴貝多</option>
                                    <option value="BD">孟加拉</option>
                                    <option value="BE">比利時</option>
                                    <option value="BF">布吉納法索</option>
                                    <option value="BG">保加利亞</option>
                                    <option value="BH">巴林</option>
                                    <option value="BI">蒲隆地</option>
                                    <option value="BJ">貝南</option>
                                    <option value="BL">聖巴瑟米</option>
                                    <option value="BM">百慕達</option>
                                    <option value="BN">汶萊</option>
                                    <option value="BO">玻利維亞</option>
                                    <option value="BQ">荷蘭加勒比區</option>
                                    <option value="BR">巴西</option>
                                    <option value="BS">巴哈馬</option>
                                    <option value="BT">不丹</option>
                                    <option value="BV">布威島</option>
                                    <option value="BW">波札那</option>
                                    <option value="BY">白俄羅斯</option>
                                    <option value="BZ">貝里斯</option>
                                    <option value="CC">科科斯（基林）群島</option>
                                    <option value="CD">剛果（金夏沙）</option>
                                    <option value="CF">中非共和國</option>
                                    <option value="CG">剛果（布拉薩）</option>
                                    <option value="CH">瑞士</option>
                                    <option value="CI">象牙海岸</option>
                                    <option value="CK">庫克群島</option>
                                    <option value="CL">智利</option>
                                    <option value="CM">喀麥隆</option>
                                    <option value="CO">哥倫比亞</option>
                                    <option value="CP">克里派頓島</option>
                                    <option value="CR">哥斯大黎加</option>
                                    <option value="CU">古巴</option>
                                    <option value="CV">維德角</option>
                                    <option value="CW">庫拉索</option>
                                    <option value="CX">聖誕島</option>
                                    <option value="CY">賽普勒斯</option>
                                    <option value="CZ">捷克共和國</option>
                                    <option value="DG">迪亞哥加西亞島</option>
                                    <option value="DJ">吉布地</option>
                                    <option value="DK">丹麥</option>
                                    <option value="DM">多米尼克</option>
                                    <option value="DO">多明尼加共和國</option>
                                    <option value="DZ">阿爾及利亞</option>
                                    <option value="EA">休達與梅利利亞</option>
                                    <option value="EC">厄瓜多</option>
                                    <option value="EE">愛沙尼亞</option>
                                    <option value="EG">埃及</option>
                                    <option value="EH">西撒哈拉</option>
                                    <option value="ER">厄利垂亞</option>
                                    <option value="ES">西班牙</option>
                                    <option value="ET">衣索比亞</option>
                                    <option value="EU">歐盟</option>
                                    <option value="FI">芬蘭</option>
                                    <option value="FJ">斐濟</option>
                                    <option value="FK">福克蘭群島</option>
                                    <option value="FM">密克羅尼西亞群島</option>
                                    <option value="FO">法羅群島</option>
                                    <option value="FR">法國</option>
                                    <option value="GA">加彭</option>
                                    <option value="GD">格瑞那達</option>
                                    <option value="GE">喬治亞共和國</option>
                                    <option value="GF">法屬圭亞那</option>
                                    <option value="GG">根西島</option>
                                    <option value="GH">迦納</option>
                                    <option value="GI">直布羅陀</option>
                                    <option value="GL">格陵蘭</option>
                                    <option value="GM">甘比亞</option>
                                    <option value="GN">幾內亞</option>
                                    <option value="GP">瓜地洛普</option>
                                    <option value="GQ">赤道幾內亞</option>
                                    <option value="GR">希臘</option>
                                    <option value="GS">南喬治亞與南三明治群島</option>
                                    <option value="GT">瓜地馬拉</option>
                                    <option value="GU">關島</option>
                                    <option value="GW">幾內亞比索</option>
                                    <option value="GY">蓋亞那</option>
                                    <option value="HM">赫德島和麥克唐納群島</option>
                                    <option value="HN">宏都拉斯</option>
                                    <option value="HR">克羅埃西亞</option>
                                    <option value="HT">海地</option>
                                    <option value="HU">匈牙利</option>
                                    <option value="IC">加那利群島</option>
                                    <option value="ID">印尼</option>
                                    <option value="IE">愛爾蘭</option>
                                    <option value="IL">以色列</option>
                                    <option value="IM">曼島</option>
                                    <option value="IN">印度</option>
                                    <option value="IO">英屬印度洋領地</option>
                                    <option value="IQ">伊拉克</option>
                                    <option value="IR">伊朗</option>
                                    <option value="IS">冰島</option>
                                    <option value="IT">義大利</option>
                                    <option value="JE">澤西島</option>
                                    <option value="JM">牙買加</option>
                                    <option value="JO">約旦</option>
                                    <option value="KE">肯亞</option>
                                    <option value="KG">吉爾吉斯</option>
                                    <option value="KH">柬埔寨</option>
                                    <option value="KI">吉里巴斯</option>
                                    <option value="KM">葛摩</option>
                                    <option value="KN">聖克里斯多福及尼維斯</option>
                                    <option value="KP">北韓</option>
                                    <option value="KR">南韓</option>
                                    <option value="KW">科威特</option>
                                    <option value="KY">開曼群島</option>
                                    <option value="KZ">哈薩克</option>
                                    <option value="LA">寮國</option>
                                    <option value="LB">黎巴嫩</option>
                                    <option value="LC">聖露西亞</option>
                                    <option value="LI">列支敦斯登</option>
                                    <option value="LK">斯里蘭卡</option>
                                    <option value="LR">賴比瑞亞</option>
                                    <option value="LS">賴索托</option>
                                    <option value="LT">立陶宛</option>
                                    <option value="LU">盧森堡</option>
                                    <option value="LV">拉脫維亞</option>
                                    <option value="LY">利比亞</option>
                                    <option value="MA">摩洛哥</option>
                                    <option value="MC">摩納哥</option>
                                    <option value="MD">摩爾多瓦</option>
                                    <option value="ME">蒙特內哥羅</option>
                                    <option value="MF">法屬聖馬丁</option>
                                    <option value="MG">馬達加斯加</option>
                                    <option value="MH">馬紹爾群島</option>
                                    <option value="MK">馬其頓</option>
                                    <option value="ML">馬利</option>
                                    <option value="MM">緬甸</option>
                                    <option value="MN">蒙古</option>
                                    <option value="MP">北馬里亞納群島</option>
                                    <option value="MQ">馬丁尼克島</option>
                                    <option value="MR">茅利塔尼亞</option>
                                    <option value="MS">蒙哲臘</option>
                                    <option value="MT">馬爾他</option>
                                    <option value="MU">模里西斯</option>
                                    <option value="MV">馬爾地夫</option>
                                    <option value="MW">馬拉威</option>
                                    <option value="MX">墨西哥</option>
                                    <option value="MZ">莫三比克</option>
                                    <option value="NA">納米比亞</option>
                                    <option value="NC">新喀里多尼亞</option>
                                    <option value="NE">尼日</option>
                                    <option value="NF">諾福克島</option>
                                    <option value="NG">奈及利亞</option>
                                    <option value="NI">尼加拉瓜</option>
                                    <option value="NL">荷蘭</option>
                                    <option value="NO">挪威</option>
                                    <option value="NP">尼泊爾</option>
                                    <option value="NR">諾魯</option>
                                    <option value="NU">紐埃島</option>
                                    <option value="NZ">紐西蘭</option>
                                    <option value="OM">阿曼王國</option>
                                    <option value="PA">巴拿馬</option>
                                    <option value="PE">秘魯</option>
                                    <option value="PF">法屬玻里尼西亞</option>
                                    <option value="PG">巴布亞紐幾內亞</option>
                                    <option value="PH">菲律賓</option>
                                    <option value="PK">巴基斯坦</option>
                                    <option value="PL">波蘭</option>
                                    <option value="PM">聖皮埃爾和密克隆群島</option>
                                    <option value="PN">皮特肯群島</option>
                                    <option value="PR">波多黎各</option>
                                    <option value="PS">巴勒斯坦自治區</option>
                                    <option value="PT">葡萄牙</option>
                                    <option value="PW">帛琉</option>
                                    <option value="PY">巴拉圭</option>
                                    <option value="QA">卡達</option>
                                    <option value="QO">大洋洲邊疆群島</option>
                                    <option value="RE">留尼旺</option>
                                    <option value="RO">羅馬尼亞</option>
                                    <option value="RS">塞爾維亞</option>
                                    <option value="RU">俄羅斯</option>
                                    <option value="RW">盧安達</option>
                                    <option value="SA">沙烏地阿拉伯</option>
                                    <option value="SB">索羅門群島</option>
                                    <option value="SC">塞席爾</option>
                                    <option value="SD">蘇丹</option>
                                    <option value="SE">瑞典</option>
                                    <option value="SH">聖赫勒拿島</option>
                                    <option value="SI">斯洛維尼亞</option>
                                    <option value="SJ">冷岸及央麥恩群島</option>
                                    <option value="SK">斯洛伐克</option>
                                    <option value="SL">獅子山</option>
                                    <option value="SM">聖馬利諾</option>
                                    <option value="SN">塞內加爾</option>
                                    <option value="SO">索馬利亞</option>
                                    <option value="SR">蘇利南</option>
                                    <option value="SS">南蘇丹</option>
                                    <option value="ST">聖多美普林西比</option>
                                    <option value="SV">薩爾瓦多</option>
                                    <option value="SX">荷屬聖馬丁</option>
                                    <option value="SY">敘利亞</option>
                                    <option value="SZ">史瓦濟蘭</option>
                                    <option value="TA">特里斯坦達庫尼亞群島</option>
                                    <option value="TC">土克斯及開科斯群島</option>
                                    <option value="TD">查德</option>
                                    <option value="TF">法屬南方屬地</option>
                                    <option value="TG">多哥</option>
                                    <option value="TJ">塔吉克</option>
                                    <option value="TK">托克勞群島</option>
                                    <option value="TL">東帝汶</option>
                                    <option value="TM">土庫曼</option>
                                    <option value="TN">突尼西亞</option>
                                    <option value="TO">東加</option>
                                    <option value="TR">土耳其</option>
                                    <option value="TT">千里達及托巴哥</option>
                                    <option value="TV">吐瓦魯</option>
                                    <option value="TZ">坦尚尼亞</option>
                                    <option value="UA">烏克蘭</option>
                                    <option value="UG">烏干達</option>
                                    <option value="UM">美國本土外小島嶼</option>
                                    <option value="UY">烏拉圭</option>
                                    <option value="UZ">烏茲別克</option>
                                    <option value="VA">梵蒂岡</option>
                                    <option value="VC">聖文森及格瑞那丁</option>
                                    <option value="VE">委內瑞拉</option>
                                    <option value="VG">英屬維京群島</option>
                                    <option value="VI">美屬維京群島</option>
                                    <option value="VN">越南</option>
                                    <option value="VU">萬那杜</option>
                                    <option value="WF">瓦利斯和富圖納群島</option>
                                    <option value="WS">薩摩亞</option>
                                    <option value="XK">科索沃</option>
                                    <option value="YE">葉門</option>
                                    <option value="YT">馬約特</option>
                                    <option value="ZA">南非</option>
                                    <option value="ZM">尚比亞</option>
                                    <option value="ZW">辛巴威</option>
                                  </select>
                                  <div class="select-replace"><span class="text">台灣</span></div>
                                </div>
                              </div>
                            </div>
                            <div class="intl-shipping-info-bd">
                              <div class="m-carriers-table">
                                <div class="m-carriers-table__hd">
                                  <div class="m-carriers-table__row">
                                    <div class="m-carriers-table__col method">運送方式</div>
                                    <div class="m-carriers-table__col fees1">首件運費</div>
                                    <div class="m-carriers-table__col fees2">續件加收</div>
                                  </div>
                                </div>
                                <div class="m-carriers-table__bd">
                                  <div class="m-carriers-table__row m-carriers-table__item">
                                    <div class="m-carriers-table__col method">宅配</div>
                                    <div class="m-carriers-table__col fees1">NT$ 225</div>
                                    <div class="m-carriers-table__col fees2">NT$ 0</div>
                                    <div class="m-carriers-table__col tipinfo">滿 NT$ 1,000 後，運費統一 NT$ 225<br>滿 NT$ 3,000 <font style="color: #F16C5D">免運費</font>
                                    </div>
                                  </div>
                                  <div class="m-carriers-table__ft">實際運費金額以購物車結算或是到貨時收取的金額為準。</div>
                                </div>
                              </div>
                            </div>
                          </dd>
                        </div>
                      </div>

                      <div class="m-product-list-item">
                        <dt class="m-product-list-title">付款方式</dt>
                        <dd class="m-product-list-content payment-method">
                          新增信用卡快速付款, 信用卡安全加密付款, 7-11 ibon 代碼繳費, ATM 轉帳繳費, 全家 FamiPort 代碼繳費, 信用卡分期 (3 期零利率), 信用卡分期 (6 期零利率), LINE Pay, Alipay 支付寶
                        </dd>
                      </div>

                      <div class="m-product-list-item">
                        <dt class="m-product-list-title">退款換貨須知</dt>
                        <dd class="m-product-list-content">
                          <a data-click="show-policy" data-sid="lm-dessert">點我了解退款換貨須知</a>
                        </dd>
                      </div>

                      <div class="m-product-list-item tags">
                        <dt class="m-product-list-title">商品標籤</dt>
                        <dd class="m-product-list-content">
                          <!-- <a class="m-tag" href="/store/lm-dessert?tag=%E5%AE%A2%E8%A3%BD%E8%9B%8B%E7%B3%95&amp;i18n_tag=%E5%AE%A2%E8%A3%BD%E8%9B%8B%E7%B3%95">客製蛋糕</a><a class="m-tag" href="/store/lm-dessert?tag=%E7%94%9F%E6%97%A5%E8%9B%8B%E7%B3%95&amp;i18n_tag=%E7%94%9F%E6%97%A5%E8%9B%8B%E7%B3%95">生日蛋糕</a><a class="m-tag" href="/store/lm-dessert?tag=%E9%85%92%E9%AC%BC%E8%9B%8B%E7%B3%95&amp;i18n_tag=%E9%85%92%E9%AC%BC%E8%9B%8B%E7%B3%95">酒鬼蛋糕</a> -->
                        </dd>
                      </div>

                      <div class="m-product-list-item">
                        <dt class="m-product-list-title">問題回報</dt>
                        <dd class="m-product-list-content">
                          <!-- <a id="report-flag" class="report-flag" data-target-id="gvGYkxG4">我要檢舉此商品</a> -->
                        </dd>
                      </div>

                    </dl>
                  </div>
                </div>

              </div>
              <div id="scroll-hooks-reviews" data-sticky-target="reviews" data-tracking-seen="reviews">

                <!-- <div id="js-block-review" class="m-box m-box-main m-product-review">
                <div class="js-review-lazy m-product-review-wrap ga-reviews-section">
                  <h2 class="m-box-title">購買評價</h2>
                  <div class="js-review-lazy-content m-box-body">
                    <div class="g-spinner m-product-review-loader js-loader"></div>
                  </div>
                  <a class="m-br-button m-br-button--lg m-br-button--primary s-hidden review-read-all js-read-all" data-custom-tracking="showAllReviews" href="/user/lm-dessert?onload=cb_review" target="_blank">看所有評價 266</a>
                </div>
              </div> -->

              </div>
            </div>
          </div>
          <div id="sider">
            <div class="m-product-main-info m-box test-product-main-info">
              <h1 class="title translate"><span data-translate="title">【客製化蛋糕】酒鬼系列蛋糕-絕對伏特加</span></h1>
              <div class="price">
                <span class="symbol">NT$ </span>
                <span class="amount">1,680</span>
              </div>
              <div class="action">
                <div class="quantity">
                  <label for="_quantity">數量</label>
                  <select name="_quantity" class="form-select js-quantity-select" id="" data-change="quantity-select">
                    <?php

                    for ($i = 1; $i <= 10; $i++) {
                      echo "<option value = '$i'>{$i}</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>


              <button type="button" class="btn btn-outline-danger add_to_cart quantity" href="#" data-click="buy"><i class="icon"><svg height="20" viewBox="0 0 20 20" width="20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.494 4.552a.625.625 0 0 1 .105.546l-1.484 5.364a.625.625 0 0 1-.603.458H7.817l.03.088c.041.119.047.245.015.365l-.385 1.474h8.53v1.25h-9.34a.627.627 0 0 1-.605-.783l.543-2.072-2.603-7.405H2.153v-1.25h2.292c.265 0 .502.167.59.417l.457 1.302h11.505c.195 0 .38.09.497.246zM15.037 9.67l1.139-4.114H5.93L7.377 9.67zm-6.391 6.718a1.25 1.25 0 1 1-2.501 0 1.25 1.25 0 0 1 2.5 0zm7.361 0a1.25 1.25 0 1 1-2.5 0 1.25 1.25 0 0 1 2.5 0z" fill="#39393e" class="color"></path>
                  </svg></i>Add in Cart!</button>
              <button type="button" class="btn btn-outline-dark go_to_cart quantity" href="#">Go to Cart</button>
              <ul class="note">
                <li>本商品為「接單訂製」。付款後，從開始製作到寄出商品為 14 個工作天。（不包含假日）
                </li>
              </ul>

            </div>
            <!-- 商品資訊 -->
            <div class="m-product-basic-info m-box">
              <h2 class="m-box-title">商品資訊</h2>
              <div class="m-product-list">
                <dl class="m-product-list">

                  <div class="m-product-list-item">
                    <dt class="m-product-list-title">
                      製造方式
                    </dt>
                    <dd class="m-product-list-content">
                      手工製造
                    </dd>
                  </div>
                  <div class="m-product-list-item">
                    <dt class="m-product-list-title">
                      商品產地
                    </dt>
                    <dd class="m-product-list-content">
                      台灣
                    </dd>
                  </div>

                  <div class="m-product-list-item">
                    <dt class="m-product-list-title">
                      商品特點
                    </dt>
                    <dd class="m-product-list-content">
                      有提供客製服務
                    </dd>
                  </div>

                  <div class="m-product-list-item">
                    <dt class="m-product-list-title">
                      庫存
                    </dt>
                    <dd class="m-product-list-content">
                      剩最後 10 件
                    </dd>
                  </div>

                  <div class="m-product-list-item">
                    <dt class="m-product-list-title">
                      商品摘要
                    </dt>
                    <dd class="m-product-list-content" data-translate="short_description">
                      【客製化蛋糕】酒鬼蛋糕-絕對伏特加
                      是一款以奶油霜為基底的客製化蛋糕，以黑色和灰色調做出沈穩男生的感覺，在蛋糕整體運用了小樣酒拉出整體設計的基調，然後以巧克力做最後的裝飾和點綴！
                    </dd>
                  </div>
                </dl>
              </div>
            </div>
            <div id="scroll-hooks-detail" data-sticky-target="detail" data-tracking-seen="detail">

              <div id="js-block-detail" class="m-box m-box-main m-product-detail">
                <h2 class="m-box-title">商品介紹</h2>
                <div class="m-box-body">
                  <div class="js-lazy-init richtext-content s-inited">
                    <div>
                      <div id="description" class="m-product-detail-content js-detail-content" data-more="閱讀更多" data-close="收合" style="min-height: auto;">
                        <div class="m-richtext js-detail-content-inner"><br>
                          <div data-translate="description">【客製化蛋糕】酒鬼蛋糕-絕對伏特加<br>是一款以奶油霜為基底的客製化蛋糕，以黑色和灰色調做出沈穩男生的感覺，在蛋糕整體運用了小樣酒拉出整體設計的基調，然後以巧克力做最後的裝飾和點綴！<br><br>為了確保宅配的完整度，以及造型上的發揮，我們的所有蛋糕皆為蛋白奶油霜蛋糕而非鮮奶油蛋糕。<br>為了降低蛋糕的甜度，我們奶油霜採低糖做法，吃起來帶淡淡的奶香。<br>請在收到蛋糕後冷藏退冰至少8小時以上，或室溫退冰兩小時以上口感較佳。<br><br>為響應環保，蛋糕不另附一次性的餐盤，刀子，請訂購時需注意唷！<br><br>客製化蛋糕訂購流程<br>1.先聯絡設計師，討論想要的尺寸，大小，風格！可以提供相關參考圖片，我們會依據內容做設計，但因為我們不抄襲其他設計者的作品，所以無法100％一樣。訂購前請考慮。請務必先討論再下訂！！！！架上蛋糕也可以直接訂購。<br>2.協定好內容，價格後我們會上架商品，再麻煩下訂付款！<br>3.下訂付款後約7-14個工作天出貨，依據每期訂單數量，以及訂單複雜度會有所改變，急需蛋糕者請勿訂購！<br><br>【主要成分】麵粉，蛋，糖，牛奶，奶油<br>【保存方式與期限】冷藏保存3天，建議趁早食用完畢！<br>【尺寸】6吋蛋糕<br>【包裝方式】以蛋糕包裝盒包裝！<br><br>運送宅配注意事項！！！！！<br>經過討論設計的蛋糕，會以宅配為主要設計方向，也會針對宅配做出適合妥善的包裝方式，但是在宅配過程中不能保證完全沒有損傷，所以在下訂前請先考慮再三！有重大損傷者，請在收到貨品後2小時內拍照回傳告知，我們將理賠損失，但最高賠償上限為新台幣1000元整</div><br>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


        </div>
        <div class="row">
          <div class="col-md-4 mb-5">
            <div class="card h-100">
              <div class="card-body">
                <h2 class="card-title">Card One</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-primary btn-sm">More Info</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-4 -->
          <div class="col-md-4 mb-5">
            <div class="card h-100">
              <div class="card-body">
                <h2 class="card-title">Card Two</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-primary btn-sm">More Info</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-4 -->
          <div class="col-md-4 mb-5">
            <div class="card h-100">
              <div class="card-body">
                <h2 class="card-title">Card Three</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-primary btn-sm">More Info</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-4 -->

        </div>
        <!-- /.col-lg-8 -->

        <!-- /.col-md-4 -->
        <!-- 商品介紹 -->

      </div>


    </div>
    <!-- /.row -->


    <!-- Call to Action Well -->
    <!-- <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0">This call to action card is a great place to showcase some important information or display a clever tagline!</p>
      </div>
    </div> -->
    <!-- Content Row -->

    <!--  -->
    <!-- /.row -->

    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>