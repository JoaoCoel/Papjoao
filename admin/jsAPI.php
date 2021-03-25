<?php

$array = array();
$user['uid'] = 121;
$user['username'] = "adidac";
$user['password'] = "adidacpass";
$array['users'][] = $user;
$user['uid'] = 122;
$user['username'] = "biswarup";
$user['password'] = "biswaruppass";
$array['users'][] = $user;
$user['uid'] = 123;
$user['username'] = "gopal";
$user['password'] = "gopalpass";
$array['users'][] = $user;
echo json_encode($array);
?>

<script>
    function getInfo(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","jsAPI.php?q="+str,true);
            xmlhttp.send();
        }
</script>


