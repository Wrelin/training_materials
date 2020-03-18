# Задачи
1. Написать обработчик событий.  
1.1. Он должен подписываться на события OnAfterIBlockElementAdd и OnAfterIBlockElementUpdate.  
1.2. Он должен добавлять/изменять злементы в инфоблок с кодом LOG, при изменении любых элементов инфоблоков, кроме злементов зтого инфоблока.  
1.3. Добавленный в лог элемент должен попадать в раздел с именем и кодом инфоблока, изменение которого логируется. Если такого раздела нет, он должен создаваться.  
1.4. Именем добавленного элемента должен быть ID логируемого злемента.  
1.5. В Начало активности должна записываться дата дата создания/изменения элемента.  
1.6. В Описание для анонса должна записываться строка в таком формате: Имя инфоблока -> Имя раздела(от родителя к ребенку)... -> Имя элемента.  
1.7. (Дополнительно) Сделать поиск имен разделов рекурсивным.  
2. Написать агент.  
2.1. Он должен удалять все логи, кроме 10 самых новых.  
2.2. Запускаться раз в час, не удаляться из админки.  

Задания выполнить в Тренировочном модуле, обработчики подключить в init.php в bitrix/php_interface или local/php_interface, примерно так: http://joxi.ru/823DM3XiD4o7NA.  
На проверку прислать модуль с написанными функциями, init.php и скриншот с подключением агента в админке.  
