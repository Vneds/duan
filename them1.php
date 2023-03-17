<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            padding:0px;
            margin: 0px;
        }
        .admin{
            height: 200px;
            background: #DBD0CC;
        }
        .admin a {
            margin-right: 10px ;
        }
    .dangky{
    width: 636px;
    height: 679px;
    background: #FAF9F8;
    margin: 0 auto;
  }
  .singin{
    width: 536px;
    margin: 0 auto;
  }
  .singin p {
    font-weight: 550;
  font-size: 18px;
  margin-bottom: 4px;
  margin-top: 22px;
  }
  .singin p label {
    color: #d6001c;
  }
  input{
    width: 100%;
    height: 54px;
    margin-bottom: 20px;
    font-size: 18px;
    font-weight: 500;
    padding-left: 10px;
  }
  #input{
    margin-bottom: 7px;
    padding-left: 20px;
  }
  #input1{
    margin-bottom: 0px;
  }
  #input2{
    text-align: center;
    border: 1px solid;
    padding: 11px;
  }
  #input3{
    font-size: 16px;
    padding-left: 10px;
    margin-top: 10px;
  }
  label{
    font-size: 14px;
    color: #707070;
    margin-bottom: 50px;
  }
  select{
    font-size: 16px;
    padding-left: 10px;
    margin-top: 10px;
    width: 100%;
    height: 54px;

  }
  button{
    width: 100%;
    height: 54px;
    margin-bottom: 20px;
  }
  #but1{
    background: #323334;
    font-size: 16px;
    color: #FFFFFF;
    text-transform: uppercase;
    font-weight: 700;
  }
  u{
    font-size: 16px;
    margin-left: 250px;
    margin-bottom: 39px;
    color: #000000;
  }
    </style>
</head>
<body>
    <?php
        include_once('./connect_db.php');
        $catergory_list = $conn->query('SELECT * FROM catergory')->fetchAll();
    ?>
    <div class="col-12 dangky">
                <div class="singin">
                    <form action="them.php" method ="post" enctype="multipart/form-data">
                        <p>Name <label for="">*</label></p>
                        <input name="name" type="name" id="email" required>
                        <p>Price <label for="">*</label></p>
                        <input type="text" placeholder="" id="input3" name="price">
                        <select name="catergory" id="">
                            <?php
                                foreach($catergory_list as $catergory){
                            ?>
                                <option value=<?php echo $catergory['id']?>> <?php echo $catergory['catergory_name']?></option>
                            <?php }?>
                        </select>
                        <p>File <label for="">*</label></p> 
                        <input type="file" name="img" id="input2">
                        <input type="submit" id="but1" value="Update">
                    </form>
                    <a href=""><u>Back to</u></a>
                </div>
            </div>
        </div>
</body>
</html>