<?php
function checkIfBalanced($expression)
{
    // Инициализируем стек
    $stack = [];
    // Инициализируем список открывающих элементов
    $startSymbols = ['<html>', '<head>', '<body>', '<a>', '<div>', '<span>'];
    // Инициализируем список пар.
    $pairs = ['<html></html>', '<head></head>', '<body></body>', '<a></a>', '<div></div>', '<span></span>'];

    // Проходимся по массиву, который передали в функцию
    foreach ($expression as $value){
        $curr = $value;

        if (in_array($curr, $startSymbols)) {
            array_push($stack, $curr);
        } else { 
        // Если элемент не входит в список открывающих, значит считаем что это закрывающий символ
            $prev = array_pop($stack);
            // Составляем из этих символов пару
            $pair = "{$prev}{$curr}";
            // Проверяем, что она входит в список $pairs. Если входит, то все правильно, двигаемся дальше. Если нет, то это автоматически означает, что символы не сбалансированы
            if (!in_array($pair, $pairs)) {
                return false;
            }
        }
    }

    // Если стек оказался пустой после обхода строки, то значит все хорошо
    return count($stack) === 0;
}

var_dump(checkIfBalanced([ '<div>', '</div>', '</a>', '<span>', '</span>'])); // true-false
?>