DETAILS

<br /><br />
<?php

use Helpers\SimpleCurl as Curl;

print_r($data['list']);
echo "<br /><br /><br /><br /> ";
if ($data['list'][0]->lien_ws != "") {
    $spotrate = Curl::get('http://www.omdbapi.com/?i=' . $data['list'][0]->lien_ws);
    $data['spotrate'] = json_decode($spotrate);
    print_r($data['spotrate']);
}
?>