<!DOCTYPE html>
<html>
<head>
    <title>Shop Page</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png?v=3">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png?v=3">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png?v=3">
    <meta name="viewport" content="width=device-width, initial-scale=.75, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/assets/css/preShop.css?v=6">
    <link rel="stylesheet" type="text/css" href="/assets/css/earlyAccess.css?v=8">
    <script src="/assets/js/earlyAccessSubmit.js?v=4" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Cormorant:ital,wght@0,300..700;1,300..700&family=Geist:wght@100..900&family=Hind:wght@300;400;500;600;700&family=La+Belle+Aurore&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Outfit:wght@100..900&family=Yantramanav:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <div class="header">
        <button class="hamburgerNav" id="hamburgerNav">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </button>

        <ul id="nav">
            <li><a href="homepage.php">
                <img id="home" src="Images/HomePageLogo.JPG" />
            </a></li>
            <li><a href="preShop.php">Shop</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="Contact.html">Contact</a></li>
        </ul>

        <a id="cart" href="cart.php">
            <img id="cartIMG" src="Images/cart.png" />
        </a>
    </div> -->

    <audio id="crackSizzle">
        <source src="/assets/images/eggDrop/sizzleFade.mp3" type="audio/mpeg">
    </audio>

    <audio id="crack">
        <source src="/assets/images/eggDrop/crack.mp3" type="audio/mpeg">
    </audio> 

    <div id="countdown">
        <div class="eggDrop">
            <div id="eggClick">
                <h1 class="instructions">shop now</h1>
            </div>
            <img id="animation" src="/assets/images/eggDropMidnight/IMG_0251-16.PNG?v=3" />
            <div id="timer">
                <span id="countdownTimer" class="time"></span>
            </div>

        </div>
    </div>

    <!-- Sign Up Form -->
    <div class="earlyAccess">
        <div class="earlyAccessForm">
            <h2 id="close">X</h2>
            <div id="sideImgBox">
                <!-- <img src="Images/transparentLogo.png" id="sideImg"> -->
                 <img src="/assets/images/logoBlack.JPG?v=3" id="sideImg">
            </div>
            <form id="signupForm">
                <h1 id="curationHead">curation1</h1>
                <input type="email" id="email" required placeholder="Email Address"/>

                <div id="phoneWrapper">
                    <!-- Country Code Dropdown -->
                    <select id="countryCode" >
                        <option value="+1" data-country="USA">+1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(USA)</option>
                        <option value="+44" data-country="UK">+44&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(UK)</option>
                        <option value="+91" data-country="India">+91&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(India)</option>
                        <option value="+61" data-country="Australia">+61&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Australia)</option>
                        <option value="+33" data-country="France">+33&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(France)</option>
                        <option value="+49" data-country="Germany">+49&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Germany)</option>
                        <option value="+55" data-country="Brazil">+55&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Brazil)</option>
                        <option value="+81" data-country="Japan">+81&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Japan)</option>
                        <option value="+34" data-country="Spain">+34&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Spain)</option>
                        <option value="+7" data-country="Russia">+7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Russia)</option>
                        <option value="+226" data-country="Burkina Faso">+226&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Burkina Faso)</option>
                        <option value="+213" data-country="Algeria">+213&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Algeria)</option>
                        <option value="+54" data-country="Argentina">+54&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Argentina)</option>
                        <option value="+375" data-country="Belarus">+375&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Belarus)</option>
                        <option value="+359" data-country="Bulgaria">+359&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bulgaria)</option>
                        <option value="+387" data-country="Bosnia and Herzegovina">+387&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bosnia and Herzegovina)</option>
                        <option value="+1-246" data-country="Barbados">+1-246&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Barbados)</option>
                        <option value="+254" data-country="Kenya">+254&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Kenya)</option>
                        <option value="+1-242" data-country="Bahamas">+1-242&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Bahamas)</option>
                        <option value="+506" data-country="Costa Rica">+506&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Costa Rica)</option>
                        <option value="+855" data-country="Cambodia">+855&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Cambodia)</option>
                        <option value="+225" data-country="Ivory Coast">+225&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ivory Coast)</option>
                        <option value="+57" data-country="Colombia">+57&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Colombia)</option>
                        <option value="+255" data-country="Tanzania">+255&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Tanzania)</option>
                        <option value="+233" data-country="Ghana">+233&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ghana)</option>
                        <option value="+1-767" data-country="Dominica">+1-767&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Dominica)</option>
                        <option value="+1-59" data-country="Saint Lucia">+1-59&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Saint Lucia)</option>


                        <!-- Add more country codes as needed -->
                    </select>
                    <!-- Phone Number Input -->
                    <input type="tel" id="phone"  placeholder="Phone Number" pattern="^\d{1,14}$" title="Phone number should only contain digits" />
                </div>

                <!-- <input type="tel" id="phone" required placeholder="Phone Number"/> -->

                <!-- <div class="checkMessage">
                    <input type="checkbox" id="check" required>
                    <h2 id="checkMsg">Receive offers via Email</h2>
                </div> -->

                <!-- <p id="userAgreement">join e-list for <b>YOKED</b> updates and future products </p> -->
                <div class="consentBlock">
                    <div class="checkboxCol">
                        <input type="checkbox" id="smsOptIn" name="smsOptIn">
                    </div>
                    <div class="textCol">
                        By checking this box and clicking ‘JOIN’ you consent to receive future product drop 
                        alerts via SMS from curation1. Reply STOP to opt out. Reply HELP for help. Message and 
                        data rates may apply. Message frequency may vary.                    </div>
                </div>

                <div class="consentBlock">
                    <div class="checkboxCol">
                        <input type="checkbox" id="termsOptIn" >
                    </div>
                    <div class="textCol">
                        I agree to the <a href="/static/terms.html">Terms and Conditions</a> and
                        <a href="/static/privacy.html">Privacy Policy</a>. Your mobile information 
                        will not be sold or shared with third parties for promotional purposes.
                    </div>
                </div>


                <button id="earlyAccessButton" type="submit">JOIN</button>
            </form>
        </div>
    </div>
    <div class="getEarlyAccess">
        <h2 id="earlyAccessToggle">E-LIST</h2>
    </div>

    <script src="/assets/js/index.js?v=3"></script>
</body>
</html>