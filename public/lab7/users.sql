
-- База даних: `lab_7`

CREATE DATABASE IF NOT EXISTS lab_7;
use lab_7;

-- Структура таблиці `users`

DROP TABLE If EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Sonya', 'hgcfguuimoy@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'ddd', 'dd@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Albi', 'albi@gmail.com', '202cb962ac59075b964b07152d234b70');

-- Индексb таблиці `users`

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

-- AUTO_INCREMENT для таблицы `users`

ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;
