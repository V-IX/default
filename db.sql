-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 24 2019 г., 16:29
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `default`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT 1,
  `img` text DEFAULT NULL,
  `img_alt` varchar(255) DEFAULT NULL,
  `pub_date` datetime DEFAULT NULL,
  `mod_date` datetime DEFAULT NULL,
  `add_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `alias`, `brief`, `text`, `meta_title`, `meta_description`, `visibility`, `img`, `img_alt`, `pub_date`, `mod_date`, `add_date`) VALUES
(1, 'Как правильно подобрать хостинг', 'kak-pravilno-podobrat-hosting', 'Хостинг (англ. hosting) — услуга по предоставлению ресурсов для размещения информации на сервере, постоянно находящемся в сети.', '<p>Хостинг (англ. hosting) &mdash; услуга по предоставлению ресурсов для размещения информации на сервере, постоянно находящемся в сети.</p>\r\n\r\n<p>Обычно хостинг входит в пакет по обслуживанию сайта и подразумевает как минимум услугу размещения файлов сайта на сервере, на котором запущено ПО, необходимое для обработки запросов к этим файлам (веб-сервер). Как правило, в обслуживание уже входит предоставление места для почтовой корреспонденции, баз данных, DNS, файлового хранилища на специально выделенном файл-сервере и т. п., а также поддержка функционирования соответствующих сервисов.</p>\r\n\r\n<p>Хостинг базы данных, размещение файлов, хостинг электронной почты, услуги DNS могут предоставляться отдельно как самостоятельные услуги либо входить в комплексную услугу.</p>\r\n\r\n<h2>Платный или бесплатный хостинг?</h2>\r\n\r\n<p>Наш совет однозначный &ndash; нужно выбирать платный хостинг, даже если вы бедный студент. Т.к. бесплатный хостинг как правило не стабильный, не гибкий в настройках, и размещает свою рекламу на вашем сайте. Тем более, у нас есть рейтинг провайдеров с тестовым периодом, при котором можно бесплатно попробовать платный хостинг (до 50 дней). Но если вы очень хотите разместить свой сайт на бесплатном хостинге, то выбирайте среди наиболее известных бесплатных провайдеров.</p>\r\n\r\n<h2>Выбор хостинга исходя из посещаемости сайта</h2>\r\n\r\n<p><strong>Простые сайты</strong></p>\r\n\r\n<p>Для Блога, Личной странички, Сайта-визитки, Интернет-магазина, Форума, Корпоративного сайта, с посещаемостью менее 1500-3000 человек в сутки, вам нужно выбирать виртуальный хостинг. Большая часть современных сайтов начального и среднего уровня располагается на таком хостинге. Суть его в том, что на одном мощном сервере находятся сайты от разных клиентов, и они делят между собой его ресурсы (процессор, память и дисковое пространство).</p>\r\n\r\n<p><strong>Сайты среднего уровня</strong></p>\r\n\r\n<p>Для Форума, Интернет-магазина, Портала с посещаемостью 3000-10000 чел\\сут подойдет VPS-хостинг (виртуальный выделенный сервер). Это тот же виртуальный хостинг (сервер, на котором размещено множество сайтов от разных клиентов), но для вас выделяют фиксированное количество ресурсов сервера.</p>\r\n\r\n<p><strong>Сайты высокого уровня</strong></p>\r\n\r\n<p>Для сайтов с посещаемостью более 10000 чел\\сут используют выделенный сервер (Dedicated). Это подразумевает под собой то, что ваши сайты используют сервер полностью, и ни с кем его не делят. Это самая дорогая технология, которая достаточно сложна в настройке.</p>\r\n\r\n<p>Особого внимания требует облачный хостинг, при котором пользователь платит только за те ресурсы сервера, которые использовал.</p>\r\n\r\n<h2>На какие параметры обратить внимание при выборе хостинга?</h2>\r\n\r\n<p><strong>Место на диске</strong> &ndash; чем больше места, тем дороже будет стоить хостинг. Для обычного сайта хватает 1-2 Гб.</p>\r\n\r\n<p><strong>Количество сайтов и технологии</strong> &ndash; большинство современных сайтов использует язык программирования PHP и базы данных MySQL. Если вы хотите разместить несколько сайтов, то убедитесь, что в выбранном тарифном плане, количество сайтов равняется количеству баз данных. Если вашему сайту не нужны базы данных, то можно поискать более дешевый тариф, без поддержки MySQL.</p>\r\n\r\n<h2>Windows или Linux хостинг?</h2>\r\n\r\n<p>Большинство вебмастеров размещают свои <strong>сайты на Linux-хостинге</strong>, и соответственно большинство провайдеров предлагает такой хостинг по умолчанию. Поэтому, если у вас нет специальных требований, то выбирайте Linux-платформу, так как Linux ОС дешевле или вообще бесплатная (чаще всего), а также в ней быстрее закрываются &quot;дыры&quot; в безопасности.</p>\r\n\r\n<h2>Советы экспертов по выбору хостинга</h2>\r\n\r\n<ul>\r\n	<li>Не связывайтесь с провайдерами у которых визуально плохой сайт, и не ведитесь на то, что у них очень низкие цены. Обычно у таких провайдеров техническая поддержка осуществляется одним человеком, и сайты пользователей постоянно тормозят или являются недоступными.</li>\r\n	<li>Смотрите отзывы о провайдерах и делайте свои выводы исходя из них. Но обращайте внимание, чтобы отзывы были от реальных людей (мы публикуем отзывы только после авторизации соцсети и проверки, что человек реальный). Очень часто провайдеры пишут отзывы сами о себе, с помощью маркетологов или ботов.</li>\r\n	<li>Качество службы поддержки, быстродействие, и надежность хостинга являются очень субъективными параметрами, поэтому даже если вы начитались хороших отзывов, то не спешите оплачивать хостинг на год вперед - платите по месяцам и пробуйте.</li>\r\n	<li>Если провайдер требует документы, то это нормально, т.к. они помогут Вам вернуть себе аккаунт, если его украдут. Но передавайте документы только надежным провайдерам, у которых тысячи клиентов Если вы щепетильно относитесь к своим персональным данным, то легко сможете найти хороших и крупных провайдеров, которым документы не нужны, таких много на рынке.</li>\r\n	<li>Обратите внимание на то, сколько клиентов у хостера. Стоит доверять тем, у которых более 10000-20000 пользователей.</li>\r\n	<li>Убедитесь чтобы у провайдера работала круглосуточная поддержка. Желательно чтобы был Live-чат и бесплатный номер телефона.</li>\r\n</ul>', 'Как правильно подобрать хостинг', '', 1, '3d311f1d3d4db7a3f8326209837542d0.jpg', '', '2018-08-22 09:00:00', '2019-08-24 15:56:55', '2019-08-01 18:55:46'),
(2, 'Как правильно заполнить метаданные', 'kak-pravilno-zapolnit-metadannye', 'Метатеги (от англ. meta tags) — это элементы (инструкции) разметки HTML-страниц, предназначенные для хранения и передачи данных предназначенной для браузеров и поисковых систем.', '<p>Заполнение мета-тегов и микроразметки вручную для каждой интернет-страницы может занять некоторое время (если не настроить автоматическое формирование мета-тегов), поэтому так важно понимать, ради чего все это делается.</p>\r\n\r\n<p><strong>Для высокого ранжирования сайта вашего интернет-магазина в поисковой выдаче.</strong> Мета-теги прописываются в части &lt;head&gt; программного кода каждой из страниц интернет-магазина. Они предназначены для того, чтобы поисковые системы понимали, какая информация находится на страницах сайта, и рекомендовали ее пользователям, ищущим ваши товары.</p>\r\n\r\n<p><strong>Для формирования развернутого сниппета</strong> &ndash; текстовой информации, отбираемой поисковой машиной для презентации страницы вашего интернет-магазина в результатах поиска. Для сниппета может быть выбран отрывок из текста с ключевым словом или текст из тега description.</p>\r\n\r\n<p><strong>Для повышения кликабельности вашего сайта в поисковиках.</strong> Чем лучше и точнее вы опишите то, что встретит покупатель, перейдя на страницу вашего сайта, тем выше будет количество переходов и конверсия поискового трафика в продажи.</p>\r\n\r\n<p><strong>Для привлекательного описания ссылки на товар в социальных сетях.</strong> Если вы продвигаете свои товары в социальных сетях, позаботьтесь о том, чтобы к ним были придуманы интригующие описания, которые подтягиваются к ссылкам и привлекают пользователей на ваш сайт.</p>\r\n\r\n<p><strong>Для представления дополнительной информации о магазине. </strong>Если вы при помощи микроразметки добавите в сниппет информацию о ваших преимуществах, условиях доставки и оплаты, рейтинге, ценах, режиме работы и пунктах самовывоза, то эта информация, отображенная в строчке поисковика, поможет покупателям остановить свой выбор именно на вашем интернет-магазине.</p>\r\n\r\n<p>Правильное заполнение мета-тегов помогает страницам сайта не только адекватно восприниматься поисковыми системами и продвигаться в топе, но и конкурировать с другими магазинами за внимание потенциальных покупателей. Ведь если в результатах поиска у вашего магазина уже есть данные о быстрой доставке и количестве пунктов самовывоза с возможностью примерки, вероятнее всего, покупатели кликнут именно на ваш магазин. И вам останется только удержать покупателя на сайте при помощи удобной навигации, быстроты загрузки страниц, исчерпывающих и достоверных описаний товара и его характеристик, качественных фото и видео, адекватных цен и простых шагов оформления заказа.</p>', 'Как правильно заполнить метаданные для высокого ранжирования', 'Заполнение мета-тегов и микроразметки вручную для каждой интернет-страницы может занять некоторое время (если не настроить автоматическое формирование мета-тегов), поэтому так важно понимать, ради чего все это делается.', 1, '1ea06363e225ec320ff8ea8a75994a7c.jpg', '', '2019-08-01 12:00:00', '2019-08-24 15:56:21', '2019-08-01 18:58:31'),
(3, 'Что такое техническая оптимизация сайта', 'chto-takoe-tehnicheskaya-optimizaciya-sajta', 'Главная задача технической оптимизации – обеспечивать максимальную индексацию страниц сайта. Если же упустить из виду какие-либо технические моменты, то это станет значительной преградой на вашем пути к ТОПу в выдаче', '<p>Безусловно, все технические доработки должны выполняться специалистами-разработчиками сайта. Пользователю или даже владельцу ресурса не стоит &quot;лезть&quot; в HTML-код, так как это может привести к непоправимым последствиям, а в большинстве случаев компании не несут ответственность за нарушения по вине иных лиц.</p>\r\n\r\n<p>Рассмотрим основные технические проблемы и пути их решения. Однако еще раз напомним: &nbsp;любые изменения должны вносить специалисты.&nbsp;</p>\r\n\r\n<h2>Пять основных моментов технической оптимизации</h2>\r\n\r\n<p><strong>Robots.txt.</strong> Этот текстовый файл должен быть в корневой категории вашего сайта. Он содержит определенные инструкции для поискового робота, который обращается к нему в первую очередь. В этом файле можно указать те страницы, которые нельзя индексировать (допустим, системные или дублированные). Также в нeм указывается адрес зеркала сайта, адрес карты сайта, а также иная информация для правильной индексации, предназначенная для поисковых роботов.</p>\r\n\r\n<p><strong>Sitemap или карта сайта.</strong> Помимо того, что картой сайта пользуются роботы, она полезна и удобна для пользователей. &nbsp;С еe помощью легко искать информацию на сайте. Для робота на карте видна структура, а посетителю удобно ориентироваться на сайте. В файле Sitemap &nbsp;вы также можете прописать инструкции для Яндекса, какие страницы следует индексировать в первую очередь, как часто вы делаете обновления на сайте. Не забывайте, что карта может содержать не более 50000 страниц, иначе вам необходимо создавать второй экземпляр.</p>\r\n\r\n<p><strong>Ошибки сайта.</strong> В тот момент, когда пользователь открывает страницу или робот начинает еe проверку, &nbsp;сервер с расположения сайта даeт ответ, то есть информацию о состоянии вашего ресурса и необходимой страницы.</p>\r\n\r\n<p>Основные коды таковы:</p>\r\n\r\n<ul>\r\n	<li>200 &ndash; со страницей все в порядке,</li>\r\n	<li>404 &ndash; страница не существует,</li>\r\n	<li>503 &ndash; сервер временно недоступен.</li>\r\n</ul>\r\n\r\n<p>Пристальное внимание уделите настройке ошибки 404. Если какая-то страница существует, а сервер сообщает код 404, то индексироваться она не будет. Сделать проверку кодов статусов можно при помощи известного вам Яндекс.Вебмастера.</p>\r\n\r\n<p><strong>Настройка редиректа.</strong> Наиболее часто встречающаяся ошибка &ndash; не настроен редирект с домена www на домен без www (или же обратная ситуация). Выберите, какое доменное имя будет главным и укажите это в файле .htaccess для поисковых систем. Иначе один и тот же сайт будет восприниматься как дубль, что приведeт к проблемам в ранжировании. Это касается и иных редиректов с других зеркал &ndash; страницы вида &quot;index.htm&quot;, &quot;index.html&quot; и т.д.</p>\r\n\r\n<h2>Другие настройки технической оптимизации</h2>\r\n\r\n<ul>\r\n	<li>Теги Title и Description также относятся частично к технической оптимизации. Они должны быть уникальны на каждой странице, отображать еe суть и содержимое.</li>\r\n	<li>Проверьте время загрузки сайта. Рекомендованные показатели таковы: &nbsp;до 0.7 сек (700 мс) должно уходить на скачку исходного кода документа и до 0.2 сек (200 мс) для получения ответа сервера.</li>\r\n	<li>На каждой странице должно быть не более одного заголовка уровня H1. Проверьте также, чтобы заголовки всех уровней от H1 до H6 не использовались в оформлении страниц.</li>\r\n	<li>Иконка favicon. Мелочь, на которую тоже стоит обратить внимание.</li>\r\n	<li>Обязательно протестируйте отображение вашего сайта в основных браузерах &ndash; Сhrome, Android Browser, FireFox, Mobile Safari, Opera. Особое внимание уделите различным заполняемым формам (если такие есть на сайте).</li>\r\n	<li>Закройте от индексации страницу доступа в административную панель CMS - /admin, /wp-login, /administrator, /bitrix.</li>\r\n	<li>Необходимо проверить вeрстку на наличие незакрытых парных тегов. Если тег Td открыт, он должен быть обязательно закрыт /Td.</li>\r\n	<li>В файле Robots также следует закрыть от индексации служебные папки (cache, wp-includes) и документы разрешения .pdf и .doc, если они не несут никакой информации.</li>\r\n	<li>Если у вас интернет-магазин, то вам следует закрыть страницы авторизации, фильтрации, поиска, страницу оформления заказа и логина пользователя.</li>\r\n</ul>\r\n\r\n<p>Альтернативой файлу robots.txt считается мета-тег name=&ldquo;robots&rdquo; со значениями полей &quot;content=&ldquo;noindex, follow&ldquo;&quot;. Он требует немного более сложной настройки, но при этом более внимательно соблюдается поисковыми системами.</p>\r\n\r\n<p>Даже после окончательного формирования списка страниц, закрытых от индексации, всe равно стоит периодически проводить мониторинг сайта на момент возможного появления дублей каких-либо страниц.</p>', 'Что такое техническая оптимизация сайта', '', 1, 'de8d7f973fc38cec0f5b26eeb830ac17.jpeg', '', '2019-08-01 12:00:00', '2019-08-24 15:55:43', '2019-08-01 19:00:57');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `add_date` timestamp NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB AVG_ROW_LENGTH=1489 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT 0,
  `position` varchar(50) DEFAULT 'top',
  `title` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT 1,
  `num` int(11) DEFAULT 1,
  `target` varchar(255) DEFAULT '_self',
  `noindex` tinyint(1) DEFAULT 0,
  `add_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB AVG_ROW_LENGTH=1638 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `navigation`
