<?php
$required_fields = ['title', 'full_name', 'gender', 'department', 'institute', 'address', 'city', 'country', 'postalCode', 'email', 'registration'];
$missing_fields = [];

foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        $missing_fields[] = $field;
    } else {
        ${$field} = $_POST[$field];
    }
}

if (!empty($missing_fields)) {
    $query_string = http_build_query(['q' => 'eksik', 'fields' => $missing_fields]);
    header("Location: /form/index.php?$query_string#myDiv23");
    exit;
}

$url = 'https://alfredform.ko.com.tr/handle/gKhVfjmSTQ9oMcMoo7yHHs5TBU2N7Eckc1h4bVd1';
$data = $_POST;

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
    ],
];
$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === false) {
    header("Location: /form/index.php?q=basarisiz#myDiv22");
}
header("Location: /form/index.php?q=basarili#myDiv21");

?>