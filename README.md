# gameMap
Необходимо на PHP написать генератор случайной карты с проинициализироваными элементами игры, учитывая существующие ограничения.
Основные элементы - это карта (горы, вода, болото, равнина и т.д), 2 базы, юниты (техника, люди, самолеты). Техника не может ездить по горам, воде. Люди не могут передвигаться по болоту.
Самолеты могут летать над любой поверхностью. Базы всегда должны располагаться исключительно на равнинах.
Самолеты могут уничтожать технику, Техника может уничтожать людей и технику.
Люди могут уничтожать технику и вражеских людей.