--

INSERT INTO `navigation` (`id`, `id_parent`, `position`, `title`, `link`, `visibility`, `num`, `target`, `noindex`, `add_date`) VALUES
(1, 0, 'top', 'Главная', '/', 1, 10, '_self', 0, '2018-10-26 22:41:15'),
(2, 0, 'top', 'О компании', '/about', 1, 9, '_self', 0, '2018-10-26 22:41:28'),
(3, 0, 'top', 'Новости', '/news', 1, 8, '_self', 0, '2018-10-26 22:41:45'),
(4, 0, 'top', 'Контакты', '/contacts', 1, 7, '_self', 0, '2018-10-26 22:42:05'),
(5, 2, 'top', 'Отзывы', '/reviews', 1, 10, '_self', 0, '2018-10-26 22:42:29'),
(6, 2, 'top', 'Статьи', '/articles', 1, 9, '_self', 0, '2018-10-26 22:42:45'),
(7, 0, 'footer', 'Информация', '/', 1, 10, '_self', 0, '2018-10-26 22:49:56'),
(8, 0, 'footer', 'Клиенту', '/', 1, 9, '_self', 0, '2018-10-26 22:50:14');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT 1,
  `img` text DEFAULT NULL,
  `img_alt` varchar(255) DEFAULT NULL,
  `pub_date` datetime DEFAULT NULL,
  `mod_date` datetime DEFAULT NULL,
  `add_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `alias`, `brief`, `text`, `meta_title`, `meta_description`, `visibility`, `img`, `img_alt`, `pub_date`, `mod_date`, `add_date`) VALUES
(1, 'Яндекс отменил тИЦ и ввел ИКС — Индекс Качества Сайтов', 'yandeks-otmenil-tic-i-vvel-iks--indeks-kachestva-sajtov', 'ИКС полностью заменит тИЦ. Тематический индекс цитирования больше не будет рассчитываться и отображаться. Любой пользователь или владелец сайта сможет узнать индекс качества своего и других сайтов в Яндекс.Вебмастере.', '<p>ИКС полностью заменит тИЦ. Тематический индекс цитирования больше не будет рассчитываться и отображаться. Любой пользователь или владелец сайта сможет узнать индекс качества своего и других сайтов в Яндекс.Вебмастере.</p>\r\n\r\n<p>Под ИКС, то есть под качеством сайта, в первую очередь подразумевается &nbsp;востребованность сайта аудиторией. Чем больше пользователей смогли с помощью сайта удовлетворить свои потребности, чем больше задач они решили, тем он полезней. При этом учитывается не просто количество пользователей, но и степень их удовлетворенности, общий уровень доверия к сайту. Похожие принципы используются Яндексом и для основной метрики качества поиска.</p>\r\n\r\n<p>При расчете ИКС будут использоваться всевозможные имеющиеся у Яндекса данные как о сайте, так и о стоящем за ним бизнесе. Эти данные могут быть получены как из Поиска, так и из любых других сервисов Яндекса: например, Метрики, Карт, Дзена и так далее. По мере учета этих данных алгоритм расчета ИКС будет меняться. Поэтому для начала он будет представлен в виде беты.</p>\r\n\r\n<p>Тематический индекс цитирования, или тИЦ, Яндекс представил в 1999 году. Этот показатель служил для определения авторитетности сайта на основании количества и качества других сайтов, которые на него ссылаются. По словам представителей Яндекса, уже давно стала очевидна необходимость метрики, учитывающей помимо ссылок и другие аспекты качества сайта, известные поисковику.</p>\r\n\r\n<p>Последнее масштабное обновление алгоритма расчета тематического индекса цитирования произошло в июне 2016 года. Именно тогда механизмы очистки ссылочного сигнала подверглись довольно серьезным изменениям, а многие устаревшие показатели так и вовсе были исключены из алгоритма расчета.</p>', 'Яндекс отменил тИЦ и ввел ИКС — Индекс Качества Сайтов. ИКС полностью заменит тИЦ.', '', 1, '77897f51be45d7d204cdea6503f91dc3.jpg', '', '2018-08-22 09:00:00', '2019-08-24 15:47:50', '2019-08-01 18:55:46'),
(2, 'С 1 июля 2018 года был запущен механизм, ранжирующий сайты по принципу Mobile-first', 's-1-iyulya-2018-goda-byl-zapushen-mehanizm-ranzhiruyushij-sajty-po-principu-mobile-first', 'Современные пользователи все чаще используют смартфоны и планшеты для серфинга в Интернете. Это послужило причиной необходимости внесения изменений в принцип индексации.', '<p>Современные пользователи все чаще используют смартфоны и планшеты для серфинга в Интернете. Это послужило причиной необходимости внесения изменений в принцип индексации. Так, с 1-го июля 2018 года Google запустил механизм, ранжирующий сайты по принципу Mobile-first. Поиск будет преимущественно использовать мобильную версию контента для индексации и ранжирования сайта.</p>\r\n\r\n<p><strong>Индекс mobile-first: изменения, к которым стоит подготовиться</strong></p>\r\n\r\n<p>Рост мобильного трафика вносит свои корректировки в работу поисковых роботов. Google меняет алгоритмы ранжирования. Если раньше было два индекса: для десктопов и для мобильных устройств, то теперь неважно, с какого устройства введен запрос, Google покажет результаты из мобайл-индекса.</p>\r\n\r\n<p>Чтобы не скатиться в низ поисковой выдачи, необходимо тщательно проработать мобильную версию сайта. Ресурсам с адаптивным дизайном вносить особых корректировок не потребуется. В других случаях следует подготовиться к mobile-first индекс, воплотив в своих проектах рекомендации от Google.</p>', 'Google ввел механизм, ранжирующий сайты по принципу Mobile-first', 'Пользователи все чаще используют смартфоны и планшеты для серфинга в Интернете. Это послужило причиной внесения изменений в принцип индексации. Поэтому Google запустил механизм, ранжирующий сайты по принципу Mobile-first', 1, 'e083156483617e63be47af5d9641652e.jpg', '', '2019-08-19 14:00:00', '2019-08-24 15:46:03', '2019-08-01 18:58:31'),
(3, 'Google вводит SSL и HTTPS как новый фактор ранжирования сайта', 'google-vvodit-ssl-i-https-kak-novyj-faktor-ranzhirovaniya-sajta', 'В начале августа самая популярная поисковая система Google сделала невероятный шаг: компания заявила, что наличие SSL сертификата теперь официально относится к факторам ранжирования сайтов.', '<p>В начале августа самая популярная поисковая система Google сделала невероятный шаг: компания заявила, что наличие SSL сертификата теперь официально относится к факторам ранжирования сайтов. Это был первый случай, когда Google публично и однозначно заявил, что определенный фактор способствует ранжированию в контексте собственного поискового алгоритма. Ранее приходилось собирать эту информацию в основном путем проведения экспериментов. Но тема Интернет безопасности достаточно высоко ценится в Google, так что этот шаг является оправданным. Взглянув на прошлые действия поискового гиганта, становится ясно, что Google относится к шифрованию очень серьезно. Так, с недавних пор Google начал полностью шифровать результаты поиска с помощью SSL и HTTPS. К слову это нововведение не обрадовало многих оптимизаторов, так как теперь невозможно точно определить ключевые слова, что приносят наибольший объем трафика. Но каковы же конкретные преимущества SSL и HTTPs для веб-сайтов?</p>\r\n\r\n<p>Для начала давайте объясним аббревиатуру: &quot;SSL&quot; обозначает &quot;Secure Sockets Layer&quot;, что в переводе на русский значит &quot;уровень защищенных сокетов&quot;. Сокращение SSL немного устарело, но по-прежнему остается популярным, хотя правильнее говорить TLS - сокращение от &quot;Transport Layer Security&quot; (&quot;безопасность транспортного уровня&quot;). Тем не менее, мы останемся при более привычном обозначении - SSL. SSL (как и TLS) является протоколом гибридного шифрования, который обеспечивает безопасную передачу данных через Интернет. То есть SSL кодирует данные, чтобы безопасно передавать их по сети. Сокращение HTTPS расшифровывается как &quot;HyperText Transfer Protocol Secure&quot; ( в переводе - &quot;безопасный протокол передачи гипертекста&quot;) и означает коммуникационный протокол в Интернете данных, защищенных от прослушивания. То есть, здесь также речь идет о повышении безопасности в сети Интернет. Тот, кто решился установить SSL, может выбрать из нескольких официальных поставщиков сертификатов SSL &ndash; сертификационных центров. В первую очередь это касается владельцев Интернет-магазинов и государственных учреждений, которые сами управляют инфраструктурой. Веб-сайт, защищенный с помощью SSL, будет открываться по адресу, который начинается не с http, а с https. Google давно признал, что этот принцип значительно повышает безопасность данных и вместе с тем восприятие Вашего сайта пользователями, и поэтому компания придает безопасности большое значение. Именно поэтому Google принял решение о внесении HTTPS и SSL в список факторов ранжирования.</p>', 'Google вводит SSL и HTTPS как новый фактор ранжирования сайта', '', 1, '4ebc396d95a45260cbac48444a7969cb.jpg', '', '2019-08-01 12:00:00', '2019-08-24 15:50:00', '2019-08-01 19:00:57');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT 1,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `add_date` timestamp NULL DEFAULT current_timestamp(),
  `mod_date` datetime DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=3276 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `brief`, `alias`, `text`, `visibility`, `meta_title`, `meta_description`, `add_date`, `mod_date`) VALUES
(1, 'Политика конфиденциальности', '', 'confidence', '<p>Администрация сайта с уважением относится к правам посетителей Сайта. Мы безоговорочно признаем важность конфиденциальности личной информации посетителей Сайта. Данная страница содержит сведения о том, какую информацию мы получаем и собираем, когда Вы пользуетесь Сайтом. Мы надеемся, что эти сведения помогут Вам принять осознанное решение в отношении предоставляемой нам личной информации. Настоящая Политика конфиденциальности распространяется только на Сайт и информацию, собираемую данным сайтом и посредством него. Она не распространяется ни на какие другие сайты и не применима к веб-сайтам третьих лиц, которые могут ссылаться на данный Сайт.</p>\r\n\r\n<h2>Получаемые сведения</h2>\r\n\r\n<p>Сведения, которые мы получаем на Сайте, могут быть использованы только для того, чтобы облегчить Вам пользование Сайтом. Сайт собирает только личную информацию, которую Вы предоставляете добровольно при посещении или регистрации на Сайте. Понятие &quot;личная информация&quot; включает информацию, которая определяет Вас как конкретное лицо, например, Ваше имя или адрес электронной почты или телефон. Совместное использование информации Администрация Сайта ни при каких обстоятельствах не продает и не передает в пользование Вашу личную информацию, каким бы то ни было третьим сторонам. Мы также не раскрываем предоставленную Вами личную информацию за исключением случаев предусмотренных законодательством.</p>\r\n\r\n<h2>Отказ от ответственности</h2>\r\n\r\n<p>Помните, передача информации личного характера при посещении сторонних сайтов, включая сайты компаний-партнеров, даже если веб-сайт содержит ссылку на Сайт или на Сайт есть ссылка на эти веб-сайты, не подпадает под действия данного документа. Администрация Сайта не несет ответственности за действия других веб-сайтов. Процесс сбора и передачи информации личного характера при посещении этих сайтов регламентируется документом &quot;Защита информации личного характера&quot; или аналогичным, расположенном на сайтах этих компаний.</p>\r\n\r\n<h2>Условия проведения акций</h2>\r\n\r\n<p>Все акции, размещённые на сайте направлены исключительно на стимулирование продаж через сеть internet и распространяются на заказчиков, оставивших заявку на услуги в форме обратной связи на Сайте после публикации содержания акционного предложения.</p>', 1, 'Политика конфиденциальности', '', '2019-08-04 17:53:40', '2019-08-04 20:53:40');

-- --------------------------------------------------------

--
-- Структура таблицы `pages_admin`
--

CREATE TABLE `pages_admin` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT 'link',
  `num` tinyint(1) DEFAULT 1,
  `access` tinyint(1) DEFAULT 1,
  `create_btn` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages_admin`
