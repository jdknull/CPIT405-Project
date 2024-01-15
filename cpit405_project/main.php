<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/math-plus.css' rel='stylesheet'>
    <script src="script.js"></script>
    <title>CPIT 405 Project</title>
</head>

<body>
<div class="row">
        <div class="row2">
            <div class="card" onclick="insert_page()">
                <div class="card_icon">
                    <svg width="100%" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8 11C10.2091 11 12 9.20914 12 7C12 4.79086 10.2091 3 8 3C5.79086 3 4 4.79086 4 7C4 9.20914 5.79086 11 8 11ZM8 9C9.10457 9 10 8.10457 10 7C10 5.89543 9.10457 5 8 5C6.89543 5 6 5.89543 6 7C6 8.10457 6.89543 9 8 9Z"
                            fill="currentColor" />
                        <path
                            d="M11 14C11.5523 14 12 14.4477 12 15V21H14V15C14 13.3431 12.6569 12 11 12H5C3.34315 12 2 13.3431 2 15V21H4V15C4 14.4477 4.44772 14 5 14H11Z"
                            fill="currentColor" />
                        <path d="M18 7H20V9H22V11H20V13H18V11H16V9H18V7Z" fill="currentColor" />
                    </svg>
                </div>
                <div class="card_head">
                    <h2>Add new patent</h2>
                </div>
                <div class="card_text">
                    <span>Add new patent and store it in the database.</span>
                </div>
            </div>
        </div>
        <div class="row2">
            <div class="card2" onclick="view_page()" >
                <div class="card_icon">
                    <svg width="100%" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5 5C3.34315 5 2 6.34315 2 8V16C2 17.6569 3.34315 19 5 19H19C20.6569 19 22 17.6569 22 16V8C22 6.34315 20.6569 5 19 5H5ZM7 7H5C4.44772 7 4 7.44772 4 8V9H7V7ZM9 7V9H20V8C20 7.44771 19.5523 7 19 7H9ZM7 11H4V13H7V11ZM9 13V11H20V13H9ZM7 15H4V16C4 16.5523 4.44772 17 5 17H7V15ZM9 17V15H20V16C20 16.5523 19.5523 17 19 17H9Z"
                            fill="currentColor" />
                    </svg>
                </div>
                <div class="card_head">
                    <h2>View patents </h2>
                </div>
                <div class="card_text">
                    <span>View all patents records with various filters options.</span>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="row2">
            <div class="card3" onclick="window.location.href='search.php'">
                <div class="card_icon">
                    <svg width="100%" height="auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z"
                            fill="currentColor" />
                    </svg>
                </div>
                <div class="card_head" >
                    <h2>Search patents</h2>
                </div>
                <div class="card_text">
                    <span>Serach for patent record and change it content.</span>
                </div>
            </div>
        </div>
       

</body>

</html>