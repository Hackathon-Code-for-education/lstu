## LSTU

## WEB-приложение для Код-будущего

## Документация по API для бэкенда - https://docs.google.com/document/d/12MbO0ZbybFIQPyj1i3J8gTTgIDEleJADZ3KLAdha9EE/edit?usp=sharing

## Дизайн проекта - https://www.figma.com/file/i6btcpMI5PBJTMhGADRqCP/ФСП-Код-образования.-Апрель-2024.-Полный-дизайн.?type=design&node-id=102-323&mode=design&t=wTc2CsEb9sr7yIRC-0

## Презентация проекта - https://docs.google.com/presentation/d/1DaMDI1puichpKetyb_ijyGCJSXoe1HRnFmsQcvKcuJM/edit#slide=id.g2ce4dbe253d_48_14

###### ЗАПУСКАТЬ ПРЕЗЕНТАЦИЮ С НАЗВАНИЕМ presentation with gifs.pptx

## Данные для пользователей

   1. Студент: Почта: artem@mail.ru  Пароль: 123456
   2. Абитуриент: Почта: ilya@mail.ru Пароль: 123456

## Инстукция по запуску проекта

## Frontend

Для запуска или установки Vue Vite требуется Node.js версии 18+ https://nodejs.org/en/

1. Заходим в папку frontend `cd frontend`
2. Устанавливаем зависимости с помощью команды `npm install`
3. Запускам проект с помщоью команды `npm run dev`
4. Готово, фронт запущен

## Backend

1. Заходим в папку backend `cd backend`
2. Запускаем docker службу
3. Создаем образ `docker build -t <название образа> .`
4. Запускаем контейнер `docker compose -p <название контейнера> up -d`
5. Сервер запущен

Подключение к БД

В папке проекта будет приложен SQL скрипт создания БД `dumpCODE-FUTURE.sql`

1. Нужно подключиться к контейнеру PostgreSQL, для этого выполним команду 
   `docker exec -it <container_name> /bin/bash`  (Можно так же через Desktop приложение docker, зайти в exec)
   ![image](https://github.com/Hackathon-Code-for-education/lstu/assets/82671470/b25d009e-32f0-43f5-b955-f0932c5cf19a)

   
3. Создаем файл внутри контейнера `touch dumpCODE-FUTURE.sql`
4. Копируем данные с нашей локальной машиныв контейнер командой (Можно так же через Desktop, открыть файл который мы создали, `dumpCODE-FUTURE.sql`, а затем вставить туда dump который мы приложили в проекте )
   ![Снимок экрана 2024-04-21 214802](https://github.com/Hackathon-Code-for-education/lstu/assets/82671470/c5edd86c-27de-4953-a05a-67e5842991e0)

   `sudo docker cp ~/Desktop/<SQL-скрипт>.sql <id-контейнера>:/<SQL-скрипт>.sql`
6. Далее в самом контейнере подключаемся к нашей БД
   `psql -H postgres-db -U user -d code-future-2024`
7. Выполняем скрипт `\i dumpCODE-FUTURE.sql`
   ![image](https://github.com/Hackathon-Code-for-education/lstu/assets/82671470/2e3db8f0-0d7d-4658-bd0f-6ffaa37c95e4)

9. Готово
