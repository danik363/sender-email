# sender-email
## 1- Instalar dependencias nesarias
Para poder instalar las dependencias ejecuta 
```composer install```
## 2- Variables de entorno
Para poder usar el script debes crear las variables de entorno para configurar el servidor SMTP.
-Crear fichero **.env** dentro de el mismo directorio que el **index.php**
-Declarar y asignar valores correspondientes a las variables </br>
**HOST**</br>
**USERNAME**</br>
**PASSWORD**</br>
**PORT**

***Por defecto el script utiliza encriptacion TLS***
## 3- Levantar el servidor de desarrollo
Para poder levantar el servidor de desarrollo y probar usa ```php -S localhost:8080``` puedes cambiar de puerto en caso de que este ya lo tengas usado
## 4- Cuerpo de request
El script recibe por medio del metodo **POST** un **JSON** que contiene toda la informacion del correo a enviar.
El cuerpo del JSON contiene los siguiente campos:

```
{
  "from": "test@gmail.com",
  "to": "destination@gmail.com",
  "nameTo": "destination",
  "replyTo": "reply@gmail.com",
  "nameReplyTo": "reply",
  "subject": "test subject",
  "content": "Hello. How are you?",
  "altContent": "I'dont know"
}
```


