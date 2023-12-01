<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Campus Connect</title>
  <link rel="stylesheet" href="../css/mainmain.css">
  <link rel="icon" type="image/png" sizes="32x32" href="../icon/favicon-32x32.png">
</head>
<body>
  <header>
  <img src="../icon/eco.png" width = "60px"; height = "60px">
    <nav class="navigation">
      <a href="#box4">Активисты</a>
      <a href="#usptu">О сервисе</a>
      <a href="#futter">Контакты</a>
    </nav>
    <?php
      require_once '../php-files/connect.php';
      $user_id = $_COOKIE['user_id']; 
      $namesur = "SELECT name,surname FROM users WHERE Student_id = '$user_id'";
      $res_namesur = $connect->query($namesur);
      
      if ($res_namesur->num_rows > 0) {
        $row_name = $res_namesur->fetch_assoc();
        $text = $row_name['name'] . " " . $row_name['surname'] . "\n";
        file_put_contents('../text.txt', $text);
        }
      if($user_id == ''): 
    ?>
      <form action="login.html"><button class="buttonLogin">Войти</button></form>
    <?php 
      else: 
    ?>
      <nav>
        <img src="<?php
                    if($user_id == 1){
                      $avatar_select_moder = "select avatar
                                              from avatars
                                              where Avatar_id = 4";
                      $avatar_connect = $connect->query($avatar_select_moder);
                      $ros = $avatar_connect->fetch_assoc();
                      echo $ros['avatar'];
                    } else{
                      $avatar_select_user = "select avatar
                                              from avatars
                                              join users on users.Avatar_id = avatars.Avatar_id
                                              where users.Student_id = '$user_id'";
                      $avatar_connect = $connect->query($avatar_select_user);
                      $ros = $avatar_connect->fetch_assoc();
                      echo $ros['avatar'];
                    }
                  ?>" 
                  width = "60px"; height = "60px" class= "use-pic" onclick="toggleMenu()">
        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="usr-info">
              <?php 
                if($user_id != '1'): 
              ?>
              <?php
                  $have_name = "select name,surname from users where Student_id = '$user_id'";
                  $res_have_name = $connect->query($have_name);
                  if($res_have_name->num_rows > 0):
                      while($rowname = $res_have_name->fetch_assoc()):
              ?>
                <p> <?php echo $rowname['name'];?> </p>
                <p><?php echo $rowname['surname']; ?></p>
                <?php endwhile; 
                      endif;
                ?>
              

              <a href=" http://localhost/UsptuCamCon/html/anketa.html" class="sub-menu-link">
                <p>Заполнить анкету</p>
                <span>></span>
              </a>
              <?php
                endif; 
              ?>
              <a href="http://localhost/UsptuCamCon/html/look.php" class="sub-menu-link">
                <p>Посмотреть ивенты</p>
                <span>></span>
              </a>
              <a href="http://localhost/UsptuCamCon/html/create.html" class="sub-menu-link">
                <p>Создать ивент</p>
                <span> > </span>
              </a>
              <?php 
                $have_event = "select Event_id from events where Student_id = '$user_id'";
                $res_have_event = $connect->query($have_event);
                if($res_have_event->num_rows > 0):
              ?>
                <a href="http://localhost/UsptuCamCon/html/came-to-user.php" class="sub-menu-link">
                  <p>Отметить</p>
                  <span> > </span>
                </a>
              <?php 
                endif;
                if($user_id === '1'):
              ?>
                <a href="http://localhost/UsptuCamCon/html/check.php" class="sub-menu-link">
                          <p>Проверить ивент</p>
                          <span> > </span>
                        </a>
              <?php 
                endif;
                ?>
              <?php
                $file1 = file_get_contents('../text.txt');
                $file2 = file_get_contents('../textcreate.txt');
                $file3 = file_get_contents('../textjoin.txt');
                $combined = $file1 . "\n" . $file2 . "\n" . $file3;
                file_put_contents('../combined.txt', $combined);
              ?>
                <a href="..\php-files\save.php" class="sub-menu-link">
                  <p>Cкачать отчет</p> 
                  <span> > </span>
                </a>
              <a href="http://localhost/UsptuCamCon/php-files/exit.php" class="sub-menu-link">
                <p>Выход</p>
                <span>></span>
              </a>
              <?php
                $have_count = "select Count(Student_id) as count from users";
                $connect->next_result();
                $res_have_count = $connect->query($have_count);
                $row_count = $res_have_count->fetch_assoc();
                echo "Количество пользователей: " . $row_count['count'];
               ?>
            </div>
          </div>
        </div>
      </nav>
    <?php 
      endif; 
    ?>
    </nav>
  </header>
  <div class="campus_connect" id="first">
      USPTU <br/>campus connect
  </div>
  <div class="under_connect">
    Сайт для знакомств и встреч. 
    <br/>Участвуй! Создавай! Дружи!
  </div>
  <?php 
      if($user_id == ''): 
    ?>
  <nav class="navigation_club">
    <form action="login.html"><button class="buttonClub">Присоединяйся!</button></form>
  </nav>
  <?php 
    endif;
  ?>
    <div class="union">
      <img src="../icon/union.png" width = "600px"; height = "500px">
    </div>
    <div class="box2" id="box2">
        <div class="whychoose">Почему выбирают<br/>наш сайт</div>
        <div class="inbox1">
          <div class="title1">Уникальность</div>
          <div class="overview1">Возможность создания мероприятий любого типа и масштаба через простой и удобный интерфейс.</div>
          <div class="icon1back">
          <div class="icon1">
            <img class="choose-icon" src="../icon/identification.png" />
          </div>
          </div>
        </div>
        <div class="inbox2">
          <div class="title2">Широкий выбор</div>
          <div class="overview2">Выбор мероприятий в различных общежитиях и факультетах.</div>
          <div class="icon2back">
          <div class="icon2">
            <img class="choose-icon" src="../icon/products.png" />
          </div>
        </div>
      </div>
        <div class="inbox3">
          <div class="title3">Безопасность</div>
          <div class="overview3">Безопасность пользователей и гарантия качества проводимых мероприятий.</div>
          <div class="icon3back">
          <div class="icon3">
            <img class="choose-icon" src="../icon/eco.png" />
          </div>
        </div>
        </div>
      </div>

      <div class="box4" id="box4">
        <div class="thebest">Лучшие за последний месяц</div>
        <?php
            $sort = "CALL SortByColumn('users','Rating')";
            $result = $connect->query($sort);
            $count = 0;
            while($row = mysqli_fetch_row($result)):
              if($count === 0):
          ?>
      <div class="chel1">
        <?php $avatar_src = "select avatar from avatars where Avatar_id = '$row[10]'";
              $connect->next_result();
              $avat = $connect->query($avatar_src);
              $avata = $avat->fetch_assoc();
        ?>
        <img class="chel-icon" src="<?php echo $avata['avatar'] ?>">
        <div class="cheltext"><?php echo $row[1], ' ', $row[2]; ?></div>
        <div class="rating">Рейтинг: <?php echo $row[9]; ?></div>
      </div>
      <?php endif; 
          if($count === 1):
      ?>
      <div class="chel2">
        <?php $avatar_src = "select avatar from avatars where Avatar_id = '$row[10]'";
              $connect->next_result();
              $avat = $connect->query($avatar_src);
              $avata = $avat->fetch_assoc();
        ?>
        <img class="chel-icon" src="<?php echo $avata['avatar'] ?>" />
        <div class="cheltext"><?php echo $row[1], ' ', $row[2]; ?></div>
        <div class="rating">Рейтинг: <?php echo $row[9]; ?></div>
      </div>
      <?php
        endif;
        if($count === 2):
      ?>
      <div class="chel3">
        <?php $avatar_src = "select avatar from avatars where Avatar_id = '$row[10]'";
              $connect->next_result();
              $avat = $connect->query($avatar_src);
              $avata = $avat->fetch_assoc();
        ?>
        <img class="chel-icon" src="<?php echo $avata['avatar'] ?>" />
        <div class="cheltext"><?php echo $row[1], ' ', $row[2]; ?></div>
        <div class="rating">Рейтинг: <?php echo $row[9]; ?></div>
      </div>
      <?php
        endif;
        $count++;
        endwhile; 
      ?>
      <div class="usptu" id="usptu">Об USPTU campus connect</div>
      <div class="underusptu">Мы - команда мечтателей</div>
      <div class="usptutext">Наша платформа может предложить возможность создания профилей студентов, где они могут делиться информацией о себе, своих интересах, учебных достижениях и других аспектах своей жизни.<br/>
        <br/>Также студенты могут искать потенциальных партнеров или друзей на основе их интересов, учебных групп или принадлежности к различным студенческим организациям.</div>
        <img class="ufa-icon" src="../icon/ufa.jpg" />
    </div>
    <div class="futer" id="futter">
      <img class="futer_icon" src="../icon/eco.png"/>
      <div class="futer_text">USPTU campus connect </div>
      <div class="under_futur_text">2023 © Все права защищены</div>
      <a href="#first">
        <img class="futer_icon2" src="../icon/up-arrow (1).png"/>
      </a>
      <img class="phone" src="../icon/phone.png"/>
      <div class="numberphone">+7 968 658-23-76</div>
    </div>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script>
        let subMenu = document.getElementById("subMenu")

        function toggleMenu(){
          subMenu.classList.toggle("open-menu");
          }
      </script>
</body>
</html>