--

INSERT INTO `pages_admin` (`id`, `id_parent`, `alias`, `name`, `title`, `text`, `link`, `icon`, `num`, `access`, `create_btn`) VALUES
(1, 0, 'home', 'Главная', 'Домашняя страница', NULL, 'home', 'home', 1, 1, 0),
(2, 1, 'navigation', 'Навигация', 'Навигация сайта', NULL, 'navigation', 'sitemap', 2, 1, 1),
(3, 1, 'slider', 'Слайдер', 'Слайдер', NULL, 'slider', 'clone', 1, 1, 1),
(4, 1, 'footer', 'Футер', 'Ссылки в футере', NULL, 'footer', 'link', 4, 1, 1),
(5, 0, '//sector', 'Обратная связь', 'Обратная связь', NULL, NULL, 'bell', 2, 1, 0),
(7, 5, 'feedback', 'Обратная связь', 'Обратная связь', NULL, 'feedback', 'envelope-o', 1, 1, 0),
(8, 0, '//sector', 'Контент', 'Контент', NULL, NULL, 'bars', 3, 1, 0),
(10, 8, 'pages', 'Страницы', 'Информационные страницы', NULL, 'pages', 'files-o', 10, 1, 1),
(11, 0, '//sector', 'Управление сайтом', 'Управление сайтом', NULL, NULL, 'cogs', 10, 1, 0),
(12, 11, 'users', 'Пользователи', 'Пользователи', NULL, 'users', 'users', 1, 1, 0),
(13, 11, 'pageinfo', 'Разделы сайта', 'Управление разделами сайта', NULL, 'pageinfo', 'desktop', 1, 1, 0),
(14, 11, 'settings', 'Настройки', 'Настройки сайта', NULL, 'settings', 'cog', 1, 1, 0),
(15, 0, 'files', 'Менеджер файлов', 'Менеджер файлов', NULL, 'files', 'folder-open', 9, 1, 0),
(16, 8, 'news', 'Новости', 'Новости', NULL, 'news', 'bullhorn', 1, 1, 1),
(19, 8, 'articles', 'Статьи', 'Статьи', NULL, 'articles', 'file-text-o', 2, 1, 1),
(20, 5, 'reviews', 'Отзывы', 'Отзывы', NULL, 'reviews', 'comment-o', 2, 1, 1),
(21, 1, 'social', 'Соц сети', 'Социальные сети', NULL, 'social', 'paper-plane-o', 5, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pages_site`
--

CREATE TABLE `pages_site` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL COMMENT 'может быть какой угодно, не как в Pages_admin',
  `name` varchar(255) DEFAULT NULL COMMENT 'название страницы - хлебные крошки',
  `title` varchar(255) DEFAULT NULL COMMENT 'заголовок страницы',
  `brief` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `thumb_enable` tinyint(1) DEFAULT 0,
  `thumb_x` int(11) DEFAULT 0,
  `thumb_y` int(11) DEFAULT 0,
  `thumb_type` varchar(255) DEFAULT 'thumb',
  `access` tinyint(1) DEFAULT 1
) ENGINE=InnoDB AVG_ROW_LENGTH=1489 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages_site`
--

INSERT INTO `pages_site` (`id`, `alias`, `name`, `title`, `brief`, `text`, `meta_title`, `meta_description`, `thumb_enable`, `thumb_x`, `thumb_y`, `thumb_type`, `access`) VALUES
(1, 'home', 'Главная', 'Добро пожаловать на сайт!', 'Описание раздела для сео-продвижения. Редактируется в админ-панели', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut nulla enim. Nunc sodales justo tortor, eu fermentum odio ullamcorper in. Aliquam eu orci nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed ut odio risus.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus ante urna, sodales eget suscipit a, tincidunt vel lacus. &nbsp;Morbi semper libero at dictum accumsan. Maecenas et ante at purus ultricies vehicula. Nulla scelerisque enim ipsum. Aliquam erat volutpat. Integer eu egestas nunc, vel placerat libero. Duis ac orci eu tellus pretium accumsan. Duis erat metus, bibendum vel magna et, scelerisque varius erat.</p>', 'Главная', NULL, 0, 0, 0, 'thumb', 1),
(2, 'news', 'Новости', 'Новости', 'Описание раздела для сео-продвижения. Редактируется в админ-панели', '<h2>Mauris ut risus tempus, finibus diam et, egestas ante.</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lorem diam, aliquam eget velit sit amet, molestie tempor purus. Nullam auctor sem et nulla egestas, dapibus facilisis massa porttitor. Suspendisse non ultrices arcu. Mauris ut risus tempus, finibus diam et, egestas ante. Maecenas lobortis malesuada erat ac tristique. Quisque id sollicitudin sapien. Curabitur porta ante quis arcu commodo, non tincidunt augue viverra.</p>\r\n\r\n<p>Nulla molestie, lacus quis egestas vulputate, dolor libero molestie dui, vel faucibus sem lorem non dolor. Aliquam id risus turpis. Etiam non egestas augue, eget maximus tortor. In turpis nisi, cursus non velit eu, pretium pellentesque dolor. Nam egestas porta dui et consequat. In finibus in nulla non imperdiet. Sed non massa eros. Donec a lacus massa. Praesent aliquam nulla quam, vitae vestibulum neque dapibus quis. Cras placerat rhoncus dui quis ultricies.</p>\r\n\r\n<h3>Duis ut ipsum imperdiet, euismod sapien vel, maximus ligula.</h3>\r\n\r\n<p>Nunc fringilla luctus erat, eu sollicitudin dolor tincidunt eu. Nullam eget sem eros. Curabitur non augue pellentesque, elementum purus eu, convallis orci. Donec at maximus odio. Donec mauris nibh, tempor ac metus eu, faucibus bibendum nibh. Sed dui nisl, cursus quis porta ac, feugiat eget risus. Sed felis orci, pulvinar nec iaculis a, auctor ut urna. Suspendisse volutpat malesuada risus, commodo rutrum magna gravida et.</p>', 'Новости', '', 1, 360, 240, 'thumb', 1),
(3, 'contacts', 'Контакты', 'Обратная связь', 'Описание раздела для сео-продвижения. Редактируется в админ-панели', '', 'Контакты', NULL, 0, 0, 0, 'thumb', 1),
(4, 'errors', 'Ошибка 404', 'Страница не найдена', 'Запрашиваемая страница не существует\r\nили была перемещена по другому адресу.', '', 'Ошибка 404 - Страница не найдена', '', 0, 0, 0, 'thumb', 1),
(5, 'articles', 'Полезная информация', 'Полезная информация', 'Описание раздела для сео-продвижения. Редактируется в админ-панели', '<h2>Mauris ut risus tempus, finibus diam et, egestas ante.</h2>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lorem diam, aliquam eget velit sit amet, molestie tempor purus. Nullam auctor sem et nulla egestas, dapibus facilisis massa porttitor. Suspendisse non ultrices arcu. Mauris ut risus tempus, finibus diam et, egestas ante. Maecenas lobortis malesuada erat ac tristique. Quisque id sollicitudin sapien. Curabitur porta ante quis arcu commodo, non tincidunt augue viverra.</p>\r\n\r\n<p>Nulla molestie, lacus quis egestas vulputate, dolor libero molestie dui, vel faucibus sem lorem non dolor. Aliquam id risus turpis. Etiam non egestas augue, eget maximus tortor. In turpis nisi, cursus non velit eu, pretium pellentesque dolor. Nam egestas porta dui et consequat. In finibus in nulla non imperdiet. Sed non massa eros. Donec a lacus massa. Praesent aliquam nulla quam, vitae vestibulum neque dapibus quis. Cras placerat rhoncus dui quis ultricies.</p>\r\n\r\n<h3>Duis ut ipsum imperdiet, euismod sapien vel, maximus ligula.</h3>\r\n\r\n<p>Nunc fringilla luctus erat, eu sollicitudin dolor tincidunt eu. Nullam eget sem eros. Curabitur non augue pellentesque, elementum purus eu, convallis orci. Donec at maximus odio. Donec mauris nibh, tempor ac metus eu, faucibus bibendum nibh. Sed dui nisl, cursus quis porta ac, feugiat eget risus. Sed felis orci, pulvinar nec iaculis a, auctor ut urna. Suspendisse volutpat malesuada risus, commodo rutrum magna gravida et.</p>', 'Полезная информация', NULL, 1, 360, 240, 'thumb', 1),
(6, 'reviews', 'Отзывы', 'Отзывы', '', '', 'Отзывы', '', 1, 200, 200, 'thumb', 1),
(7, 'about', 'О компании', 'О компании', 'Описание раздела для сео-продвижения. Редактируется в админ-панели', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lorem diam, aliquam eget velit sit amet, molestie tempor purus. Nullam auctor sem et nulla egestas, dapibus facilisis massa porttitor. Suspendisse non ultrices arcu. Mauris ut risus tempus, finibus diam et, egestas ante. Maecenas lobortis malesuada erat ac tristique. Quisque id sollicitudin sapien. Curabitur porta ante quis arcu commodo, non tincidunt augue viverra.</p>\r\n\r\n<p>Nulla molestie, lacus quis egestas vulputate, dolor libero molestie dui, vel faucibus sem lorem non dolor. Aliquam id risus turpis. Etiam non egestas augue, eget maximus tortor. In turpis nisi, cursus non velit eu, pretium pellentesque dolor. Nam egestas porta dui et consequat. In finibus in nulla non imperdiet. Sed non massa eros. Donec a lacus massa. Praesent aliquam nulla quam, vitae vestibulum neque dapibus quis. Cras placerat rhoncus dui quis ultricies.</p>\r\n\r\n<h3>Duis ut ipsum imperdiet, euismod sapien vel, maximus ligula.</h3>\r\n\r\n<p>Nunc fringilla luctus erat, eu sollicitudin dolor tincidunt eu. Nullam eget sem eros. Curabitur non augue pellentesque, elementum purus eu, convallis orci. Donec at maximus odio. Donec mauris nibh, tempor ac metus eu, faucibus bibendum nibh. Sed dui nisl, cursus quis porta ac, feugiat eget risus. Sed felis orci, pulvinar nec iaculis a, auctor ut urna. Suspendisse volutpat malesuada risus, commodo rutrum magna gravida et.</p>', 'О компании', '', 0, 0, 0, 'thumb', 1),
(8, 'cabinet', 'Личный кабинет', 'Личный кабинет', NULL, NULL, 'Личный кабинет', NULL, 0, 0, 0, 'thumb', 1),
(9, 'cabinet_profile', 'Персональная информация', 'Персональная информация', '', '', 'Персональная информация', NULL, 0, 0, 0, 'thumb', 1),
(10, 'cabinet_login', 'Авторизация', 'Авторизация', '', '', 'Авторизация', '', 0, 0, 0, 'thumb', 1),
(11, 'cabinet_register', 'Регистрация', 'Регистрация', '', '', 'Регистрация', '', 0, 0, 0, 'thumb', 1),
(12, 'cabinet_recovery', 'Восстановление пароля', 'Восстановление пароля', NULL, NULL, 'Восстановление пароля', NULL, 0, 0, 0, 'thumb', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT 0,
  `pub_date` datetime DEFAULT NULL,
  `add_date` timestamp NULL DEFAULT current_timestamp(),
  `source` varchar(255) DEFAULT 'admin',
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB AVG_ROW_LENGTH=4096 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `phone`, `email`, `link`, `img`, `text`, `visibility`, `pub_date`, `add_date`, `source`, `is_read`) VALUES
(10, 'Тест', '+7 (111) 111-11-11', 'test@test.com', 'http://narisuemvse.by/', NULL, 'Vestibulum lacinia justo at quam interdum, ac ullamcorper augue suscipit.\r\nPellentesque rutrum libero turpis, non iaculis ligula maximus ac. Integer eget finibus nisl. Donec interdum est sit amet est vehicula dictum. Morbi id efficitur lorem, nec volutpat erat.', 1, '2019-08-06 09:36:00', '2017-05-14 19:23:11', 'site', 1),
(12, 'Наталья', NULL, NULL, '', '83e1dc4ffc41d3d196f21a0d0daec892.jpg', 'Maecenas ac justo dolor. Curabitur augue quam, vehicula vitae libero rutrum, rhoncus consectetur metus. Nunc nec viverra sem. Vestibulum consequat feugiat ipsum, et molestie odio auctor scelerisque. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque nec risus vel felis iaculis ultricies ut sed ex. Aenean mollis, dolor vitae tristique fermentum, turpis leo dictum est, pulvinar auctor lacus augue nec metus.', 1, '2019-08-20 23:16:00', '2019-08-20 20:19:07', 'admin', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `owner` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `copyright` text DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `phone_extra` varchar(50) DEFAULT NULL,
  `phone_city` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_sender` varchar(255) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `enable` tinyint(1) DEFAULT 1,
  `cap_title` varchar(255) DEFAULT NULL,
  `cap_descr` text DEFAULT NULL,
  `mask_phone` varchar(50) DEFAULT NULL,
  `mask_phone_extra` varchar(50) DEFAULT NULL,
  `mask_phone_city` varchar(50) DEFAULT NULL,
  `img_alt` varchar(255) DEFAULT NULL,
  `color` varchar(6) DEFAULT NULL,
  `code_before` text DEFAULT NULL,
  `code_after` text DEFAULT NULL,
  `version` decimal(10,1) DEFAULT 0.1
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `title`, `descr`, `img`, `owner`, `details`, `copyright`, `phone`, `phone_extra`, `phone_city`, `address`, `map`, `email`, `email_sender`, `skype`, `meta_title`, `meta_description`, `enable`, `cap_title`, `cap_descr`, `mask_phone`, `mask_phone_extra`, `mask_phone_city`, `img_alt`, `color`, `code_before`, `code_after`, `version`) VALUES
(1, 'Site Name', 'site description', 'logo.png', 'ООО \"RudzPark\"', 'Зарегистрирован в Торговом реестре \r\nРБ №0000000 от 16.05.2019 г.', '2019 &copy; Sitename\r\nAll rights reserved', '375290000000', '375330000000', '', 'г. Новополоцк, ул. Молодежная, 11-А', '<iframe src=\"https://yandex.ru/map-widget/v1/?um=constructor%3A37b22475ebf4905210c81bbea2e9b5bebd8e9b8e2efb7220068137379cc45932&lang=ru_RU&scroll=true&source=constructor\" width=\"100%\" height=\"315\" frameborder=\"0\"></iframe>', 'narisuemvse.testmail@yandex.ru', 'narisuemvse.testmail@yandex.ru', '', 'Site Meta', 'site description for seo', 1, 'Сайт временно закрыт', 'Приносим свои извинения и гарантируем\r\nв скором времени наладить работу', '+??? (??) ???-??-??', '+??? (??) ???-??-??', '+??? (??) ???-??-??', 'Sitename images', 'D11212', '', '', '0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `btn` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `num` int(11) DEFAULT 1,
  `img` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `align` varchar(255) DEFAULT 'left',
  `visibility` tinyint(1) DEFAULT 1,
  `show_text` tinyint(1) NOT NULL DEFAULT 1,
  `add_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `title`, `text`, `btn`, `link`, `num`, `img`, `mobile`, `align`, `visibility`, `show_text`, `add_date`) VALUES
(1, 'Преимущества работы с нами', 'Предоставляем отличные решения под Ваши запросы\r\n\r\nРепутация надёжной и качественной компании \r\nна белорусском рынке\r\n\r\nГрамотно распределяем Ваш бюджет \r\nи выполняем работу четко в срок', '', '/about', 10, '2046dcfcca4acb208f4e63b7528cc4bc.jpg', '1badbb738535f80b3058ffd9fc6c447b.jpg', 'left', 1, 1, '2019-08-20 17:18:38'),
(2, 'Второй товар\r\nсо скидкой 50%', 'При заказе на сумму от 1000 рублей\r\nвы получите 2 товар за пол цены', 'Подробнее', '/about', 1, '5cd113df54d4084071792da5b9e4a35c.jpg', '3dc3e036de72c17ce6f39aad3b4e6ddd.jpg', 'right', 1, 1, '2019-08-20 17:44:56');

-- --------------------------------------------------------

--
-- Структура таблицы `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `icon_front` varchar(255) DEFAULT NULL,
  `icon_admin` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT 1,
  `visibility` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `social`
--

INSERT INTO `social` (`id`, `alias`, `title`, `brief`, `link`, `icon_front`, `icon_admin`, `num`, `visibility`) VALUES
(1, 'vk', 'Вконтакте', 'Мы Вконтакте', 'https://vk.com/', 'fab fa-vk', 'vk', 20, 1),
(2, 'facebook', 'Facebook', 'Мы в Facebook', 'https://www.facebook.com/', 'fab fa-facebook-f', 'facebook', 19, 1),
(3, 'twitter', 'Twitter', 'Мы в Twitter', 'https://twitter.com/', 'fab fa-twitter', 'twitter', 18, 1),
(4, 'instagram', 'Instagram', 'Мы в Instagram', 'https://www.instagram.com/', 'fab fa-instagram', 'instagram', 17, 1),
(5, 'ok', 'Одноклассниках', 'Мы в Одноклассниках', 'https://ok.ru/', 'fab fa-odnoklassniki', 'odnoklassniki', 16, 1),
(6, 'mailru', 'Mail.ru', 'Мы в Mail.ru', 'https://mail.ru/', 'fas fa-at', 'at', 15, 1),
(7, 'google', 'Google+', 'Мы в Google+', 'https://plus.google.com/discover', 'fab fa-google', 'google-plus', 14, 1),
(8, 'linkedin', 'LinkedIn', 'Мы в LinkedIn', 'https://www.linkedin.com/', 'fab fa-linkedin-in', 'linkedin', 13, 1),
(9, 'whatsapp', 'Whatsapp', 'Мы в Whatsapp', 'whatsapp://send?phone=+375290000000', 'fab fa-whatsapp', 'whatsapp', 12, 1),
(10, 'viber', 'Viber', 'Мы в Viber', 'viber://chat?number=+375290000000', 'fab fa-viber', 'whatsapp', 11, 1),
(11, 'telegram', 'Telegram', 'Мы в Telegram', 'https://t.me/', 'fab fa-telegram-plane', 'paper-plane-o', 10, 1),
(12, 'youtube', 'Youtube', 'Мы на Youtube', 'https://www.youtube.com/', 'fab fa-youtube', 'play', 9, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `access` varchar(255) DEFAULT 'user',
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `network` varchar(255) NOT NULL DEFAULT 'native',
  `uid` varchar(255) DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL,
  `add_date` timestamp NULL DEFAULT current_timestamp(),
  `delete` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `access`, `login`, `password`, `email`, `name`, `phone`, `img`, `network`, `uid`, `hash`, `add_date`, `delete`) VALUES
(1, 'admin', 'admin', '$2y$10$rHJd9eKDZbtv20Bz/px9E.4AKIbIkt0LmqOD/hyT7/jofN.77VL66', 'narisuemvse.testmail@yandex.ru', 'Иван Иванов', '+375 (29) 0000000', NULL, 'native', '0', '45b1eacdbb1a8b135f80130dce066d7b', '2015-06-06 12:49:47', 0),
(2, 'admin', 'moderator', '$2y$10$mTuHBctW2VtHHoFJoX.SHuJ.cKffKSdtXAWrPeiFNDzMI1VNCQlVG', 'narisuemvse@gmail.ru', 'Петр Петров', '+375 (29) 1111111', NULL, 'native', '0', '4a4e1510115fa4f87bddd5d72e146575', '2015-11-17 12:07:30', 0),
(3, 'user', 'test', '$2y$10$rLIX68/Qi5L45JVTj/hxIeyCEKAzQn2pWJdKzkBQcvj.dSuXuiR9S', 'pm.narisuemvse@gmail.com', 'Семен Семенов', '+375 (29) 2222222', NULL, 'native', '0', 'dfd4610679a69d75753ee0306e1b42d8', '2019-08-06 21:57:50', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_news_idItem` (`id`),
  ADD UNIQUE KEY `UK_news_alias` (`alias`),
  ADD KEY `IDX_news_addDate` (`add_date`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_feedback_idItem` (`id`),
  ADD KEY `IDX_feedback_addDate` (`add_date`);

--
-- Индексы таблицы `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_navigation_idItem` (`id`),
  ADD KEY `IDX_navigation_addDate` (`add_date`),
  ADD KEY `IDX_navigation_idParent` (`id_parent`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_news_idItem` (`id`),
  ADD UNIQUE KEY `UK_news_alias` (`alias`),
  ADD KEY `IDX_news_addDate` (`add_date`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_pages_alias` (`alias`),
  ADD KEY `IDX_pages_addDate` (`add_date`);

--
-- Индексы таблицы `pages_admin`
--
ALTER TABLE `pages_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_pages_admin_alias` (`alias`);

--
-- Индексы таблицы `pages_site`
--
ALTER TABLE `pages_site`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_pages_site_alias` (`alias`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_reviews_idItem` (`id`),
  ADD KEY `IDX_reviews_addDate` (`add_date`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_slider_idItem` (`id`),
  ADD KEY `IDX_slider_addDate` (`add_date`);

--
-- Индексы таблицы `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_users_idItem` (`id`),
  ADD KEY `IDX_users_login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `pages_admin`
--
ALTER TABLE `pages_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `pages_site`
--
ALTER TABLE `pages_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;