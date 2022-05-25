<style>
  /*ナビ付きヘッダー*/
  a {
    text-decoration: none;
    color: inherit;
  }

  .header {
    width: 96%;
    display: flex;
    align-items: center;
    height: 70px;
    padding: 1px 2%;
    background-color: #fff;
    color: black;
    position: fixed;
    top: 0%;
    left: 0%;
    z-index: 10;
    position: relative;
  }

  .header-ttl {
    padding-bottom: 1%;
    font-size: 18px;
    width: 120px;
    position: absolute;
    left: 2%;
  }

  .header-ttl img {
    width: 80px;
    padding-top: 15%;
  }

  .header-ttl:hover {
    opacity: 0.5;
    transition: 1s;
  }

  .header-nav-list {
    font-size: 16px;
    font-weight: bold;
    display: flex;
    color: black;
    list-style: none;
    position: absolute;
    right: 2%;
  }

  .header-nav-list :hover {
    opacity: 0.5;
    transition: 1s;
  }

  .header-nav-item:not(:last-child) {
    margin-right: 30px;
  }

  .sp-nav {
    visibility: hidden;
  }

  /*サービス*/
  .wrapper-box {
    background-color: lightgray;
    padding-bottom: 100px;
  }

  .wrapper-box h1 {
    text-align: center;
    font-size: 25px;
    padding-top: 5%;
  }

  .wrapper-contents1,
  .wrapper-contents2 {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 0 auto;
    padding-top: 3%;
    text-align: center;
  }

  .atte_start_button,
  .atte_end_button,
  .interval_start_button,
  .interval_end_button {
    width: 50%;
  }

  .atte_start_button p,
  .atte_end_button p,
  .interval_start_button p,
  .interval_end_button p {
    font-size: x-large;
    font-weight: bolder;
  }

  button {
    padding: 15% 35%;
    background-color: white;
    border: none;
    border-radius: 5px;
  }

  /* レスポンシブ表示を隠す */
  .sp-wrapper-box {
    display: none;
  }


  /*フッター*/
  .footer {
    text-align: center;
    padding-top: 10px;
  }

  .copyright {
    font-size: 12px;
    color: white;

  }

  .sp-footer {
    display: none;
  }

  /*ここにスマホ用のCSSを書いていきます*/
  @media screen and (max-width: 768px) {
    .header-nav {
      display: none;
    }

    a {
      text-decoration: none;
    }

    .sp-nav {
      position: absolute;
      top: 35%;
      height: 100vh;
      width: 100%;
      left: -100%;
      background: rgb(252, 251, 251);
      transition: 0.7s;
      text-align: center;
      visibility: visible;
    }

    .sp-nav ul li {
      list-style-type: none;
      margin-top: 50px;
      color: blue;
    }

    .sp-nav ul li :hover {
      opacity: 0.5;
      transition: 1s;
    }

    .menu-box {
      position: relative;
    }

    .menu {
      display: inline-block;
      width: 36px;
      height: 32px;
      cursor: pointer;
      position: absolute;
      right: 2%;
    }

    .menu__line--top,
    .menu__line--middle,
    .menu__line--bottom {
      display: inline-block;
      width: 100%;
      height: 4px;
      background-color: black;
      position: absolute;
      right: 2%;
      transition: 0.5s;
    }

    .menu__line--top {
      top: 0;
    }

    .menu__line--middle {
      top: 14px;
    }

    .menu__line--bottom {
      bottom: 0;
    }

    .menu.open span:nth-of-type(1) {
      top: 14px;
      transform: rotate(45deg);
    }

    .menu.open span:nth-of-type(2) {
      opacity: 0;
    }

    .menu.open span:nth-of-type(3) {
      top: 14px;
      transform: rotate(-45deg);
    }

    .in {
      transform: translateX(100%);
    }

    /*レスポンシブデザイン用フッター*/
    .footer {
      display: none;
    }

    .sp-footer {
      height: 240px;
      padding: 0 18%;
      display: flex;
      justify-content: space-between;
      background-color: black;
      color: white;
    }

    .sp-copyright {
      font-size: 12px;
      color: white;
      padding-top: 30%;
    }

    .footer-sp-nav {
      position: relative;
      padding-top: 2%;
    }

    .footer-sp-nav a {
      padding: 10px;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    .footer-sp-nav-list {
      font-size: 12px;
      color: white;
      list-style: none;
      margin: 0 0 0 auto;
      text-align: center;
      padding: 20% 0;
    }

    .footer-sp-nav-item {
      padding: 8% 0;
    }

    .footer-sp-nav-list :hover {
      opacity: 0.5;
      transition: 1s;
    }

    /*レスポンシブデザイン用　サービス*/
    .wrapper-box {
      display: none;
    }

    .sp-wrapper-box {
      display: block;
      padding: 10%;
    }

    .sp-wrapper-box h1 {
      text-align: center;
      font-size: 25px;
    }

    .sp-wrapper-contents {
      padding: 5% 0;
    }

    /*レスポンシブデザイン用　社員ブログ*/
    .wrapper2-box {
      display: none;
    }

    .sp-wrapper2-box {
      display: block;
      padding: 10%;
    }

    .sp-wrapper2-contents {
      padding: 5% 0%;
    }

    .card2 {
      width: 100%;
      padding: 1%;
    }

    .card2 :hover {
      opacity: 0.5;
      transition: 1s;
    }

    .card2 img {
      width: 100%;
      height: auto;
    }

    .text2-box {
      padding: 2% 0 2% 0;
    }

    .date2 {
      display: inline-block;
      font-size: 12px;
      margin-top: 5px;
      padding-bottom: 2%;
      color: rgb(109, 106, 106);
    }

  }
</style>

<body>
  <!--ナビ付きヘッダー ※要スクロール固定-->
  <header class="header">

    <h1 class="header-ttl">
      Atte
    </h1>
    <nav class="header-nav">
      <ul class="header-nav-list">
        <li class="header-nav-item"><a href="/index">ホーム</a></li>
        <li class="header-nav-item"><a href="service.html">日付一覧</a></li>
        <li class="header-nav-item">ログアウト
          <!-- Rese2を真似る-->
        </li>
      </ul>
    </nav>
  </header>

  <!--サービス-->
  <div class="wrapper-box">
    <!--変数で代入-->
    <h1 class="user-name">
      @auth
      {{Auth::user()->name}}さん、お疲れ様です！
      @endauth
    </h1>

    <div class="wrapper-contents1">
      <div class="atte_start_button">
        <form action="/atte_start" method="post">
          @csrf
          <button type="submit" class="btn-review">
            <p>勤務開始</p>
          </button>
        </form>
      </div>
      <div class="atte_end_button">
        <form action="/atte_end" method="post">
          @csrf
          <button type="submit" class="btn-review">
            <p>勤務終了</p>
          </button>
        </form>
      </div>
    </div>

    <div class="wrapper-contents2">
      <div class="interval_start_button">
        <form action="/interval_start" method="post">
          @csrf
          <button type="submit" class="btn-review">
            <p>休憩開始</p>
          </button>
        </form>
      </div>
      <div class="interval_end_button">
        <form action="/interval_end" method="post">
          @csrf
          <button type="submit" class="btn-review">
            <p>休憩終了</p>
          </button>
        </form>
      </div>
    </div>

  </div>

  </div>

  <!--レスポンシブデザイン用　サービス-->
  <div class="sp-wrapper-box">
    <h1 class="service">サービス</h1>
    <div class="sp-wrapper-contents">

      <div class="card">
        <img src="./img/service1.png" />
        <div class="text-box">
          <p class="hr-message1">IT人材育成事業</p><br>
          <p class="hr-message2">これまでに培った教育手法を生かして、短期間で即戦力のIT人材を育成します。</p>
        </div>
      </div>

      <div class="card">
        <img src="./img/service2.png" />
        <div class="text-box">
          <p class="coaching-message1">コーチング事業</p><br>
          <p class="coaching-message2">目標達成を最短で実現するために、プロのコーチによるマンツーマンのサポートを実施します。</p>
        </div>
      </div>

      <div class="card">
        <img src="./img/service3.png" />
        <div class="text-box">
          <p class="consalting-message1">ITコンサル事業</p><br>
          <p class="consalting-message2">経営戦略にIT戦略を策定し、システム開発の提案やシステムの最適化を通じて、企業の経営をサポートします。</p>
        </div>
      </div>

      <div class="card">
        <img src="./img/service4.png" />
        <div class="text-box">
          <p class="dx-message1">デジタルトランスフォーメーション事業</p><br>
          <p class="dx-message2">人々の生活をよりよいものに変革するために様々なデジタル技術を活用し、革新的なソリューションやサービスを生み出します。</p>
        </div>
      </div>

    </div>

  </div>
  </div>

  <!--フッター-->
  <footer class="footer">
    <small class="sp-copyright">
      Atte, inc.
    </small>
  </footer>

  <!--レスポンシブデザイン用　フッター-->
  <div class="sp-footer">
    <small class="sp-copyright">
      Atte, inc.
    </small>
  </div>

</body>