<?php require_once("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Handycraft</title>

  <style>
  /* Button used to open the chat form - fixed at the bottom of the page */
  .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    position: fixed;
    bottom: 23px;
    right: 28px;
    width: 280px;
  }

  /* The popup chat - hidden by default */
  .chat-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width textarea */
  .form-container textarea {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    resize: none;
    min-height: 200px;
  }

  /* When the textarea gets focus, do something */
  .form-container textarea:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/send button */
  .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }

  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
</style>

</head>
<body>

  <?php require_once("header.php"); ?>
  <?php 
    if (isset($_SESSION["authen"])){  
      if ($_SESSION["authen"] || $_SESSION["admin"]){
        include("sidebar.php");
      } 
      else {
      }
    }
  ?>

	<!-- Slideshow -->

	<div class="container">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img style="width:1200px; height:600px;" src="images/slide1.jpg">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>HandyCraft Collection</h5>
		        <p>Find your Products</p>
		      </div>
		    </div>
		    <div class="carousel-item ">
          <img style="width:1200px; height:600px;" src="images/slide2.jpeg">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>HandyCraft Collection</h5>
		        <p>Find your Products</p>
		      </div>
		    </div>
		    <div class="carousel-item">
          <img style="width:1200px; height:600px;" src="images/slide3.jpg">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>HandyCraft Collection</h5>
		        <p>Find your Products</p>
		      </div>
		    </div>
        <div class="carousel-item">
          <img style="width:1200px; height:600px;" src="images/slide4.webp">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>HandyCraft Collection</h5>
		        <p>Find your Products</p>
		      </div>
		    </div>
		  </div>

		  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>

	 


	  <div class="headline">
	  	<h1>Our Best HandyCrafts</h1>
	  </div>

	  <div class="container panjabi">
	  	 <div class="row">
        <?php 
          $sql = "SELECT * FROM `product` WHERE category='Art work'  OR category='Embroidery' OR category='Paper crafts' OR category='Pottery' OR category='Woodwork' ORDER BY rand() ";
            $result=$con->query($sql);
            while($row = mysqli_fetch_assoc($result))
            {
        ?>		
		    	 <a href="product.php?id=<?php echo $row["id"]; ?>&name=<?php echo $row["name"]; ?>">
		     	 <div class="col-sm-3">      
		          <form id="form" name="form" >
		            <div class="card card-body" style="">
		              <img class="card-img-top img-responsive" src="images/<?php echo $row["image"]; ?>" /><br />

                  <?php 
                    $o = $row["o_price"];
                    $n = $row["n_price"];
                    if ($o !=0 ){
                      $d = 100 - (($n*100)/$o);
                  ?>
                      <span class="onsale">-<?php echo number_format($d); ?>%</span>
                  <?php } else {} ?>

		              <h4 class="text-info"><?php echo $row["name"]; ?></h4>

		          	  <h4 class="text-success" style="font-weight: 600;"> 
		          	  	<?php 
		          	  		$op = $row["o_price"];
		          	  		if($op != 0 ) { 
		          	  	?>
		          	  	<span class="o_price">৳ <?php echo $row["o_price"]; ?></span> <?php } ?>  ৳ <?php echo $row["n_price"]; ?>
		          	  </h4></a>
                    <?php if (isset($_SESSION["authen"])){
                      if ($_SESSION["authen"] || $_SESSION["admin"]){ ?>
                  
                  
                    <?php
                      $stock = $row["stock"]; 
                      if($stock>0){ ?>
                        <span style="color: red;font-weight: 900;margin-top: 5px;">
                        <?php echo "# ".$stock." left in stock"; ?>
                      </span><br><?php
                      } else { ?>
                        <span class="stck">Out of stock</span>
                      <?php
                      }
                     ?>
                  

		              <input type="hidden" name="id" id="id<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" />
                  <input type="hidden" name="hidden_name" id="hidden_name<?php echo $row["id"]; ?>" value="<?php echo $row["name"]; ?>" />
                  <input type="hidden" name="hidden_price" id="hidden_price<?php echo $row["id"]; ?>" value="<?php echo $row["n_price"]; ?>" />
                  <input type="hidden" name="hidden_stk" id="hidden_stk<?php echo $row["id"]; ?>" value="<?php echo $row["stock"]; ?>" />
                  <input type="hidden" name="hidden_img" id="hidden_img<?php echo $row["id"]; ?>" value="<?php echo $row["image"]; ?>" />
                  <p class="rslt" id="result<?php echo $row["id"]; ?>"></p>
                  <?php
                    $stock = $row["stock"]; 
                    if($stock>0){
                  ?>
                      
                  <?php
                    } else {
                  ?>
                      <p style="font-size: 15px;color: green;font-weight: 900;margin-top: 10px;">
                        Stock coming soon, stay with us!
                      </p>
                  <?php
                    }
                  } else {
                  ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }} else{
                    ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }
                  ?>

		            </div>
		          </form>
        
		        </div>
		    <?php
		        }
		     ?>
        
	  	 </div>
	  </div>

	  

        <div class="container Dresses">
       <div class="row">
        <?php 
          $sql = "SELECT * FROM `product` WHERE category='Water Jar' OR category='Decorative' ORDER BY rand() ";
            $result=$con->query($sql);
            while($row = mysqli_fetch_assoc($result))
            {
        ?>    
           <a href="product.php?id=<?php echo $row["id"]; ?>&name=<?php echo $row["name"]; ?>">
           <div class="col-sm-3">      
              <form id="form" name="form">
                <div class="card card-body" style="">
                  <img class="card-img-top img-responsive" src="images/<?php echo $row["image"]; ?>" /><br />

                  <?php 

                    $o = $row["o_price"];
                    $n = $row["n_price"];
                    if ($o !=0 ){
                      $d = 100 - (($n*100)/$o);
                  ?>
                      <span class="onsale">-<?php echo number_format($d); ?>%</span>
                  <?php } else {} ?>

                  <h4 class="text-info"><?php echo $row["name"]; ?></h4>

                  <h4 class="text-success" style="font-weight: 600;"> 
                    <?php 
                      $op = $row["o_price"];
                      if($op != 0 ) { 
                    ?>
                    <span class="o_price">৳ <?php echo $row["o_price"]; ?></span> <?php } ?>  ৳ <?php echo $row["n_price"]; ?>
                  </h4></a>
                  <?php if (isset($_SESSION["authen"])){if ($_SESSION["authen"] || $_SESSION["admin"]){ ?>
                  
                    <?php
                      $stock = $row["stock"]; 
                      if($stock>0){ ?>
                        <span style="color: red;font-weight: 900;margin-top: 5px;">
                        <?php echo "# ".$stock." left in stock"; ?>
                      </span><br><?php
                      } else { ?>
                        <span class="stck">Out of stock</span>
                    <?php
                      }
                    ?>
                  

                  <input type="hidden" name="id" id="id<?php echo $row["id"]; ?>" value="<?php echo $row["id"]; ?>" />
                  <input type="hidden" name="hidden_name" id="hidden_name<?php echo $row["id"]; ?>" value="<?php echo $row["name"]; ?>" />
                  <input type="hidden" name="hidden_price" id="hidden_price<?php echo $row["id"]; ?>" value="<?php echo $row["n_price"]; ?>" />
                  <input type="hidden" name="hidden_stk" id="hidden_stk<?php echo $row["id"]; ?>" value="<?php echo $row["stock"]; ?>" />
                  <input type="hidden" name="hidden_img" id="hidden_img<?php echo $row["id"]; ?>" value="<?php echo $row["image"]; ?>" />
                  <p class="rslt" id="result<?php echo $row["id"]; ?>"></p>
                  <?php
                    $stock = $row["stock"]; 
                    if($stock>0){
                  ?>
                      
                  <?php
                    } else {
                  ?>
                      <p style="font-size: 15px;color: green;font-weight: 900;margin-top: 10px;">
                        Stock coming soon, stay with us!
                      </p>
                  <?php
                    }
                  } else {
                  ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }} else{
                    ?>
                    <a href="register.php" style="color: red;font-size: 20px;font-weight: 900;">Sign in to continue</a>
                  <?php
                  }
                  ?>

                </div>
              </form>
            </div>
        <?php
            }
         ?>
        
       </div>
    </div>

    <!-- <style>

    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Nunito', sans-serif;
    font-weight: 400;
    font-size: 100%;
    background: #F1F1F1;
}

