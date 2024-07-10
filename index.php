<form action="index.php" method="post">
    <input type="text" name="phone" placeholder="Номер телефона">
    <input type="submit" value="Искать">
</form>


<?php
$post = substr($_POST['phone'], 0, -7);
$one = substr($_POST['phone'], -7, 10);


//в бд разбить на 2 таблицы-> three_phone(900)... / region_id|min|max


$arrs = [
    900 => [
        [
            'region' => 'Кемеровская обл.',
            'one' => 999999,
            'two' => 1099999
        ],
        [
            'region' => 'Тверская обл.',
            'one' => 1099999,
            'two' => 1199999
        ],
        [
            'region' => 'Ростовская обл.',
            'one' => 1199999,
            'two' => 1399999
        ]
    ]
];

foreach ($arrs[$post] as $arr){
    $range = range($arr['one'], $arr['two']);
    if(array_search($one, $range)){
        echo $arr['region'];
    }
}





