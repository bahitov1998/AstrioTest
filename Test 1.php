<?php
$categories = array(
  array(
    "id" => 1,
    "title" =>  "Обувь",
    'children' => array(
        array(
            'id' => 2,
            'title' => 'Ботинки',
            'children' => array(
                array('id' => 3, 'title' => 'Кожа'),
                array('id' => 4, 'title' => 'Текстиль'),
            ),
        ),
        array('id' => 5, 'title' => 'Кроссовки',),
    )
  ),
  array(
    "id" => 6,
    "title" =>  "Спорт",
    'children' => array(
        array(
            'id' => 7,
            'title' => 'Мячи'
        )
    )
  ),
);

function searchCategories($categories, $id)
{
    foreach ($categories as $key => $item) {
        if ($item == $id) {
            echo "По выбранному идентификатору найдена категория: " .  $categories['title'];
        } elseif (is_array($item)) {
            searchCategories($item, $id);
        }
    }
}

searchCategories ($categories, 5);

?>