# A

Para el transito de datos, utilizaría protocolos de HTTPS, ya que, este protocolo ecripta la comunicación
entre el cliente y el servidor. Lo cuál restringue la exposición de datos.

Para la persistencia, debería considerar la encriptación de datos sensibles. Por ejemplo, en este proyecto utilicé la
función hash de php para guardar la contraseña encriptada, de forma que si un usuario mal intencionado puede ingresar
a mi base de datos, no puede decifrar las contraseñas.
También limitaría el acceso a los datos almacenados. Por ejemplo este proyecto tiene un login donde un usuario
no puede acceder a las reservas de otro usuario. En un proyecto más grande podría pensarse en definición de roles y
permisos según sea requerido.

# B

Para manejar problemas cómo la reserva de una habitación de forma simultanea creo que podría bloquearse los datos de una
habitación apenas un usuario, accede a ella. Una vez finalizada la reserva, podría desbloquear esos datos si la reserva
no fue efectuada.
