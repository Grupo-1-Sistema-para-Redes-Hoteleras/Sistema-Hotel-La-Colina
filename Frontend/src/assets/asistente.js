/*
Programa creado por youtube.com/ElTallerDeTD
20/2/20
https://github.com/imTDB
*/

if (annyang) {

    //Variable para almacenar las voces de nuestro sistema.
    var voices;
    var porResponder = [];

    //Inicializamos utter.
    var utter = new SpeechSynthesisUtterance();
    utter.rate = 1;
    utter.pitch = 0.5;
    utter.lang = 'es-VE';

    //Cargamos las voces que tenemos en nuestro sistema y las mostarmos en un arreglo por consola.
    window.speechSynthesis.onvoiceschanged = function() {
        voices = window.speechSynthesis.getVoices();
        console.log(voices);
    };

    //Definimos los comandos a utilizar.
    var commands = {
        'hola maria': function() {
            utter.text = 'Hola usuario';
            //Setea la voz que queremos usar en base a nuestra lista.
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'como estas': function() {
            utter.text = 'Muy bien!';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'hola': function() {
            utter.text = 'hola, soy tu asistente virtual. cual es tu nombre?';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
            //Guarda el nombre que le decimos por voz.
            annyang.addCallback('result', function(phrases) {
                //Imprime el nombre por consola.
                console.log("Nombre: ", phrases[0]);
                //Para el evento result.
                annyang.removeCallback('result');
                //Nos dice hola + el nombre que le digamos por voz.
                utter.text = 'Hola, ' + phrases[0] + 'es un pracer atenderte';
                window.speechSynthesis.speak(utter);
            });
        },


        //PREGUNTAS PROGRAMADAS
        'asistente': function() {
            utter.text = 'En que puedo ayudarte?';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },

        'informacion': function() {
            utter.text = 'ok, la informacion del sistema web es: opcion 1, opcion 2, y opcion 3';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },

        'como pedir cita de pasaporte': function() {
            utter.text = 'dirijase al enlace de SOLICITUDES. Se desplegara un menu de opciones y eliga CITA DE PASAPORTE';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'pase la materia': function() {
            utter.text = 'Solo si el profesor te aprueba';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'acepta Transferencia': function() {
            utter.text = 'solo dolares';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'como puedo reservar': function() {
            utter.text = 'dirijase a "reservacion online", agregue en el primer campo la fecha inicio en reservacion y en el segundo campo la fecha final del servicio. De en consultar y vera una lista de habitaciones disponibles';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'reservacion': function() {
            utter.text = 'dirijase a "reservacion online", agregue en el primer campo la fecha inicio en reservacion y en el segundo campo la fecha final del servicio. De en consultar y vera una lista de habitaciones disponibles';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'reservaciones': function() {
            utter.text = 'dirijase a "reservacion online", agregue en el primer campo la fecha inicio en reservacion y en el segundo campo la fecha final del servicio. De en consultar y vera una lista de habitaciones disponibles';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'servicios': function() {
            utter.text = 'Los servicios que ofrecemos aparte del hospedaje son: piscina, masajes, paseos y recuerdos';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'que servicios prestan': function() {
            utter.text = 'Los servicios que ofrecemos aparte del hospedaje son: piscina, masajes, paseos y recuerdos';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'servicios disponibles': function() {
            utter.text = 'Los servicios que ofrecemos aparte del hospedaje son: piscina, masajes, paseos y recuerdos';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'como ofrecer productos de proveedor': function() {
            utter.text = 'dirijase al enlace de "proveedor" que encuentra en el menu superior y alli podra enviar la informacion correspondiente';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'ofertas disponibles': function() {
            utter.text = 'las ofertas puede consultarlas en el momento de emitir su pago por un servicio. Tambien encontrara informacion por nuestras redes sociales a las que puede acceder en los enlaces del menu inferior de la web';
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },

        ///////

        //Array que devuelve aleatoriamente un elemento del array, en este caso un chiste.
        'dime un chiste': function() {
            chistes = ['Por qué las focas del circo miran siempre hacia arriba?   Porque es donde están los focos.',
                'Estas obsesionado con la comida!   No se a que te refieres croquetamente.',
                'Por que estás hablando con esas zapatillas?   Porque pone "converse"',
                'Buenos dias, me gustaria alquilar "Batman Forever".   No es posible, tiene que devolverla tomorrow.'
            ];
            utter.text = chistes[Math.floor(Math.random() * chistes.length)]
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        },
        'dime otro chiste': function() {
            chistes = ['Por que las focas del circo miran siempre hacia arriba?   Porque es donde estan los focos.',
                'Estas obsesionado con la comida!   No se a que te refieres croquetamente.',
                'Por que estas hablando con esas zapatillas?   Porque pone "converse"',
                'Buenos dias, me gustaria alquilar "Batman Forever".   No es posible, tiene que devolverla tomorrow.'
            ];
            utter.text = chistes[Math.floor(Math.random() * chistes.length)]
            utter.voice = voices[5];
            window.speechSynthesis.speak(utter);
        }
    };

    //Esto nos sirve para ver que escucha el programa en tiempo real.

    annyang.addCallback('result', function(phrases) {
        console.log("arreglo:", phrases);
        porResponder.push(phrases);


        //_http.post(`${ this.url }https://asistente-virtual-130f3-default-rtdb.firebaseio.com/questions.json`, movie);

    });



    //Sumamos todos los comandos a annyang.
    annyang.addCommands(commands);

    //Annyang comienza a escuchar.
    annyang.start({ autoRestart: false, continuous: true });
}
