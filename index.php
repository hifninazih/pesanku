<?php
include './koneksi-db.php';
$telegrambot = 'bot[TOKEN_BOT]';
$user = '[ID_PENGGUNA]';
function sendMessage($text, $bot, $chat_id){
$url = 'https://api.telegram.org/' . $bot . '/sendMessage?chat_id=' . $chat_id . '&text=' . $text;
$result = file_get_contents($url, true);
return $result;
}
if(!isset($_POST['submit'])) {
sendMessage("Log : Clicked",$telegrambot,$user);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Message</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <!-- background animation -->
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
      <defs>
      <linearGradient id="bg">
        <stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
        <stop offset="50%" style="stop-color:rgba(76, 190, 255, 0.6)"></stop>
        <stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.2)"></stop>
      </linearGradient>
      <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
        s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
        </defs>
        <g>
          <use xlink:href='#wave' opacity=".3">
          <animateTransform
            attributeName="transform"
            attributeType="XML"
            type="translate"
            dur="10s"
            calcMode="spline"
            values="270 230; -334 180; 270 230"
            keyTimes="0; .5; 1"
            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
            repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".6">
            <animateTransform
              attributeName="transform"
              attributeType="XML"
              type="translate"
              dur="8s"
              calcMode="spline"
              values="-270 230;243 220;-270 230"
              keyTimes="0; .6; 1"
              keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
              repeatCount="indefinite" />
              </use>
              <use xlink:href='#wave' opacty=".9">
              <animateTransform
                attributeName="transform"
                attributeType="XML"
                type="translate"
                dur="6s"
                calcMode="spline"
                values="0 230;-140 200;0 230"
                keyTimes="0; .4; 1"
                keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                repeatCount="indefinite" />
                </use>
              </g>
            </svg>
            <!-- CONTENT -->
            <div class="container">
              <form class="box" action="" method="post">
                <div class="header">
                  <h2>Pesan anonim</h2>
                </div>
                <textarea type="text" name="pesan" id="pesan" placeholder="Kirim pesan anonim untuk @hifninazih" required></textarea>
                <button name="submit" class="btn btn-primary" type="submit">Kirim</button>
              </form>
            </div>
            <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
          </body>
        </html>
        <?php
        } else {
        $pesan = $_POST['pesan'];
        $time = time();
        // Query
        $sql = "INSERT INTO data
        VALUES('', '{$time}', '{$pesan}')";
        $query = mysqli_query($db_conn, $sql);
        sendMessage("Log : Sent",$telegrambot,$user);
        sendMessage($pesan,$telegrambot,$user);
        echo "<meta http-equiv='refresh' content='0; url=thx.php'>";
        }
        ?>