*, html {
    --primaryGradient: linear-gradient(93.12deg, #581B98 0.52%, #9C1DE7 100%);
    --secondaryGradient: linear-gradient(268.91deg, #581B98 -2.14%, #9C1DE7 99.69%);
    --primaryBoxShadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
    --secondaryBoxShadow: 0px -10px 15px rgba(0, 0, 0, 0.1);
    --primary: #581B98;
}

/* CHATBOX
=============== */
.chatbox {
    position: absolute;
    bottom: 30px;
    right: 30px;
    top: auto;
    display: scroll;
}

/* CONTENT IS CLOSE */
.chatbox__support {
    display: flex;
    flex-direction: column;
    background: #eee;
    width: 300px;
    height: 350px;
    z-index: -123456;
    opacity: 0;
    transition: all .5s ease-in-out;
}

/* CONTENT ISOPEN */
.chatbox--active {
    transform: translateY(-40px);
    z-index: 123456;
    opacity: 1;

}

/* BUTTON */
.chatbox__button {
    text-align: right;
}

.send__button {
    padding: 6px;
    background: transparent;
    border: none;
    outline: none;
    cursor: pointer;
}


/* HEADER */
.chatbox__header {
    position: sticky;
    top: 0;
    background: orange;
}

/* MESSAGES */
.chatbox__messages {
    margin-top: auto;
    display: flex;
    overflow-y: scroll;
    flex-direction: column-reverse;
}

.messages__item {
    background: orange;
    max-width: 60.6%;
    width: fit-content;
}

.messages__item--operator {
    margin-left: auto;
}

.messages__item--visitor {
    margin-right: auto;
}

/* FOOTER */
.chatbox__footer {
    position: sticky;
    bottom: 0;
}

.chatbox__support {
    background: #f9f9f9;
    height: 450px;
    width: 350px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

/* HEADER */
.chatbox__header {
    background: var(--primaryGradient);
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 15px 20px;
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    box-shadow: var(--primaryBoxShadow);
}

.chatbox__image--header {
    margin-right: 10px;
}

.chatbox__heading--header {
    font-size: 1.2rem;
    color: white;
}

.chatbox__description--header {
    font-size: .9rem;
    color: white;
}

/* Messages */
.chatbox__messages {
    padding: 0 20px;
}

.messages__item {
    margin-top: 10px;
    background: #E0E0E0;
    padding: 8px 12px;
    max-width: 70%;
}

.messages__item--visitor,
.messages__item--typing {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
}

.messages__item--operator {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    background: var(--primary);
    color: white;
}

/* FOOTER */
.chatbox__footer {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: 20px 20px;
    background: var(--secondaryGradient);
    box-shadow: var(--secondaryBoxShadow);
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
    margin-top: 20px;
}

.chatbox__footer input {
    width: 80%;
    border: none;
    padding: 10px 10px;
    border-radius: 30px;
    text-align: left;
}

.chatbox__send--footer {
    color: white;
}

.chatbox__button button,
.chatbox__button button:focus,
.chatbox__button button:visited {
    padding: 10px;
    background: white;
    border: none;
    outline: none;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
    border-bottom-left-radius: 50px;
    box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

</style>

<div class="">
    <div class="chatbox">
        <div class="chatbox__support">
            <div class="chatbox__header">
                <div class="chatbox__image--header">
                  
                </div>
                <div class="chatbox__content--header">
                    <h4 class="chatbox__heading--header">Chat Bot</h4>
                    <p class="chatbox__description--header">Hi. This is Handycraft Website. How can we help you?</p>
                </div>
            </div>
            <div class="chatbox__messages">
                <div></div>
            </div>
            <div class="chatbox__footer">
                <input type="text" placeholder="Write a message...">
                <button class="chatbox__send--footer send__button">Send</button>
            </div>
        </div>
        <div class="chatbox__button">
            <button><img src="./images/chatbox-icon.svg" /></button>
        </div>
    </div>
</div>

<script>
  class Chatbox {
    constructor() {
        this.args = {
            openButton: document.querySelector('.chatbox__button'),
            chatBox: document.querySelector('.chatbox__support'),
            sendButton: document.querySelector('.send__button')
        }

        this.state = false;
        this.messages = [];
    }

    display() {
        const {openButton, chatBox, sendButton} = this.args;

        openButton.addEventListener('click', () => this.toggleState(chatBox))

        sendButton.addEventListener('click', () => this.onSendButton(chatBox))

        const node = chatBox.querySelector('input');
        node.addEventListener("keyup", ({key}) => {
            if (key === "Enter") {
                this.onSendButton(chatBox)
            }
        })
    }

    toggleState(chatbox) {
        this.state = !this.state;

        // show or hides the box
        if(this.state) {
            chatbox.classList.add('chatbox--active')
        } else {
            chatbox.classList.remove('chatbox--active')
        }
    }

    onSendButton(chatbox) {
        var textField = chatbox.querySelector('input');
        let text1 = textField.value
        if (text1 === "") {
            return;
        }

        let msg1 = { name: "User", message: text1 }
        this.messages.push(msg1);

        fetch('http://127.0.0.1:5000/predict', {
            method: 'POST',
            body: JSON.stringify({ message: text1 }),
            mode: 'cors',
            headers: {
              'Content-Type': 'application/json'
            },
          })
          .then(r => r.json())
          .then(r => {
            let msg2 = { name: "Sam", message: r.answer };
            this.messages.push(msg2);
            this.updateChatText(chatbox)
            textField.value = ''

        }).catch((error) => {
            console.error('Error:', error);
            this.updateChatText(chatbox)
            textField.value = ''
          });
    }

    updateChatText(chatbox) {
        var html = '';
        this.messages.slice().reverse().forEach(function(item, index) {
            if (item.name === "Sam")
            {
                html += '<div class="messages__item messages__item--visitor">' + item.message + '</div>'
            }
            else
            {
                html += '<div class="messages__item messages__item--operator">' + item.message + '</div>'
            }
          });

        const chatmessage = chatbox.querySelector('.chatbox__messages');
        chatmessage.innerHTML = html;
    }
}


const chatbox = new Chatbox();
chatbox.display();
</script> -->

    <script src="./app.js"></script>





    

	  <section class="contact">
	  	<div class="container-fluid">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-sm">
	  					<h3>HandyCraft</h3><br><br>
	  					<p>Uttara, Dhaka</p>
	  					<p>01926241906</p>
	  					<p>Email : HandyCraft@gmail.com</p>
	  				</div>
	  				<div class="col-sm" style="text-align: center;">
	  					<h3 style="text-align: center;">CONNECT WITH US</h3>
	  					<ul>
		  					<li><a href=""><i style="color: #FFFFFF;" class="fab fa-facebook"></i></a></li>
		  					<li><a href=""><i style="color: #FFFFFF;" class="fab fa-instagram"></i></a></li>
		  					<li><a href=""><i style="color: #FFFFFF;" class="fab fa-whatsapp"></i></a></li>
	  					</ul>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </section>




	  <footer>
	  	<p>© All rights reserved by Handycraft   |   Designed, Developed & Maintained by <a href="#" target="_blank">Sabbir Hossain</a></p>
	  </footer>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>