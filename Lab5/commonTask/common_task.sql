-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 06 2020 г., 13:24
-- Версия сервера: 8.0.20
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `common_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ip_registration` varchar(15) NOT NULL,
  `date_registration` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `password`, `ip_registration`, `date_registration`) VALUES
(1, 'Михаил Булгаков', 'bulgakov123', '127.0.0.1', '2020-05-05'),
(2, 'Александр Пушкин', 'pushkin321', '127.0.0.1', '2020-05-04');

-- --------------------------------------------------------

--
-- Структура таблицы `authors_texts`
--

CREATE TABLE `authors_texts` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `date_publication` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors_texts`
--

INSERT INTO `authors_texts` (`id`, `author_id`, `title`, `text`, `date_publication`) VALUES
(1, 1, 'Мастер и маргарита', 'Глава 1. Никогда не разговаривайте с неизвестными\r\n Однажды весною, в час небывало жаркого заката, в Москве, на Патриарших прудах, появились два гражданина. Первый из них, одетый в летнюю серенькую пару, был маленького роста, упитан, лыс, свою приличную шляпу пирожком нес в руке, а на хорошо выбритом лице его помещались сверхъестественных размеров очки в черной роговой оправе. Второй – плечистый, рыжеватый, вихрастый молодой человек в заломленной на затылок клетчатой кепке – был в ковбойке, жеваных белых брюках и в черных тапочках.\r\n\r\nПервый был не кто иной, как Михаил Александрович Берлиоз, председатель правления одной из крупнейших московских литературных ассоциаций, сокращенно именуемой МАССОЛИТ, и редактор толстого художественного журнала, а молодой спутник его – поэт Иван Николаевич Понырев, пишущий под псевдонимом Бездомный.\r\n\r\nПопав в тень чуть зеленеющих лип, писатели первым долгом бросились к пестро раскрашенной будочке с надписью «Пиво и воды».\r\n\r\nДа, следует отметить первую странность этого страшного майского вечера. Не только у будочки, но и во всей аллее, параллельной Малой Бронной улице, не оказалось ни одного человека. В тот час, когда уж, кажется, и сил не было дышать, когда солнце, раскалив Москву, в сухом тумане валилось куда-то за Садовое кольцо, – никто не пришел под липы, никто не сел на скамейку, пуста была аллея.\r\n\r\n– Дайте нарзану, – попросил Берлиоз.\r\n\r\n– Нарзану нету, – ответила женщина в будочке и почему-то обиделась.\r\n\r\n– Пиво есть? – сиплым голосом осведомился Бездомный.\r\n\r\n– Пиво привезут к вечеру, – ответила женщина.\r\n\r\n– А что есть? – спросил Берлиоз.\r\n\r\n– Абрикосовая, только теплая, – сказала женщина.\r\n\r\n– Ну, давайте, давайте, давайте!..\r\n\r\nАбрикосовая дала обильную желтую пену, и в воздухе запахло парикмахерской. Напившись, литераторы немедленно начали икать, расплатились и уселись на скамейке лицом к пруду и спиной к Бронной.\r\n\r\nТут приключилась вторая странность, касающаяся одного Берлиоза. Он внезапно перестал икать, сердце его стукнуло и на мгновенье куда-то провалилось, потом вернулось, но с тупой иглой, засевшей в нем. Кроме того, Берлиоза охватил необоснованный, но столь сильный страх, что ему захотелось тотчас же бежать с Патриарших без оглядки. Берлиоз тоскливо оглянулся, не понимая, что его напугало. Он побледнел, вытер лоб платком, подумал: «Что это со мной? Этого никогда не было... сердце шалит... я переутомился. Пожалуй, пора бросить все к черту и в Кисловодск...»\r\n\r\nИ тут знойный воздух сгустился перед ним, и соткался из этого воздуха прозрачный гражданин престранного вида. На маленькой головке жокейский картузик, клетчатый кургузый воздушный же пиджачок... Гражданин ростом в сажень, но в плечах узок, худ неимоверно, и физиономия, прошу заметить, глумливая.\r\n\r\nЖизнь Берлиоза складывалась так, что к необыкновенным явлениям он не привык. Еще более побледнев, он вытаращил глаза и в смятении подумал: «Этого не может быть!..»\r\n\r\nНо это, увы, было, и длинный, сквозь которого видно, гражданин, не касаясь земли, качался перед ним и влево и вправо.\r\n\r\nТут ужас до того овладел Берлиозом, что он закрыл глаза. А когда он их открыл, увидел, что все кончилось, марево растворилось, клетчатый исчез, а заодно и тупая игла выскочила из сердца.\r\n\r\n– Фу ты черт! – воскликнул редактор, – ты знаешь, Иван, у меня сейчас едва удар от жары не сделался! Даже что-то вроде галлюцинации было, – он попытался усмехнуться, но в глазах его еще прыгала тревога, и руки дрожали.\r\n\r\nОднако постепенно он успокоился, обмахнулся платком и, произнеся довольно бодро: «Ну-с, итак...» – повел речь, прерванную питьем абрикосовой.\r\n\r\nРечь эта, как впоследствии узнали, шла об Иисусе Христе. Дело в том, что редактор заказал поэту для очередной книжки журнала большую антирелигиозную поэму. Эту поэму Иван Николаевич сочинил, и в очень короткий срок, но, к сожалению, ею редактора нисколько не удовлетворил. Очертил Бездомный главное действующее лицо своей поэмы, то есть Иисуса, очень черными красками, и тем не менее всю поэму приходилось, по мнению редактора, писать заново. И вот теперь редактор читал поэту нечто вроде лекции об Иисусе, с тем чтобы подчеркнуть основную ошибку поэта. Трудно сказать, что именно подвело Ивана Николаевича – изобразительная ли сила его таланта или полное незнакомство с вопросом, по которому он собирался писать, – но Иисус в его изображении получился ну совершенно как живой, хотя и не привлекающий к себе персонаж. Берлиоз же хотел доказать поэту, что главное не в том, каков был Иисус, плох ли, хорош ли, а в том, что Иисуса-то этого, как личности, вовсе не существовало на свете и что все рассказы о нем – простые выдумки, самый обыкновенный миф.\r\n\r\nНадо заметить, что редактор был человеком начитанным и очень умело указывал в своей речи на древних историков, например, на знаменитого Филона Александрийского, на блестяще образованного Иосифа Флавия, никогда ни словом не упоминавших о существовании Иисуса. Обнаруживая солидную эрудицию, Михаил Александрович сообщил поэту, между прочим, и о том, что то место в 15-й книге, в главе 44-й знаменитых Тацитовых «Анналов», где говорится о казни Иисуса, – есть не что иное, как позднейшая поддельная вставка.\r\n\r\nПоэт, для которого все, сообщаемое редактором, являлось новостью, внимательно слушал Михаила Александровича, уставив на него свои бойкие зеленые глаза, и лишь изредка икал, шепотом ругая абрикосовую воду.\r\n\r\n– Нет ни одной восточной религии, – говорил Берлиоз, – в которой, как правило непорочная дева не произвела бы на свет бога. И христиане, не выдумав ничего нового, точно так же создали своего Иисуса, которого на самом деле никогда не было в живых. Вот на это-то и нужно сделать главный упор...\r\n\r\nВысокий тенор Берлиоза разносился в пустынной аллее, и по мере того, как Михаил Александрович забирался в дебри, в которые может забираться, не рискуя свернуть себе шею, лишь очень образованный человек, – поэт узнавал все больше и больше интересного и полезного и про египетского Озириса, благостного бога и сына Неба и Земли, и про финикийского бога Фаммуза, и про Мардука, и даже про менее известного грозного бога Вицлипуцли, которого весьма почитали некогда ацтеки в Мексике.\r\n\r\nИ вот как раз в то время, когда Михаил Александрович рассказывал поэту о том, как ацтеки лепили из теста фигурку Вицлипуцли, в аллее показался первый человек.\r\n\r\nВпоследствии, когда, откровенно говоря, было уже поздно, разные учреждения представили свои сводки с описанием этого человека. Сличение их не может не вызвать изумления. Так, в первой из них сказано, что человек этот был маленького роста, зубы имел золотые и хромал на правую ногу. Во второй – что человек был росту громадного, коронки имел платиновые, хромал на левую ногу. Третья лаконически сообщает, что особых примет у человека не было.\r\n\r\nПриходится признать, что ни одна из этих сводок никуда не годится.\r\n\r\nРаньше всего: ни на какую ногу описываемый не хромал, и росту был не маленького и не громадного, а просто высокого. Что касается зубов, то с левой стороны у него были платиновые коронки, а с правой – золотые. Он был в дорогом сером костюме, в заграничных, в цвет костюма, туфлях. Серый берет он лихо заломил на ухо, под мышкой нес трость с черным набалдашником в виде головы пуделя. По виду – лет сорока с лишним. Рот какой-то кривой. Выбрит гладко. Брюнет. Правый глаз черный, левый почему-то зеленый. Брови черные, но одна выше другой. Словом – иностранец.\r\n\r\nПройдя мимо скамьи, на которой помещались редактор и поэт, иностранец покосился на них, остановился и вдруг уселся на соседней скамейке, в двух шагах от приятелей.\r\n\r\n«Немец», – подумал Берлиоз.\r\n\r\n«Англичанин, – подумал Бездомный, – ишь, и не жарко ему в перчатках».\r\n\r\nА иностранец окинул взглядом высокие дома, квадратом окаймлявшие пруд, причем заметно стало, что видит это место он впервые и что оно его заинтересовало.\r\n\r\nОн остановил свой взор на верхних этажах, ослепительно отражающих в стеклах изломанное и навсегда уходящее от Михаила Александровича солнце, затем перевел его вниз, где стекла начали предвечерне темнеть, чему-то снисходительно усмехнулся, прищурился, руки положил на набалдашник, а подбородок на руки.\r\n\r\n– Ты, Иван, – говорил Берлиоз, – очень хорошо и сатирически изобразил, например, рождение Иисуса, сына божия, но соль-то в том, что еще до Иисуса родился еще ряд сынов божиих, как, скажем, фригийский Аттис, коротко же говоря, ни один из них не рождался и никого не было, в том числе и Иисуса, и необходимо, чтобы ты, вместо рождения и, скажем, прихода волхвов, описал нелепые слухи об этом рождении... А то выходит по твоему рассказу, что он действительно родился!..\r\n\r\nТут Бездомный сделал попытку прекратить замучившую его икоту, задержав дыхание, отчего икнул мучительнее и громче, и в этот же момент Берлиоз прервал свою речь, потому что иностранец вдруг поднялся и направился к писателям.\r\n\r\nТе поглядели на него удивленно.\r\n\r\n– Извините меня, пожалуйста, – заговорил подошедший с иностранным акцентом, но не коверкая слов, – что я, не будучи знаком, позволяю себе... но предмет вашей ученой беседы настолько интересен, что...\r\n\r\nТут он вежливо снял берет, и друзьям ничего не оставалось, как приподняться и раскланяться.\r\n\r\n«Нет, скорее француз...» – подумал Берлиоз.\r\n\r\n«Поляк?..» – подумал Бездомный.\r\n\r\nНеобходимо добавить, что на поэта иностранец с первых же слов произвел отвратительное впечатление, а Берлиозу скорее понравился, то есть не то чтобы понравился, а... как бы выразиться... заинтересовал, что ли.\r\n\r\n– Разрешите мне присесть? – вежливо попросил иностранец, и приятели как-то невольно раздвинулись; иностранец ловко уселся между ними и тотчас вступил в разговор.\r\n\r\n– Если я не ослышался, вы изволили говорить, что Иисуса не было на свете? – спросил иностранец, обращая к Берлиозу свой левый зеленый глаз.\r\n\r\n– Нет, вы не ослышались, – учтиво ответил Берлиоз, – именно это я и говорил.\r\n\r\n– Ах, как интересно! – воскликнул иностранец.\r\n\r\n«А какого черта ему надо?» – подумал Бездомный и нахмурился.\r\n\r\n– А вы соглашались с вашим собеседником? – осведомился неизвестный, повернувшись вправо к Бездомному.\r\n\r\n– На все сто! – подтвердил тот, любя выражаться вычурно и фигурально.\r\n\r\n– Изумительно! – воскликнул непрошеный собеседник и, почему-то воровски оглянувшись и приглушив свой низкий голос, сказал: – Простите мою навязчивость, но я так понял, что вы, помимо всего прочего, еще и не верите в бога? – он сделал испуганные глаза и прибавил: – Клянусь, я никому не скажу.\r\n\r\n– Да, мы не верим в бога, – чуть улыбнувшись испугу интуриста, ответил Берлиоз. – Но об этом можно говорить совершенно свободно.\r\n\r\nИностранец откинулся на спинку скамейки и спросил, даже привизгнув от любопытства:\r\n\r\n– Вы – атеисты?!\r\n\r\n– Да, мы – атеисты, – улыбаясь, ответил Берлиоз, а Бездомный подумал, рассердившись: «Вот прицепился, заграничный гусь!»\r\n\r\n– Ох, какая прелесть! – вскричал удивительный иностранец и завертел головой, глядя то на одного, то на другого литератора.\r\n\r\n– В нашей стране атеизм никого не удивляет, – дипломатически вежливо сказал Берлиоз, – большинство нашего населения сознательно и давно перестало верить сказкам о боге.\r\n\r\nТут иностранец отколол такую штуку: встал и пожал изумленному редактору руку, произнеся при этом слова:\r\n\r\n– Позвольте вас поблагодарить от всей души!\r\n\r\n– За что это вы его благодарите? – заморгав, осведомился Бездомный.\r\n\r\n– За очень важное сведение, которое мне, как путешественнику, чрезвычайно интересно, – многозначительно подняв палец, пояснил заграничный чудак.\r\n\r\nВажное сведение, по-видимому, действительно произвело на путешественника сильное впечатление, потому что он испуганно обвел глазами дома, как бы опасаясь в каждом окне увидеть по атеисту.\r\n\r\n«Нет, он не англичанин...» – подумал Берлиоз, а Бездомный подумал: «Где это он так наловчился говорить по-русски, вот что интересно!» – и опять нахмурился.\r\n\r\n– Но, позвольте вас спросить, – после тревожного раздумья спросил заграничный гость, – как же быть с доказательствами бытия божия, коих, как известно, существует ровно пять?\r\n\r\n– Увы! – с сожалением ответил Берлиоз, – ни одно из этих доказательств ничего не стоит, и человечество давно сдало их в архив. Ведь согласитесь, что в области разума никакого доказательства существования бога быть не может.\r\n\r\n– Браво! – вскричал иностранец, – браво! Вы полностью повторили мысль беспокойного старика Иммануила по этому поводу. Но вот курьез: он начисто разрушил все пять доказательств, а затем, как бы в насмешку над самим собою, соорудил собственное шестое доказательство!\r\n\r\n– Доказательство Канта, – тонко улыбнувшись, возразил образованный редактор, – также неубедительно. И недаром Шиллер говорил, что кантовские рассуждения по этому вопросу могут удовлетворить только рабов, а Штраус просто смеялся над этим доказательством.\r\n\r\nБерлиоз говорил, а сам в это время думал: «Но, все-таки, кто же он такой? И почему так хорошо говорит по-русски?»\r\n\r\n– Взять бы этого Канта, да за такие доказательства года на три в Соловки! – совершенно неожиданно бухнул Иван Николаевич.\r\n\r\n– Иван! – сконфузившись, шепнул Берлиоз.\r\n\r\nНо предложение отправить Канта в Соловки не только не поразило иностранца, но даже привело в восторг.\r\n\r\n– Именно, именно, – закричал он, и левый зеленый глаз его, обращенный к Берлиозу, засверкал, – ему там самое место! Ведь говорил я ему тогда за завтраком: «Вы, профессор, воля ваша, что-то нескладное придумали! Оно, может, и умно, но больно непонятно. Над вами потешаться будут».\r\n\r\nБерлиоз выпучил глаза. «За завтраком... Канту?.. Что это он плетет?» – подумал он.\r\n\r\n– Но, – продолжал иноземец, не смущаясь изумлением Берлиоза и обращаясь к поэту, – отправить его в Соловки невозможно по той причине, что он уже с лишком сто лет пребывает в местах значительно более отдаленных, чем Соловки, и извлечь его оттуда никоим образом нельзя, уверяю вас!\r\n\r\n– А жаль! – отозвался задира-поэт.\r\n\r\n– И мне жаль! – подтвердил неизвестный, сверкая глазом, и продолжал: – Но вот какой вопрос меня беспокоит: ежели бога нет, то, спрашивается, кто же управляет жизнью человеческой и всем вообще распорядком на земле?\r\n\r\n– Сам человек и управляет, – поспешил сердито ответить Бездомный на этот, признаться, не очень ясный вопрос.\r\n\r\n– Виноват, – мягко отозвался неизвестный, – для того, чтобы управлять, нужно, как-никак, иметь точный план на некоторый, хоть сколько-нибудь приличный срок. Позвольте же вас спросить, как же может управлять человек, если он не только лишен возможности составить какой-нибудь план хотя бы на смехотворно короткий срок, ну, лет, скажем, в тысячу, но не может ручаться даже за свой собственный завтрашний день? И, в самом деле, – тут неизвестный повернулся к Берлиозу, – вообразите, что вы, например, начнете управлять, распоряжаться и другими и собою, вообще, так сказать, входить во вкус, и вдруг у вас... кхе... кхе... саркома легкого... – тут иностранец сладко усмехнулся, как будто мысль о саркоме легкого доставила ему удовольствие, – да, саркома, – жмурясь, как кот, повторил он звучное слово, – и вот ваше управление закончилось! Ничья судьба, кроме своей собственной, вас более не интересует. Родные вам начинают лгать, вы, чуя неладное, бросаетесь к ученым врачам, затем к шарлатанам, а бывает, и к гадалкам. Как первое и второе, так и третье – совершенно бессмысленно, вы сами понимаете. И все это кончается трагически: тот, кто еще недавно полагал, что он чем-то управляет, оказывается вдруг лежащим неподвижно в деревянном ящике, и окружающие, понимая, что толку от лежащего нет более никакого, сжигают его в печи. А бывает и еще хуже: только что человек соберется съездить в Кисловодск, – тут иностранец прищурился на Берлиоза, – пустяковое, казалось бы, дело, но и этого совершить не может, потому что неизвестно почему вдруг возьмет – поскользнется и попадет под трамвай! Неужели вы скажете, что это он сам собою управил так? Не правильнее ли думать, что управился с ним кто-то совсем другой? – и здесь незнакомец рассмеялся странным смешком.\r\n\r\nБерлиоз с великим вниманием слушал неприятный рассказ про саркому и трамвай, и какие-то тревожные мысли начали мучить его. «Он не иностранец! Он не иностранец! – думал он, – он престранный субъект... Но позвольте, кто же он такой?»\r\n\r\n– Вы хотите курить, как я вижу? – неожиданно обратился к Бездомному неизвестный, – вы какие предпочитаете?\r\n\r\n– А у вас разные, что ли, есть? – мрачно спросил поэт, у которого папиросы кончились.\r\n\r\n– Какие предпочитаете? – повторил неизвестный.\r\n\r\n– Ну, «Нашу марку», – злобно ответил Бездомный.\r\n\r\nНезнакомец немедленно вытащил из кармана портсигар и предложил его Бездомному:\r\n\r\n– «Наша марка».\r\n\r\nИ редактора и поэта не столько поразило то, что нашлась в портсигаре именно «Наша марка», сколько сам портсигар. Он был громадных размеров, червонного золота, и на крышке его при открывании сверкнул синим и белым огнем бриллиантовый треугольник.\r\n\r\nТут литераторы подумали разно. Берлиоз: «Нет, иностранец!», а Бездомный: «Вот черт его возьми! А?»\r\n\r\nПоэт и владелец портсигара закурили, а некурящий Берлиоз отказался.\r\n\r\n«Надо будет ему возразить так, – решил Берлиоз, – да, человек смертен, никто против этого и не спорит. А дело в том, что...»\r\n\r\nОднако он не успел выговорить этих слов, как заговорил иностранец:\r\n\r\n– Да, человек смертен, но это было бы еще полбеды. Плохо то, что он иногда внезапно смертен, вот в чем фокус! И вообще не может сказать, что он будет делать в сегодняшний вечер.\r\n\r\n«Какая-то нелепая постановка вопроса...» – помыслил Берлиоз и возразил:\r\n\r\n– Ну, здесь уж есть преувеличение. Сегодняшний вечер мне известен более или менее точно. Само собой разумеется, что, если на Бронной мне свалится на голову кирпич...\r\n\r\n– Кирпич ни с того ни с сего, – внушительно перебил неизвестный, – никому и никогда на голову не свалится. В частности же, уверяю вас, вам он ни в коем случае не угрожает. Вы умрете другой смертью.\r\n\r\n– Может быть, вы знаете, какой именно? – с совершенно естественной иронией осведомился Берлиоз, вовлекаясь в какой-то действительно нелепый разговор, – и скажете мне?\r\n\r\n– Охотно, – отозвался незнакомец. Он смерил Берлиоза взглядом, как будто собирался сшить ему костюм, сквозь зубы пробормотал что-то вроде: «Раз, два... Меркурий во втором доме... луна ушла... шесть – несчастье... вечер – семь...» – и громко и радостно объявил: – Вам отрежут голову!\r\n\r\nБездомный дико и злобно вытаращил глаза на развязного неизвестного, а Берлиоз спросил, криво усмехнувшись:\r\n\r\n– А кто именно? Враги? Интервенты?\r\n\r\n– Нет, – ответил собеседник, – русская женщина, комсомолка.\r\n\r\n– Гм... – промычал раздраженный шуточкой неизвестного Берлиоз, – ну, это, извините, маловероятно.\r\n\r\n– Прошу и меня извинить, – ответил иностранец, – но это так. Да, мне хотелось бы спросить вас, что вы будете делать сегодня вечером, если это не секрет?\r\n\r\n– Секрета нет. Сейчас я зайду к себе на Садовую, а потом в десять часов вечера в МАССОЛИТе состоится заседание, и я буду на нем председательствовать.\r\n\r\n– Нет, этого быть никак не может, – твердо возразил иностранец.\r\n\r\n– Это почему?\r\n\r\n– Потому, – ответил иностранец и прищуренными глазами поглядел в небо, где, предчувствуя вечернюю прохладу, бесшумно чертили черные птицы, – что Аннушка уже купила подсолнечное масло, и не только купила, но даже разлила. Так что заседание не состоится.\r\n\r\nТут, как вполне понятно, под липами наступило молчание.\r\n\r\n– Простите, – после паузы заговорил Берлиоз, поглядывая на мелющего чепуху иностранца, – при чем здесь подсолнечное масло... и какая Аннушка?\r\n\r\n– Подсолнечное масло здесь вот при чем, – вдруг заговорил Бездомный, очевидно, решив объявить незванному собеседнику войну, – вам не приходилось, гражданин, бывать когда-нибудь в лечебнице для душевнобольных?\r\n\r\n– Иван!.. – тихо воскликнул Михаил Александрович.\r\n\r\nНо иностранец ничуть не обиделся и превесело рассмеялся.\r\n\r\n– Бывал, бывал и не раз! – вскричал он, смеясь, но не сводя несмеющегося глаза с поэта, – где я только не бывал! Жаль только, что я не удосужился спросить у профессора, что такое шизофрения. Так что вы уж сами узнайте это у него, Иван Николаевич!\r\n\r\n– Откуда вы знаете, как меня зовут?\r\n\r\n– Помилуйте, Иван Николаевич, кто же вас не знает? – здесь иностранец вытащил из кармана вчерашний номер «Литературной газеты», и Иван Николаевич увидел на первой же странице свое изображение, а под ним свои собственные стихи. Но вчера еще радовавшее доказательство славы и популярности на этот раз ничуть не обрадовало поэта.\r\n\r\n– Я извиняюсь, – сказал он, и лицо его потемнело, – вы не можете подождать минутку? Я хочу товарищу пару слов сказать.\r\n\r\n– О, с удовольствием! – воскликнул неизвестный, – здесь так хорошо под липами, а я, кстати, никуда и не спешу.\r\n\r\n– Вот что, Миша, – зашептал поэт, оттащив Берлиоза в сторону, – он никакой не интурист, а шпион. Это русский эмигрант, перебравшийся к нам. Спрашивай у него документы, а то уйдет...\r\n\r\n– Ты думаешь? – встревоженно шепнул Берлиоз, а сам подумал: «А ведь он прав!»\r\n\r\n– Уж ты мне верь, – засипел ему в ухо поэт, – он дурачком прикидывается, чтобы выспросить кое-что. Ты слышишь, как он по-русски говорит, – поэт говорил и косился, следя, чтобы неизвестный не удрал, – идем, задержим его, а то уйдет...\r\n\r\nИ поэт за руку потянул Берлиоза к скамейке.\r\n\r\nНезнакомец не сидел, а стоял возле нее, держа в руках какую-то книжечку в темно-сером переплете, плотный конверт хорошей бумаги и визитную карточку.\r\n\r\n– Извините меня, что я в пылу нашего спора забыл представить себя вам. Вот моя карточка, паспорт и приглашение приехать в Москву для консультации, – веско проговорил неизвестный, проницательно глядя на обоих литераторов.\r\n\r\nТе сконфузились. «Черт, все слышал,» – подумал Берлиоз и вежливым жестом показал, что в предъявлении документов нет надобности. Пока иностранец совал их редактору, поэт успел разглядеть на карточке напечатанное иностранными буквами слово «профессор» и начальную букву фамилии – двойное «В».\r\n\r\n– Очень приятно, – тем временем смущенно бормотал редактор, и иностранец спрятал документы в карман.\r\n\r\nОтношения таким образом были восстановлены, и все трое снова сели на скамью.\r\n\r\n– Вы в качестве консультанта приглашены к нам, профессор? – спросил Берлиоз.\r\n\r\n– Да, консультантом.\r\n\r\n– Вы – немец? – осведомился Бездомный.\r\n\r\n– Я-то?.. – Переспросил профессор и вдруг задумался. – Да, пожалуй, немец... – сказал он.\r\n\r\n– Вы по-русски здорово говорите, – заметил Бездомный.\r\n\r\n– О, я вообще полиглот и знаю очень большое количество языков, – ответил профессор.\r\n\r\n– А у вас какая специальность? – осведомился Берлиоз.\r\n\r\n– Я – специалист по черной магии.\r\n\r\n«На тебе!» – стукнуло в голове у Михаила Александровича.\r\n\r\n– И... и вас по этой специальности пригласили к нам? – заикнувшись спросил он.\r\n\r\n– Да, по этой пригласили, – подтвердил профессор и пояснил: – Тут в государственной библиотеке обнаружены подлинные рукописи чернокнижника Герберта Аврилакского, десятого века, так вот требуется, чтобы я их разобрал. Я единственный в мире специалист.\r\n\r\n– А-а! Вы историк? – с большим облегчением и уважением спросил Берлиоз.\r\n\r\n– Я – историк, – подтвердил ученый и добавил ни к селу ни к городу: – Сегодня вечером на Патриарших прудах будет интересная история!\r\n\r\nИ опять крайне удивились и редактор и поэт, а профессор поманил обоих к себе и, когда они наклонились к нему, прошептал:\r\n\r\n– Имейте в виду, что Иисус существовал.\r\n\r\n– Видите ли, профессор, – принужденно улыбнувшись, отозвался Берлиоз, – мы уважаем ваши большие знания, но сами по этому вопросу придерживаемся другой точки зрения.\r\n\r\n– А не надо никаких точек зрения! – ответил странный профессор, – просто он существовал, и больше ничего.\r\n\r\n– Но требуется же какое-нибудь доказательство... – начал Берлиоз.\r\n\r\n– И доказательств никаких не требуется, – ответил профессор и заговорил негромко, причем его акцент почему-то пропал: – Все просто: в белом плаще...', '2020-05-05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `authors_texts`
--
ALTER TABLE `authors_texts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `authors_texts`
--
ALTER TABLE `authors_texts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `authors_texts`
--
ALTER TABLE `authors_texts`
  ADD CONSTRAINT `authors_texts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
