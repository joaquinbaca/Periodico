-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2017 a las 13:54:09
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Periodico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `direccion_ip` varchar(27) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `correo_usuario` text NOT NULL,
  `contenido_comentario` text NOT NULL,
  `fecha_hora_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_noticia`, `direccion_ip`, `nombre_usuario`, `correo_usuario`, `contenido_comentario`, `fecha_hora_comentario`) VALUES
(33, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Nuevo comentario.', '2017-04-20 08:31:48'),
(34, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:01'),
(35, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:02'),
(36, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:04'),
(37, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:05'),
(38, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:07'),
(39, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:08'),
(40, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:10'),
(41, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:11'),
(42, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:13'),
(43, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:15'),
(44, 3, 7, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Prueba', '2017-04-20 12:07:16'),
(47, 3, 2, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Comentario de prueba', '2017-05-15 16:52:53'),
(49, 3, 1, '127.0.0.1', 'Iván Pérez Fernández', 'ivanperezfdz@correo.ugr.es', 'Que bueno es Javi Vega', '2017-05-15 23:02:37'),
(50, 2, 1, '172.20.221.140', 'Pepe Ramírez', 'peperamirezwebcuarto@gmail.com', 'Buenas tardes.', '2017-05-22 12:02:32'),
(51, 2, 1, '172.20.221.140', 'Pepe Ramírez', 'peperamirezwebcuarto@gmail.com', 'Buenas tardes.', '2017-05-22 12:02:35'),
(52, 2, 1, '172.20.221.140', 'Pepe Ramírez', 'peperamirezwebcuarto@gmail.com', 'Buenas tardes.', '2017-05-22 12:02:36'),
(53, 1, 1, '172.20.221.140', 'admin_cuarto', 'administradorwebcuarto@gmail.com', 'Ya es tarde.', '2017-05-22 12:08:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `id_redactor` int(100) NOT NULL,
  `titulo_noticia` varchar(100) NOT NULL,
  `subtitulo_noticia` varchar(100) NOT NULL,
  `entradilla_noticia` text NOT NULL,
  `contenido_noticia` text NOT NULL,
  `fecha_hora_noticia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen_noticia` varchar(25) NOT NULL,
  `autor_imagen` varchar(20) NOT NULL,
  `posicion_noticia` enum('-1','0','1','2','3','4','5','6','7','8','9') NOT NULL,
  `seccion_noticia` int(11) NOT NULL,
  `estado_noticia` enum('publicada','no_publicada') NOT NULL DEFAULT 'publicada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `id_redactor`, `titulo_noticia`, `subtitulo_noticia`, `entradilla_noticia`, `contenido_noticia`, `fecha_hora_noticia`, `imagen_noticia`, `autor_imagen`, `posicion_noticia`, `seccion_noticia`, `estado_noticia`) VALUES
(1, 2, 'Javi Vega, un MVP que sueña con llevar a Burgos a la ACB', 'Fue el mejor jugador de la jornada con 38 de valoración', 'Llegó a Burgos el pasado verano de 2015 y desde entonces se ha convertido en una pieza indispensable dentro de los esquemas de un San Pablo Burgos desde el que se ha convertido en todo un emblema para su afición.', '<p>Llegó a Pamplona el pasado verano de 2015 y desde entonces se ha convertido en una pieza indispensable dentro de los esquemas de un San Pablo Burgos desde el que se ha convertido en todo un emblema para su afición.</p><p>Un jugador de esos que aporta garra y coraje al juego y que contagia con su espíritu a sus compañeros partido tras partido. Así pudo verse en algunos de los momentos más complicados de la temporada y así pudo comprobarse durante la noche del pasado viernes cuando Javi Vega se echó a su equipo a las espaldas a la búsqueda de un triunfo ante Leyma Coruña que no terminó de llegar pese a sus 38 tantos de valoración.</p><p>Su mejor actuación individual en una competición en la que sus 29 puntos (8/8 TL y 8/11 TC), 6 rebotes, 1 asistencia y 6 faltas recibidas no fueron del todo suficientes para haber impulsado a su equipo hacia un liderato que se ha convertido ya en toda una obsesión para él. Y si no bastará con echar un vistazo a sus palabras entre las que destaca sobre manera una palabra, el ansiado ascenso a la Liga Endesa. </p>\r\n                        <p>El quinteto de la jornada en la LEB Oro</p>\r\n                        <p>\r\n                            Regresó el vigente campeón al liderato de la Liga LEB Oro durante el pasado fin de semana y lo hizo gracias al buen hacer\r\n                            de su base titular, un Dani Rodríguez (Quesos Cerrato Palencia) que se erigió como el mejor jugador\r\n                            de la jornada en su posición tras liderar al equipo en una jornada en la que estuvo flanqueado\r\n                            por dos foráneos de lujo. Y es que, con Chris Fuller (Cáceres P. Humanidad) destacando al dos\r\n                            en el triunfo extremeño y con Zaid Hearst (Sáenz-Horeca Araberri) remando contracorriente al\r\n                            dos y al tres para su equipo en la Ciudad Condal, la competición dio forma a un perímetro de\r\n                            lujo para un quinteto ideal en el que tan sólo el escolta norteamericano ejerció como novato.\r\n                        </p>\r\n                        <p>\r\n                            Aunque para dueto de lujo el que se dio cita en un juego interior en el que el madrileño Javi Vega (San Pablo Burgos) ratificó\r\n                            su condición de MVP en un choque en el que a punto estuvo su equipo de poder forzar una prórroga\r\n                            que si sonrió a su compañero de puntura, un Sandi Marcius (Cáceres P. Humanidad) de nuevo estelar\r\n                            para ejercer como el mejor center de la competición.\r\n                        </p>\r\n                        <p>\r\n                            <span class=\"negrita\">Base:</span> Dani Rodríguez (Quesos Cerrato Palencia) 26 val: 17 puntos\r\n                            (4/6 TL y 6/8 TC), 4 rebotes, 9 asistencias y 4 faltas recibidas.\r\n                        </p>\r\n                        <p>\r\n                            <span class=\"negrita\">Escolta:</span> Chris Fuller (Cáceres P. Humanidad) 31 val: 20 puntos (10/10\r\n                            TL y 4/6 TC), 3 rebotes, 2 asistencias, 1 recuperación, 1 tapón y 6 faltas recibidas.\r\n                        </p>\r\n                        <p>\r\n                            <span class=\"negrita\">Alero:</span> Zaid Hearst (Sáenz-Horeca Araberri) 26 val: 32 puntos (7/7\r\n                            TL y 11/24 TC), 4 rebotes, 1 asistencia, 1 recuperación y 10 faltas recibidas.\r\n                        </p>\r\n                        <p>\r\n                            <span class=\"negrita\">Ala-Pívot:</span> Javi Vega (San Pablo Burgos) 38 val: 29 puntos (8/8 TL\r\n                            y 8/11 TC), 6 rebotes, 1 asistencia y 6 faltas recibidas.\r\n                        </p>\r\n                        <p>\r\n                            <span class=\"negrita\">Pívot:</span> Sandi Marcius (Cáceres P. Humanidad) 34 val: 29 puntos (7/8\r\n                            TL y 11/13 TC), 5 rebotes, 1 asistencia, 1 recuperación, 1 tapón y 7 faltas recibidas.\r\n                        </p>', '2017-04-14 03:27:31', 'noticia2.jpg', 'www.marca.com', '1', 8, 'publicada'),
(2, 2, 'Alonso.: \"Al equipo que más temería es a Red Bull\"', 'El asturiano compartió confidencias con sus seguidores', 'Fernando A. compartió con sus seguidores algunas confidencias. El español aprovechó las redes sociales para tratar de abatir el pesimismo reinante entre los aficionados después de la difícil semana de test que ha tenido que afrontar McLaren.', '<p>Semana de test. ', '2017-04-13 15:54:53', 'noticia1.jpg', 'Rv Racing Press', '0', 12, 'publicada'),
(3, 2, 'La isla descubre su tesoro', 'MARCÓ UN DOBLETE EL DÍA EN EL QUE SE ESTRENÓ COMO GOLEADOR CON LA UD', 'Las Palmas se lleva los tres puntos ante un pobre Osasuna que sólo tuvo buenos minutos en el final del primer acto. Doblete de Jesé, quien se estrenó con los canarios, y tranquilidad de nuevo en la isla después de los últimos enfrentamientos entre Setién y algunos de sus jugadores. Berenguer dio el susto al abandonar el campo en camilla tras un golpe en la cabeza y los de Vasiljevic deberán mejorar mucho para soñar con la salvación.', '<p>Lo cierto es que Jesé había hecho partidos mejores desde que llegó a la UD en el pasado mercado invernal, pero los goles son la salsa del fútbol. Perforar la meta rival es lo que cuenta en el deporte rey y el ex jugador del Real Madrid lo hizo en dos ocasiones. Comenzó el camino hasta la victoria y selló los tres puntos con dos buenas acciones ante las que poco pudo hacer Sirigu.</p>\r\n<p>Tras unas semanas en las que Las Palmas vagaba por el desierto con unos resultados adversos, Setién y compañía son conscientes de que tienen un tesoro en la banda izquierda y deben pulirlo todo lo que puedan. Si a su velocidad y desborde le suma capacidad goleadora, Jesé podrá ayudar a los suyos a conseguir resultados como el logrado ante un Osasuna que sigue naufragando en la tabla de LaLiga.</p>\r\n<p>Los navarros pudieron soñar con dar el susto en el estadio Gran Canaria, pero se quedaron con las ganas. Por mucho que Varas insistiera en ayudar a los rojillos, Roque Mesa, Viera y Jesé no estaban por la labor de dejar marchar más puntos de la isla. Los tres juntaron fuerzas para, con la ayuda de Livaja, dar una alegría a una afición que comenzaba a estar inquieta ante todo lo que se ha había vivido fuera de los terrenos de juego durante las últimas fechas.</p>\r\n<p>Tras el tanto inicial de Jesé y el dominio claro del conjunto local, los de Vasiljevic sacaron el mayor provecho a sus llegadas al área rival. Tuvo mérito Osasuna al dar la vuelta al marcador, pero aprovecharon que Varas no atajó un centro de Jaime primero y que terminó en los pies de Kodro y después, que el meta local se fuera al suelo antes de tiempo ante un tiro sin mucha potencia del punta.</p>\r\n<p>Había nervios en los locales, pero tras el descanso apareció Roque Mesa para llevar, una vez más, el peso del juego canario. El centrocampista comenzó las jugadas de ataque de su equipo y dio el último pase en la zona de tres cuartos de campo. Se hizo con la medular y encerró a un Osasuna que se fue diluyendo poco a poco. Así, Mesa asistió sobre Livaja para que anotara el empate libre de marca.</p>\r\n<p>Si Varas había echado una mano a los navarros, en esta ocasión fue Unai García el que se anotó un tanto en propia portería para poner por delante en el marcador a los locales. Cuando se disponía a despejar un balón en su área se resbaló y protagonizó un perfecto remate sobre la portería de Sirigu.</p>\r\n<p>Así, Roque Mesa se unió a la fiesta goleadora antes de que Jesé echara el cierre cuando ya estaban Boateng y Halilovic sobre el terreno de juego. Para entonces, el que no estaba era Berenguer, quien abandonó el campo mareado tras un golpe en la cabeza con David Simón y fue trasladado en ambulancia al hospital para someterse a diversas pruebas que confirmen que no tiene lesión alguna.</p>\r\n<p>Finalmente, la UD vuelve a la tranquilidad en un momento en el que se habla más de renovaciones y de jugadores apartados y Osasuna, que está tiene una plantilla más unida que nunca, debe seguir remando para alargar lo máximo posible el sueño de estar en la máxima categoría del fútbol español.</p>', '2017-04-13 15:59:21', 'noticia4.jpg', 'www.marca.com', '2', 4, 'publicada'),
(4, 2, 'El Valencia pierde a Vives para su \'vida o muerte\' ante el Khimki', 'Podría afrontar el decisivo choque de Eurocup con un solo base', 'El Valencia no sólo perdió el partido y la segunda plaza ante el Baskonia también, y es lo peor, a Guillem Vives por lesión. El base sufrió un esguince que no le permitió estar más de dos minutos en el partido. La mala noticia es que será baja para el decisivo choque ante el Khimki del miércoles por un puesto en la semis de la Eurocup. El propio entrenador taronja, Pedro Martínez, confirmó la lesión: \"Tiene un esguince de tobillo y es imposible que se pueda recuperar en tres días\".', '<p>Serio contratiempo para el técnico, porque la baja de Vives le puede dejar con tan sólo un base puro ante los rusos, Sam Van Rossom. Antoine Diot es duda por un golpe en talón. Además, el Valencia tendrá también la baja segura de Slava Kravtsov, lesionado en el primer partido ante el Khimki que le costó pasar por le quirófano para reparar una fractura en un dedo del pie izquierdo.</p>', '2017-04-13 16:01:24', 'noticia7.jpg', 'www.marca.com', '3', 5, 'publicada'),
(5, 2, 'El tope para renovar a Messi: 35 millones', 'Esa es la cifra que se pone el Barça en la negociación con el argentino', 'Cuestión de estado. El entrenador es un asunto menor comparado con la hecatombe que se daría si Messi dijese basta ya que lo único cierto es lo difícil que resulta perder si el argentino sonríe. Basta citar la época de Martino para argumentar la afirmación.', '<p>Messi juega y hace jugar, gana y hace ganar. Bartomeu se tuvo que poner serio tras el esperpento vivido antes y después de Anoeta en 2015. Aquel día cesó a Luis Enrique. Juegan estos. Messi y diez más, aunque el presidente no tardó en añadir a ocho más para dejar dos posiciones al gusto del entrenador. Luis Enrique no podía arriesgarse a un segundo cese, así que anticipó movimiento tras los primeros pitos. Leo, todo tuyo. Como en 2015, aunque esta disidencia se da con la Champions pendiente de un hilo por ausencia de plan en la ida según recalcan los genios del balón.</p>\r\n<p>El astro argentino no manda, pero decanta. Una de las condiciones para firmar la renovación era el proyecto deportivo. Es del Barça. Siente los colores y está poseído por la victoria. Messi sabe que será su último lustro y quiere seguir coleccionando títulos. No soporta perder ni tampoco que otros no hagan su trabajo como deben, sabedor de que muchos a su alrededor acumulan éxitos sin excelencia aparente. El disidente Luis Enrique despejó el camino tras haber llegado al límite en un movimiento sorpresivo por el tiempo, pero no sorprendente, ya que Bartomeu había iniciado ronda de contactos con los candidatos al área técnica para que le informasen antes de renovar sus contratos.</p>\r\n<p>Derrota consentida en lo económico. Messi se quedará en el Barça para ser el jugador mejor pagado del mundo competitivo. Alguien ganará más en China. Si no es hoy lo será mañana, pero Leo ha perdonado ofertas de 50 millones de euros netos por curso, cifra que podría duplicar en China, pero Messi es el Totti blaugrana. El acuerdo está hecho. \"Nosotros queremos, ellos quieren\". Así lo dicen todas las partes, así que se trata de ajustar las cantidades y los plazos de pago para que el contrato entre dentro de los límites económicos marcados por la competición. Detalle que no es menor ya que entre los planes no está un aumento del coste que suponen entrenador y cuerpo técnico.</p>\r\n<p>El hijo de Leo va a la \'escola\' del Barça. También los hijos de Piqué y Suárez. Vive feliz, tranquilo, y tanto él como Antonella piensan que la única alternativa para dejar Barcelona es volver a casa. A Rosario. En la renovación -nadie da margen para lo inesperado- Antonella ha tenido mucho que ver, ya que es el termómetro de Leo tal y como pudimos sentir en aquel primer semestre de 2014 donde Messi no sonreía. La familia, por suerte para el Barça, vence siempre y es garantía para ahuyentar a los amigos que aparecen cuando surge la inestabilidad.</p>\r\n<p>El anuncio de renovación se producirá cuando los números cuadren. Los harán cuadrar cuando convenga. La cifra, 35 millones de euros netos como máximo. No sería extraño dar una cantidad a la firma y otra como indemnización a la conclusión del contrato para reducir el salario y entrar en números. Nada escandaloso ya que el club blaugrana consigue el retorno de la cantidad pagada sólo con un par de contratos de publicidad. Alianza. Con Antonella y con el Barça.</p>', '2017-04-13 16:04:32', 'noticia2.jpg', 'www.marca.com', '4', 4, 'publicada'),
(6, 2, 'Simeone: \"Soy feliz en el lugar que estoy, mis jugadores compiten con el corazón\"', 'Celebró con victoria sus 200 partidos en Liga', 'espuesta tras empezar quintos. \"Fantástica, después de haber jugado el jueves, respondimos muy bien en lo físico y en lo mental e interpretamos lo que había que hacer. El equipo golpeó en el primer tiempo y pudimos marcar más. La segunda parte igual, hicimos un partido muy completo\".', '<p>Vrsaljko. \"Ha crecido mucho, es joven, le ha costado, pero ha tenido voluntad y fuerza para adaptarse a las necesidades del equipo. Compite muy bien con Juanfran y son dos alternativas, Juanfran nos ha regalado su alma cinco años y Sime también permite que esa competencia le venga muy bien al equipo\".</p>\r\n<p>200 partidos. \"Sinceramente nunca me imaginé llegar a 200 partidos con el club y menos me puedo imaginar los 400 de Luis. Soy feliz en el lugar que estoy, tengo a un grupo de jugadores que compiten con el corazón desde hace cinco años pese a las dificultades y hoy han demostrado que el equipo está. Ojalá podamos alcanzar la regularidad que venimos pidiendo\".</p>\r\n<p>Carrasco en la derecha. \"La idea de de Carrasco por la derecha era porque creíamos que podía crear dificultades a Gayá, tuvimos mucho juego vertical sobre esa zona. En la izquierda siguió a su nivel, cuantas más posibilidades nos dé mejor para él y para el equipo\".</p>\r\n<p>Qué falta para alcanzar la regularidad. \"Continuidad, pero sobre todo la de los resultados. Salvo la derrota con el Barcelona, jugando bien, hemos mantenido una línea. Se está tratando de hacer más fuerte con el correr de los partidos. Entramos en la parte más importante del curso, en la que cada partido es una final y veremos quién es el que tiene más fuerza\".</p>\r\n<p>Laterales profundos. \"La presencia de Koke en la izquierda da vuelo natural a Filipe por banda porque sumamos gente por dentro y libera la banda. Y Carrasco igual, daba verticalidad\".</p>', '2017-04-13 16:07:26', 'noticia5.jpg', 'José Ángel García', '5', 4, 'publicada'),
(7, 2, 'Ezeli recibirá el ligamento de un cadáver para seguir jugando', 'El pívot de los Blazers será el primer jugador de la NBA que recurre a la donación de un fallecido', 'Festus Ezeli, pívot de los Blazers, se someterá la próxima semana a una operación totalmente novedosa en la NBA. Por supuesto, no será el primer jugador de la Liga que pase por el quirófano para subsanar una lesión de rodilla pero, según ha desvelado ESPN, sí el primero que ha necesitado una donación procedente de una persona fallecida.', '<p>El jugador nigeriano no se ha estrenado con la franquicia de Portland, con la que firmó el pasado verano un contrato de dos años y 15,2 millones de dólares. No ha podido jugar ningún partido esta temporada aquejado de una lesión en la rodilla izquierda. Será la segunda campaña completa que se pierda por un problema en su articulación. Cuando militaba en los Warriors ya se quedó en blanco en el curso 13-14.</p>\r\n<p>Además de la complejidad de su dolencia estaba la dificultad de encontrar un donante adecuado, pues debía reunir unas características adecuadas para que el ligamento buscado encajara en el cuerpo de Ezeli, que mide 2,11 metros. El pívot estaba pendiente de operación desde diciembre. En los próximos días será operado por el doctor Robert LaPrade en la Clínica Steadman en Vail, Colorado. Se estima que su recuperación podría demorarse un año entero.</p>\r\n<p>Carson Palmer, jugador de los Bengals de la NFL, es el deportista estadounidense más conocido que se ha sometido a una operación en la que se necesitara la ayuda de un donante. Sucedió en 2006 cuando se rompió los ligamentos de la rodilla izquierda y después jugó dos temporadas más.</p>', '2017-04-13 16:09:00', 'noticia8.jpg', 'Getty Images', '6', 9, 'publicada'),
(8, 2, 'Kroos designa a su sucesor', 'El jugador alemán respondió a las preguntas de sus seguidores de Twitter', 'Toni Kroos aprovechó la tarde de este domingo para charlar con sus seguidores de Twitter y responder a las preguntas que le hicieron. Y el alemán desveló durante la charla a su sucesor: Julian Weigl, el centrocampista del Borussia Dortmund de 21 años.', '<p>Se mostró convencido de que el Madrid ganará la Liga, al responder que sí pensaba que lo iban a conseguir. Le preguntaron con qué triunfo disfrutó más, si con la Champions o con el Mundial, y respondió que \"ninguno estuvo mal\". Y sobre Bale, el alemán afirmó: \"Es un buen chico y un jugador excelente\".</p>\r\n<p>El alemán mostró su lado más personal. Sobre su futuro, aseguró que quiere estar muchos más años jugando y que no se ve como entrenador cuando cuelgue las botas. Su objetivo en estos momentos, ser un buen marido y un buen padre. Y su ciudad favorita, Londres.</p>', '2017-04-13 16:10:38', 'noticia3.jpg', 'Diego G. Souto', '7', 4, 'publicada'),
(9, 2, 'El Granada lleva más de un año sin dejar su portería a cero como visitante', 'La última vez que lo consiguió fue en Riazor en febrero de 2016', 'El Granada lleva ya más de un año sin dejar su portería a cero como visitante en la Liga, ya que ha recibido al menos un gol en los diecinueve últimos encuentros disputados lejos del estadio Nuevo Los Cármenes.', '<p>La derrota sufrida el sábado en el feudo del Leganés, donde los granadinistas perdieron por 1-0 con un tanto del venezolano Darwin Machís, jugador que el Granada tiene cedido en el cuadro madrileño, provocó que hayan superado el año encajando goles a domicilio.</p>\r\n<p>La última vez que el cuadro andaluz fue capaz de dejar su meta a cero fuera de casa fue el 28 de febrero de 2016, cuando venció por 0-1 al Deportivo de la Coruña en el estadio Riazor en un choque que sirvió para que se estrenara al frente del equipo el técnico José González.</p>\r\n<p>Desde entonces el Granada acumula diecinueve encuentros consecutivos recibiendo al menos un tanto como visitante, los catorce que ha disputado ya esta campaña, en la que tampoco ha sido capaz de ganar fuera de casa, y los cinco últimos de la temporada anterior.</p>\r\n<p>Esta racha ha incidido claramente en el mal momento clasificatorio del cuadro que ahora dirige Lucas Alcaraz, que tras la derrota del sábado en Leganés va a seguir en puestos de descenso, quedando a cuatro puntos de una permanencia que marca el Deportivo de La Coruña, que ganó esta jornada en Gijón y que tiene un partido menos, el aplazado que disputará el miércoles en su campo ante el Betis.</p>', '2017-04-13 16:16:32', 'noticia6.jpg', 'José Ángel García', '8', 4, 'publicada'),
(10, 2, 'Atlanta, sexto equipo NBA para Calderón, pero noveno al que pertenece', 'El base no ha jugado en todos los equipos que han tenido sus derechos', 'Por esas cosas que sólo se producen en la NBA, los Atlanta Hawks serán el sexto equipo en el que juegue Calderón, pero el noveno al que ha pertenecido.', '<p>El caso es que, en la carrera del base español, hay tres equipo que aparecen como propietarios de sus derechos en la Liga pero en los que no jugó y a los que perteneció aunque sólo sea por unas horas.</p>\r\n<p>Tras jugar ocho temporadas en los Raptors, el talento de Calderón acabó en Detroit. Pero los Pistons fueron su tercer equipo en la NBA, ya que el traspaso del base se hizo a través de Memphis, equipo en el que no jugaría ni un partido.</p>\r\n<p>Al finalizar la temporada 2015-16, los Knicks enviaron a Calderón a los Lakers, pero lo hicieron a través de los Bulls. Calde no pisaría Chicago.</p>\r\n<p>Finalmente, su rocambolesco fichaje frustrado por los Warriors, que se echaron atrás por la lesión de Durant, y que se cerró con su fichaje por los Hawks, novena franquicia por la que ficha, pero sexto equipo en el que jugará.</p>', '2017-04-13 16:19:32', 'noticia9.jpg', 'www.marca.com', '9', 9, 'publicada'),
(11, 1, 'Noticia de prueba', 'Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba', 'Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba', '<p>Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba</p>\r\n<p>Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba</p>\r\n<p>Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba Noticia de prueba</p>', '2017-06-01 11:37:05', 'noticia10.jpg', 'Pepe Calzaslargas', '-1', 7, 'no_publicada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabras_prohibidas`
--

CREATE TABLE `palabras_prohibidas` (
  `lista_palabras` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `palabras_prohibidas`
--

INSERT INTO `palabras_prohibidas` (`lista_palabras`) VALUES
('pene'),
('puta'),
('chocho'),
('follar'),
('politico'),
('cabron'),
('gilipollas'),
('mamarracho'),
('chichipan'),
('guachipen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicidad`
--

CREATE TABLE `publicidad` (
  `id_publicidad` int(11) NOT NULL,
  `nombre_publicidad` varchar(30) NOT NULL,
  `alt_publicidad` varchar(60) DEFAULT NULL,
  `tipo_publicidad` enum('portada','noticia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicidad`
--

INSERT INTO `publicidad` (`id_publicidad`, `nombre_publicidad`, `alt_publicidad`, `tipo_publicidad`) VALUES
(1, 'publi_alargada1.png', 'Cocacola', 'portada'),
(2, 'noticia8.jpg', 'La vida es chulisima', 'portada'),
(3, 'publi1.jpg', 'Hamburguesas', 'noticia'),
(5, 'publi3.jpg', 'Fanta', 'noticia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id_seccion` int(11) NOT NULL,
  `nombre_seccion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id_seccion`, `nombre_seccion`) VALUES
(1, 'Partidos'),
(2, 'Baloncesto'),
(3, 'Tenis'),
(4, 'Motor'),
(7, 'DXT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsecciones`
--

CREATE TABLE `subsecciones` (
  `id_subseccion` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `nombre_subseccion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subsecciones`
--

INSERT INTO `subsecciones` (`id_subseccion`, `id_seccion`, `nombre_subseccion`) VALUES
(1, 1, 'Champions'),
(2, 1, 'Selección'),
(3, 1, 'Liga 123'),
(4, 1, 'Liga Santander'),
(5, 2, 'Liga Endesa'),
(6, 2, 'Copa del Rey'),
(7, 2, 'Selección'),
(8, 2, 'FAB'),
(9, 2, 'NBA'),
(10, 3, 'Grand Slams'),
(11, 3, 'Masters 1000'),
(12, 4, 'Fórmula 1'),
(13, 4, 'Moto GP'),
(19, 7, 'ASD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol_usuario` enum('administrador','redactor','usuario') NOT NULL DEFAULT 'usuario',
  `nombre_usuario` varchar(20) NOT NULL,
  `clave_usuario` varchar(25) NOT NULL,
  `correo_usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol_usuario`, `nombre_usuario`, `clave_usuario`, `correo_usuario`) VALUES
(1, 'administrador', 'admin_cuarto', 'claveadmin', 'administradorwebcuarto@gmail.com'),
(2, 'redactor', 'Pepe Ramírez', 'claveredactor', 'peperamirezwebcuarto@gmail.com'),
(3, 'usuario', 'Iván Pérez Fernández', 'asdf1234', 'ivanperezfdz@correo.ugr.es'),
(5, 'usuario', 'usuarioprueba', '1234asdf', 'usuarioprueba@gmail.com'),
(6, 'usuario', 'eladio', 'asdf1234', 'el@ugr.es'),
(7, 'usuario', 'usuarioprueba', 'asdf1234', 'uuu@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  ADD PRIMARY KEY (`id_publicidad`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `subsecciones`
--
ALTER TABLE `subsecciones`
  ADD PRIMARY KEY (`id_subseccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `publicidad`
--
ALTER TABLE `publicidad`
  MODIFY `id_publicidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subsecciones`
--
ALTER TABLE `subsecciones`
  MODIFY `id_subseccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
